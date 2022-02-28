<?php

namespace Database\Seeders\Traits;

use Illuminate\Support\Facades\DB;

trait EnableForeignKeyChecks
{
    protected function enableForeignKeyChecks()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
