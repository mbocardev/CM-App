<!doctype html>
<html lang="en">
<head>
    <!-- Meta and title omitted for brevity -->
    <!-- Icons omitted for brevity -->
    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
</head>

<body>
<div id="page-container">
    <main id="main-container">
        <!-- Page Content -->
        <div class="hero-static d-flex align-items-center">
            <div class="content">
                <div class="row justify-content-center push">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <!-- Sign Up Block -->
                        <div class="block block-rounded mb-0">
                            <div class="block-header block-header-default">
                                <h3 class="block-title">Create Account</h3>
                                <div class="block-options">
                                    <a class="btn-block-option fs-sm" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#one-signup-terms">View Terms</a>
                                    <a class="btn-block-option" href="{{ route('login') }}" data-bs-toggle="tooltip" data-bs-placement="left" title="Sign In">
                                        <i class="fa fa-sign-in-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="block-content">
                                <div class="p-sm-3 px-lg-4 px-xxl-5 py-lg-5">
                                    <h1 class="h2 mb-1">CM App</h1>
                                    <p class="fw-medium text-muted">
                                        Please fill the following details to create a new account.
                                    </p>

                                    <!-- Sign Up Form -->
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <!-- Name -->
                                        <div class="mb-4">
                                            <input type="text" id="name" name="name" class="form-control form-control-lg form-control-alt" :value="old('name')" placeholder="Name" required autofocus autocomplete="name">
                                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                        </div>
                                        
                                        <!-- Email -->
                                        <div class="mb-4">
                                            <input type="email" id="email" name="email" class="form-control form-control-lg form-control-alt" :value="old('email')" placeholder="Email" required autocomplete="username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>
                                        
                                        <!-- Password -->
                                        <div class="mb-4">
                                            <input type="password" id="password" name="password" class="form-control form-control-lg form-control-alt" placeholder="Password" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mb-4">
                                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg form-control-alt" placeholder="Confirm Password" required autocomplete="new-password">
                                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                        </div>

                                        <!-- Terms and Conditions -->
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="signup-terms" name="signup-terms">
                                                <label class="form-check-label" for="signup-terms">I agree to Terms & Conditions</label>
                                            </div>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="row mb-4">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn w-100 btn-alt-success">
                                                    <i class="fa fa-fw fa-plus me-1 opacity-50"></i> Register
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign Up Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign Up Block -->
                    </div>
                </div>
                <div class="fs-sm text-muted text-center">
                    <strong></strong> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>

            <!-- Terms Modal -->
            <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms" aria-hidden="true">
                <!-- Content omitted for brevity -->
            </div>
            <!-- END Terms Modal -->
        </div>
        <!-- END Page Content -->
    </main>
    <!-- END Main Container -->
</div>
<!-- END Page Container -->

<!-- OneUI JS and Plugins omitted for brevity -->
</body>
</html>
