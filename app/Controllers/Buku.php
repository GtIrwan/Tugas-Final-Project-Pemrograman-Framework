<?php
namespace App\Controllers;

use App\Models\BukuModel;
class Buku extends BaseController
{
    protected $buku;
    function __construct()
    {
        $this->buku = new BukuModel();
    }
    public function index(){
        $data['pageTitle'] = 'Buku';
        $data['buku'] = $this->buku->findAll();
        return view('dashboard/buku', $data);
    }
    // --------------------------------------------------------------------------------------------------------------------------------
    public function create()
    {
        $data['pageTitle'] = 'Input Data Buku';return view('dashboard/buku_create', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'no_buku' => [
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
            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'cover_buku' => [
                'rules' =>
                'mime_in[cover_buku,image/jpg,image/jpeg,image/gif,image/png]|max_size[cover_buku,1024]',
                'errors' => [
                    'uploaded' => 'harus ada file yang diupload',
                    'mime_in' => 'file extention harus berupa jpg, jpeg, gif, png',
                    'max_size' => 'ukuran file maksimal 1 mb'
                ]
            ],
        ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back()->withInput();
        }

        $filefoto = $this->request->getFile('cover_buku');
        $namaFilefoto = $filefoto->getRandomName();
        $filefoto->move('img', $namaFilefoto);

        $this->buku->insert([
        'no_buku' => $this->request->getVar('no_buku'),
        'nama_buku' => $this->request->getVar('nama_buku'),
        'penulis' => $this->request->getVar('penulis'),
        'penerbit' => $this->request->getVar('penerbit'),
        'cover_buku' => $namaFilefoto
        ]);
        session()->setFlashdata('message', 'Tambah Data Buku Berhasil');
        return redirect()->to('/buku');
    }
    // --------------------------------------------------------------------------------------------------------------------------------
    function edit($no_buku)
    {
        $dataBuku = $this->buku->find($no_buku);
        if (empty($dataBuku)) {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException('Data Buku Tidak ditemukan !');
        }
        $data['pageTitle'] = 'Edit Data Buku';
        $data['buku'] = $dataBuku;
        return view('dashboard/buku_edit', $data);
    }
    // --------------------------------------------------------------------------------------------------------------------------------
    public function update($no_buku)
    {
    if (!$this->validate([
        'no_buku' => [
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
        'penulis' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi'
            ]
        ],
        'penerbit' => [
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi'
            ]
        ],
        'cover_buku' => [
            'rules' =>
            'mime_in[cover_buku,image/jpg,image/jpeg,image/gif,image/png]|max_size[cover_buku,1024]',
            'errors' => [
                'uploaded' => 'harus ada file yang diupload',
                'mime_in' => 'file extention harus berupa jpg, jpeg, gif, png',
                'max_size' => 'ukuran file maksimal 1 mb'
            ]
        ],
    ])) {
        session()->setFlashdata('error', $this->validator->listErrors());
        return redirect()->back();
    }
    //ambil nama fotolama dari variabel tipe hidden
    $filefotolama = $this->request->getVar('cover_buku_lama');
    //cek data file foto
    $filefoto = $this->request->getFile('cover_buku');//jika file kosong jalankan perintah mengambil data nama file lama
    if ($filefoto->getError() == 4) {
        $namaFilefoto = $this->request->getVar('cover_buku_lama');
    } else {
        // jika tidak hapus file foto lama dan ambil data file foto baru
        $path = '../public/img/';
        @unlink($path . $filefotolama);
        //generate nama file random
        $namaFilefoto = $filefoto->getRandomName();
        //pindahkan gambar
        $filefoto->move('img', $namaFilefoto);
    }
    $this->buku->update($no_buku, [
        'no_buku' => $this->request->getVar('no_buku'),
        'nama_buku' => $this->request->getVar('nama_buku'),
        'penulis' => $this->request->getVar('penulis'),
        'penerbit' => $this->request->getVar('penerbit'),
        'cover_buku' => $namaFilefoto
    ]);
    session()->setFlashdata('message', 'Update Data Buku Berhasil');
    return redirect()->to('/buku');
    }
    // --------------------------------------------------------------------------------------------------------------------------------
    function delete($no_buku)
    {
        $dataBuku = $this->buku->find($no_buku);
        if (empty($dataBuku)) {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException('Data Buku Tidak ditemukan !');
        }
        $this->buku->delete($no_buku);
        //hapus file image dari folder public$filefoto = $dataMahasiswa->foto;
        $path = '../public/img/';
        @unlink($path . $filefoto);
        session()->setFlashdata('message', 'Delete Data Buku Berhasil');
        return redirect()->to('/buku');
    }
}