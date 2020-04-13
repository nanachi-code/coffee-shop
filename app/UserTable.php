<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTable extends Model
{
     protected $table = 'user_table';

       protected $fillable = ['name','email','telephone',
           'feedback'];
}
