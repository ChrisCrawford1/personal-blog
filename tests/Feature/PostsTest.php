<?php

namespace Tests\Feature;

use App\User;
use Canvas\Post;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var Model
     */
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = factory(User::class)->create();
    }

    /** @test */
    public function it_can_see_a_warning_if_there_are_no_posts_available()
    {
        $response = $this->get('/');
        $response->assertSee('No Posts');
        $response->assertSee('No posts could be found, please check back later!');
    }

    /** @test */
    public function it_wont_see_an_error_if_there_are_posts_present()
    {
        $post = factory(Post::class, 1)->create(
            [
                'user_id' => $this->user->id
            ]
        );

        $response = $this->get('/');
        $response->assertDontSee('No Posts');
        $response->assertSee($this->user->name);
        $response->assertSee($post->first()->title);
    }

    /** @test */
    public function it_can_see_multiple_posts()
    {
        $posts = factory(Post::class,5)->create(
            [
                'user_id' => $this->user->id
            ]
        );

        $response = $this->get('/');

        foreach ($posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->summary);
        }
    }
}
