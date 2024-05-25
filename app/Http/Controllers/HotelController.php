<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;


class HotelController extends Controller
{
    public function index()
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            $hotels = Hotel::all();
            return view('admin.Hotel', compact('hotels', 'username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function create()
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('admin.createHotel', compact('username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function delete($id)
    {
        try {
            Hotel::findOrFail($id)->delete();
            return redirect()->route('hotel.index')->with('success', 'Card deleted successfully');
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function show(Request $request)
    {
        try {
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;

            $query = Hotel::query();

            // Filtrer par prix si une option de filtre est sélectionnée
            if ($request->filled('price_filter')) {
                $priceRange = explode('-', $request->input('price_filter'));
                $query->whereBetween('price', [$priceRange[0], $priceRange[1]]);
            }

            // Filtrer par emplacement (location) si une option de filtre est sélectionnée
            if ($request->filled('location_filter')) {
                $location = $request->input('location_filter');
                $query->where('location', $location);
            }

            $hotels = $query->get();

            return view('user.Hotels', compact('hotels', 'username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }



    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'houses' => 'required|integer',
            'people' => 'required|integer',
            'bathrooms' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        if ($request->hasFile('image')) {
            try {
                $imagePath = $request->file('image')->store('public/images');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Une erreur est survenue lors du téléchargement de l\'image.');
            }
        }

        try {
            Hotel::create([
                'location' => $request->location,
                'name' => $request->name,
                'price' => $request->price,
                'houses' => $request->houses,
                'people' => $request->people,
                'bathrooms' => $request->bathrooms,
                'image' => basename($imagePath),
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la création de l\'hôtel.');
        }

        return redirect()->route('hotel.index')->with('success', 'Hôtel créé avec succès.');
    }



    public function edit($id)
    {
        try {
            $hotel = Hotel::findOrFail($id);
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('admin.editHotel', compact('hotel', 'username', 'imageuser'));
        } catch (\Throwable $th) {
            return $th;
        }
    }




    public function update(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        // Valider les données soumises via le formulaire
        $validatedData = $request->validate([
            'location' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'houses' => 'required|integer',
            'people' => 'required|integer',
            'bathrooms' => 'required|integer',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            // Mettre à jour les propriétés de l'hôtel avec les nouvelles valeurs
            $hotel->location = $validatedData['location'];
            $hotel->name = $validatedData['name'];
            $hotel->price = $validatedData['price'];
            $hotel->houses = $validatedData['houses'];
            $hotel->people = $validatedData['people'];
            $hotel->bathrooms = $validatedData['bathrooms'];



            // dd($hotel)

            // Gérer la mise à jour de l'image si elle est fournie
            if ($request->hasFile('image')) {
                // Supprimer l'ancienne image si elle existe
                if ($hotel->image) {
                    Storage::delete('public/images/' . $hotel->image);
                }
                // Enregistrer la nouvelle image
                $imagePath = $request->file('image')->store('public/images');
                $hotel->image = basename($imagePath);
            }

            // Enregistrer les modifications dans la base de données
            $hotel->save();

            // Rediriger l'utilisateur vers une autre page avec un message de succès
            return redirect()->route('hotel.index')->with('success', 'Hôtel modifié avec succès.');
        } catch (\Throwable $th) {
            return $th;
        }
        // dd($hotel);
    }
}
