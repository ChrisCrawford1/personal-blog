<?php

namespace Tests\Feature;

use Tests\TestCase;

class PagesTest extends TestCase
{
    /** @test */
    public function it_can_load_the_about_page()
    {
        $response = $this->get(route('pages.about'));
        $response->assertSuccessful();
    }
}
