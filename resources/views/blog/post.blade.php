@extends('layouts.app')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <main role="main" class="flex justify-center pl-8 pr-8">
        <div class="w-full md:w-3/5">
            <article class="flex flex-col shadow my-4">
                <div class="hover:opacity-75">
                    <img src="{{ $post->featured_image }}" class="object-cover h-auto w-full" alt="{{ $post->featured_image_caption ?? '' }}" title="{{ $post->featured_image_caption ?? '' }}">
                </div>
                <div class="bg-white flex flex-col justify-start p-6">
                    <a href="#" class="text-orange-700 text-sm font-bold uppercase pb-4">{{ $post->topic->first()->name }}</a>
                    <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }} <small class="text-sm">({{ $post->read_time }})</small></a>
                    <p class="text-sm pb-4">
                        By <a href="#" class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on {{ \Carbon\Carbon::parse($post->published_at)->toFormattedDateString() }}
                    </p>
                    <div class="flex flex-row invisible md:visible mb-2">
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
        </div>
    </main>

@endsection
