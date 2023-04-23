<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Customer</title>
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
                                    <h3 class="text-center font-weight-light my-4">Signup</h3>
                                </div>
                                <div class="card-body">
                                    @if (session()->get('success'))
                                        <div class="text-success">{{ session()->get('success') }}</div>
                                    @endif
                                    <form action="{{ route('customer_signup_submit') }}" method="POST">
                                        @csrf
                                        @method('post')
                                        <div class="form-floating mb-3">
                                            <input name="fullname"
                                                class="form-control @error('fullname') is-invalid @enderror"
                                                id="inputFullname" type="text" placeholder="fullname"
                                                value="{{ old('email') }}" />
                                            <label for="inputFullName">Full Name</label>
                                            @error('fullname')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            @if (session()->get('error'))
                                                <div class="text-danger">{{ session()->get('error') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                id="inputEmail" type="email" placeholder="name@example.com"
                                                value="{{ old('email') }}" />
                                            <label for="inputEmail">Email address</label>
                                            @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            @if (session()->get('error'))
                                                <div class="text-danger">{{ session()->get('error') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                id="inputPassword" type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                            @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input name="retype_password"
                                                class="form-control @error('confirmpassword') is-invalid @enderror"
                                                id="inputPassword" type="password" placeholder="Confirm Password" />
                                            <label for="inputConfirmPassword">Confirm Password</label>
                                            @error('retype_password')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary">SignUp</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{route('customer_login')}}">Back Login</a></div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>
