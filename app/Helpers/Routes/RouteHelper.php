<?php

namespace App\Helpers\Routes;

class RouteHelper
{
    public static function includeRouteFiles($path)
    {
        // Iterator is an object that allows us to iterate through a series of items.
        // The directory iterator can help us to automatically load our routes in a folder.
        //
        // Iterate through the v1 folder recursively
        $dirIterator = new \RecursiveDirectoryIterator($path);

        /** @var \RecursiveDirectoryIterator | \RecursiveIteratorIterator $it */
        $it = new \RecursiveIteratorIterator($dirIterator);

        // require the file in each iteration
        while ($it->valid()) {

            if (! $it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() == 'php') {

                // require $it->current()->getPathname();
                require $it->key();
            }

            $it->next();
        }
    }
}
