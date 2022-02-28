<?php

namespace Database\Seeders;

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
        \App\Models\Post::factory(10)->untitled()->create();
        $this->enableForeignKeyChecks();
    }
}
