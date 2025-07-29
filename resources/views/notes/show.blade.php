<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">View Note</h2>
    </x-slot>

    <div class="py-6 flex justify-center">
        <div class="w-full max-w-2xl px-4">
            <div class="bg-gray-800 text-white p-6 rounded shadow">
                <h3 class="text-2xl font-bold mb-2">{{ $note->title }}</h3>
                <p class="mb-4">{{ $note->content }}</p>
                <p class="text-sm text-gray-400">
                    Last Updated: {{ $note->updated_at->timezone('Asia/Kolkata')->format('Y-m-d H:i:s') }}
                </p>
                <div class="mt-4">
                    <a href="{{ route('notes.index') }}" class="text-blue-400 hover:underline">← Back to all notes</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
