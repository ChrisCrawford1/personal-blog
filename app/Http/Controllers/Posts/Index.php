<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use Canvas\Models\Post;
use Canvas\Models\Tag;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class Index extends Controller
{
    /**
     * @param Request $request
     *
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $filterTag = $request->route()->parameter('tag');
        $posts = null;

        if ($filterTag) {
            $posts = $filterTag->posts()->published()->orderBy('created_at', 'desc')->paginate(5);
        }

        if (!$filterTag) {
            $posts = Post::orderBy('created_at', 'desc')->published()->paginate(5);
        }

        return view('blog.index')->with(
            [
                'posts' => $posts,
                'tags'  => Tag::all(),
            ]
        );
    }
}
