<?php

namespace App\Http\Controllers;

use File;
use App\Models\Files;
use App\Models\Chapters;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFiles;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function store(Request $request)
    
    {   if ($request->file('file')->getClientOriginalExtension() === 'mp4') {

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/files'), $filename);
            $data['filename'] = 'files/'.$filename;
            $data['chapters_id'] = $request->chapters_id;
            Files::create($data);
            return redirect()->back();

    }}
    else{

        $data['filename'] = Storage::putFile('files', $request->file('file'));
        $data['chapters_id'] = $request->chapters_id;
        Files::create($data);
        return redirect()->back();
    }
    }
}
