@extends('layouts.app')

@section('title', 'Semua Catatan - Jurnalku')

@section('content')
    @forelse ($posts as $post)
        <article class="entry-card">
            <h2><a href="{{ route('posts.show', $post) }}" style="color:inherit; text-decoration:none;">{{ $post->title }}</a></h2>
            <div class="meta">
                {{ optional($post->published_at)->translatedFormat('d F Y, H:i') }}
                @if ($post->mood)
                    <span class="mood-badge">{{ $post->mood }}</span>
                @endif
            </div>
            <p>{{ Str::limit(strip_tags($post->body), 160) }}</p>
            <a href="{{ route('posts.show', $post) }}" class="btn secondary">Baca selengkapnya</a>
        </article>
    @empty
        <div class="empty-state">
            <p>Belum ada catatan. Yuk mulai menulis jurnal pertamamu.</p>
            <a href="{{ route('posts.create') }}" class="btn">Tulis Catatan</a>
        </div>
    @endforelse

    <div class="pagination">
        {{ $posts->links() }}
    </div>
@endsection
