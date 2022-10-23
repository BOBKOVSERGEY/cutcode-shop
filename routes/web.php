<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dump(
        \App\Models\Product::query()
            ->select(['id', 'title', 'brand_id'])
            ->with(['categories', 'brand'])
            ->where('id', 1)
            ->get()
    );
    return view('welcome');
});
