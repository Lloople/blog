<?php

namespace Tests\Feature;

use App\Interfaces\AboutMeServiceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\FakeAboutMeService;
use Tests\TestCase;

class VisitAboutMeTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function cannot_visit_about_me_page_without_content()
    {
        $this->app->bind(AboutMeServiceInterface::class, function () {
            return new FakeAboutMeService('');
        });

        $response = $this->get('/about-me');

        $response->assertStatus(404);
    }

    /** @test */
    public function can_visit_about_me_page_with_content()
    {
        $this->app->bind(AboutMeServiceInterface::class, function () {
            return new FakeAboutMeService('Fake about me content');
        });

        $response = $this->get('/about-me');

        $response->assertStatus(200);

        $response->assertSee('Fake about me content');
    }

    /** @test */
    public function home_page_doesnt_show_about_me_menu_link()
    {
        $this->app->bind(AboutMeServiceInterface::class, function () {
            return new FakeAboutMeService('');
        });

        $response = $this->get('/');

        $response->assertDontSee('About me');
    }

    /** @test */
    public function home_page_shows_about_me_menu_link()
    {
        $this->app->bind(AboutMeServiceInterface::class, function () {
            return new FakeAboutMeService('Fake about me content');
        });

        $response = $this->get('/');

        $response->assertSee('About me');
    }

}
