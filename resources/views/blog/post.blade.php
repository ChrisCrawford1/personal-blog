@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <main>
    <div class="container mx-auto flex flex-wrap py-6">
        <section class="w-full flex flex-col items-center px-3">
            <article class="flex flex-col shadow my-4">
                <div class="hover:opacity-75">
                    <img src="{{ $post->featured_image }}" class="object-cover h-64 w-full" alt="Article Main Image">
                </div>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->topic->first()->name }}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
                    <p class="text-sm pb-4">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ \Carbon\Carbon::parse($post->published_at)->toFormattedDateString() }}
                    </p>
                    <div class="flex flex-row invisible md:visible">
                        @foreach($post->tags as $tag)
                            @component('components.post-tags')
                                @slot('slug')
                                    {{ $tag->slug }}
                                @endslot
                                @slot('name')
                                    {{ $tag->name }}
                                @endslot
                            @endcomponent
                        @endforeach
                    </div>
                    <div class="text-post-content-gray text-base leading-loose  ">{!! $post->body !!}</div>
                </div>
            </article>
        </section>
    </div>
    </main>
@endsection
