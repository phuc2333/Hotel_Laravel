<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('heading') - SB Admin</title>
    @include('admin.layout.styles')
    @include('admin.layout.scripts')

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        @include('customer.layout.nav')
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="{{route('customer_edit_profile')}}">Edit profile</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider"/>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('customer_logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        @include('customer.layout.sidebar')
        @yield('main_content')
    </div>
    @include('customer.layout.scripts_footer')
    
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                iziToast.success({
                    title: 'error',
                    color: 'red',
                    position: 'topRight',
                    message: '{{ $error }}'
                });
            </script>
        @endforeach
    @endif

    @if (session()->get('error'))
        <script>
            iziToast.success({
                title: 'Hey',
                position: 'topRight',
                message: '{{ session()->get('error') }}'
            });
        </script>
    @endif

    @if (session()->get('success'))
    <script>
        iziToast.success({
            title: 'Hey',
            position: 'topRight',
            message: '{{ session()->get('success') }}'
        });
    </script>
@endif
</body>

</html>
