<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use App\Models\Chapters;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            'Formation/Index',
            [
                'formations' => Formation::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            'Formation/Create',
        );
    }



        public function store(Request $request)
{
    $data = $request->validate([
        'Title' => 'required|string|max:255',
        'Description' => 'required|string',
        'Tags' => 'required|string|max:255',
        'Image' => 'nullable|image|max:2048',
        'Certificat	' => 'nullable|image|max:2048',

    ]);
    if ($request->hasFile('Certificat')) {
        $path = Storage::putFile('certificats', $request->file('Certificat'));

        $data['Certificat'] = $path;}
    if ($request->hasFile('Image')) {
        $image = Storage::putFile('certificats', $request->file('Image'));
        $data['Image'] = $image;
    }

    Formation::create($data);
    
    return redirect()->route('formation.index');

    }

    public function download($id)
    {   
        $formation = Formation::find($id);
        $certificat = $formation->Certificat;
        $filename = 'Certificat.jpg';
         return Storage::download("$certificat" ,"$filename");
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {   
        $chapters = $formation->chapters()->get();

 

        return inertia(
            'Formation/Show',
            [
                'formation' => $formation,
                'chapters' => $chapters,
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        return inertia(
            'Formation/Edit',[
                'formation' => $formation
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
{
    $data = $request->all();
    
    if ($request->hasFile('Image')) {
        $image = $request->file('Image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $data['Image'] = $imageName;
    }

    $formation->update($data);

    return redirect()->route('formation.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('formation.index');
    }
}
