<?php


namespace App\Repositories;


use App\Events\Models\Post\PostCreated;
use App\Events\Models\Post\PostDeleted;
use App\Events\Models\Post\PostUpdated;
use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository
{
    public function create(array $attributes)
    {
        return DB::transaction(function () use ($attributes) {

            $created = Post::query()->create([
                'title' => data_get($attributes, 'title', 'Untitled'),
                'body' => data_get($attributes, 'body'),
            ]);

            // if (!$created) {
            //     throw new GeneralJsonException('Failed to create Post!');
            // }

            if ($userIds = data_get($attributes, 'user_ids')) {
                $created->users()->sync($userIds);
            }

            throw_if(!$created, GeneralJsonException::class, 'Failed to create Post!');

            event(new PostCreated($created));

            return $created;
        });
    }

    /**
     * @param Post $post
     * @param array $attributes
     * @return mixed
     */
    public function update($post, array $attributes)
    {
        return DB::transaction(function () use ($post, $attributes) {

            $updated = $post->update([
                'title' => data_get($attributes, 'title', $post->title),
                'body' => data_get($attributes, 'body', $post->body),
            ]);

            // if(!$updated) {
            //     throw new \Exception('Failed to update post!');
            // }

            if ($userIds = data_get($attributes, 'user_ids')) {
                $post->users()->sync($userIds);
            }

            throw_if(!$updated, GeneralJsonException::class, 'Failed to update Post!');

            event(new PostUpdated($post));

            return $post;
        });
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function forceDelete($post)
    {
        return DB::transaction(function () use($post) {
            $deleted = $post->forceDelete();

            // if (!$deleted) {
            //     throw new \Exception('Failed to delete post!');
            // }

            throw_if(!$deleted, GeneralJsonException::class, 'Failed to delete Post!');

            event(new PostDeleted($post));

            return $deleted;
        });
    }
}
