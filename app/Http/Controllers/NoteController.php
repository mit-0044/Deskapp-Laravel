<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use App\Models\Project;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Note::all();
        $projects = Project::all();
        return view('notes.index', compact(['notes', 'projects']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('notes.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NoteRequest $request)
    {
        Note::create([
            'project_id' => $request->project_id,
            'note_text' => $request->note_text,
        ]);
        $notes = Note::all();
        $projects = Project::all();
        return redirect(route('note.index', ['projects' => $projects, 'notes' => $notes]))->with('add', 'Note added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        $notes = Note::where('id', $note->id)->get();
        $projects = Project::where('id', $notes[0]->project_id)->get();
        return view('notes.show', compact(['notes', 'projects']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        $notes = Note::where('id', $note->id)->get();
        $projects = Project::get();
        return view('notes.edit', compact(['notes', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NoteRequest $request, Note $note)
    {
        Note::where('id', $note->id)->update([
            'project_id' => $request->project_id,
            'note_text' => $request->note_text,
        ]);
        $notes = Note::all();
        $projects = Project::all();
        return redirect(route('note.index', ['projects' => $projects, 'notes' => $notes]))->with('update', 'Note updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}
