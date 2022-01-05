<?php
namespace App\Models;

use CodeIgniter\Model;
class UsersModel extends Model
{
    protected $table = "userslogin";
    protected $primaryKey = "username";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'name'];
}