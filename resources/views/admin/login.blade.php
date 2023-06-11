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
					<a href="{{ route('admin.index_login') }}" class="mb-12">
						<img alt="Logo" src="{{ asset('img/logo.jpg') }}" class="h-100px h-lg-130px" />
					</a>
					<!--end::Logo-->

					<!--begin::Wrapper-->
					<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
						<!--begin::Form-->
						<form method="POST" class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('admin.login') }}">
                            @csrf

							<div class="text-center mb-10">
								<h1 class="color-primary-logo mb-3">Admin Panel</h1>
                                <h3 class="text-dark mb-3">Login</h3>
							</div>

							<div class="fv-row mb-10">
								<label class="form-label fs-6 fw-bolder text-dark">Username</label>
								<input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="text" name="username" value="{{ old('username') }}" autocomplete="on" />
                                @error('username')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>
							<div class="fv-row mb-10">
								<div class="d-flex flex-stack mb-2">
									<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
								</div>
								<input class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror" type="password" name="password" autocomplete="off" />
                                @error('password')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>
							<div class="text-center">
								<button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5" onclick="login()">
									<span class="indicator-label">Login</span>
									<span class="indicator-progress">Please wait...
									<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        <x-layout.script/>


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



	</body>
	<!--end::Body-->
</html>


