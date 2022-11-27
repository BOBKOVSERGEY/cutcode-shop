<?php


namespace App\Http\Controllers;


use Domain\Product\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ProductController extends Controller
{
    public function __invoke(Product $product): Factory|View|Application
    {
        $product->load(['optionValues.option']);

        if (!empty(session('also'))) {
            $also = Product::query()
                ->where(function ($q) use ($product) {
                    $q->whereIn('id', session('also', []))
                        ->where('id', '!=', $product->id);
                })
                ->get();
        }

        session()->put('also.' . $product->id, $product->id);

        return view('product.show', [
            'product' => $product,
            'options' => $product->optionValues->keyValues(),
            'also' => $also ?? []
        ]);
    }
}
