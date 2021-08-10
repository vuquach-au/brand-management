<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeAbout;
use App\Models\Multipic;

use Illuminate\Support\Carbon;

class AboutController extends Controller
{
    //

    public function HomeAbout(){
        $homeabouts = HomeAbout::latest()->get();
        return view('admin.home.index', compact('homeabouts'));
    }

    public function AddAbout(){
        return view('admin.home.create');
    }

    public function StoreAbout(Request $request){

        HomeAbout::insert([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc,
            'created_at' => Carbon::now(),

        ]);

       

        return Redirect()->route('home.about')->with('success', 'About Add Successfully!');
    }

    public function EditAbout($id){
        $homeabout = HomeAbout::find($id);
        return view('admin.home.edit', compact('homeabout'));
    }

    public function UpdateAbout(Request $request, $id){
        $homeabout = HomeAbout::find($id)->update([
            'title' => $request->title,
            'short_desc' => $request->short_desc,
            'long_desc' => $request->long_desc
        ]);

       

        return Redirect()->route('home.about')->with('success', 'About Update Successfully!');
    }

    public function DeleteAbout($id){
        HomeAbout::find($id)->Delete();
        return Redirect()->route('home.about')->with('success', 'About Delete Successfully!');
    }

    public function Porfolio(){

        $images = Multipic::all();

        return view('pages.porfolio',  compact('images'));
    }

    
}
