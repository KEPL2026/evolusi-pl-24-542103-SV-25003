@extends('layouts.app')

@section('title', 'Catatan Baru - Jurnalku')

@section('content')
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <label for="title">Judul</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" placeholder="Judul catatanmu hari ini">

        <label for="mood">Mood (opsional)</label>
        <input type="text" id="mood" name="mood" value="{{ old('mood') }}" placeholder="mis. senang, lelah, bersyukur">

        <label for="body">Isi Catatan</label>
        <textarea id="body" name="body" placeholder="Tulis apa saja yang kamu rasakan atau alami...">{{ old('body') }}</textarea>

        <div class="form-actions">
            <button type="submit" class="btn">Simpan</button>
            <a href="{{ route('posts.index') }}" class="btn secondary">Batal</a>
        </div>
    </form>
@endsection
