<x-app-layout>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .btn {
        font-size: 0.9rem;
    }
 
    @media (max-width: 768px) {
        .table-responsive {
            overflow-x: auto;
        }
    }
</style>

</head>
<body>
<div class="container  my-5">
    <div class="container bg-white p-4 rounded shadow"> 
        <div class="mb-4">
            <p class="text-secondary">TABLE DE BOARD <span class="text-warning">&gt;</span> ADMINISTRATION</p>
            <h1 class="fw-bold">Administrations</h1>
        </div>
 
        <div class="mb-4">
            <h4 class="text-primary">LISTE DES ADMINISTRATEURS</h4>
            <p>Pour ajouter un nouveau administrateur, cliquez sur le bouton ci-dessous :</p>
            <form action="{{route('admin.create')}}">
                @csrf
            <button class="btn btn-dark">Nouvel administrateur</button>
            </form>
        </div>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <form action="">
                Afficher
                <select class="form-select d-inline-block w-auto" name="paginate" onchange="this.form.submit()">
                    <option value="5" {{request('paginate')==5 ? 'selected' :''}}>5</option>
                    <option value="10" {{request('paginate')==10 ? 'selected' :''}}>10</option>
                    <option value="15" {{request('paginate')==15 ? 'selected' :''}}>15</option>
                    <option value="20" {{request('paginate')==20 ? 'selected' :''}}>20</option>
                </select>
                entrées
                </form>
               
            </div>
            <div>
                Rechercher <input  class="form-control d-inline-block w-auto" type="text" name="search" id="search" onkeyup="searchinput()" >
            </div>
        </div>
        <div id="search-result">
        @include('partials.administrations_table' ,['admins'=>$admins])
        </div>
       

    </div>
    
</div>
<script>
    function confirmAction(message, form) {
        if (confirm(message)) {
            form.submit();
        }
    }

    function searchinput(){
        var searchin =$('#search').val()
        var paginate ='{{request('paginate',5)}}'
        $.ajax({
            url:"{{route('administrations')}}",
            method:"get",
            data : {
                search=searchin,
                pagination:paginate,
            },
            success:function(response){
                $('#search-result').html(response)
            }
        })
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
   
</x-app-layout>
