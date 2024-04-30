<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'ID_User';

    protected $fillable = ['ID_RW','nama','username','password','level'];
}
