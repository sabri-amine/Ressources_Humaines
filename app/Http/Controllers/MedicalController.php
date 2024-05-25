<?php

namespace App\Http\Controllers;

use App\Models\Medical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            $medicals = Medical::all();
            return view('admin.medical', compact('medicals', 'username', 'imageuser'));
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
            return view('admin.createMedical', compact('username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);
        try {

            // Création d'une nouvelle instance de Medical avec les données validées
            $medical = new Medical();
            $medical->name = $validatedData['name'];
            $medical->location = $validatedData['location'];
            $medical->phone_number = $validatedData['phone_number'];
            $medical->address = $validatedData['address'];

            // Enregistrement de l'instance dans la base de données
            $medical->save();

            // Redirection vers une page de succès ou de confirmation
            return redirect()->route('medical.index')->with('success', 'Le nouveau médical a été ajouté avec succès.');
        } catch (\Throwable $th) {
            return $th;
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            $medicals = Medical::paginate(6);
            return view('user.medicals', compact('medicals', 'username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medical $medical)
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('admin.editMedical', compact('medical', 'username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medical $medical)
    {
        // Valider les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string|max:255',
        ]);

        try {
            $medical->name = $request->name;
            $medical->location = $request->location;
            $medical->phone_number = $request->phone_number;
            $medical->address = $request->address;

            // dd($medical);

            $medical->save();

            return redirect()->route('medical.index')->with('success', 'Le dossier médical a été mis à jour avec succès.');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Medical $medical)
    {
        try {
            // Supprimer l'élément médical
            $medical->delete();
            // Redirection vers une page de succès ou de confirmation
            return redirect()->route('medical.index')->with('success', 'Le médical a été supprimé avec succès.');
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
