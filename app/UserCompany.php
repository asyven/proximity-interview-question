<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    protected $table = "users_companies";
    protected $hidden = ["updated_at","created_at"];
}
