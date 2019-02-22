<?php

namespace App\Http\Controllers;

use App\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function proximity(Request $request)
    {
        if ($request->isMethod('post') && $request->has('geo')) {
            $rq = $request->all();

            $users = DB::table('users_address')
                ->whereBetween('lat', [floor($rq["geo"]['lat']), ceil($rq["geo"]['lat'])])
                ->whereBetween('lng', [floor($rq["geo"]['lng']), ceil($rq["geo"]['lng'])])
                ->get();

            $find_array = [];
            foreach ($users as $user) {
                $find_array[] = $user->id;
            }

            $users_posts = DB::table('users_posts')
                ->whereIn("customUser", $find_array)
                ->get();


            return response(["data" => $users_posts], 200);
        }
    }
}
