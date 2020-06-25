<?php

namespace Tests\Feature;

use App\Settings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    private $settings;

    protected function setUp(): void
    {
        parent::setUp();
        $this->settings = Settings::create(['projects_enabled' => 1]);
    }

    /** @test */
    public function it_can_load_the_about_page()
    {
        $response = $this->get(route('pages.about'));
        $response->assertSuccessful();
    }

    /** @test */
    public function it_can_load_the_projects_page_if_its_enabled()
    {
        $response = $this->get(route('pages.projects'));
        $response->assertOk();
        $response->assertSee('Projects');
    }

    /** @test */
    public function it_will_redirect_to_main_posts_page_if_projects_are_disabled()
    {
        $this->settings->update(['projects_enabled' => 0]);
        $response = $this->get(route('pages.projects'));
        $response->assertRedirect(route('posts.index'));
    }
}
