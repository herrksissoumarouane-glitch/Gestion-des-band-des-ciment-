<table class="table table-bordered table-striped" id="client-list">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>CLIENTS</th>
            <th>CIMENT AJOUTER</th>
            <th>AJOUTER PAR</th>
            <th>CREER A</th>
            <th>MODIFIER PAR </th>
            <th>DATE</th>
        </tr>
    </thead>
<tbody id="client-list">
        @foreach($clients as $client)
        <tr>
        <td>
        <div class="d-flex gap-2">
            <form  action="{{route('client.upd',$client->ref)}}" method="POST">
                @csrf
                <button class="btn  btn-info ">
                        <i class="fas fa-edit me-2"></i> 
                    </button> 
            </form>
            <form action="{{route('client.show',$client->ref)}}" method="POST">
                @csrf
                 <button class="btn  btn-success ">
                        <i class="fas fa-eye me-2"></i> 
                    </button>
            </form>
            <form action="{{ route('client.add', ['ref' => $client->ref]) }}" method="get">
                    <button class="btn  btn-primary ">
                        <i class="fas fa-plus me-2"></i> 
                    </button>
            </form>
            <form action="{{route('client.delete',$client->ref)}}" method="POST">
                @csrf
                <button class="btn  btn-danger ">
                        <i class="fas fa-trash-alt me-2"></i> 
                    </button>
            </form>
                      
                    
                   
                    
                    
                    
        </div>
 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

            </td>
            <td>{{ $client->nom }}</td>
            
            <td>
                        @if($client->cimentTypes->isNotEmpty())
                            <ul>
                            {{ $client->ciment_types_count }}
                            </ul>
                        @else
                            <span class="text-muted">Aucun type de ciment associé</span>
                        @endif
                    </td>
           
            
            
            <td>{{ $client->created_by }}</td>
            <td>{{ $client->created_at }}</td>
            <td>{{ $client->updated_by   }}</td>
            
            <td>{{ $client->updated_at }}</td>
            
        </tr>
        @endforeach
    </tbody>
    </table>