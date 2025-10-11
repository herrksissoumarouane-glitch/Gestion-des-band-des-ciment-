<x-app-layout>
   

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    body {
        background-color: #f9fafb;
    }

    .table-dark {
        background-color: #3b3f47; 
        color: #ffffff;
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

    .btn-danger {
        background-color: #e74c3c; 
        border-color: #e74c3c;
    }

    .btn-danger:hover {
        background-color: #c0392b; 
        border-color: #c0392b;
    }

    .btn-info {
        background-color: #3498db; 
        border-color: #3498db;
    }

    .btn-info:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .btn-success {
        background-color: #2ecc71; 
        border-color: #2ecc71;
    }

    .btn-success:hover {
        background-color: #27ae60; 
        border-color: #27ae60;
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

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f5f7fa; 
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #ced4da;  
    }

</style>

</head>
<body>

    <div class="container my-5">
        <div class="container bg-white p-4 rounded shadow">
            <div class="mb-4">
                <p class="text-secondary">TABLE DE BOARD <span class="text-muted">&gt;</span> CLIENTS</p>
                <h1 class="fw-bold">Clients</h1>
            </div>

            <div class="mb-4">
                <h4 class="text-muted">LISTE DES CLIENTS</h4>
                <p>Pour ajouter un nouveau client, cliquez sur le bouton ci-dessous :</p>
                <form action="{{route('client.create')}}">
                    @csrf
                    <button class="btn btn-dark">Nouvel client</button>
                </form>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    Afficher
                    <form method="GET" action="{{ url()->current() }}">
                        <select class="form-select d-inline-block w-auto" name="perPage" onchange="this.form.submit()">
                            <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                            <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                            <option value="200" {{ request('perPage') == 200 ? 'selected' : '' }}>200</option>
                        </select>
                    </form>
                    entrées
                </div>
                <form id="search-form" action="{{ route('index') }}" method="GET">
                    <label for="search-input">Rechercher</label>
                    <input class="form-control d-inline-block w-auto" 
                        type="text" 
                        value="{{ request()->get('search') }}" 
                        name="search" 
                        id="search-input" 
                        onkeyup="searchClients()">
                </form>
            </div>

            <table class="table table-bordered table-striped" id="client-list">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>CLIENTS</th>
                        <th>CIMENT AJOUTER</th>
                        <th>AJOUTER PAR</th>
                        <th>CREER A</th>
                        <th>MODIFIER PAR</th>
                        <th>DATE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td>
                            <div class="d-flex gap-2">
                                <form action="{{route('client.upd',$client->ref)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-info">
                                        <i class="fas fa-edit me-2"></i> 
                                    </button>   
                                </form>
                                <form action="{{route('client.show',$client->ref)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-success">
                                        <i class="fas fa-eye me-2"></i> 
                                    </button>
                                </form>
                                <form action="{{ route('client.add', ['ref' => $client->ref]) }}" method="get">
                                    <button class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i> 
                                    </button>
                                </form>
                                @if(auth()->check() && auth()->user()->role === '1')
                                    <form action="{{route('client.delete',$client->ref)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash-alt me-2"></i> 
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                        <td>{{ $client->nom }}</td>
                        <td>
                            @if($client->cimentTypes->isNotEmpty())
                                <ul>
                                    {{ $client->ciment_types_count }}
                                </ul>
                            @else
                                <span class="text-muted">Aucun type de ciment associé</span>
                            @endif
                        </td>
                        <td>{{ $client->created_by }}</td>
                        <td>{{ $client->created_at }}</td>
                        <td>{{ $client->updated_by }}</td>
                        <td>{{ $client->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                <ul class="pagination">
                    <!-- Previous Page Link -->
                    @if ($clients->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $clients->previousPageUrl() }}">Previous</a>
                        </li>
                    @endif

                    <!-- Next Page Link -->
                    @if ($clients->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $clients->nextPageUrl() }}">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function searchClients() {
            var searchQuery = $('#search-input').val(); 

            $.ajax({
                url: '{{ route('index') }}', 
                method: 'GET',
                data: { 
                    search: searchQuery 
                },
                success: function(response) {
                    
                    $('#client-list').html(response);
                },
                error: function() {
                    alert('An error occurred while fetching data.');
                }
            });
        }
    </script>

</body>
</html>
</x-app-layout>
