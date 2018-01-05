<?php

namespace Tests\Unit;

use App\Models\Tag;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Carbon;
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
                'slug' => 'first-tag',
            ])->id,
        ]);

        $this->assertEquals(1, Post::whereHasTag('first-tag')->count());
    }

    /** @test */
    public function can_filter_posts_by_content()
    {
        factory(Post::class)->create([
            'title' => 'Post title',
            'body' => 'Post body content',
            'published_at' => '2018-09-09 12:12:12',
        ]);

        $this->assertEquals(1, Post::searchLike('title')->count());
        $this->assertEquals(1, Post::searchLike('body content')->count());
        $this->assertEquals(1, Post::searchLike('2018-09')->count());
    }

    /** @test */
    public function can_filter_posts_by_tags_names()
    {
        $post = factory(Post::class)->create();

        $post->tags()->sync([
            factory(Tag::class)->create([
                'name' => 'Tag name',
            ])->id,
        ]);

        $this->assertEquals(1, Post::searchLike('Tag name')->count());
        $this->assertEquals(0, Post::searchLike('No tag')->count());
    }

    /** @test */
    public function can_filter_posts_by_categories_names()
    {
        factory(Post::class)->create([
            'category_id' => factory(Category::class)->create([
                'name' => 'Category name',
            ]),
        ]);

        $this->assertEquals(1, Post::searchLike('Category name')->count());
        $this->assertEquals(0, Post::searchLike('No category')->count());
    }

    /** @test */
    public function can_sync_new_tags()
    {
        $post = factory(Post::class)->create();

        $this->assertEquals(0, Tag::count());

        $post->syncTags('first, second');

        $this->assertDatabaseHas('tags', ['name' => 'first']);
        $this->assertDatabaseHas('tags', ['name' => 'second']);

        $this->assertEquals(2, $post->tags()->count());
    }
}
