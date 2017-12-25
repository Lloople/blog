<?php

namespace Tests\Feature\Backend;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TagsResourceTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function can_delete_tag()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $tag = factory(Tag::class)->create();

        $post = factory(Post::class)->create();

        $tag->posts()->sync([$post->id]);

        $this->assertNotEmpty($post->tags);

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->delete(route('backend.tags.destroy', $tag));

        $response->assertJson(['result' => true]);

        $post->refresh();

        $this->assertEmpty($post->tags);
    }
}