<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ImageCrud;
use Session;
use File;

class ImageCrudController extends Controller
{
    public function all_products(){
        $products = ImageCrud::all();
        return view('products',compact('products'));
    }
     public function add_new_products(){
        return view('add_new_products');
    }
     public function store_products(Request $request)
     {
        $request->validate([
            'name'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);
         $imageName='';
         if($image = $request->file('image')){
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products',$imageName);
         }
        ImageCrud::Create([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);

        Session::flash('msg','Added product Successfully');
        return redirect()->back();
   }

   public function edit_products($id){

        $product = ImageCrud::findOrFail($id);

        return view('edit_product',compact('product'));

   }
    public function update_products(Request $request,$id)
     {
        $product=ImageCrud::findOrFail($id);
        $request->validate([
            'name'=>'required',

        ]);
         $imageName='';
         $deleteOldImage = 'images/products/'.$product->image;
         if($image = $request->file('image')){
            if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $imageName = time().'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/products',$imageName);
         }
         else{
            $imageName = $product->image;
         }
        ImageCrud::where('id',$id)->update([
            'name'=>$request->name,
            'image'=>$imageName,
        ]);

        Session::flash('msg','updated product Successfully');
        return redirect()->back();
   }
   public function delete_products($id){
        $product=ImageCrud::findOrFail($id);
        $deleteOldImage = 'images/products/'.$product->image;
         if(file_exists($deleteOldImage)){
                File::delete($deleteOldImage);
            }
            $product->delete();
            Session::flash('msg','Delete product Successfully');
            return redirect()->back();
   }
}
