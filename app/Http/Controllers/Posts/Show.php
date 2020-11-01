<?php

namespace App\Http\Controllers\Posts;

use Canvas\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Canvas\Events\PostViewed;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class Show extends Controller
{
    /**
     * @param Request $request
     * @param Post    $post
     *
     * @return View
     */
    public function __invoke(Request $request, Post $post): View
    {
        if (!Auth::check() && Cookie::get('laravel_cookie_consent')) {
            event(new PostViewed($post));
        }

        return view('blog.post', compact('post'));
    }
}
