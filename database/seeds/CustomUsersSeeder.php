<?php

use App\UserAddress;
use App\UserCompany;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomUsersSeeder extends Seeder
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
        $response = $client->request('GET', 'https://jsonplaceholder.typicode.com/users');

       $custom_users =  json_decode($response->getBody()->getContents(),true);

        foreach ($custom_users as $custom_user) {

            if(!isset($custom_user["address"]) or !isset($custom_user["company"])){
                return;
            }

            $custom_user_address = new UserAddress([
                'street' => $custom_user["address"]["street"],
                'suite' => $custom_user["address"]["suite"],
                'city' => $custom_user["address"]["city"],
                'zipcode' => $custom_user["address"]["zipcode"],
                'lat' => $custom_user["address"]["geo"]["lat"],
                'lng' => $custom_user["address"]["geo"]["lng"],
            ]);
            $custom_user_address->save();

            $custom_user_company = new UserCompany([
                'name' => $custom_user["company"]["name"],
                'catchPhrase' => $custom_user["company"]["catchPhrase"],
                'bs' => $custom_user["company"]["bs"],
            ]);
            $custom_user_company->save();

            $custom_user_address = new \App\CustomUser([
                'name' => $custom_user["name"],
                'username' => $custom_user["username"],
                'email' => $custom_user["email"],
                'phone' => $custom_user["phone"],
                'website' => $custom_user["website"],

                'password' => bcrypt("bla-bla"),

                'address' => $custom_user_address->id ?? null,
                'company' => $custom_user_company->id ?? null,
            ]);
            $custom_user_address->save();

        }
    }
}
