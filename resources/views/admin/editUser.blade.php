<x-app-layout>
    <div class="max-w-4xl mx-auto p-6">
        <form action="{{ route('admin.updateUser', $user) }}" method="POST">
            @csrf
            @method('patch')
            <input type="text" name="name" value="{{ old('name', $user->name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />

            <input type="text" name="username" value="{{ old('username', $user->username) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
            <x-input-error :messages="$errors->get('username')" class="mt-2" />

            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-2">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <label for="role_id">Select Role:</label>
            <select name="role_id" id="role_id"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                @foreach ($roles as $role)
                    @if ($role->id == $user->role_id)
                        <option value="{{ $role->id }}" selected>{{ $role->role }}</option>
                    @else
                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                    @endif
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('role_id')" class="mt-2" />

            <x-primary-button class="mt-4">{{ __('Update User') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
