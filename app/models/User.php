<?php
namespace Atomine\app\models;
use Atomine\core\Database;

class User extends Database
{
    public $table_name  = 'users';
    public $table_id    = 'id_users';
}