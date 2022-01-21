<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    /*Allowing Mass Assignment:
    If you would like to make all of your attributes mass assignable, you may define your model's $guarded property as an empty array.
    https://laravel.com/docs/8.x/eloquent#mass-assignment
    */
    protected $guarded = [];
}
