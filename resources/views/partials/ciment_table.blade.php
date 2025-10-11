<table class="table">
    <tr>
        <td>#</td>
        <td>CATEGORIES</td>
        <td>AJOUETER PAR</td>
        <td>CREER A</td>
        <td>MODIFIER PAR</td>
        <td>DATE </td>
    </tr>
    @foreach ($ciments as $ciment)
        <tr>
            <td>
                <div class="d-flex gap-2">
                    <form action="{{ route('ciment.update', $ciment->ref) }}" method="POST">
                        @csrf
                        <button class="btn btn-info">
                            <i class="fas fa-edit me-2"></i>
                        </button>
                    </form>

                    <form action="{{ route('ciment.delete', $ciment->ref) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">
                            <i class="fas fa-trash-alt me-2"></i>
                        </button>
                    </form>
                </div>
            </td>
            <td>{{ $ciment->nom }}</td>
            <td>{{ $ciment->created_by }}</td>
            <td>{{ $ciment->created_at }}</td>
            <td>{{ $ciment->updated_by }}</td>
            <td>{{ $ciment->updated_at }}</td>
        </tr>
    @endforeach
</table> 


