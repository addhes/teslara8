@extends('layouts.apps')

@section('Headcontent')
<div class="col-sm-6">
    <h1>Index Users</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">User</li>
    </ol>
</div>
@endsection

@section('isicontent')
<div class="card">
    <div class="card-header">
        <a href="{{ route('usercre') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $key => $data)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <form action="{{ route('usersdel', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    {{-- <a class="btn btn-danger" href="{{ route('dev-destroy', $data->id) }}">Hapus</a> --}}
                                    <a class="btn btn-warning" href="{{ route('usersdit', $data->id)}}">Edit</a>
                                    <button class="btn btn-danger d-inline" type="submit">Hapus</button>
                                </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@push('js')
<script>
    @if(Session::has('success'))
    toastr.success("{{ session('success') }}")
    @endif

</script>
@endpush
