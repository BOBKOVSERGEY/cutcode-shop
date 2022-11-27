<?php


namespace App\Http\Controllers;


use Database\Factories\BrandFactory;
use Database\Factories\ProductFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function it_success_price_filtered_response(): void
    {
        $products = ProductFactory::new()
            ->count(10)
            ->create(['price' => 200]);

        $extendedProduct = ProductFactory::new()
            ->createOne(['price' => 100000]);

        $request = [
            'filters' => [
                'price' => ['from' => 999, 'to' => 1001]
            ]
        ];
        $this->get(action(CatalogController::class, $request))
            ->assertOk()
            ->assertSee($extendedProduct->title)
            ->assertDontSee($products->random()->first()->title);
    }

    /**
     * @test
     * @return void
     */
    public function it_success_brand_filtered_response(): void
    {
        $products = ProductFactory::new()
            ->count(10)
            ->create();
        $brand = BrandFactory::new()->create();

        $extendedProduct = ProductFactory::new()
            ->createOne(['brand_id' => $brand]);

        $request = [
            'filters' => [
                'brands' => [$brand->id => $brand->id]
            ]
        ];
        $this->get(action(CatalogController::class, $request))
            ->assertOk()
            ->assertSee($extendedProduct->title)
            ->assertDontSee($products->random()->first()->title);
    }

    /**
     * @test
     * @return void
     */
    public function it_success_sorted_response(): void
    {
        $products = ProductFactory::new()
            ->count(3)
            ->create();
        $request = [
            'sort' => 'title'
        ];
        $this->get(action(CatalogController::class, $request))
            ->assertOk()
            ->assertSeeInOrder(
                $products->sortBy('title')
                    ->flatMap(fn($item) => [$item->title])
                    ->toArray()
            );
    }
}
