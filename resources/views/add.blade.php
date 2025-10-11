<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>
<body>
    <form action="{{ route('client.newtype') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row mb-3">
                <label for="clientName" class="col-sm-2 col-form-label">Client</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="clientName" name="clientName" value="{{ $client->nom ?? '' }}" readonly>
                </div>
            </div>hh

            <div class="row mb-3">
                <label for="CimentType" class="col-sm-2 col-form-label">Ciment</label>
                <div class="col-sm-10">
                    <select name="CimentType" id="CimentType" class="form-select" >
                        <option value="" disabled selected>Choisissez un type de ciment</option>
                        @foreach ($CimentType as $type)
                            <option value="{{ $type->ref }}">{{ $type->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Prix (Dirhams)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter price">
                </div>
            </div>

            <div class="row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Soumettre</button>
                </div>
            </div>
        </div>
    </form>

     
</body>
</html>
