<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Tv;

class TvController extends Controller
{
    // available
    public function index(){
        $tvs = Tv::all();
        return view('tvs', ['tvs' => $tvs]);
    }

    // available
    public function home(){
        $tvs = Tv::all();
        return view('home', ['tvs' => $tvs]);
    }

    // watch
    public function watch($id){
        $tvs = Tv::all();
        $tv = Tv::where('id', $id)->first();
        return view('watch', ['tv' => $tv, 'tvs' => $tvs]);
    }

    // tv dashboard
    public function tvs(){
        $tvs = Tv::all();
        return view('admin/tv', ['tvs' => $tvs]);
    }

    // tv dashboard
    public function dashboard(){
        $tvs = Tv::all();
        return view('admin/dashboard', ['tvs' => $tvs]);
    }

    // store
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $tv = new Tv();

        $path = $request->file('image')->store('images');

        $tv->image = url('/').'/public/'.$path;
        $tv->title = $request->title;
        $tv->link = $request->link;
        $tv->description = $request->description;

        $tv->save();

        return back();
    }

    // edit tv
    public function edit($id){
        $tv = Tv::where('id', $id)->first();
        return view('admin/tvedit', ['tv' => $tv]);
    }


    // update
    public function update(Request $request){
        $request->validate([
            'id' => 'required|string',
            'title' => 'required|string',
            'link' => 'required|url',
            'description' => 'nullable|string',
        ]);

        $tv = Tv::where('id', $request->id)->first();

        $tv->title = $request->title;
        $tv->link = $request->link;
        $tv->description = $request->description;
        $tv->update();

        return redirect('admin/');
    }

    // update tv image
    public function updateimage(Request $request){
        $request->validate([
            'id' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);


        $tv = Tv::where('id', $request->id)->first();
        // delete previous image
        if (Storage::exists($tv->image)) {
            Storage::delete($tv->image);
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('images');
            $tv->image = url('/').'/public/'.$path;
        }else {
            $tv->image = 'no image';
        }
        $tv->update();

        return redirect('admin/');
    }

    // delete tv
    public function delete($id){
        $tv = Tv::where('id', $id)->first();

        // delete previous image
        if (Storage::exists($tv->image)) {
            Storage::delete($tv->image);
        }

        $tv->delete();

        return back();
    }
}
