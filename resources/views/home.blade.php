@extends('layouts.main')
@section('title', '.:Home:.')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="/addform" class="btn btn-primary"><i class="bi bi-plus-square"></i></a>
        </div>
        <div class="card-body">
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
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($brain as $idx => $b)
                        <tr>
                            <td>{{ $idx+1 }}</td>
                            <td>{{ $b->question }}</td>
                            <td>{{ $b->answer }}</td>
                            <td>
                                @if ($b->image)
                                    <img src="{{ asset('/storage/image/' . $b->image)}}" alt="$b->image" width="80" height="80">
                                @else
                                    <img src="{{ asset('/storage/image/no-image.jpg')}}" alt="No Image" width="80" height="80">
                                @endif
                            </td>
                            <td>
                                <a href="/editform/{{ $b->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="/deleteform/{{ $b->id }}" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection