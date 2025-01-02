<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Page\{PageController, ContactController};
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Cart\{
    StoreController as CartStoreController,
    DestroyController as CartDestroyController,
    DestroyAllController as CartDestroyAllController
};
use App\Http\Controllers\Order\{
    CheckoutController,
    WithoutRegistrationController,
    WithRegistrationController
};
use App\Http\Controllers\Backend\User\{
    DashboardController,
    ProfileController as UserProfileController,
    DeliveryAddressController as UserDeliveryAddressController,
    OrderController as UserOrderController
};

Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/o-firmie', [PageController::class, 'about'])->name('pages.about');
Route::get('/kontakt', [ContactController::class, 'create'])->name('pages.contacts.create');
Route::post('/kontakt/wyslij', [ContactController::class, 'store'])->name('pages.contacts.store');
Route::get('/dziekujemy-za-kontakt', [ContactController::class, 'thank'])->name('pages.contacts.thank');

Route::get('/produkty/{product:slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/produkty', [ProductController::class, 'index'])->name('products.index');

Route::post('/dodaj/{type}', CartStoreController::class)->name('cart.store');
Route::delete('/usun/{type}', CartDestroyController::class)->name('cart.destroy');
Route::get('/usun', CartDestroyAllController::class)->name('cart.destroy.all');

Route::get('/kasa', CheckoutController::class)->name('orders.checkout.index');

Route::get('/zamow-bez-rejestracji', [WithoutRegistrationController::class, 'create'])->name('orders.without-registration.create');
Route::post('/wyslij-zamowienie-bez-rejestracji', [WithoutRegistrationController::class, 'store'])->name('orders.without-registration.store');
Route::view('/dziekujemy-za-zamowienie-bez-rejestracji', 'order.thank.without-registration')->name('orders.thank.without-registration');

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/zamow', [WithRegistrationController::class, 'create'])->name('orders.with-registration.create');
    Route::post('/wyslij-zamowienie', [WithRegistrationController::class, 'store'])->name('orders.with-registration.store');

    Route::get('/konto/profil', [UserProfileController::class, 'show'])->name('backend.users.profiles.show');
    Route::get('/konto/profil/dodaj', [UserProfileController::class, 'create'])->name('backend.users.profiles.create');
    Route::post('/konto/profil', [UserProfileController::class, 'store'])->name('backend.users.profiles.store');
    Route::patch('/konto/profil', [UserProfileController::class, 'update'])->name('backend.users.profiles.update');

    Route::get('/konto/profil/adres-dostawy/dodaj', [UserDeliveryAddressController::class, 'create'])->name('backend.users.profiles.delivery-adresses.create');
    Route::post('/konto/profil/adres-dostawy/dodaj', [UserDeliveryAddressController::class, 'store'])->name('backend.users.profiles.delivery-adresses.store');
    Route::get('/konto/profil/adres-dostawy', [UserDeliveryAddressController::class, 'show'])->name('backend.users.profiles.delivery-adresses.show');
    Route::get('/konto/profil/adres-dostawy/edytuj', [UserDeliveryAddressController::class, 'edit'])->name('backend.users.profiles.delivery-adresses.edit');
    Route::patch('/konto/profil/adres-dostawy', [UserDeliveryAddressController::class, 'update'])->name('backend.users.profiles.delivery-adresses.update');
    Route::delete('/konto/profil/adres-dostawy', [UserDeliveryAddressController::class, 'destroy'])->name('backend.users.profiles.delivery-adresses.destroy');

    Route::resource('/konto/zamowienia', UserOrderController::class)
        ->names('backend.users.orders')
        ->only(['index', 'show'])
        ->parameters(['zamowienia' => 'order']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
