<article class="flex flex-col shadow my-4 w-2/3">
    <div class="bg-white flex flex-col justify-start p-6">
        <p class="text-orange-700 text-sm font-bold uppercase pb-4">{{ $topic }}</p>
        <p class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $title }}</p>
        <p class="text-sm pb-3">
            By <a href="{{ route('pages.about') }}" class="font-semibold hover:text-gray-800" title="Go to the about page">{{ $author }}</a>, Published on {{ $published_date }}
        </p>
        <p class="pb-5">{{ $summary }}</p>
        <div class="flex flex-row invisible md:visible">
        @foreach($tags as $tag)
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
        <a href="{{ route('posts.show', $slug) }}" class="uppercase text-gray-800 hover:text-black" title="Continue to read the full article">
            Continue Reading
            <i class="fas fa-arrow-right text-orange-600"></i>
        </a>
    </div>
</article>
