<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);

        // $home = Home::all();
        // if (isset($req['search'])) {
        //     $home = $home->where('id', $req['search'])->get();
        // }

        // return view('home', compact('homes'));
        return view('home', [
            // 'home' => Home::all(),
            // 'home' => $user->home()->with('user'), 

            'home' => $user->home()->with('user')->with('kategoris')->filter(request(['search']))->get(),
            // 'home' => $user->home()->with('user')->with('kategoris')->get(),
            'kategori' => Kategori::all()
        ]);
    }

    public function store(Request $req)
    {

        $input = $req->all();
        $home = Home::create([
            'name' => $input['name'],
            'user_id' => Auth::user()->id,
            'kategoris_id' => $input['kategori_id']
        ]);
        // $home['user_id'] = Auth::user()->id;

        if ($req->has('image')) {
            $home->addMultipleMediaFromRequest(['image'])
                ->each(function ($fileAdder) {
                    $fileAdder->toMediaCollection('image');
                });

            return redirect()->back();
        }
    }

    public function destroy($id)
    {

        $media = Home::findOrFail($id);
        $media->delete();

        return redirect()->back();
    }
}
