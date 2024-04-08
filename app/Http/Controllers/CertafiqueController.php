<?php

namespace App\Http\Controllers;

use App\Models\Certafique;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CertafiqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        $users = Certafique::all();
        return view('admin.certafique',compact('users','username','imageuser'));
    }

    public function getform(){
        // $user = Auth::user();
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        return view('user.d_Certifique',compact('username','imageuser'));
    }


    // public function AfficheProfleUser(){
    //     $username = Auth::user()->name;
    //     $imageuser = Auth::user()->image;

    //     $user =Auth::user();
    //     return view('user.AfficheProfileUser',compact('user','imageuser','username'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $certfique=Certafique::create([
            'date_reservation'=>$request->date,
            'demande'=>$request->choix,
        ]);
        return redirect()->route('Home');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Certafique $certafique)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        
        $certafique=Certafique::find($request->id);

        if($certafique->validation=='valid'){
            $certafique->validation='invalid';
            $certafique->save();
            return redirect()->back();
        }
        $certafique->validation=$request->valid;
        $certafique->save();
        return redirect()->back();

        // dd($certafique);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Certafique $certafique)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certafique $certafique)
    {
        //
    }
}
