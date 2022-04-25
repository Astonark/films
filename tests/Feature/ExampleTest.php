<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_get_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_named_route() {
        $response = $this->get('films');

        $response->assertStatus(200);
    }

    public function test_create_category() {
        $totalCategory = DB::table('categories')->count();
        $expectedTotal = $totalCategory + 1;
        $category = Category::create(['name' => 'catégorie test uniataire']);
        $this->assertEquals($expectedTotal, Category::count());
        return $category->id;
    }

    public function test_edit_category() {
        $category = Category::find(22);
        $category->update(['name' => 'modification du nom de la catégorie']);
        $categoryName = $category->name;
        $this->assertEquals('modification du nom de la catégorie', $categoryName);
    }

    public function test_delete_category() {
        $category = Category::find(22);
        $category->delete();
        $this->assertDatabaseMissing('categories', [
            'id' => '22'
        ]);
    }
}
