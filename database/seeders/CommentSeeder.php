<?php

namespace Database\Seeders;

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
        \App\Models\Comment::factory(10)->create();
        $this->enableForeignKeyChecks();
    }
}
