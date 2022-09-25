<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use App\Models\Wish;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        $topSelling = Cart::groupBy('product_id')->orderBy('product_id', 'DESC')->take(4)->get('product_id');
        return view('index', [
            'products' => $products,
            'carts' => $carts,
            'ts' => $topSelling,
        ]);
    }

    public function showCategory($catId)
    {
        $category = Category::where('category_id', '=', $catId)->first();
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        if ($category !== null) {
            return view('category', [
                'category' => $category,
                'carts' => $carts,

            ]);
        } else {
            return back();
        }
    }

    public function showProduct($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            $rprds = Product::where('product_id', '!=', $prodId)
                ->where('name', 'NOT LIKE', "%$product->name%")
                ->orWhere('description', 'NOT LIKE', "%$product->description%")
                ->orderBy('price', 'DESC')
                ->take(4)->get();
            $carts = Cart::where('user_id', '=', auth()->user()->id)
                ->where('cart_status', '=', 'pending')
                ->get();

            if ($product !== null) {
                return view('product', [
                    'product' => $product,
                    'rprds' => $rprds,
                    'carts' => $carts,

                ]);
            } else {
                return back();
            }
        } else {
            return back();
        }

    }

    public function addReview(Request $request, $prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {

            $request->validate([
                'content' => 'required|string|max:255',
                'star' => 'required',
            ]);

            Review::create([
                'review_id' => md5(rand(50000000000, 90000000000)),
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'stars' => $request->star,
                'content' => $request->content,
            ]);
            return back();
        } else {
            return back();
        }
    }

    public function deleteReview($revId)
    {
        $review = Review::where('review_id', '=', $revId)->first();
        if ($review !== null) {
            if ($review->User->id == auth()->user()->id) {
                $review->delete();
                return back();
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function wishList()
    {
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        return view('wishlist', [
            'carts' => $carts,

        ]);
    }

    public function addToWishList($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            if (auth()->user()->Wishs
                ->where('product_id', '=', $product->id)
                ->count() > 0) {
                return back();
            } else {
                Wish::create([
                    'wish_id' => md5(rand(50000000000, 90000000000)),
                    'user_id' => auth()->user()->id,
                    'product_id' => $product->id,
                ]);
                return back();
            }

        } else {
            return redirect(url('/'));
        }
    }

    public function removeFromWishList($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            $wish = Wish::where('user_id', '=', auth()->user()->id)
                ->where('product_id', '=', $product->id)
                ->first();
            $wish->delete();
            return back();
        } else {
            return back();
        }
    }

    public function addWishListToCart()
    {
        foreach (auth()->user()->Wishs as $wish) {
            Cart::create([
                'cart_id' => md5(rand(50000000000, 90000000000)),
                'user_id' => auth()->user()->id,
                'product_id' => $wish->product_id,
                'cart_status' => 'pending',
                'qty' => 1,
                'total' => $wish->Product->price_after_sale,
            ]);
        }
        foreach (auth()->user()->Wishs as $ff) {
            $ff->delete();
        }
        return redirect(url('/'));
    }

    public function cart()
    {
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        return view('cart', [
            'carts' => $carts,
        ]);
    }

    public function addToCart($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            if (auth()->user()->Carts
                ->where('product_id', '=', $product->id)
                ->where('cart_status', '=', 'pending')
                ->count() > 0) {
                return back();
            } elseif ($product->qty <= 0) {
                return back();
            }
            Cart::create([
                'cart_id' => md5(rand(50000000000, 90000000000)),
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'cart_status' => 'pending',
                'qty' => 1,
                'total' => $product->price_after_sale,
            ]);
            return back();
        } else {
            return redirect(url('/'));
        }
    }

    public function addSingleToCart(Request $request)
    {
        $product = Product::where('product_id', '=', $request->productId)->first();

        if ($product !== null) {

            if (auth()->user()->Carts
                ->where('product_id', '=', $product->id)
                ->where('cart_status', '=', 'pending')
                ->count() > 0) {
                return back();
            } elseif ($product->qty <= 0) {
                return back();
            }
            Cart::create([
                'cart_id' => md5(rand(50000000000, 90000000000)),
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'cart_status' => 'pending',
                'qty' => $request->productQty,
                'total' => $product->price_after_sale * $request->productQty,
            ]);
            return redirect(url('/'));
        } else {
            return back();
        }

    }

    public function removeFromCart($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            Cart::where('product_id', '=', $product->id)->delete();
            return back();
        } else {
            return redirect(url('/'));
        }
    }

    public function checkOut()
    {
        $carts = Cart::where('user_id', '=', auth()->user()->id)->where('cart_status', '=', 'pending')->get();
        return view('checkout', [
            'carts' => $carts,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'payment' => 'required',
            'terms' => 'required',
        ]);
        if ($request->payment == 'success' and $request->terms == 'success') {
            foreach (auth()->user()->Carts->where('cart_status', '=', 'pending') as $cart) {
                $cart->update([
                    'cart_status' => "approved",
                ]);
                $cart->Product->update([
                    'qty' => $cart->Product->qty - $cart->qty,
                ]);
                Order::create([
                    'order_id' => md5(rand(50000000000, 90000000000)),
                    'cart_id' => $cart->id,
                    'user_id' => auth()->user()->id,
                    'order_status' => 'pending',
                    'total' => $cart->total,
                ]);
            }
            return redirect('/');
        } else {
            return back();
        }
    }

    public function myOrders()
    {
        $orders = auth()->user()->Orders
            ->where('order_status', '=', 'approved');
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        return view('orders', [
            'orders' => $orders,
            'carts' => $carts,
        ]);
    }

    public function search(Request $request)
    {
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        $category = $request->category;
        $key = $request->key;

        if ($category == 'all') {
            $products = Product::where('name', 'LIKE', "%$key%")
                ->orWhere('description', 'LIKE', "%$key%")
                ->get();
            $CAT = 'all';
        } elseif ($category !== null) {
            $CAT = Category::where('category_id', '=', $category)->first();
            $products = Product::where('category_id', '=', $CAT->id)
                ->where('name', 'LIKE', "%$key%")
                ->get();
        }
        if (!$category) {
            $products = Product::all();
            $CAT = "All";
        }
        return view('search', [
            'carts' => $carts,
            'products' => $products,
            'key' => $key,
            'catego' => $CAT,
        ]);
    }

    public function profile()
    {
        $carts = Cart::where('user_id', '=', auth()->user()->id)
            ->where('cart_status', '=', 'pending')
            ->get();
        return view('profile', [
            'carts' => $carts,
        ]);
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'password' => 'required|confirmed',
        ]);

        $user = User::where('user_id', '=', auth()->user()->user_id)->first();
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone,
            'address' => $request->address,
            'password' => bcrypt($request->password),
        ]);
        return redirect(url('/'));
    }

}
