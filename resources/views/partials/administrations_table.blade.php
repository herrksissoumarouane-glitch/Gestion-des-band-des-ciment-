<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Nom d'utilisateur</th>
            <th>Nom/Prenom</th>
            <th>E-mail</th>
            <th>Role</th>
            <th>Ajouté Par</th>
            <th>Créé À</th>
            <th>Modifié Par</th>
            <th>Dernière Modification</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admins as $admin)
        <tr>
            <td>
            <div class="d-flex gap-2">
    <form action="" method="POST">
        @csrf
        <button class="btn btn-secondary">
        <i class="fas fa-lock me-2"></i>  
    </button>
    </form>
    
    <form action="{{ route('admin.reload',$admin->id) }}" method="POST">
        @csrf
        <button class="btn btn-warning">
        <i class="fas fa-sync-alt me-2"></i>  
    </button>
    </form>
    

   
    
</div>

            </td>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->prenom }}</td>
            <td>{{ $admin->email }}</td>
            <td>
    @if ($admin->role == '1')
        Admin
    @elseif ($admin->role == '2')
        Controller
    @elseif ($admin->role == '3')
        Chauffeur
    @else
        Unknown
    @endif
</td>

            <td>{{ $admin->created_by }}</td>
            <td>{{ $admin->created_at }}</td>
            <td>{{ $admin->updated_by }}</td>
            <td>{{ $admin->updated_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    <ul class="pagination">
        <!-- Previous Page Link -->
        @if ($admins->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link">Previous</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $admins->previousPageUrl() }}">Previous</a>
            </li>
        @endif

        <!-- Next Page Link -->
        @if ($admins->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $admins->nextPageUrl() }}">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link">Next</span>
            </li>
        @endif
    </ul>
</div>