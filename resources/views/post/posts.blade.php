<x-app-layout>
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
                        @if ($post->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name='trigger'>
                                    <button>
                                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name='content'>
                                    <x-dropdown-link href="{{ route('post.edit', $post) }}">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('post.destroy', $post) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link href="{{ route('post.destroy', $post) }}"
                                            onclick="event.preventDefault();this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
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
</x-app-layout>
