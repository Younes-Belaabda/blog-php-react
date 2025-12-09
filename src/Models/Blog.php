<?php
namespace App\Models;

use App\Core\Database;
use App\Core\BaseModel;
use PDO;

class Blog extends BaseModel {

    protected static string $table = 'Blog';
    protected static array $fillable = ['title', 'content'];

}
