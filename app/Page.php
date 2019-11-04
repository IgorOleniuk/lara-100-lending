<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PagesAddController;

class Page extends Model
{
     //protected $table = 'pages';

     protected $fillable = ['name', 'text', 'alias', 'images'];
}
