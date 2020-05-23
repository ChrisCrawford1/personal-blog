<button type="button" class="mr-2 bg-orange-600 text-white p-1 rounded leading-none flex items-center mb-2">
    <a href="{{ route('posts.index', $slug) }}" title="Filter Posts by {{ $name }}">{{ $name }}</a>
</button>
