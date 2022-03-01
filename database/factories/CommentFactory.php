<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Database\Factories\Helpers\FactoryHelper;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $postId = FactoryHelper::getRandomId(Post::class);
        $userId = FactoryHelper::getRandomId(User::class);
        return [
            'body' => [],
            'post_id' => $postId,
            'user_id' => $userId,
        ];
    }
}
