<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Slider;
use Image;

class HomeController extends Controller
{
    //

    public function HomeSlider(){

        $sliders = Slider::latest()->get();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider(){
        return view('admin.slider.create');
    }

    public function StoreSlider(Request $request){
        

        $slider_image = $request->file('image');
        
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($slider_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;

        // $up_location = 'images/slider/';
        // $last_img = $up_location.$img_name;
        // $slider_image->move($up_location, $img_name);

        $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        Image::make($slider_image)->resize(1920,1088)->save('images/slider/'.$name_gen);
        $last_img = 'images/slider/'.$name_gen;



        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $last_img,
            'created_at' => Carbon::now(),

        ]);

        

        return Redirect()->route('home.slider')->with('success', 'Slider Add Successfully!');
    }

    public function EditSlider($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function UpdateSlider(Request $request, $id){
        
        if($slider_image = $request->file('slider_image')){
            $slider = Slider::find($id);

            $slider['title'] = $request->slider_title;
            $slider['created_at'] = Carbon::now();


            $old_image = $request->old_image;
            unlink($old_image);
            $slider_image = $request->file('slider_image');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            
            $up_location = 'images/slider/';
            $last_img = $up_location.$img_name;
            $slider_image->move($up_location, $img_name);
            
            
            $slider['image'] = $last_img;
            
            $slider->save();
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'warning'
            );
            

            return Redirect()->back()->with($notification);
        } else {
            $slider = Slider::find($id);
            $slider['title'] = $request->slider_title;
            $slider['description'] = $request->slider_desc;
            $slider['created_at'] = Carbon::now();
            $slider->save();
            $notification = array(
                'message' => 'Slider Updated Successfully',
                'alert-type' => 'info'
            );
            return Redirect()->back()->with($notification);
    }

        return view('admin.slider.edit', compact('slider'));
    }
    
    public function DeleteSlider($id){
        $image = Slider::find($id);

        $old_image = $image->image;
        unlink($old_image);

        $slider = Slider::find($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
        
    }
}
