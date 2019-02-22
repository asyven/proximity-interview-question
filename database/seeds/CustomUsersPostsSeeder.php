<?php

use App\UserPost;
use Illuminate\Database\Seeder;

class CustomUsersPostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function run()
    {
        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/posts');

        $custom_users_posts =  json_decode($response->getBody()->getContents(),true);

        foreach ($custom_users_posts as $custom_users_post) {
            $custom_user_address = new UserPost([
                'customUser' => $custom_users_post["userId"],
                'title' => $custom_users_post["title"],
                'body' => $custom_users_post["body"],
            ]);
            $custom_user_address->save();
        }
        echo printf("Seeded %s posts", count($custom_users_posts) );

    }
}
