<?php

namespace App\Http\Controllers;

use App\Models\Evenment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EvenmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            $images = Evenment::all();
            return view('admin.ListDayToDay', compact('images', 'username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('admin.createToDay', compact('username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif', // Validation de l'image
        ]);

        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('public/images');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Une erreur est survenue lors du téléchargement de l\'image.');
            }
        }

        try {
            Evenment::create([
                'date' => $request->date, // Ajout du champ date
                'image' => basename($imagePath),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'événement.');
        }

        return redirect()->route('daytoday.index')->with('success', 'Événement créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Evenment $evenment)
    {
        $username = Auth::user()->name;
        $imageuser = Auth::user()->image;
        $images = Evenment::all(); // Utilisez Evenment::all() pour récupérer toutes les images
        return view('user.ToDay', compact('images', 'username', 'imageuser'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evenment $evenment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evenment $evenment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Evenment $evenment)
    {
        $evenment->delete();
        return redirect()->route('daytoday.index')->with('success', 'Image supprimée avec succès.');
    }
}
