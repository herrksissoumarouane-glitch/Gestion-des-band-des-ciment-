<x-app-layout>
   
<style>
    body {
        background-color: #f8f9fa;  
        font-family: Arial, sans-serif; 
    }

    .container {
        background-color: #ffffff;  
        border-radius: 8px;
        padding: 20px 30px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    }

    .text-warning {
        color: #ffae42 !important;  
    }

    h3 {
        font-weight: bold;
        color: #343a40;  
    }

    .form-label {
        font-weight: bold;
        color: #6c757d;  
    }

    .form-control, .form-select {
        border-radius: 5px;  
        border: 1px solid #ced4da; 
    }

    .btn-warning {
        background-color: #f39c12;
        border-color: #e67e22;
        color: #fff;
    }

    .btn-warning:hover {
        background-color: #e67e22;
        border-color: #d35400;
    }

    .btn-primary, .btn-secondary {
        border-radius: 5px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #0056b3;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .btn-secondary {
        background-color: #6c757d;
        border-color: #5a6268;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        border-color: #545b62;
    }

    .row .col-md-3 label {
        margin-bottom: 5px;
        font-size: 14px;
    }

    .row .col-md-3 input,
    .row .col-md-3 select {
        font-size: 14px;
    }

    .d-flex {
        margin-top: 20px;
    }

    .pagination .page-link {
        color: #007bff;
        background-color: #ffffff;
        border-color: #dee2e6;
    }

    .pagination .page-link:hover {
        background-color: #e9ecef;
        border-color: #dee2e6;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
        color: #ffffff;
    }

    .bg-success.bg-opacity-25 {
        background-color: rgba(40, 167, 69, 0.25) !important;
        color: #28a745;
    }

    .bg-danger.bg-opacity-25 {
        background-color: rgba(220, 53, 69, 0.25) !important;
        color: #dc3545;
    }
</style>


    <div class="container my-5">
        <div class="mb-4">
            <p class="text-secondary">TABLE DE BOARD <span class="text-warning">&gt;</span> Gestion Des Ventes</p>
            <h3>Gestion Des Ventes</h3>
        </div>        
 
        <form class="row g-3">
            <div class="row">
                <div class="col-md-3">
                    <label for="client" class="form-label">Client</label>
                    <select class="form-select form-select-sm" id="client" name="client" required>
                        <option value="">Sélectionner un client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->ref }}" data-name="{{ $client->nom }}" data-address="{{ $client->adresse }}" data-phone="{{ $client->telephone }}">
                                {{ $client->nom }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="startDate" class="form-label">Date de début</label>
                    <input type="date" id="startDate" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="endDate" class="form-label">Date de fin</label>
                    <input type="date" id="endDate" class="form-control">
                </div>`
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" class="btn btn-warning w-100"><i class="fa-solid fa-filter"></i> Recherche</button>
                </div>
            </div>
        </form>
 
        <div class="row mt-4">
            <div class="col-md-3">
                <label>Total de sacs vendus</label>
                <input type="text" class="form-control" value="{{ $totalSacs }}" readonly>
            </div>
            <div class="col-md-3">
                <label>Total Montants (Dirhams)</label>
                <input type="text" class="form-control" value="{{ $totalMontant }}" readonly>
            </div>
            <div class="col-md-3">
                <label>Le reste (Dirhams)</label>
                @if ($totalReste > 0)
                    <input type="text" class="form-control text-dark bg-success bg-opacity-25" value="{{ $totalReste }}" readonly>
                @else
                    <input type="text" class="form-control text-dark bg-danger bg-opacity-25" value="{{ $totalReste }}" readonly>
                @endif
            </div>
        </div>
 
        <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    Afficher
                    <form action="{{url()->current()}}" method="get">
                    <select class="form-select d-inline-block w-auto" name="paginatselect" onchange="this.form.submit()">
                        <option value="5" {{request('paginatselect')==5 ? 'selected':''}}>5</option>
                        <option value="10" {{request('paginatselect')==10 ? 'selected':''}}>10</option>
                        <option value="15" {{request('paginatselect')==15 ? 'selected':''}}>15</option>
                        <option value="20" {{request('paginatselect')==20 ? 'selected':''}}>20</option>
                    </select>
                    </form>
                    
                    entrées
                </div>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                   
                <div>
                    Rechercher <input class="form-control d-inline-block w-auto" type="text" name="search" id="search" value="{{request('search')}}" onkeyup="searchinput()">
                </div>
            </div>
        <div class="mt-4">
            <button class="btn btn-primary">Excel</button>
            <button class="btn btn-secondary">Column visibility</button>
        </div>

         
       <div id="searchres">
        @include('partials.gestion_table',['factures'=>$factures])
       </div>
        
    <script>
        function searchinput(){
            var searchkey=$('#search').val()
            var paginatselect={{request('paginatselect',5)}}
            $.ajax({
                url:"{{route('gestion')}}",
                method:"get",
                data :{
                    search:searchkey,
                    paginatselect:paginatselect,

                },
                success:function(response){
                    $('#searchres').html(response)
                }
            })
        }
    </script>
</x-app-layout>
