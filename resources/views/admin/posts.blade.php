<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">
        <div class="relative overflow-x-auto shadow-md rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Short
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Creator
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tags
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Created
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $post->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->short }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->user->username }}
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($post->tags as $tag)
                                   <p class="border-b-2"> {{ $tag->tag }} </p>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->created_at }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('admin.editPost', $post)}}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
