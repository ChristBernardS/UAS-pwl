@extends('layouts.main')
@section('title', 'users')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/users/addform" class="btn btn-primary"><i class="bi bi-plus-square"></i></a>
        </div>
        <div class="card-body">
            <!-- Pop Up -->
            @if (session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <table id="example" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $idx => $u)
                        <tr>
                            <td>{{ $idx + 1  }}</td>
                            <td>{{ $u->name }}</td>
                            <td>{{ $u->email }}</td>
                            <td>
                                @if ($u->photo)
                                    <img src="{{ asset('/storage/photo/' . $u->photo)}}" alt="$u->photo" width="80" height="80">
                                @else
                                    <img src="{{ asset('/storage/photo/no-image.jpg')}}" alt="No Image" width="80" height="80">
                                @endif
                            </td>
                            <td>
                                <a href="/users/deleteform/{{ $u->id }}" class="btn btn-danger"><i
                                        class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection