@extends('layouts.apps')

@section('Headcontent')
<div class="col-sm-6">
    @if (!empty($data->id))
        <h1>Edit Users</h1>
    @else
        <h1>Tambah Users</h1>
    @endif
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">User</a></li>
        @if (!empty($data->id))
            <li class="breadcrumb-item active">Edit User</li>
        @else
            <li class="breadcrumb-item active">Tambah User</li>
        @endif
    </ol>
</div>
@endsection

@section('isicontent')
<div class="card shadow mb-4">

<div class="card-body">
    @if (!empty($data->id))
        <form action="{{ route('usersupdate') }}" method="POST">
    @else
        <form action="{{ route('userstore') }}" method="POST">
    @endif

        @csrf

        @if (!empty($data->id))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Masukan Nama Anda" value="{{ $data->name }}">
            @error('name')
               <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Masukan email anda" value="{{ $data->email }}">
            @error('email')
               <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan password anda" value="{{ $data->password }}">
            @error('password')
               <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection