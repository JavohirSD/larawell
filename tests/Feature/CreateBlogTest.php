<?php

namespace Tests\Feature;

use App\Models\Blog;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CreateBlogTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_a_new_blog()
    {
        $blogFactory = Blog::factory()->make()->toArray();

        $response = $this->actingAs($this->getTestUser())
            ->call('POST', 'api/blogs', $blogFactory);

        $response->assertStatus(201)
            ->assertJson([
                "status" => true,
                "data"   => $blogFactory
            ]);
    }
}
