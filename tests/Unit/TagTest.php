<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function can_find_or_create_tags_by_name()
    {
        $firstTagCreated = Tag::findOrCreateByName('First tag');

        $firstTagFetched = Tag::findOrCreateByName('First tag');

        $this->assertEquals(1, Tag::count());

        $this->assertEquals($firstTagCreated->id, $firstTagFetched->id);
    }
}