<?php

namespace Tests\Feature;

use App\Settings;
use App\User;
use Canvas\Events\PostViewed;
use Canvas\Post;
use Canvas\Tag;
use Canvas\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

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
        Settings::create(['projects_enabled' => 1]);
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
                'user_id' => $this->user->id,
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
        $posts = factory(Post::class, 5)->create(
            [
                'user_id' => $this->user->id,
            ]
        );

        $response = $this->get('/');

        foreach ($posts as $post) {
            $response->assertSee($post->title);
            $response->assertSee($post->summary);
        }
    }

    /** @test */
    public function it_can_filter_posts_based_on_a_tag()
    {
        $laravelTag = factory(Tag::class)->create(
            [
                'user_id' => $this->user->id,
                'slug'    => 'laravel',
                'name'    => 'laravel',
            ]
        );

        $testingTag = factory(Tag::class)->create(
            [
                'user_id' => $this->user->id,
                'slug'    => 'testing',
                'name'    => 'testing',
            ]
        );

        $laravelPost = factory(Post::class)->create(
            [
                'user_id' => $this->user->id,
                'title'   => 'Laravel Tag Post',
                'slug'    => 'laravel-tag-post',
            ]
        );

        $laravelPost->tags()->save($laravelTag);

        $testingPost = factory(Post::class)->create(
            [
                'user_id' => $this->user->id,
                'title'   => 'Testing Tag Post',
                'slug'    => 'testing-tag-post',
            ]
        );

        $testingPost->tags()->save($testingTag);

        $response = $this->get('/laravel');
        $response->assertOk();
        $response->assertSee('Laravel Tag Post');
        $response->assertDontSee('Testing Tag Post');

        $response = $this->get('/testing');
        $response->assertOk();
        $response->assertDontSee('Laravel Tag Post');
        $response->assertSee('Testing Tag Post');
    }

    /** @test */
    public function it_can_view_a_post_and_record_a_visit_and_view()
    {
        Event::fake([PostViewed::class]);

        $topic = factory(Topic::class)->create(
            [
                'user_id' => $this->user->id,
            ]
        );
        $post = factory(Post::class)->create(
            [
                'user_id' => $this->user->id,
            ]
        );

        $post->topic()->save($topic);

        $response = $this->get('/posts/'.$post->slug);
        $response->assertOk();
        $response->assertSee($post->title);

        Event::assertDispatched(PostViewed::class);
    }

    /** @test */
    public function it_wont_record_a_view_or_visit_for_the_logged_in_user()
    {
        $this->actingAs($this->user);
        Event::fake([PostViewed::class]);

        $topic = factory(Topic::class)->create(
            [
                'user_id' => $this->user->id,
            ]
        );
        $post = factory(Post::class)->create(
            [
                'user_id' => $this->user->id,
            ]
        );

        $post->topic()->save($topic);

        $response = $this->get('/posts/'.$post->slug);
        $response->assertOk();
        $response->assertSee($post->title);

        Event::assertNotDispatched(PostViewed::class);
    }
}
