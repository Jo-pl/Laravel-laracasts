<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private const lorem = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

      $user = User::factory()->create([
         'name' => 'John Doe'
      ]);

      Post::factory(12)->create([
         'user_id' => $user->id
      ]);

      $temp_post_id = array(1,2,3);
      /*Comment::factory(3)->create([
         'user_id' => $user->id,
         'post_id' => current($temp_post_id)
      ]);
      Comment::factory(3)->create([
         'user_id' => $user->id,
         'post_id' => next($temp_post_id)
      ]);
      Comment::factory(3)->create([
         'user_id' => $user->id,
         'post_id' => next($temp_post_id)
      ]);
      */

      //  User::truncate();
      //  Category::truncate();
      //  Post::truncate();
      //   //Users
      //    $user = User::factory()->create();

      //    //Categories
      //    $personal = Category::create([
      //       'name' => 'Personal',
      //       'slug' => 'personal'
      //    ]);
      //    $family = Category::create([
      //       'name' => 'Family',
      //       'slug' => 'family'
      //    ]);
      //    $work = Category::create([
      //       'name' => 'Work',
      //       'slug' => 'work'
      //    ]);

      //    //Posts
      //    $post1 = Post::create([
      //       'user_id' => $user->id,
      //       'category_id' => $personal->id,
      //       'title' => 'My personal post',
      //       'slug' => 'my-personal-post',
      //       'excerpt' => 'Lorem ipsum dolor sit amet',
      //       'body' => $this::lorem
      //    ]);
      //    $post2 = Post::create([
      //       'user_id' => $user->id,
      //       'category_id' => $family->id,
      //       'title' => 'My family post',
      //       'slug' => 'my-family-post',
      //       'excerpt' => 'Lorem ipsum dolor sit amet',
      //       'body' => $this::lorem
      //    ]);
      //    $post3 = Post::create([
      //       'user_id' => $user->id,
      //       'category_id' => $work->id,
      //       'title' => 'My work post',
      //       'slug' => 'my-work-post',
      //       'excerpt' => 'Lorem ipsum dolor sit amet',
      //       'body' => $this::lorem
      //    ]);
    }
}
