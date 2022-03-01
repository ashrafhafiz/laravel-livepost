<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Seeders\Traits\SeedersSupportTrait;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
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
        $this->truncate('comments');
        \App\Models\Comment::factory(10)
            // ->for(Post::factory(1), 'post')
            ->create();
        $this->enableForeignKeyChecks();
    }
}
