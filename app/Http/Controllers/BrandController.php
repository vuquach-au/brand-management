<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Image;
use Auth;

class BrandController extends Controller
{
    //

    public function __construct(){
        $this->middleware('auth');
    }
    public function AllBrand(){

        $brands = Brand::latest()->paginate(5);

        return view('admin.brand.index', compact('brands'));
    }

    public function StoreBrand(Request $request){

        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            'brand_image' => 'required|mimes:jpg,png,jpeg',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer than 4 Characters',
        ]);

        $brand_image = $request->file('brand_image');

        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen.'.'.$img_ext;

        // $up_location = 'images/brand/';
        // $last_img = $up_location.$img_name;
        // $brand_image->move($up_location, $img_name);

        $name_gen = hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
        Image::make($brand_image)->resize(300,200)->save('images/brand/'.$name_gen);
        $last_img = 'images/brand/'.$name_gen;



        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),

        ]);

        // $brand = array();
        // $brand['brand_name'] = $request->brand_name;
        // if($file = $request->file('brand_image')){
        //     $name = $file->getClientOriginalName();
        //     $file->move('images', $name);
        //     $brand['brand_image'] = $name;
        // }
        // DB::table('brands')->insert($brand);
        $notification = array(
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function Edit($id){
        $brand = Brand::find($id);

        return view('admin.brand.edit', compact('brand'));
        
    }

    public function Update(Request $request, $id){
        
        $validated = $request->validate([
            'brand_name' => 'required|unique:brands|min:4',
            // 'brand_image' => 'required|mimes:jpg,png,jpeg',
        ],
        [
            'brand_name.required' => 'Please Input Brand Name',
            'brand_image.min' => 'Brand Longer than 4 Characters',
        ]);
            
        
            if($brand_image = $request->file('brand_image')){

                $brand = Brand::find($id);
                $brand['brand_name'] = $request->brand_name;
                $brand['created_at'] = Carbon::now();


                $old_image = $request->old_image;
                unlink($old_image);
                $brand_image = $request->file('brand_image');
                $name_gen = hexdec(uniqid());
                $img_ext = strtolower($brand_image->getClientOriginalExtension());
                $img_name = $name_gen.'.'.$img_ext;
                
                $up_location = 'images/brand/';
                $last_img = $up_location.$img_name;
                $brand_image->move($up_location, $img_name);
                
                
                $brand['brand_image'] = $last_img;
                
                $brand->save();
                $notification = array(
                    'message' => 'Brand Updated Successfully',
                    'alert-type' => 'warning'
                );
                

                return Redirect()->back()->with($notification);
            } else {
                $brand = Brand::find($id);
                $brand['brand_name'] = $request->brand_name;
                $brand['created_at'] = Carbon::now();
                $brand->save();
                $notification = array(
                    'message' => 'Brand Updated Successfully',
                    'alert-type' => 'info'
                );
                return Redirect()->back()->with($notification);
        }
        

    }

    public function Delete($id){
        $image = Brand::find($id);

        $old_image = $image->brand_image;
        unlink($old_image);

        $brand = Brand::find($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'error'
        );

        return Redirect()->back()->with($notification);
        
    }

    public function Multipic(){
        $images = Multipic::all();;

        return view('admin.multipic.index', compact('images'));
    }

    public function StoreImg(Request $request){
        $image = $request->file('image');
        
        foreach($image as $multi_img){

            // $name_gen = hexdec(uniqid());
            // $img_ext = strtolower($multi_img->getClientOriginalExtension());
            // $img_name = $name_gen.'.'.$img_ext;

            // $up_location = 'images/multi/';
            // $last_img = $up_location.$img_name;
            // $multi_img->move($up_location, $img_name);

            $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
            Image::make($multi_img)->resize(300,300)->save('images/multi/'.$name_gen);
            $last_img = 'images/multi/'.$name_gen;
    
    
    
            Multipic::insert([
                'image' => $last_img,
                'created_at' => Carbon::now(),
    
            ]);
        }
        $notification = array(
            'message' => 'Images Uploaded Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->back()->with($notification);
    }

    public function Logout(){
        Auth::logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }
}
