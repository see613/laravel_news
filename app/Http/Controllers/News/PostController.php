<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * The main news page
     */
    public function index(Request $request): Response
    {
        $posts = Post::where('is_published', 1)
            ->latest()
            ->paginate(8)
            ->withQueryString();

        return Inertia::render('news/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * The single news post with comments
     */
    public function view(Request $request, String $slug): Response
    {
        $post = Post::where('slug', $slug)
            ->with(['comments' => function (Builder $query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->firstOrFail();

        return Inertia::render('news/View', [
            'post' => $post
        ]);
    }


}
