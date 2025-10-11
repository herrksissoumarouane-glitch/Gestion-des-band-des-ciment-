<table class="table table-striped table-bordered mt-4">
            <thead class="table-light">
                <tr>
                    <th>Date</th>
                    <th>Client</th>
                    <th>Ciment</th>
                    <th>Prix</th>
                    <th>Quantité de sacs de ciment</th>
                    <th>Prix total</th>
                    <th>Prix d'entrée</th>
                    <th>Le reste</th>
                    <th>Quantité (Tonne)</th>
                    <th>Quantité (Kilogram)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($factures as $facture)
                    <tr>
                        <td>{{ $facture->date }}</td>
                        <td>{{ $facture->client ? $facture->client->nom : 'N/A' }}</td>
                        <td>{{ $facture->prix_ciment_cl }}</td>
                        <td>{{ $facture->prix_ciment_cl * $facture->quant_sacs }}</td> <!-- Calculating total price -->
                        <td>{{ $facture->quant_sacs }}</td>
                        <td>{{ $facture->prixtotal }}</td>
                        <td>{{ $facture->prix_ciment_cl }}</td>
                        <td>{{ $facture->reste }}</td>
                        <td>{{ $facture->quant_tonne }}</td>
                        <td>{{ $facture->quant_kg }}</td>
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