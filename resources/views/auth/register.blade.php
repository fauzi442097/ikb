<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="Register"/>

	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-xl-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-fluid">
					<div class="d-flex flex-row-fluid flex-center p-10">
						<div class="d-flex flex-column text-center text-md-start">
							<a href="javascript:;" class="mb-4 mb-md-10">
								<img alt="Logo" src="{{ asset('img/logo.jpg') }}" class="h-70px" />
							</a>
							<h1 class="text-dark fs-2x mb-3">Registrasi Member</h1>
						</div>
					</div>
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-200px min-h-xl-450px mb-xl-10 d-none d-md-block" style="background-image: url({{ asset('assets/media/illustrations/sketchy-1/8.png') }}"></div>
				</div>
				<div class="flex-lg-row-fluid d-flex flex-lg-center justfiy-content-xl-first px-10">
					<div class="d-flex justify-content-center flex-lg-center p-lg-15 p-10 shadow bg-body rounded w-100 w-md-550px mx-auto ms-xl-20 rounded-3">
						<form class="form w-500px w-md-400px" novalidate="novalidate" id="form_register" method="POST" action="{{ route('guest.register') }}">
                            @csrf
							<div class="text-center mb-10">
								<h1 class="text-dark mb-2">Registrasi</h1>
                                <span class="text-muted fs-7"> Silakan masukan data Anda </span>
							</div>

							<div class="fv-row mb-6 mb-lg-10">
								<label class="form-label fw-bold text-dark fs-6">Nama Lengkap</label>
								<input class="form-control form-control-solid @error('name') is-invalid @enderror" type="text" maxLength="100" placeholder="Budi santosa" name="name" value="{{ old('name') }}" autocomplete="off" />
                                @error('name')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>

                        
                            <div class="fv-row mb-6 mb-lg-10">
								<label class="form-label fw-bold text-dark fs-6">No HP </label>
								<input class="form-control form-control-solid @error('phone_no') is-invalid @enderror" placeholder="089291920101" type="text" minlength="10" maxLength="15" name="phone_no" value="{{ old('phone_no') }}" autocomplete="off" />
                                @error('phone_no')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>

                            <div class="fv-row mb-6 mb-lg-10">
								<label class="form-label fw-bold text-dark fs-6"> Email <span class="text-muted fs-8 fw-normal"> (Opsional) </span>  </label>
								<input class="form-control form-control-solid @error('email') is-invalid @enderror" type="text" placeholder="budi@gmail.com" name="email" value="{{ old('email') }}" autocomplete="off" maxLength="100" />
                                @error('email')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>

                            <div class="fv-row mb-6 mb-lg-10">
								<label class="form-label fw-bold text-dark fs-6"> Username </label>
								<input class="form-control form-control-solid @error('username') is-invalid @enderror" type="text" minlength="3" maxLength="30" placeholder="Budi123" name="username" value="{{ old('username') }}" autocomplete="off" />
                                @error('username')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>

							<div class="mb-7 fv-row mb-lg-10" data-kt-password-meter="true">
								<div class="mb-1">
									<label class="form-label fw-bold text-dark fs-6">Password</label>
									<div class="position-relative mb-3">
										<input class="form-control form-control-solid @error('password') is-invalid @enderror" minlength="5" maxLength="30" type="password" placeholder="" name="password" autocomplete="off" />
										<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
											<i class="bi bi-eye-slash fs-2"></i>
											<i class="bi bi-eye fs-2 d-none"></i>
										</span>
                                        @error('password')
                                            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                        @enderror
									</div>
								</div>
							</div>

							<div class="text-center pb-lg-0 mt-6 pb-0">
								<button type="button" id="kt_free_trial_submit" class="btn btn-lg btn-primary fw-bolder w-100" onclick="register();">
									<span class="indicator-label"> Registrasi </span>
								</button>
							</div>

                            <div class="fv-row mt-lg-10 mt-4 text-end">
                                <span class="form-check-label fw-bold text-gray-700">Sudah punya akun?
								<a href="{{ route('login') }}" class="link-primary ms-1">Login</a>.</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        <x-layout.script/>
        <script type="text/javascript">
            var fv;
            var form = document.querySelector("#form_register");

            $(document).ready(function() {

                
                $('input').keypress(function (e) {
                    if (e.which == 13) return register();
                });

             
                @if (\Session::has('invalid'))
                    Swal.fire({
                        title: 'Error',
                        text: '{{ \Session::get('invalid') }}',
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                @endif

                fv = FormValidation.formValidation(form, {
                        fields: {
                            name: {
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
                            phone_no: {
                                validators: {
                                    notEmpty: {
                                        message: "Wajib diisi"
                                    },
                                    stringLength: {
                                        min: 10,
                                        max: 15,
                                        message: 'Minimal diisi 10 sampai 15 digit angka',
                                    },
                                    regexp: {
                                        regexp: /^[0-9]*$/i,
                                        message: 'No HP hanya boleh diisi angka',
                                    },
                                }
                            },
                            email: {
                                validators: {
                                    emailAddress: {
                                        message: "Email tidak valid"
                                    },
                                    stringLength: {
                                        max: 100,
                                        message: 'Maksimal diisi 100 karakter',
                                    },
                                }
                            },
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: "Wajib diisi"
                                    },
                                    stringLength: {
                                        min: 3,
                                        max: 30,
                                        message: 'Minimal diisi 3 karakter sampai 30 karakter',
                                    },
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: "Wajib diisi"
                                    },
                                    stringLength: {
                                        min: 5,
                                        max: 30,
                                        message: 'Minimal diisi 5 karakter sampai 30 karakter',
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
            });

            function register() {
                event.preventDefault();
                fv.validate()
                    .then(function(status) {
                        if ( status == 'Valid') {
                            form.submit();
                        }
                    });
            }

        </script>

	</body>
	<!--end::Body-->
</html>
