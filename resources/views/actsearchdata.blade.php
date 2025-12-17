<!doctype html>
<html lang="en">

<head>
    <title>Search Results</title>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="/searchdata">
                <i class="bi bi-robot"></i> KNOWLEDGE BASE
            </a>
            <div class="ml-auto">
                <a href="/" class="btn btn-outline-light btn-sm"><i class="bi bi-search"></i> New Search</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text-gray-800 font-weight-bold">Search Results</h4>
        </div>

        <div class="row">
            @if(count($search) > 0)
                @foreach ($search as $s)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 hover-shadow transition-all">
                        <div class="card-img-wrapper" style="height: 200px; overflow: hidden; background-color: #f8f9fc;">
                            @if ($s->image)
                                <img src="{{ asset('/storage/image/'.$s->image) }}" alt="Image" class="card-img-top w-100 h-100" style="object-fit: cover;">
                            @else
                                <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                    <i class="bi bi-image display-4"></i>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-primary font-weight-bold mb-2">{{ $s->question }}</h5>
                            <p class="card-text text-muted">{{ \Illuminate\Support\Str::limit($s->answer, 100) }}</p>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <button type="button" class="btn btn-sm btn-outline-primary btn-block" data-toggle="modal" data-target="#detailModal{{ $s->id }}">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="detailModal{{ $s->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $s->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-weight-bold text-primary" id="detailModalLabel{{ $s->id }}">{{ $s->question }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($s->image)
                                    <img src="{{ asset('/storage/image/'.$s->image) }}" class="img-fluid rounded mb-3 w-100" alt="Detail Image">
                                @endif
                                <p class="text-justify">{{ $s->answer }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center py-5">
                    <div class="display-1 text-gray-300 mb-3"><i class="bi bi-search"></i></div>
                    <h3 class="text-gray-600">No results found.</h3>
                    <p class="text-gray-500">Try adjusting your search terms.</p>
                </div>
            @endif
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