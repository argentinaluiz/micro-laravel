<?php

namespace Tests\Feature\Models;

use App\Models\Category;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testList()
    {
        factory(Category::class, 1)->create();
        $categories = Category::all();
        $this->assertCount(1, $categories);
        $categoriesKeys = array_keys($categories->first()->getAttributes());
        $attributes = [
            'id',
            'name',
            'description',
            'is_active',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
        $this->assertEqualsCanonicalizing($attributes, $categoriesKeys);
    }

    public function testCreate()
    {
        $category = Category::create(['name' => 'test']);
        $category->refresh();
        $this->assertEquals(36, strlen($category->id));
        $this->assertEquals('test', $category->name);
        $this->assertNull($category->description);
        $this->assertTrue($category->is_active);

        $category = Category::create([
            'name' => 'test',
            'description' => null,
        ]);
        $this->assertNull($category->description);

        $category = Category::create([
            'name' => 'test',
            'description' => 'test_description',
        ]);
        $this->assertEquals('test_description', $category->description);

        $category = Category::create([
            'name' => 'test',
            'is_active' => false,
        ]);
        $this->assertFalse($category->is_active);

        $category = Category::create([
            'name' => 'test',
            'is_active' => true,
        ]);
        $this->assertTrue($category->is_active);
    }

    public function testUpdate()
    {
        $category = factory(Category::class)->create([
            'description' => 'test_description',
            'is_active' => false,
        ]);

        $data = [
            'name' => 'new_name',
            'description' => 'new_description',
            'is_active' => true,
        ];
        $category->update($data);

        foreach ($data as $key => $value) {
            $this->assertEquals($value, $category->{$key});
        }
    }

    public function testDelete()
    {
        $category = factory(Category::class)->create();
        $category->delete();
        $this->assertNull(Category::find($category->id));

        $category->restore();
        $this->assertNotNull(Category::find($category->id));
    }
}
