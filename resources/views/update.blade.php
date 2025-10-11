<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container my-4">
<form method="POST" action="{{ route('client.doupdate', $client->ref) }}">
    @csrf
    @method('PUT')
        <div class="row mb-3">
            <label for="clientName" class="col-sm-2 col-form-label">Clients</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="clientName" name="clientName" value="{{ $client->nom }}">
            </div>
        </div>

       

        <div class="row mb-3">
            <label for="createdBy" class="col-sm-2 col-form-label">Ajouter Par</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="createdBy" name="createdBy" value="{{ $client->created_by }}">
            </div>
        </div>

         

        <div class="row mb-3">
            <label for="updatedBy" class="col-sm-2 col-form-label">Modifié Par</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="updatedBy" name="updatedBy" value="{{ $client->updated_by }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="updatedAt" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="updatedAt" name="updatedAt" value="{{ $client->updated_at }}">
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
