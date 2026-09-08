<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the journal entries.
     */
    public function index(): View
    {
        $posts = Post::orderByDesc('published_at')
            ->orderByDesc('created_at')
            ->paginate(6);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new journal entry.
     */
    public function create(): View
    {
        return view('posts.create');
    }

    /**
     * Store a newly created journal entry in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatePost($request);
        $validated['published_at'] = now();

        Post::create($validated);

        return redirect()
            ->route('posts.index')
            ->with('status', 'Catatan baru berhasil disimpan.');
    }

    /**
     * Display the specified journal entry.
     */
    public function show(Post $post): View
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified journal entry.
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified journal entry in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        $validated = $this->validatePost($request, $post->id);

        $post->update($validated);

        return redirect()
            ->route('posts.show', $post)
            ->with('status', 'Catatan berhasil diperbarui.');
    }

    /**
     * Remove the specified journal entry from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('status', 'Catatan berhasil dihapus.');
    }

    /**
     * Shared validation rules for storing/updating a journal entry.
     *
     * @return array<string, mixed>
     */
    protected function validatePost(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'mood' => ['nullable', 'string', 'max:50'],
            'body' => ['required', 'string', 'min:5'],
        ]);
    }
}
