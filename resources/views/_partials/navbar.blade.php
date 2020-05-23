<nav class="w-full py-6 bg-gray-600 shadow">
    <div class="w-full container mx-auto flex flex-wrap items-center justify-between">
        <nav>
            <ul class="flex items-center justify-between text-sm text-white uppercase no-underline">
                <li>
                    <a class="hover:text-gray-200 hover:underline px-4 {{ url()->current() === route('posts.index') ? 'underline' : '' }}" href="{{ route('posts.index') }}" title="Go to the homepage">
                        Home
                    </a>
                </li>
                <li>
                    <a class="hover:text-gray-200 hover:underline px-4 {{ url()->current() === route('pages.about') ? 'underline' : '' }}" href="{{ route('pages.about') }}" title="Go to the about page">
                        About
                    </a>
                </li>
                @if(Auth::check())
                <li>
                    <a class="hover:text-gray-200 hover:underline px-4 {{ url()->current() === route('pages.projects') ? 'underline' : '' }}" href="{{ route('pages.projects') }}" title="Go to the projects page">
                        Projects
                    </a>
                </li>
                @endif
            </ul>
        </nav>

        <div class="flex items-center text-lg no-underline text-white pr-6">
            <a class="pl-6" href="https://github.com/ChrisCrawford1" title="Redirect to my GitHub Profile">
                <i class="fab fa-github transform duration-300 ease-in-out hover:-translate-y-1 hover:text-purple-700"></i>
            </a>
            <a class="pl-6" href="https://twitter.com/ScopherTk" title="Redirect to my Twitter Profile">
                <i class="fab fa-twitter transform duration-300 ease-in-out hover:-translate-y-1 hover:text-blue-500"></i>
            </a>
            <a class="pl-6" href="https://www.linkedin.com/in/christopher-crawford-539044180/" title="Redirect to my LinkedIn Profile">
                <i class="fab fa-linkedin transform duration-300 ease-in-out hover:-translate-y-1 hover:text-blue-700"></i>
            </a>
        </div>
    </div>
</nav>
