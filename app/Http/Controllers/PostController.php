<?php

namespace App\Http\Controllers;

use App\Events\Models\Post\PostCreated;
use App\Exceptions\GeneralJsonException;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

// Laravel's ORM - Eloquent provides an easy API for us to work with database.
// We use the query() method to start a database query,
// get() to retrieve records,
// find() to find by id
// create() to insert record,
// update()to update and
// delete() to delete.

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ResourceCollection
     * @throws GeneralJsonException
     */
    public function index(Request $request)
    {
        // event(new PostCreated(Post::factory()->make()));

        // throw new GeneralJsonException('Error message to be display', 422);
        // throw new GeneralJsonException('Error message to be display');

        // $posts = Post::query()->get();
        // $posts = Post::query()->paginate(10);

        $pageSize = $request->pageSize;
        $posts = Post::query()->paginate($pageSize ?? 20);

        // return new JsonResponse([
        //     'Data' => $posts
        // ]);

        return PostResource::collection($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePostRequest $request
     * @param PostRepository $repository
     * @return PostResource | JsonResponse
     */
    public function store(StorePostRequest $request, PostRepository $repository)
    {
//        $created = DB::transaction(function () use ($request) {
//
//            $created = Post::query()->create([
//                'title' => $request->title,
//                'body' => $request->body,
//            ]);
//            if($userIds = $request->user_ids){
//                $created->users()->sync($userIds);
//            }
//            return $created;
//        });

        // return new JsonResponse([
        //     'Data' => $created
        // ]);

        $created = $repository->create($request->only([
            'title',
            'body',
            'user_ids'
        ]));

        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return PostResource | JsonResponse
     */
    public function show(Post $post)
    {
        // return new JsonResponse([
        //     'Data' => $post
        // ]);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePostRequest $request
     * @param \App\Models\Post $post
     * @param PostRepository $repository
     * @return PostResource | JsonResponse
     */
    public function update(UpdatePostRequest $request, Post $post, PostRepository $repository)
    {
        // $post->update($request->only(['title', 'body']));

//        $updated = $post->update([
//            'title' => $request->title ?? $post->title,
//            'body' => $request->body ?? $post->body,
//        ]);
//
//        if (!$updated) {
//            return new JsonResponse([
//                'Errors' => ['Failed to  update model.']
//            ], 400);
//        }

        // return new JsonResponse([
        //     'Data' => $post
        // ]);

        $post = $repository->update($post, $request->only([
            'title',
            'body',
            'user_ids'
        ]));

        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Post $post, PostRepository $repository)
    {
//        $deleted = $post->forceDelete();
//
//        if (!$deleted) {
//            return new JsonResponse([
//                'Errors' => ['Failed to delete post.']
//            ], 400);
//        }

        $post = $repository->forceDelete($post);

        return new JsonResponse([
            'Data' => 'Post deleted successfully.'
        ]);
    }
}
