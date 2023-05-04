<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChaptersController extends Controller
{
    public function downloadFiles(int $id)
    {   
         $file = Files::find($id);

        $filename = $file->filename;

        $fileNameToInstall = 'Notes.pdf';
         return Storage::download("$filename","$fileNameToInstall");  
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'formation_id' =>'required|int'
        ]);
        Chapters::create($data);
        return redirect()->route('formation.id', ['id' => $data['formation_id']]);

    }
    public function destroy(int $id){

        Chapters::find($id)->delete();
        sleep(1);
        return redirect()->back();
    }
    public function show(int $id){
        $chapter = Chapters::find($id);
        $files = $chapter->files()->get();
        return inertia(
            'Chapter/Show', [
                'chapter' => $chapter,
                'files' => $files,
            ]
        );
    }
    
}
