<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form mit Bootstrap</title>
    <!-- Bootstrap CSS einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <form action="{{route('ciment.store')}}" class="bg-white p-4 rounded shadow" style="width: 300px;" method="post">
        @csrf
        <h3 class="text-center mb-4">Ajouter une Catégorie</h3>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le categories">
        </div>
        <div class="d-flex justify-content-between">
            <button type="button" class="btn btn-secondary">Fermer</button>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>

    <!-- Bootstrap JS und Popper.js einbinden -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
