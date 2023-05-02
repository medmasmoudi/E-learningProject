<?php

namespace App\Http\Controllers;

use App\Models\Files;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFiles;
use App\Models\Chapters;
use File;

class FilesController extends Controller
{
    public function create(Chapters $chapters)
    {  

        return inertia(
            'Files/Create',[
                'chapters' => $chapters
            ]
        );
    }
    public function store(Request $request, Chapters $chapters)
    {
        dd($request);

    if ($request->hasFile('files')) {

        foreach($request->file('files') as $file){
            $path = $file->store('files', 'public');
            $chapters->files()->save(new Files([
                'filename' => $path
            ]));
        }

    }
        return redirect()->back();
    }
}
