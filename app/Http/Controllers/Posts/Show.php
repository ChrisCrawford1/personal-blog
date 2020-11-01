<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Canvas\Events\PostViewed;
use Canvas\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\View\View;

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
