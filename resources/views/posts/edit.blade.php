@extends('layouts.app')

@section('title', 'Edit Catatan - Jurnalku')

@section('content')
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf
        @method('PUT')

        <label for="title">Judul</label>
        <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}">

        <label for="mood">Mood (opsional)</label>
        <input type="text" id="mood" name="mood" value="{{ old('mood', $post->mood) }}">

        <label for="body">Isi Catatan</label>
        <textarea id="body" name="body">{{ old('body', $post->body) }}</textarea>

        <div class="form-actions">
            <button type="submit" class="btn">Perbarui</button>
            <a href="{{ route('posts.show', $post) }}" class="btn secondary">Batal</a>
        </div>
    </form>
@endsection
