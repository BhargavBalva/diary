<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">New Diary Note</h2>
    </x-slot>

    <div class="py-6 flex justify-center">
        <div class="w-full max-w-xl bg-gray-800 p-6 rounded shadow">
            <form method="POST" action="{{ route('notes.store') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-sm font-medium text-white">Title</label>
                    <input type="text" name="title" class="w-full border rounded p-2 bg-gray-700 text-white" required>
                    @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-white">Content</label>
                    <textarea name="content" rows="4" class="w-full border rounded p-2 bg-gray-700 text-white" required></textarea>
                    @error('content')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded transition">
                        Save Note
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
