<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function downloadPdf($id)
    {
        $note = Note::findOrFail($id);

        $pdf = Pdf::loadView('notes.pdf', compact('note'));

        return $pdf->download("note-{$note->id}.pdf");
    }
    public function index()
    {
        $notes = auth()->user()->notes()->latest()->get();
        return view('notes.index', compact('notes'));
    }

    public function create()
    {
        // dd('Inside create method');
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        auth()->user()->notes()->create([
            'title' => $request->title,
            'content' => $request->content,
            'date' => now()->toDateString(),
        ]);

        return redirect()->route('notes.index')->with('success', 'Note created successfully.');
    }

    public function show($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.show', compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Show the edit form for a note
    public function edit(Note $note)
    {
        // Make sure the authenticated user owns this note
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }
        return view('notes.edit', compact('note'));
    }

    // Update the note in the database
    public function update(Request $request, Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $note->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('notes.index')->with('success', 'Note updated successfully.');
    }

    // Delete a note
    public function destroy(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403);
        }

        $note->delete();

        return redirect()->route('notes.index')->with('success', 'Note deleted successfully.');
    }
}
