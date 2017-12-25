<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Support\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThemeTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function can_disable_all_themes_except_the_current_one()
    {
       $theme = factory(Theme::class)->create(['selected' => true]);

       factory(Theme::class, 9)->create(['selected' => true]);

       $this->assertEquals(10, Theme::where('selected', true)->count());

       Theme::disableExcept($theme);

       $this->assertEquals(1, Theme::where('selected', true)->count());

    }
}