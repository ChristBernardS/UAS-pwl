@extends('layouts.main')
@section('title', 'User')
@section('content')
    <div class="card">
        <div class="card-header"></div>
        <div class="card-body">
            <form action="/updatepass" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="password">Password Lama</label>
                    <input type="text" name="password_lama" class="form-control" id="password_lama" required>
                </div>
                <div class="form-group">
                    <label for="password_baru">Password Baru</label>
                    <input type="text" name="password_baru" class="form-control" id="password_baru" required>
                </div>
                <div class="form-group">
                    <label for="password_konfirmasi">Konfirmasi Password Baru</label>
                    <input type="text" name="password_konfirmasi" class="form-control" id="password_konfirmasi" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection