<!DOCTYPE html>
<html lang="en">
    <x-layout.head title="Login"/>

	<body id="kt_body" class="bg-body">
		<div class="d-flex flex-column flex-root">
			<div class="d-flex flex-column flex-xl-row flex-column-fluid">
				<div class="d-flex flex-column flex-lg-row-fluid">
					<div class="d-flex flex-row-fluid flex-center p-10">
						<div class="d-flex flex-column text-center text-md-start">
							<a href="../../demo14/dist/index.html" class="mb-4 mb-md-10">
								<img alt="Logo" src="{{ asset('img/logo.jpg') }}" class="h-70px" />
							</a>
							<h1 class="text-dark fs-2x mb-3">Welcome, Member!</h1>
						</div>
					</div>
					<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-200px min-h-xl-450px mb-xl-10 d-none d-md-block" style="background-image: url({{ asset('assets/media/illustrations/sketchy-1/8.png') }}"></div>
				</div>
				<div class="flex-lg-row-fluid d-flex flex-lg-center justfiy-content-xl-first px-10">
					<div class="d-flex justify-content-center flex-lg-center p-lg-15 p-10 shadow bg-body rounded w-100 w-md-550px mx-auto ms-xl-20 rounded-3">
						<form class="form w-500px w-md-400px" novalidate="novalidate" id="kt_free_trial_form" method="POST" action="{{ route('guest.login') }}">
                            @csrf
							<div class="text-center mb-10">
								<h1 class="text-dark mb-3">Login</h1>
							</div>
							<div class="fv-row mb-6 mb-lg-10">
								<label class="form-label fw-bolder text-dark fs-6">Username</label>
								<input class="form-control form-control-solid @error('username') is-invalid @enderror" type="text" placeholder="" name="username" value="{{ old('username') }}" autocomplete="off" />
                                @error('username')
                                    <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
                                @enderror
							</div>
							<div class="mb-7 fv-row mb-lg-10" data-kt-password-meter="true">
								<div class="mb-1">
									<label class="form-label fw-bolder text-dark fs-6">Password</label>
									<div class="position-relative mb-3">
										<input class="form-control form-control-solid @error('password') is-invalid @enderror" type="password" placeholder="" name="password" autocomplete="off" />
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
								<button type="button" id="kt_free_trial_submit" class="btn btn-lg btn-primary fw-bolder w-100" onclick="login();">
									<span class="indicator-label">Login </span>
								</button>
							</div>
                            <div class="fv-row mt-lg-10 mt-4 text-end">
                                <span class="form-check-label fw-bold text-gray-700">Belum punya akun?
								<a href="#" class="link-primary ms-1">Daftar</a>.</span>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        <x-layout.script/>
        <script type="text/javascript">
            var fv;
            var form = document.querySelector("#kt_free_trial_form");

            $(document).ready(function() {

                $('input').keypress(function (e) {
                    if (e.which == 13) return login();
                });

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
                                        message: "Wajib diisi"
                                    },
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: "Wajib diisi"
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
