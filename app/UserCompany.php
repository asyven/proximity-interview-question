<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class UserCompany extends Eloquent
{
    protected $table = "users_companies";
    protected $hidden = ["updated_at","created_at"];
}
