<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Form</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4 shadow-lg">
        <h2 class="text-center mb-4">Add New Admin</h2>
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
 
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Admin Name') }}</label>
                <input id="name" class="form-control" type="text" name="name" required autofocus />
                @error('name')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
 
            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Admin Email') }}</label>
                <input id="email" class="form-control" type="email" name="email" required />
                @error('email')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
 
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" name="password" required />
                @error('password')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
 
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                @error('password_confirmation')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
 
            <div class="mb-3">
                <label for="role" class="form-label">{{ __('Role') }}</label>
                <select id="role" name="role" class="form-control">
                @if(auth()->check()&& auth()->user()->role ==='1'   )
                    <option value="1">Admin</option>
                    <option value="2">Controller</option>
                @endif
                    
                    <option value="3">Chef</option>
                </select>
            </div>
 
            <div class="text-center">
                <button type="submit" class="btn btn-primary">{{ __('Add Admin') }}</button>
            </div>
        </form>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
