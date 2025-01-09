<?php

namespace Tests\Feature\Admin\Product;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product\{Brand, Category, Concentration, Product, Type, Size};

class TypeTest extends TestCase
{
    use RefreshDatabase;

    private $product;
    private $size;
    private $type;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        $this->actingAs($user);
        $this->size = Size::factory()->create();
        $this->product = Product::factory()
            ->for(Brand::factory())
            ->for(Category::factory())
            ->for(Concentration::factory())
            ->create();
        $this->type = Type::factory()
            ->for($this->product)
            ->for(Size::factory())
            ->create();
    }

    public function testIndex(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.types.index', $this->product));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.type.index');
        $response->assertSeeText('Typy produktu');
    }

    public function testCreate(): void
    {
        $this->withoutExceptionHandling();
        $response = $this->get(route('backend.admins.products.types.create', $this->product));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.type.create');
        $response->assertSeeText('Dodawanie');
    }

    public function testStore(): void
    {
        $this->withoutExceptionHandling();

        $item = Type::factory()->make(['product_id' => $this->product->id, 'size_id' => $this->size->id]);
        $response = $this->post(route('backend.admins.products.types.store', $this->product), $item->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('types', ['name' => $item->name]);
    }

    public function testStoreWithValidationError(): void
    {
        $item = Type::factory()->make(['name' => '']);
        $response = $this->post(route('backend.admins.products.types.store', $this->product), $item->toArray());
        $response->assertStatus(302);
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('types', ['name' => $item->name]);
    }

    public function testStoreWithDuplicateValidationError(): void
    {
        $item = Type::factory()->make(['product_id' => $this->product->id, 'size_id' => $this->size->id]);
        $response = $this->post(route('backend.admins.products.types.store', $this->product), $item->toArray());
        $response = $this->post(route('backend.admins.products.types.store', $this->product), $item->toArray());
        $response->assertInvalid(['name' => 'The name has already been taken.']);
    }

    public function testShow(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->type;
        $response = $this->get(route('backend.admins.products.types.show', [$this->product, $item]));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.type.show');
        $response->assertSeeText('Typ');
    }

    public function testEdit(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->type;
        $response = $this->get(route('backend.admins.products.types.edit', [$this->product, $item]));
        $response->assertOk();
        $response->assertViewIs('backend.admin.product.product.type.edit');
        $response->assertSeeText('Edycja');
    }

    public function testUpdate(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->type;
        $item1 = Type::factory()->make(['product_id' => $this->product->id, 'size_id' => $this->size->id]);
        $response = $this->put(route('backend.admins.products.types.update', [$this->product, $item]), $item1->toArray());
        $response->assertStatus(302);
        $this->assertDatabaseHas('types', ['name' => $item1->name]);
    }

    public function testUpdateWithValidationError(): void
    {
        $item = $this->type;
        $item1 = Type::factory()->make(['name' => '']);
        $response = $this->put(route('backend.admins.products.types.update', [$this->product, $item]), $item1->toArray());
        $response->assertInvalid(['name' => 'The name field is required.']);
        $this->assertDatabaseMissing('types', ['name' => $item1->name]);
    }

    public function testDestroy(): void
    {
        $this->withoutExceptionHandling();
        $item = $this->type;
        $response = $this->delete(route('backend.admins.products.types.destroy', [$this->product, $item]));
        $response->assertStatus(302);
        $this->assertDatabaseMissing('types', ['name' => $item->name]);
    }
}
