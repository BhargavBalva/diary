<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white text-center">New Diary Note</h2>
    </x-slot>

    <div class="py-10 flex justify-center">
        <div class="w-full max-w-2xl bg-gray-900 p-8 rounded-lg shadow-lg">
            <form method="POST" action="{{ route('notes.store') }}">
                @csrf

                <!-- Date -->
                <div class="mb-6">
                    <label for="entry_date" class="block text-white font-medium mb-2">Date</label>
                    <input type="date" name="entry_date" id="entry_date"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring focus:ring-blue-500"
                        value="{{ old('entry_date', $note->entry_date ?? '') }}" required>
                </div>

                <!-- Title -->
                <div class="mb-6">
                    <label for="title" class="block text-white font-medium mb-2">Title</label>
                    <input type="text" name="title" id="title"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring focus:ring-blue-500"
                        value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mood -->
                <div class="mb-6">
                    <label for="mood" class="block text-white font-medium mb-2">Mood</label>
                    <select name="mood" id="mood"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring focus:ring-blue-500"
                        required>
                        <option value="">Select mood</option>
                        @foreach (['Happy', 'Sad', 'Excited', 'Angry', 'Neutral'] as $moodOption)
                            <option value="{{ $moodOption }}"
                                {{ old('mood', $note->mood ?? '') == $moodOption ? 'selected' : '' }}>
                                {{ $moodOption }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Content -->
                <div class="mb-6">
                    <label for="content" class="block text-white font-medium mb-2">Content</label>
                    <textarea name="content" id="content" rows="5"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring focus:ring-blue-500"
                        required>{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Location -->
                <div class="mb-6">
                    <label for="location" class="block text-white font-medium mb-2">Location</label>
                    <input type="text" name="location" id="location"
                        class="w-full bg-gray-800 text-white border border-gray-700 rounded p-2 focus:outline-none focus:ring focus:ring-blue-500"
                        value="{{ old('location', $note->location ?? '') }}" required>
                </div>

                <!-- Submit -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded transition">
                        Save Note
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
