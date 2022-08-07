<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UpdateBlogTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_existing_blog()
    {
        $blogFactory1 = Blog::factory()->create();
        $blogFactory2 = Blog::factory()->make()->toArray();

        $response = $this->actingAs($this->getTestUser())
            ->call('PUT', 'api/blogs/' . $blogFactory1->id, $blogFactory2);

        $response->assertStatus(202)
            ->assertJson([
                "status" => true,
                "data"   => [
                    "id"          => $blogFactory1->id,
                    "title"       => $blogFactory2['title'],
                    "anons"       => $blogFactory2['anons'],
                    "slug"        => $blogFactory2['slug'],
                    "status"      => $blogFactory2['status'],
                    "description" => $blogFactory2['description'],
                ]
            ]);
    }
}
