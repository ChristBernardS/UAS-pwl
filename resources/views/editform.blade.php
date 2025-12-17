@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/update/{{ $kb->id }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" id="question" value="{{ $kb->question }}">
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea type="text" name="answer" class="form-control" id="answer"
                        required>{{ $kb->answer }}</textarea>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" accept="image/" class="form-control">
                </div>
                <div>
                    <div class="form-group">
                        @if ($kb->image)
                            <img src="{{ asset('/storage/image/' . $kb->image)}}" alt="$m->image" width="80" height="80">
                        @else
                            <img src="{{ asset('/storage/image/no-image.jpg')}}" alt="No Image" width="80" height="80">
                        @endif
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection