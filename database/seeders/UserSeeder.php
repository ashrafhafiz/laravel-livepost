<?php

namespace Database\Seeders;

// use Database\Seeders\Traits\DisableForeignKeyChecks;
// use Database\Seeders\Traits\EnableForeignKeyChecks;
// use Database\Seeders\Traits\TruncateTable;
use Database\Seeders\Traits\SeedersSupportTrait;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    // use TruncateTable,
    //     DisableForeignKeyChecks,
    //     EnableForeignKeyChecks;

    use SeedersSupportTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeyChecks();
        $this->truncate('users');
        \App\Models\User::factory(10)->create();
        $this->enableForeignKeyChecks();
    }
}
