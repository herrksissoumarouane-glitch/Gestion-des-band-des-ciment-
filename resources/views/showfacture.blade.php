 
<div class="container mt-4">
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4>Facture Details</h4>
        </div>
        <div class="card-body">
            @if ($facture)
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th>Reference</th>
                            <td>{{ $facture->ref }}</td>
                        </tr>
                        <tr>
                            <th>Order Number</th>
                            <td>{{ $facture->n_ordre }}</td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $facture->username }}</td>
                        </tr>
                        <tr>
                            <th>Client Reference</th>
                            <td>{{ $facture->ref_client }}</td>
                        </tr>
                        <tr>
                            <th>Cement Price Reference</th>
                            <td>{{ $facture->ref_prix_ciment }}</td>
                        </tr>
                        <tr>
                            <th>Price Cement/CL</th>
                            <td>{{ $facture->prix_ciment_cl }}</td>
                        </tr>
                        <tr>
                            <th>Montant</th>
                            <td>{{ $facture->montant }}</td>
                        </tr>
                        <tr>
                            <th>Mode of Payment</th>
                            <td>{{ $facture->mode_regle }}</td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <td>{{ $facture->prixtotal }}</td>
                        </tr>
                        <tr>
                            <th>Remaining</th>
                            <td>{{ $facture->reste }}</td>
                        </tr>
                        <tr>
                            <th>Quantity (kg)</th>
                            <td>{{ $facture->quant_kg }}</td>
                        </tr>
                        <tr>
                            <th>Quantity (tons)</th>
                            <td>{{ $facture->quant_tonne }}</td>
                        </tr>
                        <tr>
                            <th>Quantity (sacs)</th>
                            <td>{{ $facture->quant_sacs }}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ $facture->date }}</td>
                        </tr>
                        <tr>
                            <th>Observation</th>
                            <td>{{ $facture->observation }}</td>
                        </tr>
                        <tr>
                            <th>Created By</th>
                            <td>{{ $facture->created_by }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">
                    Facture not found.
                </div>
            @endif
        </div>
        <div class="card-footer">
            <a href="{{ route('facture.update', $facture->ref) }}" class="btn btn-warning btn-sm">Edit</a>
            <a href="{{ route('facture') }}" class="btn btn-secondary btn-sm">Back</a>
        </div>
    </div>
</div>
 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
