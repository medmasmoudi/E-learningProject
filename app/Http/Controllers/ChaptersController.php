<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Formation;
use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    public function index(Formation $formation)
    {
        $chapters = $formation->chapters()->get();

        return inertia(
            'Formation/Show',
            [
                'chapters' => $chapters,
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
  public function create(){
        return inertia(
            'Chapters/Create'
        );
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
    
}
