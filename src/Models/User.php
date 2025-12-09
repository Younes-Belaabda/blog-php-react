<?php
namespace App\Models;

use App\Core\Database;
use App\Core\BaseModel;
use PDO;

class User extends BaseModel {

    protected static string $table = 'User';
    protected static array $fillable = ['name', 'email'];

}
