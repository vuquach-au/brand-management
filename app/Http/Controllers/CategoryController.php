<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    //
    public function AllCat(){
        // $categories = DB::table('categories')
        //                     ->join('users', 'categories.user_id', 'users.id')
        //                     ->select('categories.*', 'users.email', 'users.name')
        //                     ->latest()->paginate(5);
        
        $categories = Category::latest()->paginate(5);
        $trashCat = Category::onlyTrashed()->latest()->paginate(3);
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index', compact('categories', 'trashCat'));
    }

    public function AddCat(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            'category_name.required' => 'Please Input Category Name',
            'category_name.max' => 'Category  Less Than 255 Characters',
        ]);

        // $category = Category::insert([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id,
        //     'created_at' => Carbon::now()
        // ]);

        // $category = new Category;
        // $category->category_name = $request->category_name;
        // $category->user_id = Auth::user()->id;
        // $category->save();

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);    

        return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }

    /**
     * Edit Category
     * Initial Edit
     */
    public function Edit($id){
        // $category = Category::find($id);
        $category = DB::table('categories')->whereId($id)->first();

        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update Category
     * Update Data
     */
    public function Update(Request $request, $id){
        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id; 
        DB::table('categories')->whereId($id)->update($data);

        return Redirect()->route('all.category')->with('success', 'Category Updated Successfully');
    }


    /***
     * 
     * DELETE Category
     */
    public function SoftDeletes($id){
         $category = Category::find($id)->delete();
        //DB::table('categories')->whereId($id)->delete();
        return Redirect()->back()->with('success', 'Category SoftDeletes Successfully');
    }

    /***
     * 
     * RESTORE Category
     */
    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
       //DB::table('categories')->whereId($id)->delete();
       return Redirect()->back()->with('success', 'Category Restore Successfully');
   }


   public function PDelete($id){
       $pdelete = Category::onlyTrashed()->find($id)->forceDelete();

       return Redirect()->back()->with('success', 'Category Permanent Delete Successfully');
   }
}
