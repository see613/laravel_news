<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\News\CommentStoreRequest;
use App\Http\Requests\Settings\ProfileUpdateRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class CommentController extends Controller
{
    /**
     * Creating a new comment
     */
    public function store(Request $request): RedirectResponse
    {
        (new Comment)
            ->fill($request->all())
            ->save();

        return back()->with('status', __('Комментарий успешно сохранен'));
    }





}
