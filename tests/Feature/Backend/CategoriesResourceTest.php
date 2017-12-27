<?php

namespace Tests\Feature\Backend;

use App\Http\Middleware\VerifyCsrfToken;
use App\Models\Post;
use Tests\BackendTestCase;

class CategoriesResourceTest extends BackendTestCase
{

    /** @test */
    public function cannot_delete_a_category_with_associated_posts()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $post = factory(Post::class)->create();

        $category = $post->category;

        $this->actingAs($this->user)->delete(route('backend.categories.destroy', $category));

        $this->assertEquals('error', collect(session('notifications'))->first()->getType());

        $post->delete();

        $this->actingAs($this->user)->delete(route('backend.categories.destroy', $category));

        $this->assertEquals('success', collect(session('notifications'))->first()->getType());

    }

}