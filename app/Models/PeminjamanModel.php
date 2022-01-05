<?php
namespace App\Models;

use CodeIgniter\Model;
class PeminjamanModel extends Model
{
    protected $table = "peminjaman";
    protected $primaryKey = "nama_mahasiswa";
    protected $returnType = "object";
    protected $allowedFields = ['nama_mahasiswa', 'nama_buku', 'tanggal_pinjam', 'tanggal_kembali', 'status', 'denda'];
}