<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Channel;

class RadioController extends Controller
{
    // available
    public function home(){
        $channels = Channel::all();
        return view('home', ['channels' => $channels]);
    }

    // available
    public function index(){
        $channels = Channel::all();
        return view('radios', ['channels' => $channels]);
    }

    // play
    public function play($id){
        $channels = Channel::all();
        $channel = Channel::where('id', $id)->first();
        return view('play', ['channel' => $channel, 'channels' => $channels]);
    }

    // dashboard
    public function dashboard(){
        $channels = Channel::all();
        return view('admin/dashboard', ['channels' => $channels]);
    }

    // store
    public function store(Request $request){
        $request->validate([
            'title' => 'required|string',
            'link' => 'required|url',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ]);

        $channel = new Channel();
        $path = $request->file('image')->store('images');

        $channel->image = url('/').'/public/'.$path;
        $channel->title = $request->title;
        $channel->link = $request->link;
        $channel->description = $request->description;

        $channel->save();

        return redirect('/admin');
    }

    // edit channel
    public function edit($id){
        $channel = Channel::where('id', $id)->first();
        return view('admin/radioedit', ['channel' => $channel]);
    }


    // update
    public function update(Request $request){
        $request->validate([
            'id' => 'required|string',
            'title' => 'required|string',
            'link' => 'required|url',
            'description' => 'nullable|string',
        ]);

        $channel = Channel::where('id', $request->id)->first();

        $channel->title = $request->title;
        $channel->link = $request->link;
        $channel->description = $request->description;
        $channel->update();

        return redirect('admin/');
    }

    // update channel image
    public function updateimage(Request $request){
        $request->validate([
            'id' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
        ]);


        $channel = Channel::where('id', $request->id)->first();
        // delete previous image
        if (Storage::exists($channel->image)) {
            Storage::delete($channel->image);
        }

        if ($request->file('image')) {
            $path = $request->file('image')->store('images');
            $channel->image = url('/').'/public/'.$path;
        }else {
            $channel->image = 'no image';
        }
        $channel->update();

        return redirect('admin/');
    }


    // delete channel
    public function delete($id){
        $channel = Channel::where('id', $id)->first();

        // delete previous image
        if (Storage::exists($channel->image)) {
            Storage::delete($channel->image);
        }

        $channel->delete();

        return back();
    }
}
