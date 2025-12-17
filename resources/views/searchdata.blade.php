<!doctype html>
<html lang="en">

<head>
    <title>Search Knowledge Base</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-light">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">
                <i class="bi bi-robot"></i> KNOWLEDGE BASE
            </a>
            <div class="ml-auto">
                <a href="/login" class="btn btn-outline-light btn-sm">Login</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5 text-center">
                        <h2 class="mb-4 font-weight-bold text-gray-800">What are you looking for?</h2>
                        <form action="actsearchdata" method="GET">
                            @csrf
                            <div class="input-group input-group-lg">
                                <input type="text" name="search" class="form-control rounded-pill-left" id="data" placeholder="Search knowledge base..." required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary rounded-pill-right px-4">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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
</body>

</html>