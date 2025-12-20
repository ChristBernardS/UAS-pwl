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
                            <div class="input-group input-group-lg position-relative">
                                <input type="text" name="search" class="form-control rounded-pill-left" id="data" placeholder="Search knowledge base..." autocomplete="off" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary rounded-pill-right px-4">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                                <div id="search-results" class="dropdown-menu w-100 shadow-lg border-0 mt-1" style="display: none; position: absolute; top: 100%; left: 0; z-index: 1000; border-radius: 15px; overflow: hidden;"></div>
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

    <script>
        const searchInput = document.getElementById('data');
        const resultsContainer = document.getElementById('search-results');

        let debounceTimer;

        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            clearTimeout(debounceTimer);
            
            if (query.length < 2) {
                resultsContainer.style.display = 'none';
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch('/live-search?query=' + encodeURIComponent(query))
                    .then(response => response.json())
                    .then(data => {
                        resultsContainer.innerHTML = '';
                        
                        if (data.status === 'found') {
                            data.data.forEach(item => {
                                const a = document.createElement('a');
                                a.className = 'dropdown-item py-2 px-3 text-wrap';
                                a.href = '/actsearchdata?search=' + encodeURIComponent(item.question);
                                a.innerHTML = `<i class="bi bi-search mr-2 text-primary"></i> ${item.question}`;
                                resultsContainer.appendChild(a);
                            });
                            resultsContainer.style.display = 'block';
                        } 
                        else if (data.status === 'suggestion') {
                            const div = document.createElement('div');
                            div.className = 'dropdown-item py-2 px-3 bg-light text-wrap';
                            div.innerHTML = `
                                <span class="text-muted">No exact match. Did you mean:</span><br>
                                <a href="#" class="font-weight-bold text-primary" onclick="setSearch('${data.data}')">
                                    <i class="bi bi-lightbulb mr-1"></i> ${data.data}
                                </a>?
                            `;
                            resultsContainer.appendChild(div);
                            resultsContainer.style.display = 'block';
                        } else {
                            resultsContainer.style.display = 'none';
                        }
                    })
                    .catch(err => console.error(err));
            }, 300);
        });

        function setSearch(text) {
            searchInput.value = text;
            resultsContainer.style.display = 'none';
            document.querySelector('form').submit();
        }
        
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !resultsContainer.contains(e.target)) {
                resultsContainer.style.display = 'none';
            }
        });
    </script>
</body>

</html>