<?php


namespace App\Repositories;


abstract class BaseRepository
{
    // Repository is a class that takes care of model operations.
    // Repository manages model operations in one place,
    // and improves the maintainability of our app.
    //
    abstract public function create(array $attributes);

    abstract public function update($model, array $attributes);

    abstract public function forceDelete($model);
}
