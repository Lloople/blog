<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function can_filter_posts_by_published_date()
    {
        factory(Post::class)->create(['published_at' => Carbon::parse('yesterday')]);
        factory(Post::class)->create(['published_at' => Carbon::parse('tomorrow')]);

        $this->assertEquals(1, Post::published()->count());
    }

    /** @test */
    public function can_filter_posts_by_visible()
    {
        factory(Post::class)->create(['visible' => true]);
        factory(Post::class)->create(['visible' => false]);

        $this->assertEquals(1, Post::visible()->count());
    }

    /** @test */
    public function can_filter_posts_by_featured()
    {
        factory(Post::class)->create(['featured' => true]);
        factory(Post::class)->create(['featured' => false]);

        $this->assertEquals(1, Post::featured()->count());
    }

    /** @test */
    public function can_filter_posts_by_tags()
    {
        $post = factory(Post::class)->create();

        factory(Post::class)->create();

        $post->tags()->sync([
            factory(Tag::class)->create([
                'name' => 'First Tag',
                'slug' => 'first-tag'
            ])->id
        ]);

        $this->assertEquals(1, Post::whereHasTag('first-tag')->count());
    }
}
