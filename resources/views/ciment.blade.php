<x-app-layout>
  

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ciment</title>
                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
                                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style>
            body {
                background-color: #f9fafb;  
                font-family: 'Arial', sans-serif; 
            }

            .container {
                background-color: #ffffff;  
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);  
            }

            .btn-dark {
                background-color: #5c6370;  
                border-color: #5c6370;
            }

            .btn-dark:hover {
                background-color: #4a4f57;  
                border-color: #4a4f57;
            }

            .btn-primary {
                background-color: #4a90e2;  
                border-color: #4a90e2;
            }

            .btn-primary:hover {
                background-color: #3a78b2; 
                border-color: #3a78b2;
            }

            .table-dark {
                background-color: #343a40; 
                color: #ffffff;
            }

            .table-striped tbody tr:nth-of-type(odd) {
                background-color: #f5f7fa;  
            }

            .table-bordered td, .table-bordered th {
                border: 1px solid #ced4da;  
            }

            .pagination .page-item .page-link {
                color: #5c6370; 
                background-color: #ffffff;
                border-color: #dee2e6;
            }

            .pagination .page-item .page-link:hover {
                background-color: #f1f3f5;  
                border-color: #cfd4d8;
            }

            .pagination .page-item.active .page-link {
                background-color: #4a90e2;  
                border-color: #4a90e2;
                color: #ffffff; 
            }

            .form-select {
                border-radius: 5px; 
            }

            .form-control {
                border: 1px solid #ced4da;  
                border-radius: 5px;
            }

            h1,
            h4 {
                color: #212529;   
            }

            p.text-secondary {
                font-size: 14px;
                color: #6c757d;  
            }

        </style>

    </head>
    <body> 
        <div class="container my-5" >
                <div class="mb-4">
                    <p class="text-secondary">TABLE DE BOARD <span class="text-muted">&gt;</span> CIMENT</p>
                    <h1 class="fw-bold">Ciment</h1>
                </div>

                <div class="mb-4">
                    <h4 class="text-muted">LISTE DES CATEGORIES DE CIMENT</h4>
                    <form action="{{route('ciment.create')}}" method="get">
                        <button class="btn btn-primary" type="submit">Nouvelle catégorie</button>
                    </form>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        Afficher
                        <form method="get" action="{{ route('ciment') }}">
                            <select class="form-select d-inline-block w-auto me-2" name="perPage" onchange="this.form.submit()">
                                <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                                <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                                <option value="200" {{ request('perPage') == 200 ? 'selected' : '' }}>200</option>
                            </select>
                            entrées
                        </form>
                    </div>

                    <div class="d-inline-block w-auto me-2">
                        Rechercher <input class="form-control d-inline-block w-auto" type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search..." onkeyup="searchCiment()">
                    </div>
                </div>

                <div id="search-results">
                    @include('partials.ciment_table', ['ciments' => $ciments])
                </div>

                <div class="d-flex justify-content-center">
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($ciments->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $ciments->previousPageUrl() }}">Previous</a>
                            </li>
                        @endif

                        <!-- Next Page Link -->
                        @if ($ciments->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $ciments->nextPageUrl() }}">Next</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">Next</span>
                            </li>
                        @endif
                    </ul>
                </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            function searchCiment() {
                var searchQuery = $('#search').val();  
                var perPage = '{{ request('perPage', 5) }}';  
                $.ajax({
                    url: "{{ route('ciment') }}", 
                    method: "GET",
                    data: {
                        search: searchQuery,   
                        perPage: perPage,     
                    },
                    success: function(response) {
                         
                        $('#search-results').html(response);
                    }
                });
            }
        </script>
          <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
    </html>
</x-app-layout>
