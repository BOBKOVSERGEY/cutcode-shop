<?php

namespace Domain\Catalog\Models;

use Domain\Catalog\QueryBuilders\BrandQueryBuilder;
use Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Support\Models\HasSlug;
use Support\Models\HasThumbnail;

/**
 * @method static Brand|BrandQueryBuilder query()
 */
class Brand extends Model
{
    use HasFactory;
    use HasSlug;
    use HasThumbnail;

    protected $fillable = [
        'slug',
        'title',
        'thumbnail',
        'on_home_page',
        'sorting'
    ];

    protected function thumbnailDir(): string
    {
        return 'brands';
    }

    public function newEloquentBuilder($query): BrandQueryBuilder
    {
        return new BrandQueryBuilder($query);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


}
