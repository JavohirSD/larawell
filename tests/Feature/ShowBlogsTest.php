<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\Enums\BlogStatus;
use Tests\TestCase;

class ShowBlogsTest extends TestCase
{
    /**
     * Getting single blog with api
     *
     * @return void
     */
    public function test_get_single_existing_blog()
    {
        $blog = Blog::where('status', BlogStatus::ACTIVE->value)
            ->inRandomOrder()
            ->first();

        $this->actingAs($this->getTestUser())
            ->json('GET', 'api/blogs/' . $blog->id, ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data"   => $blog->toArray()
            ]);
    }


    public function test_get_single_non_existing_blog()
    {
        $max_id = (Blog::max('id') + 1);

        $this->actingAs($this->getTestUser())
            ->json('GET', 'api/blogs/' . ($max_id), ['Accept' => 'application/json'])
            ->assertStatus(404)
            ->assertJson([
                "status" => false,
                "errors" => __("Blog with this ID not found")
            ]);
    }

    public function test_get_all_blogs()
    {
        $blog = Blog::find(1);

        $this->actingAs($this->getTestUser())
            ->json('GET', 'api/blogs?page=1&limit=1', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                "status" => true,
                "data"   => [
                    "current_page" => 1,
                    "per_page"     => 1,
                    "data"         => [
                        [
                            "id"          => $blog->id,
                            "title"       => $blog->title,
                            "anons"       => $blog->anons,
                            "description" => $blog->description
                        ]
                    ]
                ]
            ]);
    }
}
