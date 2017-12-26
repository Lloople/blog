<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\Theme;
use Carbon\Carbon;
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

    /** @test */
    public function posts_list_only_show_published_and_visible_posts()
    {
        factory(Post::class)->create([
            'title' => 'Published Post',
            'visible' => true,
            'published_at' => Carbon::yesterday()
        ]);

        factory(Post::class)->create([
            'title' => 'Unpublished Post',
            'visible' => true,
            'published_at' => Carbon::tomorrow()
        ]);

        factory(Post::class)->create([
            'title' => 'Unactive Post',
            'visible' => false,
            'published_at' => Carbon::yesterday()
        ]);

        $response = $this->get('/');

        $response->assertSee('Published Post');

        $response->assertDontSee('Unpublished Post');

        $response->assertDontSee('Unactive Post');
    }
}
