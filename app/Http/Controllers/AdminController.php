<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profit;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::where('order_status', '=', 'approved')->orderBy('id', 'DESC')->get()->take(3);
        return view('admin.index', [
            'orders' => $orders,
        ]);
    }

    public function login()
    {
        if (request()->session()->has('admin') || request()->session()->has('super_admin') || request()->session()->has('guro') || auth()->user()) {
            return redirect(url('/mario'));
        } else {
            return view('admin.login');
        }
    }

    public function loginPost(Request $request)
    {
        if (request()->session()->has('admin') || request()->session()->has('super_admin') || request()->session()->has('guro')) {
            return redirect(url('/mario'));
        } else {
            $email = $request->email;
            $password = $request->password;
            $ADMIN_SUCCESS = Admin::where('email', '=', $email)->first();
            if ($ADMIN_SUCCESS) {

                if ($email == $ADMIN_SUCCESS->email) {

                    if (password_verify($password, $ADMIN_SUCCESS->password)) {

                        if ($ADMIN_SUCCESS->role == 'admin') {

                            $request->session()->put('admin', $ADMIN_SUCCESS->name);
                        } elseif ($ADMIN_SUCCESS->role == 'super_admin') {

                            $request->session()->put('super_admin', $ADMIN_SUCCESS->name);
                        } elseif ($ADMIN_SUCCESS->role == 'guro') {

                            $request->session()->put('guro', $ADMIN_SUCCESS->name);
                        }
                        return redirect(url('/mario'));
                    } else {
                        return back();
                    }
                }
            } else {
                return back();
            }
        }
    }

    public function logout()
    {
        Session::remove('admin');
        request()->session()->remove('admin');
        request()->session()->remove('super_admin');
        request()->session()->remove('guro');
        return redirect(url('/hahalolxd'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories', [
            'categories' => $categories,
        ]);
    }

    public function addCategory()
    {
        return view('admin.add-category');
    }

    public function addCategoryPost(Request $request)
    {
        $request->validate([
            'catName' => 'required|string|max:255',
            'catImage' => 'required|image|mimes:png,jpg,jpeg|max:4096',
        ]);
        $catName = $request->catName;
        $catImage = $request->catImage;
        $imgPath = Storage::putFile('images/categories', $catImage);
        Category::create([
            'category_id' => md5(rand(50000000000, 90000000000)),
            'category_name' => $catName,
            'image' => $imgPath,
        ]);
        return redirect(url('/mario/categories'));
    }

    public function deleteCategory($catId)
    {
        $category = Category::where('category_id', '=', $catId)->first();
        Storage::delete($category->image);
        $category->delete();
        return back();
    }

    public function Category($catId)
    {
        $category = Category::where('category_id', '=', $catId)->first();
        return view('admin.edit-category', [
            'category' => $category,
        ]);
    }

    public function editCategory($catId)
    {
        $category = Category::where('category_id', '=', $catId)->first();
        if ($category !== null) {
            return view('admin.edit-category', [
                'category' => $category,
            ]);
        } else {
            return back();
        }
    }

    public function editCategoryPost(Request $request, $catId)
    {
        $category = Category::where('category_id', '=', $catId)->first();
        $newName = $request->newName;
        if ($request->hasFile('newImage')) {
            Storage::delete($category->image);
            $imgPath = Storage::putFile('images/categories', $request->newImage);
        } else {
            $imgPath = $category->image;
        }
        $category->update([
            'category_name' => $newName,
            'image' => $imgPath,
        ]);
        return redirect(url('/mario/categories'));
    }

    public function products()
    {
        $products = Product::all();
        return view('admin.products', [
            'products' => $products,
        ]);
    }

    public function addProduct()
    {
        return view('admin.add-product');
    }

    public function showProduct($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            return view('admin.product', [
                'product' => $product,
            ]);
        } else {
            return back();
        }
    }

    public function editProduct($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($product !== null) {
            return view('admin.edit-product', [
                'product' => $product,
            ]);
        } else {
            return back();
        }
    }

    public function editProductPost(Request $request, $prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();

        $productImage1 = Image::where('product_id', '=', $product->id)->first();
        $productImage2 = Image::where('product_id', '=', $product->id)->get()[1] ?? null;
        $productImage3 = Image::where('product_id', '=', $product->id)->get()[2] ?? null;
        $productImage4 = Image::where('product_id', '=', $product->id)->get()[3] ?? null;

        $category = Category::findOrFail($request->productCategory);

        $product->update([
            'name' => $request->productName,
            'description' => $request->productDescription,
            'price' => $request->productPrice,
            'price_after_sale' => $request->productPriceAfterSale,
            'qty' => $request->productQty,
            'category_id' => $category->id,
        ]);

        if (!$request->hasFile('newImage1')) {
            $imgPath1 = $productImage1->image_name;
            $productImage1->update([
                'image_name' => $imgPath1,
            ]);
        } else {
            Storage::delete($productImage1->image_name);
            $imgPath = Storage::putFile('images/products', $request->newImage1);
            $productImage1->update([
                'image_name' => $imgPath,
            ]);
        }
        if ($productImage2 !== null && $request->hasFile('newImage2')) {
            $imgPath2 = Storage::putFile('images/products', $request->newImage2);
            Storage::delete($product->Images[1]->image_name);
            $productImage2->update([
                'image_name' => $imgPath2,
            ]);
        }
        if ($productImage3 !== null && $request->hasFile('newImage3')) {
            Storage::delete($product->Images[2]->image_name);
            $imgPath3 = Storage::putFile('images/products', $request->newImage3);
            $productImage3->update([
                'image_name' => $imgPath3,
            ]);
        }
        if ($productImage4 !== null && $request->hasFile('newImage4')) {
            Storage::delete($product->Images[3]->image_name);
            $imgPath4 = Storage::putFile('images/products', $request->newImage4);
            $productImage4->update([
                'image_name' => $imgPath4,
            ]);
        }
        return redirect(url('/mario/products'));
    }

    public function addProductPost(Request $request)
    {
        $request->validate([
            'productName' => 'required|string|max:255',
            'productCategory' => 'required|exists:categories,id',
            'productPrice' => 'required|numeric',
            'productQty' => 'required|numeric',
            'descriptoin' => 'required|string|max:255',
            'productImage1' => 'required|image|mimes:jpg,jpeg,png,gif',
            'productImage2' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'productImage3' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'productImage4' => 'nullable|image|mimes:jpg,jpeg,png,gif',
            'productPriceAfterSale' => 'required|numeric',
        ]);
        $productImage1 = $request->productImage1;
        $productImage2 = $request->productImage2;
        $productImage3 = $request->productImage3;
        $productImage4 = $request->productImage4;
        $product = Product::create([
            'product_id' => md5(rand(50000000000, 90000000000)),
            'name' => $request->productName,
            'description' => $request->descriptoin,
            'price' => $request->productPrice,
            'price_after_sale' => $request->productPriceAfterSale,
            'qty' => $request->productQty,
            'per' => 1,
            'category_id' => $request->productCategory,
        ]);
        $imgPath1 = Storage::putFile('images/products', $productImage1);
        Image::create([
            'image_id' => md5(rand(50000000000, 90000000000)),
            'image_name' => $imgPath1,
            'product_id' => $product->id,
        ]);

        if ($request->hasFile('productImage2')) {
            $imgPath2 = Storage::putFile('images/products', $productImage2);
            Image::create([
                'image_id' => md5(rand(50000000000, 90000000000)),
                'image_name' => $imgPath2,
                'product_id' => $product->id,
            ]);
        }
        if ($request->hasFile('productImage3')) {
            $imgPath3 = Storage::putFile('images/products', $productImage3);
            Image::create([
                'image_id' => md5(rand(50000000000, 90000000000)),
                'image_name' => $imgPath3,
                'product_id' => $product->id,
            ]);
        }
        if ($request->hasFile('productImage4')) {
            $imgPath4 = Storage::putFile('images/products', $productImage4);
            Image::create([
                'image_id' => md5(rand(50000000000, 90000000000)),
                'image_name' => $imgPath4,
                'product_id' => $product->id,
            ]);
        }
        return redirect(url('/mario/products'));
    }

    public function deleteProduct($prodId)
    {
        $product = Product::where('product_id', '=', $prodId)->first();
        if ($prodId !== null) {
            foreach ($product->Images as $image) {
                Storage::delete($image->image_name);
            }
            $product->delete();
            return redirect(url('/mario/products'));
        } else {
            return back();
        }
    }
    public function users()
    {
        $users = User::all();
        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function deleteUser($userId)
    {
        $user = User::where('user_id', '=', $userId)->first();
        if ($user !== null) {
            $user->delete();
            return redirect(url('/mario/users'));
        } else {
            return back();
        }
    }

    public function admins()
    {
        $admins = Admin::where('role', '!=', 'guro')->get();
        return view('admin.admins', [
            'admins' => $admins,
        ]);
    }

    public function deleteAdmin($adminId)
    {
        $admin = Admin::where('admin_id', '=', $adminId)->first();
        if ($admin !== null) {
            if ($admin->role == 'guro') {
                return redirect(url('/mario'));
            }
            $admin->delete();
            return redirect(url('/mario/admins'));
        } else {
            return back();
        }
    }

    public function addAdmin()
    {
        return view('admin.add-admin');
    }

    public function addAdminPost(Request $request)
    {
        $request->validate([
            'adminName' => 'required|string|max:50',
            'adminEmail' => 'required|email|max:50',
            'adminPhone' => 'required|numeric',
            'password' => 'required|string|max:64|confirmed',
        ]);
        Admin::create([
            'admin_id' => md5(rand(50000000000, 90000000000)),
            'name' => $request->adminName,
            'email' => $request->adminEmail,
            'phone_number' => $request->adminPhone,
            'role' => $request->adminRole,
            'password' => bcrypt($request->password),
        ]);
        return redirect(url('/mario/admins'));
    }

    public function editAdmin($adminId)
    {
        $admin = Admin::where('admin_id', '=', $adminId)->first();
        if ($admin !== null) {
            return view('admin.edit-admin', [
                'admin' => $admin,
            ]);
        } else {
            return redirect(url('/mario/admins'));
        }
    }

    public function editAdminPost(Request $request, $adminId)
    {
        $admin = Admin::where('admin_id', '=', $adminId)->first();
        if ($admin !== null) {
            $admin->update([
                'name' => $request->adminName,
                'email' => $request->adminEmail,
                'phone_number' => $request->adminPhone,
                'role' => $request->adminRole,
            ]);
            return redirect(url('/mario/admins'));
        } else {
            return redirect(url('/mario/admins'));
        }
    }

    public function productSearch(Request $request)
    {
        $key = $request->key;
        $products = Product::where('name', 'LIKE', "%$key%")->orWhere('description', 'LIKE', "%$key%")->orWhere('price', 'LIKE', "$key")->get();
        return view('admin.products', [
            'products' => $products,
            'key' => $key,
        ]);
    }

    public function categorySearch(Request $request)
    {
        $key = $request->key;
        $categories = Category::where('category_name', 'LIKE', "%$key%")->get();
        return view('admin.categories', [
            'categories' => $categories,
            'key' => $key,
        ]);
    }

    public function userSearch(Request $request)
    {
        $key = $request->key;
        $users = User::where('name', 'LIKE', "%$key%")->orWhere('email', 'LIKE', "%$key%")->orWhere('phone_number', 'LIKE', "%$key%")->get();
        return view('admin.users', [
            'users' => $users,
            'key' => $key,
        ]);
    }

    public function adminSearch(Request $request)
    {
        $key = $request->key;
        $admins = Admin::where('name', 'LIKE', "%$key%")->orWhere('email', 'LIKE', "%$key%")->orWhere('phone_number', 'LIKE', "%$key%")->orWhere('role', '!=', 'guro')->get();
        return view('admin.admins', [
            'admins' => $admins,
            'key' => $key,
        ]);
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.orders', [
            'orders' => $orders,
        ]);
    }

    public function showOrder($orderId)
    {
        $order = Order::where('order_id', '=', $orderId)->first();
        if ($order !== null) {
            if ($order->order_status == 'pending') {
                return view('admin.order', [
                    'order' => $order,
                ]);
            } else {
                return back();
            }
        } else {
            return back();
        }
    }

    public function approveOrder($orderId)
    {
        $order = Order::where('order_id', '=', $orderId)->first();
        $order->update([
            'order_status' => 'approved',
        ]);
        Profit::create([
            'profit_id' => md5(rand(50000000000, 90000000000)),
            'order_id' => $order->id,
            'total' => $order->total,
        ]);
        return redirect(url('/mario/orders'));
    }

    public function cancelOrder($orderId)
    {
        $order = Order::where('order_id', '=', $orderId)->first();
        $order->Cart->Product->update([
            'qty' => $order->Cart->Product->qty + $order->Cart->qty,
        ]);
        $order->update([
            'order_status' => 'canceled',
        ]);
        return redirect(url('/mario/orders'));
    }

    public function deleteOrder($orderId)
    {
        $order = Order::where('order_id', '=', $orderId)->first();
        if ($order !== null) {
            if ($order->order_status == 'canceled') {
                $order->delete();
                return back();
            } else {
                return back();
            }
        } else {
            return redirect(url('/'));
        }
    }

    public function deleteAllCanceled()
    {
        $canceledOrders = Order::where('order_status', '=', 'canceled')->get();
        foreach ($canceledOrders as $order) {
            $order->delete();
        }
        return back();
    }

    public function profile()
    {
        $adminName = request()->session()->get('admin') ?? request()->session()->get('super_admin') ?? request()->session()->get('guro');
        $admin = Admin::where('name', '=', $adminName)->first();
        return view('admin.aprofile', [
            'admin' => $admin,
        ]);
    }

    public function editProfile(Request $request)
    {
        $adminName = request()->session()->get('admin') ?? request()->session()->get('super_admin') ?? request()->session()->get('guro');
        $admin = Admin::where('name', '=', $adminName)->first();
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'password' => 'required|string',
        ]);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
        ]);
        $request->session()->remove('admin');
        $request->session()->remove('super_admin');
        $request->session()->remove('guro');
        return redirect(url('/hahalolxd'));
    }

    public function deleteImage($imgId)
    {
        $image = Image::findOrFail($imgId);

        Storage::delete($image->image_name);
        $image->delete();
        return redirect(url('/mario/products'));
    }

    public function profits()
    {
        $categories = Category::all();
        $profits = Profit::all();
        return view('admin.profits', [
            'categories' => $categories,
            'profits' => $profits,
        ]);
    }

    public function profitSearch(Request $request)
    {
        $categories = Category::all();
        $key = $request->key;
        $profits = Profit::where('profit_id', 'LIKE', "%$key%")->get();
        return view('admin.profits', [
            'categories' => $categories,
            'profits' => $profits,
        ]);
    }

    public function reviews()
    {
        $reviews = Review::all();
        return view('admin.reviews', [
            'reviews' => $reviews,
        ]);
    }

    public function deleteReview($revId)
    {
        $review = Review::where('review_id', '=', $revId)->first();
        if ($review !== null) {
            $review->delete();
            return back();
        } else {
            return back();
        }
    }

}
