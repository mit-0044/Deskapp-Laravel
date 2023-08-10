<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Project;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::where('deleted_at', null)->get();
        $projects = Project::all();
        return view('documents.index', compact(['documents', 'projects']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('documents.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentRequest $request)
    {
        $id = Document::insertGetId([
            'project_id' => $request->project_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);
        $ext = $request->file('document')->getClientOriginalExtension();
        $filename = $request->file('document')->storeAs('public/project_documents', $id . '.' . $ext, 'local');
        Document::where('id', $id)->update([
            'document' => $id . '.' . $ext,
        ]);
        $documents = Document::where('deleted_at', null)->get();
        $projects = Project::all();
        return redirect(route('document.index', ['documets' => $documents, 'projects' => $projects]))->with('add', 'Document added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        $documents = Document::where('id', '=', $document->id)->get();
        $projects = Project::where('id', '=', $documents[0]->project_id)->get();
        return view('documents.show', compact(['documents', 'projects']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $documents = Document::where('id', '=', $document->id)->get();
        $projects = Project::where('id', '=', $documents[0]->project_id)->get();
        return view('documents.edit', compact(['documents', 'projects']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, Document $document)
    {
        if ($oldImage = $request->document) {
            Storage::delete('public/project_documents/' . $document->document);
            $ext = $request->file('document')->getClientOriginalExtension();
            $request->file('document')->storeAs('public/project_documents', $document->id . '.' . $ext, 'local');
            Document::where('id', '=', $document->id)->update([
                'project_id' => $request->project_id,
                'document' => $document->id . '.' . $ext,
                'name' => $request->name,
                'description' => $request->description,
            ]);
            $documents = Document::where('deleted_at', null)->get();
            $projects = Project::all();
            return redirect(route('document.index', ['documets' => $documents, 'projects' => $projects]))->with('update', 'Document updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {
        Project::where('id', $document->id)->update([
            'deleted_at' => now()->toDateTimeString(),
        ]);
        $documents = Document::where('deleted_at', null)->get();
        $projects = Project::all();
        return redirect(route('document.index', ['documets' => $documents, 'projects' => $projects]))->with('update', 'Document updated successfully.');
    }
}
