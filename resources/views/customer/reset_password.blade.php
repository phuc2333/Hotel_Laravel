<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Password Reset - SB Customer</title>
    @include('customer.layout.styles')
    @include('customer.layout.scripts')
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Reset Password</h3>
                                </div>
                                <div class="card-body">
                                    <div class="small mb-3 text-muted">Enter your new password</div>
                                    <form action="{{ route('customer_reset_password_submit') }}" method="post">
                                        @csrf
                                        @method('post')
                                        <input type="hidden" name="token" value="{{$token}}">
                                        <input type="hidden" name="email" value="{{$email}}">
                                        <div class="form-floating mb-3">
                                            <input name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="inputEmail" type="password" placeholder="New password" />
                                            <label for="inputEmail">New Password</label>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input name="retype_password"
                                                class="form-control @error('retype_password') is-invalid @enderror"
                                                id="inputEmail" type="password" placeholder="Retype password" />
                                            <label for="inputEmail">Retype Password</label>
                                            @error('retype_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="{{ route('customer_login') }}">Return to login</a>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    @include('admin.layout.scripts_footer')
</body>

</html>
