@extends('layouts.app')

@section('title')
    Christopher Crawford - Home
@endsection
@section('content')
    @include('_partials.header')
    @if(count($tags) > 0)
        @include('_partials.tags-display')
    @endif

    <div class="container mx-auto flex flex-wrap py-6">
    @if(count($posts) > 0)
        <section class="w-full flex flex-col items-center px-3">
            @foreach($posts as $post)
                @component('components.post', ['tags' => $post->tags])
                    @slot('topic')
                        {{ $post->topic->first()->name ?? '' }}
                    @endslot

                    @slot('title')
                        {{ $post->title }}
                    @endslot

                    @slot('author')
                        {{ $post->user->name }}
                    @endslot

                    @slot('published_date')
                        {{ \Carbon\Carbon::parse($post->published_at)->toFormattedDateString() }}
                    @endslot

                    @slot('summary')
                        {{ $post->summary }}
                    @endslot

                    @slot('slug')
                        {{ $post->slug }}
                    @endslot
                @endcomponent
            @endforeach
        </section>
    @else
        <div class="bg-red-100 border-l-4 border-orange-500 text-orange-700 p-4 mx-auto" role="alert">
            <p class="font-bold mb-1">No Posts</p>
            <p>No posts could be found, please check back later!</p>
        </div>
    @endif
    </div>
        {{ $posts->links() }}
@endsection
