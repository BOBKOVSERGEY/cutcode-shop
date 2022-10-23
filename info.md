dd(
\App\Models\Product::query()
->select(['id', 'title', 'brand_id'])
->where('id', 1)
->toSql()
);
