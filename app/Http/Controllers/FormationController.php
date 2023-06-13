<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        'duration' => 'required|string|max:255',
        'nbrOfSpots' => 'required|Integer',
    ]);
    if ($request->hasFile('Certificat')) {
        $path = Storage::putFile('certificats', $request->file('Certificat'));
        $data['Certificat'] = $path;}
    if ($request->hasFile('Image')) {
        $image = $request->file('Image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $data['Image'] = $imageName;
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
    {   $user = Auth::user();
        if ($user->role == 'user'){
            $formation->views ++;
            $formation->save();
        }
        $chapters = $formation->chapters()->get();
        $users = $formation->users()->get()->reject(function ($item) use ($user) {
            return $item->id == $user->id;
        });
        $joined = $formation->users->contains(Auth::user());
        return inertia(
            'Formation/Show',
            [
                'formation' => $formation,
                'chapters' => $chapters,
                'joined' => $joined,
                'users' => $users,
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
