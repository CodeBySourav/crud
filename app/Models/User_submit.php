<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_submit extends Model
{
    use HasFactory;
    protected $table="table_user";
    protected $primarKey="id";
}
