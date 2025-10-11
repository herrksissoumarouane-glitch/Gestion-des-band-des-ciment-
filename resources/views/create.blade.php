<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
        <h2>Client Form</h2>
        <form method="POST" action="{{route('client.store')}}">
            @csrf
 
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" maxlength="200" required>
            </div>
 
            <div class="mb-3">
                <label for="created_by" class="form-label">Created By</label>
                <input type="text" class="form-control" id="created_by" name="created_by" maxlength="100" required>
            </div>
 
            <div class="mb-3">
                <label for="updated_by" class="form-label">Updated By</label>
                <input type="text" class="form-control" id="updated_by" name="updated_by" maxlength="100">
            </div>
 
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
