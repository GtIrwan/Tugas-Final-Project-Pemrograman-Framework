<?php
namespace App\Models;

use CodeIgniter\Model;
class BukuModel extends Model
{
    protected $table = "buku";
    protected $primaryKey = "no_buku";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['no_buku', 'nama_buku', 'penulis', 'penerbit', 'cover_buku'];
}