<?php

namespace Tests\Feature;

use App\Models\Post;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitHomeTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function can_visit_home_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function can_see_featured_posts_in_home_page()
    {
        factory(Post::class)->create([
            'featured' => true,
            'title' => 'Dummy Featured Post'
        ]);

        $response = $this->get('/');

        $response->assertSee('class="featured-post"');

        $response->assertSee('Dummy Featured Post');
    }
}
