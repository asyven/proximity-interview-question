<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPost extends Model
{
    protected $table = "users_posts";
    protected $hidden = ["updated_at","created_at"];
}
