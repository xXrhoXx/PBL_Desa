@extends('layouts.navbar_admn')

@section('content')
<div class="container mt-4">
    <h2>Edit Postingan Facebook</h2>

    <form action="{{ route('fb.update', ['postId' => $fbPost['id']]) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <textarea name="caption" id="caption" rows="4" class="form-control">{{ $fbPost['message'] ?? '' }}</textarea>
        </div>

        @if(isset($fbPost['full_picture']))
            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini:</label><br>
                <img src="{{ $fbPost['full_picture'] }}" alt="FB Gambar" width="200">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('artikel.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
