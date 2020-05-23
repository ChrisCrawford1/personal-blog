@extends('layouts.app')

@section('title')
    About
@endsection
@section('content')
    <div class="container mx-auto flex flex-wrap py-6">
        <section class="w-full flex flex-col items-center px-3 pt-16">
            <img src="{{ url('/images/Me_Avatar.jpeg')  }}"
                 alt="Profile Image"
                 class="rounded-full w-40 h-32 lg:w-48 lg:h-40"
            >
            <p class="font-bold text-gray-800 uppercase hover:text-gray-700 pt-4">Hey!</p>
            <p class="pt-3 text-lg text-gray-600 w-1/2 text-center">
                I'm Chris, a back end Software Developer from Scotland.
            </p>
{{--            <p class="pt-3 text-lg text-gray-600 w-1/4 lg:w-1/2 text-center">--}}
{{--                I'm Chris, a back end Software Developer from Scotland.--}}
{{--            </p>--}}

            <p class="pt-3 text-lg text-gray-600 w-1/2 text-center">
                I'm super passionate about programming and web development in general, I enjoy working across multiple
                technologies although I mainly focus on Laravel & VueJS.
            </p>

            <p class="pt-3 text-lg text-gray-600 w-1/2 text-center">
                I created this blog mainly for myself to record technical solutions or for a reminder on things I may
                forget, hopefully it can help others along the way as well!.
            </p>

            <p class="pt-3 text-lg text-gray-600 w-1/2 text-center">
                My posts will mainly be based around languages and technologies I use everyday.
            </p>
            <p class="mt-3">
                <i class="fab fa-php tech-icon text-purple-600"></i>
                <i class="fab fa-js-square tech-icon text-yellow-500"></i>
                <i class="fab fa-laravel tech-icon text-red-400"></i>
                <i class="fab fa-vuejs tech-icon text-green-500"></i>
                <i class="fab fa-docker tech-icon text-blue-700"></i>
            </p>
        </section>
    </div>
@endsection
