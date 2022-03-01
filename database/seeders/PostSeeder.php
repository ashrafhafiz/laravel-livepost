<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Database\Seeders\Traits\SeedersSupportTrait;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use SeedersSupportTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeyChecks();
        $this->truncate('posts');
        // \App\Models\Post::factory(10)->state([
        //     'title' => 'Untitled',
        // ])->create();
        $posts = \App\Models\Post::factory(10)
            // ->has(Comment::factory(3), 'comments')
            ->untitled()
            ->create();

        $posts->each(function (Post $post){
            $post->users()->sync([FactoryHelper::getRandomId(User::class)]);
        });

        $this->enableForeignKeyChecks();
    }
}