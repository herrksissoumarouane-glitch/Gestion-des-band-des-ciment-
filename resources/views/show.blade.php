<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4">
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Clients</th>
                    <th>Ciment Ajouter</th>
                    <th>Ajouter Par</th>
                    <th>Créé À</th>
                    <th>Modifié Par</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $client->nom }}</td>
                    <td>Type Ciment</td>
                    <td>{{ $client->created_by }}</td>
                    <td>{{ $client->created_at }}</td>
                    <td>{{ $client->updated_by }}</td>
                    <td>{{ $client->updated_at }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
