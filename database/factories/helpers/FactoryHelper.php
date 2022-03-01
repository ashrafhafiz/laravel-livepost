<?php
namespace Database\Factories\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class FactoryHelper {
    /**
     * This function return an id for the database
     * @param string | HasFactory $model
     */

     public static function getRandomId(string $model) {
         // get model count
        $count = $model::query()->count();
        // if model count is 0
        // create a new record and get the record id
        if ($count == 0) {
            return $model::factory()->create()->id;
        } else {
            // generate a random number between 1 and the model count
            return rand(1, $count);
        }
     }
}
