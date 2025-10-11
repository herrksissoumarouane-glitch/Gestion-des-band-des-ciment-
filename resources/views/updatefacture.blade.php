 
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Edit Facture</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('facture.update2', $facture->ref) }}" method="POST">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="n_ordre">Order Number</label>
                    <input type="text" name="n_ordre" id="n_ordre" class="form-control" value="{{ old('n_ordre', $facture->n_ordre) }}" required>
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $facture->username) }}" required>
                </div>

                <div class="form-group">
                    <label for="ref_client">Client Reference</label>
                    <input type="number" name="ref_client" id="ref_client" class="form-control" value="{{ old('ref_client', $facture->ref_client) }}" required>
                </div>

                <div class="form-group">
                    <label for="ref_prix_ciment">Cement Price Reference</label>
                    <input type="number" name="ref_prix_ciment" id="ref_prix_ciment" class="form-control" value="{{ old('ref_prix_ciment', $facture->ref_prix_ciment) }}" required>
                </div>

                <div class="form-group">
                    <label for="prix_ciment_cl">Price Cement/CL</label>
                    <input type="number" step="0.01" name="prix_ciment_cl" id="prix_ciment_cl" class="form-control" value="{{ old('prix_ciment_cl', $facture->prix_ciment_cl) }}" required>
                </div>

                <div class="form-group">
                    <label for="montant">Montant</label>
                    <input type="number" step="0.01" name="montant" id="montant" class="form-control" value="{{ old('montant', $facture->montant) }}" required>
                </div>

                <div class="form-group">
                    <label for="mode_regle">Mode of Payment</label>
                    <select name="mode_regle" id="mode_regle" class="form-control" required>
                        <option value="Chèque" {{ $facture->mode_regle == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                        <option value="Espèce" {{ $facture->mode_regle == 'Espèce' ? 'selected' : '' }}>Espèce</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="prixtotal">Total Price</label>
                    <input type="number" step="0.01" name="prixtotal" id="prixtotal" class="form-control" value="{{ old('prixtotal', $facture->prixtotal) }}" required>
                </div>

                <div class="form-group">
                    <label for="reste">Remaining</label>
                    <input type="number" step="0.01" name="reste" id="reste" class="form-control" value="{{ old('reste', $facture->reste) }}" required>
                </div>

                <div class="form-group">
                    <label for="quant_kg">Quantity (kg)</label>
                    <input type="number" step="0.01" name="quant_kg" id="quant_kg" class="form-control" value="{{ old('quant_kg', $facture->quant_kg) }}" required>
                </div>

                <div class="form-group">
                    <label for="quant_tonne">Quantity (tons)</label>
                    <input type="number" step="0.01" name="quant_tonne" id="quant_tonne" class="form-control" value="{{ old('quant_tonne', $facture->quant_tonne) }}" required>
                </div>

                <div class="form-group">
                    <label for="quant_sacs">Quantity (sacs)</label>
                    <input type="number" name="quant_sacs" id="quant_sacs" class="form-control" value="{{ old('quant_sacs', $facture->quant_sacs) }}" required>
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ old('date', $facture->date) }}" required>
                </div>

                <div class="form-group">
                    <label for="observation">Observation</label>
                    <textarea name="observation" id="observation" class="form-control">{{ old('observation', $facture->observation) }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Update Facture</button>
                <a href="{{ route('facture.show', $facture->ref) }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
