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
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        $medicals = Medical::all();
        return view('admin.medical',compact('medicals','username','imageuser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        return view('admin.createMedical', compact('username','imageuser'));
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
        }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        $medicals = Medical::paginate(6);
        return view('user.medicals',compact('medicals','username','imageuser'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medical $medical)
    {
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        return view('admin.editMedical', compact('medical','username','imageuser'));
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

            $medical->name = $request->name;
            $medical->location = $request->location;
            $medical->phone_number = $request->phone_number;
            $medical->address = $request->address;

            // dd($medical);

            $medical->save();

            return redirect()->route('medical.index')->with('success', 'Le dossier médical a été mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Medical $medical)
    {
           // Supprimer l'élément médical
           $medical->delete();
           // Redirection vers une page de succès ou de confirmation
           return redirect()->route('medical.index')->with('success', 'Le médical a été supprimé avec succès.');
    }
}
