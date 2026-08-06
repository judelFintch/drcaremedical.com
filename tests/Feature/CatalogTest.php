<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CatalogTest extends TestCase
{
    use RefreshDatabase;

    public function test_catalog_lists_only_published_products(): void
    {
        $published = Product::factory()->create(['name_fr' => 'Produit Publié Visible']);
        Product::factory()->draft()->create(['name_fr' => 'Produit Brouillon Caché']);

        $response = $this->get(route('catalog.index'));

        $response->assertOk();
        $response->assertSee($published->name_fr);
        $response->assertDontSee('Produit Brouillon Caché');
    }

    public function test_catalog_can_be_filtered_by_category(): void
    {
        $categoryA = Category::factory()->create(['name_fr' => 'Imagerie']);
        $categoryB = Category::factory()->create(['name_fr' => 'Stérilisation']);

        $productA = Product::factory()->create(['category_id' => $categoryA->id, 'name_fr' => 'Échographe X']);
        $productB = Product::factory()->create(['category_id' => $categoryB->id, 'name_fr' => 'Autoclave Y']);

        $response = $this->get(route('catalog.index', ['category' => $categoryA->slug]));

        $response->assertOk();
        $response->assertSee($productA->name_fr);
        $response->assertDontSee($productB->name_fr);
    }

    public function test_catalog_can_be_filtered_by_keyword(): void
    {
        $matching = Product::factory()->create(['name_fr' => 'Lit Hospitalier Électrique']);
        $other = Product::factory()->create(['name_fr' => 'Table Opératoire']);

        $response = $this->get(route('catalog.index', ['q' => 'Hospitalier']));

        $response->assertOk();
        $response->assertSee($matching->name_fr);
        $response->assertDontSee($other->name_fr);
    }

    public function test_published_product_page_is_visible(): void
    {
        $product = Product::factory()->create();

        $this->get(route('catalog.show', $product))->assertOk()->assertSee($product->name_fr);
    }

    public function test_draft_product_page_returns_404_publicly(): void
    {
        $product = Product::factory()->draft()->create();

        $this->get(route('catalog.show', $product))->assertNotFound();
    }

    public function test_product_not_confirmed_as_local_stock_is_hidden_publicly(): void
    {
        $product = Product::factory()->create([
            'name_fr' => 'Matériel disponible uniquement sur commande',
            'is_local_stock' => false,
        ]);

        $this->get(route('catalog.index'))
            ->assertOk()
            ->assertDontSee($product->name_fr);

        $this->get(route('catalog.show', $product))->assertNotFound();
    }
}
