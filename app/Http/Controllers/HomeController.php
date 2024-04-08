<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        return view('user.home')->with(compact('username','imageuser'));
    }

    public function adminHome()
    {
        $username = Auth::user()->name;
        $imageuser=Auth::user()->image;
        
        $users = User::paginate(10); 
        return view('admin.Userlist')->with(compact('username', 'users','imageuser'));
    }

        public function show(Request $request)
    {
        $username = Auth::user()->name;
        $imageuser = Auth::user()->image;

        $id = (int)$request->id;
        $user=User::findOrFail($id);
        return view('admin.profile',compact('user','imageuser','username'));

    }
        public function showadmin(){
            $user = Auth::user();
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('admin.showadmin',compact('user','username','imageuser'));
        }


        public function delete($id)
        {
            $user = User::findOrFail($id);
            $user->delete();
    
            return redirect()->route('admin/home');
        }

        
        public function profileUser()
        {
            $user = Auth::user();
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('user.ProfileUser',compact('user','username','imageuser'));
        }




        public function editUserProfile()
        {
            $user = Auth::user();
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('user.editProfileUser',compact('user','username','imageuser'));
        }

        public function edit()
        {
            $user = Auth::user();
            $username = Auth::user()->name;
            $imageuser = Auth::user()->image;
            return view('admin.editProfileAdmin',compact('user','username','imageuser'));
        }


        public function update(Request $request)
{
    $user = Auth::user();

    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id,
        // 'password' => 'required|confirmed',
        'national_id' => 'required|unique:users,national_id,' . $user->id,
        'service' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,pdf|max:7168', 
    ]);

    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->national_id = $validatedData['national_id'];
    $user->service = $validatedData['service'];
    
    // Gérer l'image si elle est téléchargée
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '.' . $extension;
        $path = 'uploads';
        $file->move($path, $filename);
        $user->image = $filename; // Update the image path with only the filename
    }
    
    // dd($user);
    

    $user->save();

    if (auth()->user()->type == 'admin') {
        return redirect()->route('profile.edit',$user->id)->with('success', 'Profil mis à jour avec succès.');
    } else {
        return redirect()->route('profile.editUserProfile',$user->id)->with('success', 'Profil mis à jour avec succès.');
    }

    // return redirect()->route('profile.edit', $user->id)->with('success', 'Profil mis à jour avec succès.');
}

            
}
