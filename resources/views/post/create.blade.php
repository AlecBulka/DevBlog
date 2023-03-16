<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <form action="{{ route('post.store') }}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="{{ __('Title') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <input type="text" name="short" placeholder="{{ __('Short') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2 mb-2">
            <x-input-error :messages="$errors->get('short')" class="mt-2" />

            <label for="tags">Select Tags:</label>
            <select name="tags[]" id="tags" multiple
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->tag}}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('tags[]')" class="mt-2" />

            <textarea name="content" placeholder="{{ __('Content') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2"></textarea>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Create Post') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
