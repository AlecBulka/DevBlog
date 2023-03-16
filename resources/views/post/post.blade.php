<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
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
                    <a class="block font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        href="{{ route('home') }}">Return</a>
                </div>
                <p class="mt-4 text-lg text-gray-900">
                    {{ $post->content }}
                </p>
                <div class="flex items-center justify-between  mt-4">
                    <div class="flex items-center">
                        @if ($rated->count() == 0)
                            <form action="{{ route('rate.rate', $post) }}" method="POST">
                                @csrf
                                @for ($i = 1; $i < 6; $i++)
                                    <button name="rating" value="{{ $i }}">
                                        <x-rating-button />
                                    </button>
                                @endfor
                            </form>
                        @else
                            @for ($i = 1; $i < 6; $i++)
                                @if ($i <= $rated[0]->rating)
                                    <x-rating-button class="fill-yellow-300" />
                                @else
                                    <x-rating-button />
                                @endif
                            @endfor
                        @endif
                        <p class="text-xl font-semibold text-gray-600 ml-1">{{ $avg }}</p>
                    </div>
                    <div class="flex items-center">
                        @if ($liked->count() == 0)
                            <form action="{{ route('like.like', $post) }}" method="POST" class="flex items-center">
                                @csrf
                                <x-like-button />
                            </form>
                        @else
                            <form action="{{ route('like.removeLike', $post) }}" method="POST"
                                class="flex items-center">
                                @csrf
                                @method('delete')
                                <x-like-button class="fill-red-500" />
                            </form>
                        @endif
                        <p class="text-xl font-semibold text-gray-600 ml-1">{{ $post->likes->count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <p class="mt-4 text-lg font-bold text-gray-900">Comments</p>
        <form action="{{ route('comment.comment', $post) }}" method="POST">
            @csrf
            <textarea name="comment" placeholder="{{ __('Comment') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2"></textarea>
            <x-input-error :messages="$errors->get('comment')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Comment') }}</x-primary-button>
        </form>
        @foreach ($comments as $comment)
            <div class="p-6 flex space-x-2 shadow-md mt-6 bg-white rounded-lg divide-y">
                <div class="flex-1">
                    <p class="mt-4 text-sm text-gray-500">
                        {{ $comment->created_at->format('j M Y, g:i a') }}
                    </p>
                    <p class="mt-4 text-lg text-gray-900">
                        {{ $comment->comment }}
                    </p>
                    <p class="mt-4 font-semibold text-gray-700">
                        By {{ $comment->user->username }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
