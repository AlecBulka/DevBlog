<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="antialiased">
    <div class="mx-auto p-2 flex justify-between items-center">
        <h1 class="p-6 font-semibold text-gray-600">DevBlog</h1>
        @if (Route::has('login'))
            <div class="p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
    <div class="max-w-7xl mx-auto p-6">
        @foreach ($posts as $post)
            <div class="p-6 flex space-x-2 shadow-md mt-6 bg-white rounded-lg divide-y">
                <div class="flex flex-col flex-wrap">
                    @foreach ($post->tags as $tag)
                    <span
                        class="h-5 mb-1 bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-full dark:bg-gray-700 dark:text-gray-300">{{ $tag->tag }}</span>
                @endforeach
                </div>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-700">
                                {{ $post->title }}
                            </span>
                            <span class="ml-2 text-sm text-gray-500">
                                {{ $post->created_at->format('j M Y, g:i a') }}
                            </span>
                            @unless($post->created_at->eq($post->updated_at))
                                <small
                                    class="text-sm text-gray-600">&middot;{{ __('edited ' . $post->updated_at->diffForHumans()) }}</small>
                            @endunless
                        </div>
                        @auth
                            <a class="block font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                href="{{ route('post.show', $post) }}">View Post</a>
                        @else
                            <a class="block font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                href="{{ route('login') }}">Login To View</a>
                        @endauth
                    </div>
                    <p class="mt-4 text-lg text-gray-900">
                        {{ $post->short }}
                    </p>
                    <p class="mt-4 font-semibold text-gray-700">
                        By {{ $post->user->username }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
