<?php


namespace App\Jobs;


use Database\Factories\ProductFactory;
use Database\Factories\PropertyFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class ProductJsonPropertiesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     */
    public function it_created_json_properties(): void
    {
        $queue = Queue::getFacadeRoot();

        Queue::fake([ProductJsonProperties::class]);

        $properies = PropertyFactory::new()
            ->count(10)
            ->create();

        $product = ProductFactory::new()
            ->hasAttached($properies, function () {
                return ['value' => fake()->word()];
            })
            ->create();

        $this->assertEmpty($product->json_properties);

        Queue::swap($queue);

        ProductJsonProperties::dispatchSync($product);

        $product->refresh();

        $this->assertNotEmpty($product->json_properties);
    }
}
