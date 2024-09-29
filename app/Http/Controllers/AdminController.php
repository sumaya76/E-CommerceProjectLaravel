<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

use function Laravel\Prompts\search;
use App\Models\Subscriber;
use App\Models\Contact;

class AdminController extends Controller
{
    // view_category //
   Public function view_category()
   {
      $data = Category::all();
    return view('admin.category',compact('data'));
   }
   //edit_category //
   Public function edit_category($id)
   {
      $data = Category::find($id);

      return view('admin.edit_category',compact('data'));
   }
    //update_category //
    Public function update_category(Request $request, $id)
    {
       $data = Category::find($id);
       $data->category_name=$request->category;
    
       $data->save();
       return redirect('/view_category');
    }
     //delete_category //
   Public function delete_category($id)
   {
      $data = Category::find($id);
      $data-> delete();
    return redirect()->back();
   }
     //add_category //
   Public function add_category(Request $request)
   {
   $category = new Category;
   $category->category_name = $request->category;
   $category->save();
   return redirect()->back();
   }
    //add_category //
    Public function add_product()
    {    $category = Category::all();
      return view('admin.add_product',compact('category'));
    }
    //upload_product //
    Public function upload_product(Request $request)
    {    $data = new Product();
      $data->title = $request->title;
      $data->description = $request->description;
     
      $data->price = $request->price;
      $data->category = $request->category;
      $data->quantity = $request->quantity;
      $image =$request->image;
      if ($image) {
         $imagename = time() . '.' . $image->getClientOriginalExtension();
         $image->move(public_path('product'), $imagename);
         $data->image = $imagename;
     }
      $data->save();
      return redirect()->back();
    }
    //add_category //
    Public function view_product()
    {  
      
   // Paginate the products with 10 products per page
    $product = Product::paginate(5);

    return view('admin.view_product', compact('product'));
      
    }
      //delete_category //
   Public function delete_product($id)
   {
      $product = Product::find($id);
      $product-> delete();
      $image_path = public_path('product/'.$product->image);
      if(file_exists($image_path)){
        unlink($image_path);
      }
    return redirect()->back();
   }
   //edit_product //
   Public function edit_product($id)
   {
      $product = Product::find($id);

      return view('admin.edit_product',compact('product'));
   }
    //update_product //
    public function update_product(Request $request, $id)
{
    // Find the product by its ID
    $product = Product::find($id);

    // Update the product's fields
    $product->title = $request->title;  // Assuming 'title' is the field name in the form
    $product->description = $request->description;
    $product->price = $request->price;
    $product->category = $request->category;
    $product->quantity = $request->quantity;

    // Handle the image upload if a new image is provided
    if ($request->hasFile('image')) {
        // Get the uploaded image
        $image = $request->file('image');

        // Generate a unique name for the image based on the current time
        $imagename = time() . '.' . $image->getClientOriginalExtension();

        // Move the image to the 'public/product' directory
        $image->move(public_path('product'), $imagename);

        // Update the product's image field
        $product->image = $imagename;
    }

    // Save the updated product details to the database
    $product->save();

    // Redirect to the product view page with a success message
    return redirect('/view_product')->with('success', 'Product updated successfully!');
}
//update_product //
public function product_search(Request $request)
{
  $search = $request->search;
  $product =Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
  return view('admin.view_product',compact('product'));

}
public function view_order()
{
  $data = Order::all();

    return view('admin.view_order', compact('data'));

}
public function on_the_way($id)
{
  $data = Order::find($id);
  $data->status= 'On the way';
  $data->save();
    return redirect('/view_order');

}
public function delivered($id)
{
  $data = Order::find($id);
  $data->status= 'Delivered';
  $data->save();
    return redirect('/view_order');

}
public function print_pdf($id)
{
  $data = Order::find($id);
  $pdf = Pdf::loadView('admin.invoice',compact('data'));
    return $pdf->download('invoice.pdf');

}
public function subscribers()
{

    $subscribers = Subscriber::all(); 


    return view('admin.subscribers', compact('subscribers'));
}
public function showContactMessages()
    {
        $contacts = Contact::all(); // Fetch all contact messages

        return view('admin.contact_us', compact('contacts')); // Adjust view path as necessary
    }
}


