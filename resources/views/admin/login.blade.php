<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<x-layout.head title="Login | Admin"/>
	<!--end::Head-->

	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url({{ asset('assets/media/illustrations/sketchy-1/14.png') }}">
				<!--begin::Content-->
				<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
					<!--begin::Logo-->
					<a href="../../demo14/dist/index.html" class="mb-12">
						<img alt="Logo" src="{{ asset('assets/media/logos/logo-1.svg') }}" class="h-40px" />
					</a>
					<!--end::Logo-->

					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form method="POST" class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('admin.login') }}">
                            @csrf

							<!--begin::Heading-->
							<div class="text-center mb-10">
								<!--begin::Title-->
								<h1 class="text-dark mb-3">Login</h1>
								<!--end::Title-->

							</div>
							<!--begin::Heading-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Label-->
								<label class="form-label fs-6 fw-bolder text-dark">Username</label>
								<!--end::Label-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" autocomplete="on" />
								<!--end::Input-->
                                @error('username')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>
							<!--end::Input group-->
							<!--begin::Input group-->
							<div class="fv-row mb-10">
								<!--begin::Wrapper-->
								<div class="d-flex flex-stack mb-2">
									<!--begin::Label-->
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
									<!--end::Label-->
								</div>
								<!--end::Wrapper-->
								<!--begin::Input-->
								<input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" />
								<!--end::Input-->
                                @error('password')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>
							<!--end::Input group-->
							<!--begin::Actions-->
							<div class="text-center">
								<!--begin::Submit button-->
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5" onclick="login()">
									<span class="indicator-label">Login</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
								<!--end::Submit button-->
							</div>
							<!--end::Actions-->
						</form>
						<!--end::Form-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->

		<!--begin::Javascript-->
        <x-layout.script/>
		<!--end::Global Javascript Bundle-->


        <script type="text/javascript">
            "use strict";
            var fv;
            var form = document.querySelector("#kt_sign_in_form");

            $(document).ready(function() {

                @if (\Session::has('invalid'))
                     Swal.fire({
                        title: 'Login Gagal',
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
                            username: {
                                validators: {
                                    notEmpty: {
                                        message: " wajib diisi"
                                    },
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: "Wajib diisi"
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger,
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row"
                            })
                        }
                    });
            });

            function login() {
                event.preventDefault();
                fv.validate()
                    .then(function(status) {
                        if ( status == 'Valid') {
                            form.submit();
                        }
                    });
            }
        </script>

		<!--begin::Page Custom Javascript(used by this page)-->

		<!--end::Page Custom Javascript-->

		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>


