<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">My Diary Notes</h2>
    </x-slot>

    <div class="py-6 flex justify-center">
        <!-- Center container with max width -->
        <div class="w-full max-w-3xl px-4">
            <div class="flex justify-end mb-6">
                <a href="{{ route('notes.create') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">+ New Note</a>
            </div>

            @if (session('success'))
                <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div>
                @foreach ($notes as $note)
                    <div class="border rounded p-4 mb-4 shadow bg-gray-800 text-white">
                        <h3 class="text-lg font-bold mb-1">{{ $note->title }}</h3>
                        <p class="text-gray-300 mb-1">{{ $note->content }}</p>
                        <p class="text-sm text-gray-400 mb-2">
                            Last Updated: {{ $note->updated_at->timezone('Asia/Kolkata')->format('Y-m-d H:i:s') }}
                        </p>

                        <div>
                            <a href="{{ route('notes.show', $note->id) }}"
                                class="text-green-400 hover:underline mr-4">Show</a>
                            <a href="{{ route('notes.edit', $note->id) }}"
                                class="text-blue-400 hover:underline mr-4">Edit</a>

                            <form method="POST" action="{{ route('notes.destroy', $note->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this note?');"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline mr-4">Delete</button>
                            </form>

                            <a href="{{ route('notes.download', $note->id) }}"
                                class="text-yellow-400 hover:underline">Download as PDF</a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
    </div>
</x-app-layout>
