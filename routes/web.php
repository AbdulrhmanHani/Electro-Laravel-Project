<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;

# USER #
//Register
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerPost'])->middleware('guest');
// Login
Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'loginPost'])->middleware('guest');
//Logout
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');
// Index
Route::get('/', [MainController::class, 'index'])->middleware('auth');
//Category
Route::get('/category/{catId}', [MainController::class, 'showCategory'])->middleware('auth');
// Product
# quick view
Route::get('/product/{prodId}', [MainController::class, 'showProduct'])->middleware('auth');
# add review
Route::post('/add-review/{prodId}', [MainController::class, 'addReview'])->middleware('auth');
# delete review
Route::get('/delrev/{revId}', [MainController::class, 'deleteReview'])->middleware('auth');
// Wish lists
# wishlist
Route::get('/wishlist', [MainController::class, 'wishlist'])->middleware('auth');
# add to wish list
Route::get('/add-to-wishlist/{prodId}', [MainController::class, 'addToWishList'])->middleware('auth');
# remove from wish list
Route::get('/remove-from-wishlist/{prodId}', [MainController::class, 'removeFromWishList'])->middleware('auth');
# add all wish lists to cart
Route::get('/add-wishs-to-cart', [MainController::class, 'addWishListToCart'])->middleware('auth');
# add to cart
Route::get('/add-to-cart/{prodId}', [MainController::class, 'addToCart'])->middleware('auth');
# add single to cart
Route::post('/add-single-to-cart', [MainController::class, 'addSingleToCart'])->middleware('auth');
# remove from cart
Route::get('/remove-from-cart/{prodId}', [MainController::class, 'removeFromCart'])->middleware('auth');
# cart
Route::get('/cart', [MainController::class, 'cart'])->middleware('auth');
# check out
Route::get('/checkout', [MainController::class, 'checkOut'])->middleware('auth');
# place Order
Route::post('/place-order', [MainController::class, 'placeOrder'])->middleware('auth');
# your orders
Route::get('/orders', [MainController::class, 'myOrders'])->middleware('auth');
# search
Route::get('/search', [MainController::class, 'search'])->middleware('auth');
# edit user profile
Route::get('/profile', [MainController::class, 'profile'])->middleware('auth');
Route::post('/edit-profile', [MainController::class, 'editProfile'])->middleware('auth');

#-----------------------------------------------------------------------------------------------------------------------#

# ADMIN #
// Login
Route::get('/dashboard', [AdminController::class, 'login'])->middleware('guest');
Route::post('/mlogin', [AdminController::class, 'loginPost'])->middleware('guest');
// Logout
Route::get('/mlogout', [AdminController::class, 'logout'])->middleware(['admin']);
// Index
Route::get('/mario', [AdminController::class, 'index'])->middleware('admin');
// Category
Route::get('/mario/categories', [AdminController::class, 'categories'])->middleware('admin');
# add category
Route::get('add-category', [AdminController::class, 'addCategory'])->middleware('admin');
Route::post('add-category', [AdminController::class, 'addCategoryPost'])->middleware('admin');
# search category
Route::get('/mario/category/search', [AdminController::class, 'categorySearch'])->middleware('admin');
# delete category
Route::get('/mario/deleteCategory/{catId}', [AdminController::class, 'deleteCategory'])->middleware('guro');
# edit category
Route::get('/mario/edit-category/{catId}', [AdminController::class, 'editCategory'])->middleware('admin');
Route::post('/mario/edit-category/{catId}', [AdminController::class, 'editCategoryPost'])->middleware('admin');
// Products
Route::get('/mario/products', [AdminController::class, 'products'])->middleware('admin');
# search product
Route::get('/mario/product/search', [AdminController::class, 'productSearch'])->middleware('admin');
# show product
Route::get('/mario/show-product/{prodId}', [AdminController::class, 'showProduct'])->middleware('admin');
# edit product
Route::get('/mario/edit-product/{prodId}', [AdminController::class, 'editProduct'])->middleware('admin');
Route::post('/mario/edit-product/{prodId}', [AdminController::class, 'editProductPost'])->middleware('admin');
# add product
Route::get('/mario/add-product', [AdminController::class, 'addProduct'])->middleware('admin');
Route::post('/mario/add-product', [AdminController::class, 'addProductPost'])->middleware('admin');
# delete product
Route::get('/mario/delete-product/{prodId}', [AdminController::class, 'deleteProduct'])->middleware('guro');
#delete product image
Route::get('/mario/delete-image/{imgId}', [AdminController::class, 'deleteImage'])->middleware('guro');
# profits
Route::get('/mario/profits', [AdminController::class, 'profits'])->middleware('admin');
// mario/profits/search
Route::get('/mario/profits/search', [AdminController::class, 'profitSearch'])->middleware('admin');
// Users
Route::get('/mario/users', [AdminController::class, 'users'])->middleware('admin');
# search user
Route::get('/mario/user/search', [AdminController::class, 'userSearch'])->middleware('admin');
# delete user
Route::get('/mario/delete-user/{userId}', [AdminController::class, 'deleteUser'])->middleware('guro');
// Admins
Route::get('/mario/admins', [AdminController::class, 'admins'])->middleware('admin');
# search admin
Route::get('/mario/admin/search', [AdminController::class, 'adminSearch'])->middleware('guro');
# delete admin
Route::get('/mario/delete-admin/{adminId}', [AdminController::class, 'deleteAdmin'])->middleware('guro');
# add admin
Route::get('/mario/add-admin/', [AdminController::class, 'addAdmin'])->middleware('guro');
Route::post('/mario/add-admin/', [AdminController::class, 'addAdminPost'])->middleware('guro');
# edit admin
Route::get('/mario/edit-admin/{adminId}', [AdminController::class, 'editAdmin'])->middleware('guro');
Route::post('/mario/edit-admin/{adminId}', [AdminController::class, 'editAdminPost'])->middleware('guro');
# orders
Route::get('/mario/orders', [AdminController::class, 'orders'])->middleware('super_admin');
# view order
Route::get('/mario/order/{orderId}', [AdminController::class, 'showOrder'])->middleware('super_admin');
# approve order
Route::get('/mario/approve-order/{orderId}', [AdminController::class, 'approveOrder'])->middleware('super_admin');
# cancel order
Route::get('/mario/cancel-order/{orderId}', [AdminController::class, 'cancelOrder'])->middleware('super_admin');
# delete order
Route::get('/mario/delete-order/{orderId}', [AdminController::class, 'deleteOrder'])->middleware('guro');
# delete all canceled orders
Route::get('/mario/delete-all-canceled', [AdminController::class, 'deleteAllCanceled'])->middleware('guro');
#profile
Route::get('/mario/profile', [AdminController::class, 'profile'])->middleware('admin');
Route::post('/mario/edit-profile', [AdminController::class, 'editProfile'])->middleware('admin');
# all reviews
Route::get('/mario/reviews', [AdminController::class, 'reviews'])->middleware('admin');
# delete review
// /mario/delete-review', [$review->review_id])
Route::get('/mario/delete-review/{revId}', [AdminController::class, 'deleteReview'])->middleware('guro');

#-----------------------------------------------------------------------------------------------------------------------#

#setup
Route::get('/setup',
    function () {
        Admin::create([
            'admin_id' => 007,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone_number' => '01285821487',
            'password' => bcrypt('password'),
            'role' => 'guro',
        ]);
        return response()->json(['Success']);
    });
//
