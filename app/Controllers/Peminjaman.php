<?php
namespace App\Controllers;

use App\Models\PeminjamanModel;
class Peminjaman extends BaseController
{
    protected $peminjaman;
    function __construct()
    {
        $this->peminjaman = new PeminjamanModel();
    }
    public function index(){
        $data['pageTitle'] = 'Peminjaman';
        $data['peminjaman'] = $this->peminjaman->findAll();
        return view('dashboard/peminjaman', $data);
    }
    // ---------------------------------------------------------------------------------------------------------------------------------
    public function create()
    {
        $data['pageTitle'] = 'Input Data Peminjaman';return view('dashboard/peminjaman_create', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'nama_mahasiswa' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama_buku' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal_pinjam' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'tanggal_kembali' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'denda' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $this->peminjaman->insert([
            'nama_mahasiswa' => $this->request->getVar('nama_mahasiswa'),
            'nama_buku' => $this->request->getVar('nama_buku'),
            'tanggal_pinjam' => $this->request->getVar('tanggal_pinjam'),
            'tanggal_kembali' => $this->request->getVar('tanggal_kembali'),
            'status' => $this->request->getVar('status'),
            'denda' => $this->request->getVar('denda'),
        ]);
        session()->setFlashdata('message', 'Tambah Data Peminjaman Berhasil');
        return redirect()->to('/peminjaman');
    }
    // ---------------------------------------------------------------------------------------------------------------------------------
    function edit($nama_mahasiswa)
    {
        $dataPeminjaman = $this->peminjaman->find($nama_mahasiswa);
        if (empty($dataPeminjaman)) {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException('Data Peminjaman Tidak ditemukan !');
        }
        $data['pageTitle'] = 'Edit Data Peminjaman';
        $data['peminjaman'] = $dataPeminjaman;
        return view('dashboard/peminjaman_edit', $data);
    }
    // ---------------------------------------------------------------------------------------------------------------------------------
    public function update($nama_mahasiswa)
    {
    if (!$this->validate([
        'status' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi'
            ]
        ],
        'denda' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi'
            ]
        ],
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back();
    }
    $this->peminjaman->update($nama_mahasiswa, [
        'status' => $this->request->getVar('status'),
        'denda' => $this->request->getVar('denda'),
    ]);
    session()->setFlashdata('message', 'Update Data Peminjaman Berhasil');
    return redirect()->to('/peminjaman');
    }
    // ---------------------------------------------------------------------------------------------------------------------------------
    function delete($nama_mahasiswa)
    {
        $dataPeminjaman = $this->peminjaman->find($nama_mahasiswa);
        if (empty($dataPeminjaman)) {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $this->peminjaman->delete($nama_mahasiswa);
        session()->setFlashdata('message', 'Delete Data Peminjaman Berhasil');
        return redirect()->to('/peminjaman');
    }    
}