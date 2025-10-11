<x-app-layout>
    

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>h</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style> 
    .btn-sm {
        font-size: 0.85rem;
        padding: 0.3rem 0.6rem;
    }
 
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }

        .d-flex.gap-2 {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
 
    .pagination .page-item.disabled .page-link {
        color: #6c757d;
        background-color: #e9ecef;
    }

    .pagination .page-item.active .page-link {
        background-color: #007bff;
        color: white;
    }
</style>
</head>
<body>
    <div class="container my-5">
        <div class="bg-white p-4 rounded shadow">
            <div class="mb-4">
                <p class="text-secondary">TABLE DE BOARD <span class="text-warning">&gt;</span> FACTURE</p>
                <h1 class="fw-bold">FACTURE</h1>
            </div>

            <div class="mb-4 p-4 border rounded bg-light">
                <h4 class="text-primary mb-3">LISTE DES FACTURES</h4>
                <p class="text-muted">Pour ajouter un nouveau facture, cliquez sur le bouton ci-dessous :</p>
                <form class="row g-3" action="{{ route('facture.create') }}" method="GET">
                   
                    <div class="col-auto">
                        <label for="client" class="form-label mb-0">Client</label>
                        <select id="client" class="form-select form-select-sm">
                            <option value="">--Tous--</option>
                            <option value="1">Client 1</option>
                            <option value="2">Client 2</option>
                        </select>
                    </div> 
                    <div class="col-auto">
                        <label for="ciment" class="form-label mb-0">Ciment</label>
                        <select id="ciment" class="form-select form-select-sm">
                            <option value="">--Tous--</option>
                            <option value="1">Ciment 1</option>
                            <option value="2">Ciment 2</option>
                        </select>
                    </div> 
                    <div class="col-auto">
                        <label for="date-debut" class="form-label mb-0">Date de début</label>
                        <input type="date" id="date-debut" class="form-control form-control-sm">
                    </div> 
                    <div class="col-auto">
                        <label for="date-fin" class="form-label mb-0">Date de fin</label>
                        <input type="date" id="date-fin" class="form-control form-control-sm">
                    </div><br> 
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="bi bi-plus"></i>
                        </button>
                        <button type="button" class="btn btn-warning btn-sm">
                            <i class="bi bi-funnel"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <form action="">
                    Afficher
                    <select class="form-select d-inline-block w-auto" name="paginate" onchange="this.form.submit()">
                        <option value="5" {{request('paginate')==5 ? 'selected' : ''}}>5</option>
                        <option value="10" {{request('paginate')==10 ? 'selected' : ''}}>10</option>
                        <option value="15" {{request('paginate')==15 ? 'selected' : ''}}>15</option>
                        <option value="20" {{request('paginate')==20 ? 'selected' : ''}}>20</option>
                    </select>
                    entrées
                    </form>
                    
                </div>
                <div>
                    Rechercher <input class="form-control d-inline-block w-auto" type="text">
                </div>
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>Actions</th>
            <th>Order Number</th>
            <th>Payment Mode</th>
            <th>Order Number (Duplicate)</th>
            <th>Date</th>
            <th>Client</th>
            <th>Cement Price</th>
            <th>Quantity (Bags)</th>
            <th>Total Price</th>
            <th>Amount</th>
            <th>Remaining</th>
        </tr>
    </thead>
    <tbody>
        @foreach($factures as $facture)
            <tr>
                <td>
                    <div class="d-flex gap-3 justify-content-center"> 
                       
                            <form action="{{ route('facture.update', $facture->ref) }}" method="POST">
                                @csrf 
                                <button type="submit" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </form>
                             <!-- @if(!auth()->user()->role == '3' )&& $facture->created_at->diffInSeconds(now()) < 3 -->
                        <!-- @endif -->
 
                        <form action="{{ route('facture.show', $facture->ref) }}" method="GET">
                            <button type="submit" class="btn btn-info btn-sm" title="Info">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </form>
 
                         
                            <form action="{{ route('facture.print', $facture->ref) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm" title="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                            </form> 
 
                        @if(auth()->user()->role == '1')
                            <form action="{{ route('facture.delete', $facture->ref) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </td>
                <td>{{ $facture->n_ordre }}</td>
                <td>
                    @if($facture->mode_regle == 'Chèque')
                        <button class="btn btn-primary">Chèque</button>
                    @elseif($facture->mode_regle == 'Espèce')
                        <button class="btn btn-danger">Espèce</button>
                    @else
                        <button class="btn btn-secondary">Other</button>
                    @endif
                </td>
                <td>{{ $facture->n_ordre }}</td>
                <td>{{ $facture->date }}</td>
                <td>{{ $facture->client ? $facture->client->nom : 'N/A' }}</td>
                <td>{{ $facture->prix_ciment_cl }}</td>
                <td>{{ $facture->quant_sacs }}</td>
                <td>{{ $facture->prixtotal }}</td>
                <td>{{ $facture->montant }}</td>
                <td>{{ $facture->reste }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

                <div class="d-flex justify-content-center">
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($factures->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $factures->previousPageUrl() }}">Previous</a>
            </li>
        @endif

        <!-- Next Page Link -->
        @if ($factures->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $factures->nextPageUrl() }}">Next</a>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script> 
    function confirmDelete(form) {
        if (confirm('Are you sure you want to delete this invoice?')) {
            form.submit();
        }
    }
</script>
</html>
</x-app-layout>
