<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use Stripe;
use Session;
use App\Models\Subscriber;
use App\Models\Deal;
use App\Models\Testimonial;
use App\Models\Contact;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status', 'Delivered')->count();
        return view('admin.index', compact('user', 'product', 'order', 'delivered'));
    }

    public function home()
    {
        $product = Product::all();
        $count = Auth::id() ? Cart::where('user_id', Auth::id())->count() : '';
        return view('home.index', compact('product', 'count'));
    }

    public function login_home()
    {
        $product = Product::all();
        $count = Auth::id() ? Cart::where('user_id', Auth::id())->count() : '';
        return view('home.index', compact('product', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        $count = Auth::id() ? Cart::where('user_id', Auth::id())->count() : '';
        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $user = Auth::user();
        $cart = new Cart();
        $cart->user_id = $user->id;
        $cart->product_id = $id;
        $cart->save();

        return redirect()->back()->with('success', 'Product successfully added to the cart!');
    }

    public function myCart()
    {
        if (Auth::id()) {
            $userId = Auth::id();
            $count = Cart::where('user_id', $userId)->count();
            $cart = Cart::where('user_id', $userId)->get();
        }

        return view('home.myCart', compact('count', 'cart'));
    }

    public function remove($id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from the cart!');
        }

        return redirect()->back()->with('error', 'Product not found.');
    }

    public function confirm_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;

        $userId = Auth::id();
        $cart = Cart::where('user_id', $userId)->get();

        foreach ($cart as $cartItem) {
            $order = new Order();
            $order->name = $name;
            $order->receiver_address = $address;
            $order->phone = $phone;
            $order->user_id = $userId;
            $order->product_id = $cartItem->product_id;
            $order->save();
        }

        // Remove all items from the user's cart
        Cart::where('user_id', $userId)->delete();

      
        return redirect('myCart')->with('success', 'Payment and order successful!');
    }

    public function my_order()
    {
        $userId = Auth::id();
        $count = Cart::where('user_id', $userId)->count();
        $order = Order::where('user_id', $userId)->get();

        return view('home.my_order', compact('count', 'order'));
    }

    public function stripe($value)
    {
        return view('home.stripe', compact('value'));
    }

    public function stripePost(Request $request, $value)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $value * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment Successful"
        ]);

        // Process order after successful payment
        $user = Auth::user();
        $name = $user->name;
        $address = $user->address;
        $phone = $user->phone;
        $userId = $user->id;
        $cart = Cart::where('user_id', $userId)->get();

        foreach ($cart as $cartItem) {
            $order = new Order();
            $order->name = $name;
            $order->receiver_address = $address;
            $order->phone = $phone;
            $order->user_id = $userId;
            $order->product_id = $cartItem->product_id;
            $order->payment_status = "paid";
            $order->save();
        }

        // Remove all items from the user's cart after payment
        Cart::where('user_id', $userId)->delete();

        return redirect('myCart')->with('success', 'Payment and order successful!');
    }
    public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscribers,email',
    ]);

    // This will now work because 'email' is added to the fillable property
    Subscriber::create([
        'email' => $request->email,
    ]);

    return redirect()->back()->with('success', 'Thank you for subscribing!');
}
public function showContactForm()
{
    $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
    return view('home.contact', compact('count'));
}
  
    public function submit(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

  
        Contact::create($request->all());


        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
    public function all_products()
    {
        $product = Product::all(); // You can add pagination here
       
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;

        return view('home.all_products', compact('product' , 'count'));
    }
    public function about()
    {
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        return view('home.about', compact('count'));
    }
}
