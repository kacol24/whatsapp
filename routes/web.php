<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::post('/', function (Request $request) {
    $whatsappMessage = view('wa', [
        'qty'    => $request->qty,
        'title'  => 'Premium T-shirt',
        'option' => [
            [
                'key'   => 'Color',
                'value' => $request->option_1,
            ],
            [
                'key'   => 'Size',
                'value' => $request->option_2,
            ],
        ],
        'url'    => route('home', ['option_1' => $request->option_1, 'option_2' => $request->option_2]),
    ])->render();

    return redirect()->away('https://wa.me/?text='.urlencode($whatsappMessage));
});
