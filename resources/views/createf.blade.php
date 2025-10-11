<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compact Form with Dynamic Fields</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <style> 
        #remaining {
            transition: background-color 0.3s, color 0.3s;  
        }

        
        .bg-danger-light {
            background-color: #f8d7da;  
        }
 
        .bg-success-light {
            background-color: #d4edda;  
        }
 
        .bg-neutral {
            background-color: #f0f0f0;  
        }
 
        .text-dark {
            color: #343a40;  
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow-sm p-3 rounded">
            <h3 class="text-center mb-4">Ajouter une nouvelle facture</h3>

            <form action="{{ route('facture.store') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-3">
                        <label for="orderNo" class="form-label">N° ordre</label>
                        <input type="text" class="form-control form-control-sm bg-light text-dark" id="orderNo" name="n_ordre"  readonly >
                    </div>
                    <div class="col-3">
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
                    <div class="col-3">
                        <label for="ciment" class="form-label">Ciment</label>
                        <select class="form-select form-select-sm" id="ciment" name="ciment" required>
                            <option value="">Sélectionner un type de ciment</option>
                            @foreach ($ciments as $ciment)
                                <option value="{{ $ciment->ref }}" data-price="{{ $ciment->prix }}">{{ $ciment->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <label for="paymentMode" class="form-label">Mode de règlement</label>
                        <select class="form-select form-select-sm" id="paymentMode" name="paymentMode" required>
                            <option value="">Sélectionner un mode de règlement</option>
                            @foreach ($paymentMethods as $method)
                                <option value="{{ $method }}">{{ $method }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <label for="priceDh" class="form-label">Prix DH</label>
                        <input type="text" class="form-control form-control-sm bg-light text-dark" id="priceDh" name="prix_ciment_cl" readonly>
                    </div>
                    <div class="col-3">
                        <label for="quantityKg" class="form-label">Quantité en kg</label>
                        <input type="text" class="form-control form-control-sm" id="quantityKg" name="quant_kg" required>
                    </div>
                    <div class="col-3">
                        <label for="totalPrice" class="form-label">Prix total</label>
                        <input type="text" class="form-control form-control-sm bg-light text-dark" id="totalPrice" name="prixtotal" readonly>
                    </div>
                    <div class="col-3">
                        <label for="remaining" class="form-label">Le reste</label>
                        <input type="text" class="form-control form-control-sm  text-dark" id="remaining" name="reste" readonly>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-3">
                        <label for="cimentBags" class="form-label">Quantité de sacs de ciment</label>
                        <input type="text" class="form-control form-control-sm" id="cimentBags" name="quant_sacs" required>
                    </div>
                    <div class="col-3">
                        <label for="quantityTons" class="form-label">Quantité en T</label>
                        <input type="text" class="form-control form-control-sm" id="quantityTons" name="quant_tonne" required readonly>
                    </div>
                    <div class="col-3">
                        <label for="amountDh" class="form-label">Montant DH</label>
                        <input type="text" class="form-control form-control-sm" id="amountDh" name="montant" required>
                    </div>
                    <div class="col-3">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control form-control-sm" id="date" name="date" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="observations" class="form-label">Observation</label>
                    <textarea class="form-control form-control-sm" id="observations" name="observation" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary btn-sm">Fermer</button>
                    <button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
        //////
            function setOrderNo() {
                var today = new Date();
                var day = String(today.getDate()).padStart(2, '0');
                var month = String(today.getMonth() + 1).padStart(2, '0');
                var year = today.getFullYear();
                var orderNo = day + '.' + month + '.' + year;
                $('#orderNo').val(orderNo);
            }
        ////////
            $('#quantityKg, #amountDh').on('input', function () {
                updateTotalPrice();
            });

            function updateTotalPrice() {
                var cimentPrice = parseFloat($('#priceDh').val()) || 0;
                var quantityKg = parseFloat($('#quantityKg').val()) || 0;
                var totalPrice = cimentPrice * quantityKg;
                var amountDh = parseFloat($('#amountDh').val()) || 0;
                var remaining = totalPrice - amountDh;

                $('#totalPrice').val(totalPrice.toFixed(2));
                $('#remaining').val(remaining.toFixed(2));

                updateRemainingColor(remaining);
            }

            function updateRemainingColor(remainingValue) {
                if (remainingValue < 0) {
                    $('#remaining').removeClass('bg-success-light bg-neutral').addClass('bg-danger-light text-dark');
                } else if (remainingValue > 0) {
                    $('#remaining').removeClass('bg-danger-light bg-neutral').addClass('bg-success-light text-dark');
                } else {
                    $('#remaining').removeClass('bg-danger-light bg-success-light text-dark').addClass('bg-neutral');
                }
            }

            $('#remaining').on('input', function () {
                var remainingValue = parseFloat($(this).val()) || 0;
                updateRemainingColor(remainingValue);
            });

            $('#client, #ciment').on('change', function () {
                var clientRef = $('#client').val();
                var cimentRef = $('#ciment').val();

                if (clientRef && cimentRef) {
                    $.ajax({
                        url: '/get-ciment-price',
                        type: 'POST',
                        data: {
                            client_ref: clientRef,
                            ciment_ref: cimentRef,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            $('#priceDh').val(response.price || '');
                            updateTotalPrice();
                        },
                        error: function() {
                            alert("An error occurred while fetching the ciment price.");
                        }
                    });
                }
            });

            setOrderNo();

            $('#quantityKg').on('input', function () {
                var kg = parseFloat($(this).val()) || 0;
                var tons = kg / 1000;
                $('#quantityTons').val(tons.toFixed(3));
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>
