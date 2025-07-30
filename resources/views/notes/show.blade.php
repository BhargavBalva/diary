<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 text-center">View Note</h2>
    </x-slot>

    <div class="py-6 flex justify-center">
        <div class="w-full max-w-2xl px-4">
            <div class="bg-gray-800 text-white p-6 rounded shadow">
                <h3 class="text-2xl font-bold mb-2">{{ $note->title }}</h3>
                <p class="mb-4">{{ $note->content }}</p>

                {{-- New Fields --}}
                @if ($note->entry_date)
                    <p class="text-sm text-gray-300 mb-1"><strong>Date:</strong>
                        {{ \Carbon\Carbon::parse($note->entry_date)->format('d M Y') }}</p>
                @endif

                @if ($note->mood)
                    <p class="text-sm text-gray-300 mb-1"><strong>Mood:</strong> {{ $note->mood }}</p>
                @endif

                @if ($note->location)
                    <p class="text-sm text-gray-300 mb-1"><strong>Location:</strong> {{ $note->location }}</p>
                @endif

                <p class="text-sm text-gray-400 mt-2">
                    Last Updated: {{ $note->updated_at->timezone('Asia/Kolkata')->format('Y-m-d H:i:s') }}
                </p>

                <div class="mt-4">
                    <a href="{{ route('notes.index') }}" class="text-blue-400 hover:underline">← Back to all notes</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
