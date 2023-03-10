<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'home' => Home::all(),
        ]);
    }

    public function store(Request $req)
    {
        $input = $req->all();
        $home = Home::create($input);

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
