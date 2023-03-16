<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <form action="{{ route('post.update', $post) }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" name="title" value="{{ old('Title', $post->title) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
            <x-input-error :messages="$errors->get('title')" class="mt-2" />

            <input type="text" name="short" value="{{ old('Short', $post->short) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2 mb-2">
            <x-input-error :messages="$errors->get('short')" class="mt-2" />

            <label for="tags">Select Tags:</label>
            <select name="tags[]" id="tags" multiple
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($tags as $tag)
                    @foreach ($post->tags as $current)
                        @if ($current->id == $tag->id)
                            <option value="{{ $tag->id }}" selected>{{ $tag->tag }}</option>
                        @break
                    @endif
                @endforeach
                <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('tags[]')" class="mt-2" />

        <textarea name="content"
            class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">{{ old('Content', $post->content) }}</textarea>
        <x-input-error :messages="$errors->get('content')" class="mt-2" />

        <x-primary-button class="mt-4">{{ __('Update Post') }}</x-primary-button>
    </form>
</div>
</x-app-layout>
