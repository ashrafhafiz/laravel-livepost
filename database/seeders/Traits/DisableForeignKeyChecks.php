<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait DisableForeignKeyChecks
{
    protected function disableForeignKeyChecks()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    }
}
