<script src="{{ asset('assets/plugins/custom/tinymce/tinymce.bundle.js') }}"></script>

<script type="text/javascript">
    var form = document.querySelector("#form-news");
    var fv;
    var news = {!! json_encode($news) !!};
    var input1 = document.querySelector("#news_tags");
    var tagify;

    @if (\Session::has('error'))
        showAlert('error', '{{ \Session::get('error') }}', 'Error');
    @endif


    $(document).ready(function() {
        initTinyMCE();
        initValidationForm();
        initTagify();

        if ( news ) {
            // Update
            fv.disableValidator('news_thumbnail', 'notEmpty');
            $('#news_content').html(news.content);
            $("#news_category").val(news.category_id).trigger('change.select2');
            $("#published").prop('checked', news.published);
            var newsTags = news.tags.map((item) => {
                return item.tag_name;
            });
            tagify.addTags(newsTags);
        }

    });

    window.livewire.on('categoryCreated', () => {
        $("#modal-category").modal('hide');
        showAlert('success', 'Kategori berhasil ditambahkan', 'Sukses');
        Livewire.emit('renderCategories'); // call listener render category
    });

    function initTinyMCE () {
        var options = {
            selector: "#news_content",
            height : "300",
            menubar: false,
            toolbar: ["styleselect fontselect fontsizeselect",
                "undo redo | cut copy | bold italic | link image | alignleft aligncenter alignright alignjustify",
                "bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | preview "],
            plugins : "advlist autolink link image lists charmap print preview code",
            setup: function (editor) {
                editor.on('keyup', function () {
                    fv.revalidateField('news_content');
                });
            },
        };
        tinymce.init(options);
    }

    function initTagify() {
        tagify = new Tagify(input1, {
            whitelist: ["Sepakbola", "Hiburan", "Masyarakat", "Hobi", "Organisasi", "Ulang tahun"],
            maxTags: 10,
            dropdown: {
                maxItems: 20,           // <- mixumum allowed rendered suggestions
                classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                enabled: 0,             // <- show suggestions on focus
                closeOnSelect: false    // <- do not hide the suggestions dropdown once an item has been selected
            }
        });
    }

    function initValidationForm() {
        fv = FormValidation.formValidation(form, {
                fields: {
                    news_thumbnail: {
                        validators: {
                            notEmpty: {
                                message: "Upload thumbnail berita"
                            },
                            file: {
                                extension: 'png,jpg,jpeg',
                                type: 'image/png,image/jpeg,image/jpg',
                                maxSize: (5*1024) * 1024, // 10MB
                                message: 'Format file tidak valid atau ukuran file terlalu besar',
                            },
                        }
                    },
                    news_title: {
                        validators: {
                            notEmpty: {
                                message: "Wajib diisi"
                            },
                            stringLength: {
                                max: 100,
                                message: 'Maksimal diisi 100 karakter',
                            },
                        }
                    },
                    news_category: {
                        validators: {
                            notEmpty: {
                                message: "Pilih kategori berita"
                            }
                        }
                    },
                    news_content: {
                        validators: {
                            callback: {
                                message: 'Konten diisi minimal 3 karakter',
                                callback: function (value) {
                                    // Get the plain text without HTML
                                    const text = tinyMCE.activeEditor.getContent({
                                        format: 'text',
                                    });
                                    return text.length >= 3;
                                },
                            },
                        }
                    },
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger,
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: ".fv-row"
                    })
                }
        });
    }

    function revalidateSelect2(elm, fv) {
        fv.revalidateField($(elm).attr('name'));
    }

    function validateForm() {
        event.preventDefault();
        fv.validate()
        .then(function(status) {
            if ( status == 'Valid') {
                form.submit();
            }
        });
    }

    function showModalCategory() {
        event.preventDefault();
        $("#modal-category").modal('show');
        $("#form-create-category")[0].reset();
    }

</script>
