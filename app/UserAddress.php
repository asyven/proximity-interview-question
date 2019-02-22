<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = "users_address";
    protected $hidden = ["updated_at","created_at"];
}
