<?php

namespace Tests\Feature;

use App\Models\Blog;
use Tests\TestCase;

class DeleteBlogTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_delete_existing_blog()
    {
        $blogFactory = Blog::factory()->create();

        $this->actingAs($this->getTestUser())
            ->json('DELETE', 'api/blogs/' . $blogFactory->id, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data"   => 1
            ]);
    }


    public function test_delete_non_existing_blog()
    {
        $max_id = (Blog::max('id') + 1);

        $this->actingAs($this->getTestUser())
            ->json('DELETE', 'api/blogs/' . $max_id, ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJson([
                "status" => false
            ]);
    }
}
