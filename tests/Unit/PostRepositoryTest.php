<?php

namespace Tests\Unit;

use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class PostRepositoryTest extends TestCase
{
//    /**
//     * A basic unit test example.
//     *
//     * @return void
//     */
//    public function test_example()
//    {
//        $this->assertTrue(true);
//    }

    public function test_create()
    {
        // 1. Define the goal
        // test if create() will actually create a record in DB

        // 2. Replicate the env / restriction
        $repository = $this->app->make(PostRepository::class);

        // 3. Define the source of truth
        $payload = [
            'title' => 'why do we use it?',
            'body' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).',
            "user_ids" => [4,5]
        ];

        // 4. Compare the results
        $result = $repository->create($payload);

        $this->assertSame($payload['title'], $result->title, 'Post created does not have the same title value.');
    }

    public function test_update()
    {
        // Goal: make sure we can update a post using update method

        // env
        $repository = $this->app->make(PostRepository::class);

        // $last = DB::table('posts')->orderBy('id', 'DESC')->first();
        // $last = DB::table('posts')->latest()->first();
        $last = Post::latest()->first();

        // Source of truth
        $payload = [
          'title' => 'new title'
        ];

        // Compare
        $updated = $repository->update($last, $payload);
        $this->assertSame($payload['title'], $updated->title, 'Post updated does not have the same title value.');
    }

    public function test_delete()
    {
        // Goal: make sure we can delete a post using update method

        // env
        $repository = $this->app->make(PostRepository::class);

        $last = Post::latest()->first();

        $deleted = $repository->forceDelete($last);

        $found = Post::query()->find($last->id);

        // Compare
        $this->assertSame(null, $found, 'Post is not deleted.');
    }

    public function test_delete_will_throw_exception_when_delete_post_that_doesnt_exist()
    {
        // env
        $repository = $this->app->make(PostRepository::class);
        $dummy = Post::factory(1)->make()->first();

        $this->expectException(GeneralJsonException::class);
        $deleted = $repository->forceDelete($dummy);
    }

}
