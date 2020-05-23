<?php

namespace App\Http\Controllers\Posts;

use Canvas\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Canvas\Events\PostViewed;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class Show extends Controller
{
    /**
     * @param Request $request
     * @param Post $post
     *
     * @return View
     */
    public function __invoke(Request $request, Post $post): View
    {
        if (!Auth::check()) {
            event(new PostViewed($post));
        }

        return view('blog.post', compact('post'));
    }
}
