<?php

namespace App\Http\Controllers;

use App\Models\Chapters;
use App\Models\Formation;
use Illuminate\Http\Request;

class ChapterController extends Controller
{    
    public function index(Formation $formation)
    {
        return inertia(
            'Formation/Show',
            [
                'chapters' => Chapters::all()
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $formation_id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data['formation_id'] = $formation_id;

        Chapters::create($data);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chapters $chapter)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $chapter->update($data);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapters $chapter)
    {
        $chapter->delete();
        return redirect()->back();
    }
}
