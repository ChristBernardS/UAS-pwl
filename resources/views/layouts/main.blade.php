<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.dataTables.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title')</title>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <i class="bi bi-robot"></i> CHATBOT APP
            </div>

            <ul class="list-unstyled components">
                <li class="{{ ($key ?? '') == 'home' ? 'active' : '' }}">
                    <a href="/">
                        <i class="bi bi-house-door-fill"></i> Home
                    </a>
                </li>
                <li class="{{ ($key ?? '') == 'users' ? 'active' : '' }}">
                    <a href="/users">
                        <i class="bi bi-people-fill"></i> Users
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Page Content -->
        <div id="content">

            <!-- Top Navbar -->
            <nav class="navbar navbar-expand-lg navbar-custom">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-link d-md-none">
                        <i class="bi bi-list"></i>
                    </button>

                    <div class="ml-auto">
                        <div class="dropdown">
                            <button class="btn btn-link dropdown-toggle user-profile text-decoration-none" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="{{ Auth::user()->photo
                                    ? asset('/storage/photo/'.Auth::user()->photo)
                                    : asset('/storage/photo/no-image.png')
                                }}" alt="User Photo">
                                <span class="name d-none d-sm-inline">{{ Auth::user()->name }}</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">
                                    <i class="bi bi-clock mr-2 text-gray-400"></i> PKL 17:00 WIB
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/setting">
                                    <i class="bi bi-gear mr-2 text-gray-400"></i> Setting
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/logout">
                                    <i class="bi bi-box-arrow-left mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="container-fluid px-4">
                @yield('content')
            </div>
            
            <footer class="mt-auto py-3 text-center text-muted small">
                &copy; {{ date('Y') }} Chatbot App. All rights reserved.
            </footer>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.3.4/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            new DataTable('#example');

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>