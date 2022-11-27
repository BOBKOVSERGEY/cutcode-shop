<?php

namespace App\View\ViewModels;

use Domain\Catalog\Models\Category;
use Domain\Product\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;
use Spatie\ViewModels\ViewModel;

class CatalogViewModel extends ViewModel
{
    public function __construct(
        public Category $category
    ) {
    }

    public function categories(): Collection|array
    {
        return Category::query()
            ->select(['id', 'title', 'slug'])
            ->has('products')
            ->get();
    }

    public function products(): LengthAwarePaginator
    {
        return Product::query()
            ->select(['id', 'title', 'slug', 'price', 'thumbnail', 'json_properties'])
            ->search()
            ->withCategory($this->category)
            ->filtered()
            ->sorted()
            ->paginate(6);
    }
}
