@extends('layouts.app')

@section('title', $post->title . ' - Jurnalku')

@section('content')
    <article class="entry-card">
        <h2>{{ $post->title }}</h2>
        <div class="meta">
            {{ optional($post->published_at)->translatedFormat('d F Y, H:i') }}
            @if ($post->mood)
                <span class="mood-badge">{{ $post->mood }}</span>
            @endif
        </div>
        <p style="white-space: pre-line;">{{ $post->body }}</p>
    </article>

    <div class="form-actions">
        <a href="{{ route('posts.edit', $post) }}" class="btn secondary">Edit</a>
        <form method="POST" action="{{ route('posts.destroy', $post) }}" onsubmit="return confirm('Hapus catatan ini?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn danger">Hapus</button>
        </form>
        <a href="{{ route('posts.index') }}" class="btn secondary">Kembali</a>
    </div>
@endsection
