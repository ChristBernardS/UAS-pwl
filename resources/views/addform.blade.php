@extends('layouts.main')
@section('title', 'Home')
@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/saveform" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="question">Question</label>
                    <input type="text" name="question" class="form-control" id="question" required>
                </div>
                <div class="form-group">
                    <label for="answer">Answer</label>
                    <textarea type="text" name="answer" class="form-control" id="answer" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" id="image" accept="image/" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection