<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait SeedersSupportTrait
{
    protected function disableForeignKeyChecks()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }

    protected function truncate($table)
    {
        DB::table($table)->truncate();
    }

    protected function enableForeignKeyChecks()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
