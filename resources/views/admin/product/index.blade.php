@extends('layouts.apps')

@section('Headcontent')
<div class="col-sm-6">
    <h1>Index Product</h1>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
</div>
@endsection

@section('isicontent')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

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
                                <a href="" class="btn btn-warning">Edit</a>
                                <a href="" class="btn btn-danger">Hapus</a>
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