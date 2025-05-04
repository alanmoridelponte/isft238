<?php
namespace Database\Factories;

use App\Enums\PostStatus;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    protected $model = Post::class;

    public function definition(): array {
        return [
            'created_by'       => \App\Models\User::factory(),
            'category_id'      => \App\Models\Category::factory(),
            'status'           => fake()->randomElement(array_column(PostStatus::cases(), 'value')),
            'title'            => fake()->sentence(),
            'slug'             => fake()->unique()->slug(3),
            'excerpt'          => fake()->sentence(),
            'banner'           => fake()->optional()->imageUrl(),
            'banner_video_url' => fake()->optional()->url(),
            'body'             => fake()->paragraphs(5, true),
        ];
    }

    // Estado opcional para posts archivados
    public function archived(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => PostStatus::ARCHIVED->value,
        ]);
    }

    // Estado opcional para posts publicados
    public function published(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => PostStatus::PUBLISHED->value,
        ]);
    }

    // Estado opcional para posts en borrador
    public function draft(): static
    {
        return $this->state(fn(array $attributes) => [
            'status' => PostStatus::DRAFT->value,
        ]);
    }
}
