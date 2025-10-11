<x-app-layout>
        
    
    <div class="container my-5">
        <div class="container bg-light p-4 rounded shadow">
            <div class="mb-4">
                <p class="text-secondary">TABLE DE BOARD <span class="text-warning">&gt;</span> ACCUEIL</p>
                <h1 class="fw-bold text-primary">Analytique</h1>
                <p><strong class="text-dark">VENTES TOTALES</strong></p>
                <p>Total des ventes de sac de chaque categories</p>
            </div>

            <div id="cimentCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($factures->chunk(4) as $index => $chunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row">
                                @foreach ($chunk as $facture)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                {{ $facture->total_prix }}
                                                    
                                                </h5>
                                                <p class="card-text">  {{ $facture->total_sacs }} sacs</p>
                                                <p class="card-text"> {{ $facture->cimentType ? $facture->cimentType->nom : 'No Ciment Type' }}  </p>
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                   
                </div>
 
                <button class="carousel-control-prev" type="button" data-bs-target="#cimentCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cimentCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
 
            <div class="container">
                <div class="row mb-4"> 
                    <div class="col-md-6">
                        <h3 class="fw-bold text-warning">Total Facture</h3>
                        <canvas id="factureChart"></canvas>
                    </div>
 
                    <div class="col-md-6">
                        <h3 class="fw-bold text-warning">Montant</h3>
                        <canvas id="montantChart"></canvas>
                    </div>
                </div>
            </div>
 
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                // Data for Total Facture Chart
                var factureData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr'],  // X-axis labels
                    datasets: [{
                        label: 'Total Facture',
                        data: [120, 200, 150, 80], // Sample data for Total Facture
                        backgroundColor: 'rgba(255, 99, 132, 0.2)', // Bar color
                        borderColor: 'rgba(255, 99, 132, 1)', // Border color
                        borderWidth: 1
                    }]
                };

                // Data for Montant Chart
                var montantData = {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr'],  // X-axis labels
                    datasets: [{
                        label: 'Montant',
                        data: [5000, 6000, 8000, 4000], // Sample data for Montant
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Bar color
                        borderColor: 'rgba(54, 162, 235, 1)', // Border color
                        borderWidth: 1
                    }]
                };

                // Initialize Total Facture Chart
                var ctxFacture = document.getElementById('factureChart').getContext('2d');
                var factureChart = new Chart(ctxFacture, {
                    type: 'bar', // Chart type
                    data: factureData, // Data to use
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Initialize Montant Chart
                var ctxMontant = document.getElementById('montantChart').getContext('2d');
                var montantChart = new Chart(ctxMontant, {
                    type: 'bar', // Chart type
                    data: montantData, // Data to use
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <!-- Bootstrap JS -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</x-app-layout>
