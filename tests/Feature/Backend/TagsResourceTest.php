<?php

namespace Tests\Feature\Backend;

use App\Models\Tag;
use App\Models\Post;
use Tests\BackendTestCase;
use App\Http\Middleware\VerifyCsrfToken;

class TagsResourceTest extends BackendTestCase
{
    /** @test */
    public function can_delete_tag()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $tag = factory(Tag::class)->create();

        $post = factory(Post::class)->create();

        $tag->posts()->sync([$post->id]);

        $this->assertNotEmpty($post->tags);

        $response = $this->actingAs($this->user)->delete(route('backend.tags.destroy', $tag));

        $response->assertJson(['result' => true]);

        $post->refresh();

        $this->assertEmpty($post->tags);
    }
}
