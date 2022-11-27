<?php

namespace App\Http\Controllers;

use App\View\ViewModels\CatalogViewModel;
use Domain\Catalog\Models\Category;

class CatalogController extends Controller
{
    public function __invoke(?Category $category): CatalogViewModel
    {
        //return view('catalog.index', new CatalogViewModel($category));
        return (new CatalogViewModel($category))
            ->view('catalog.index');
    }
}
