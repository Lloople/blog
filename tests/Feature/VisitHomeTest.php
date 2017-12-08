<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Theme;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VisitHomeTest extends TestCase
{

    use RefreshDatabase;

    protected function setUp()
    {
        parent::setUp();

        factory(Theme::class)->create();
    }

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

        $response->assertSee('<h3 class="title text-black">Featured Posts</h3>');

        $response->assertSee('Dummy Featured Post');
    }
}
