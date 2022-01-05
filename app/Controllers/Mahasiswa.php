<?php
namespace App\Controllers;

use App\Models\MahasiswaModel;
class Mahasiswa extends BaseController
{
    protected $mahasiswa;
    function __construct()
    {
        $this->mahasiswa = new MahasiswaModel();
    }
    public function index()
    {
        $data['pageTitle'] = 'Mahasiswa';
        $data['mahasiswa'] = $this->mahasiswa->findAll();
        return view('dashboard/mahasiswa', $data);
    }
    
    public function create()
    {
        $data['pageTitle'] = 'Input Data Mahasiswa';return view('dashboard/mahasiswa_create', $data);
    }
    public function store()
    {
        if (!$this->validate([
            'nim' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'email harus valid'
                ]
            ],
            'alamat' => ['rules' => 'required', 'errors' => ['required' => '{field} harus diisi']
            ],
            'foto' => [
                'rules' => 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]',
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

        $filefoto = $this->request->getFile('foto');
        $namaFilefoto = $filefoto->getRandomName();
        $filefoto->move('img', $namaFilefoto);

        $this->mahasiswa->insert([
            'nim' => $this->request->getVar('nim'),
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' =>  $namaFilefoto
        ]);
        session()->setFlashdata('message', 'Tambah Data Mahasiswa Berhasil');
        return redirect()->to('/mahasiswa');
    }
    
    function edit($nim)
    {
        $dataMahasiswa = $this->mahasiswa->find($nim);
        if (empty($dataMahasiswa)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $data['pageTitle'] = 'Edit Data Mahasiswa';
        $data['mahasiswa'] = $dataMahasiswa;
        return view('dashboard/mahasiswa_edit', $data);
    }

    public function update($nim)
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jurusan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => 'email harus valid'
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi'
                ]
            ],
            'foto' => [
                'rules' =>
                'mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,1024]',
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
        $filefotolama = $this->request->getVar('fotolama');
        //cek data file foto
        $filefoto = $this->request->getFile('foto');//jika file kosong jalankan perintah mengambil data nama file lama
        if ($filefoto->getError() == 4) {
            $namaFilefoto = $this->request->getVar('fotolama');
        } else {
            // jika tidak hapus file foto lama dan ambil data file foto baru
            $path = '../public/img/';
            @unlink($path . $filefotolama);
            //generate nama file random
            $namaFilefoto = $filefoto->getRandomName();
            //pindahkan gambar
            $filefoto->move('img', $namaFilefoto);
        }
        $this->mahasiswa->update($nim, [
            'nama' => $this->request->getVar('nama'),
            'jurusan' => $this->request->getVar('jurusan'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'email' => $this->request->getVar('email'),
            'alamat' => $this->request->getVar('alamat'),
            'foto' => $namaFilefoto
        ]);
        session()->setFlashdata('message', 'Update Data Mahasiswa Berhasil');
        return redirect()->to('/mahasiswa');
    }

    function delete($nim)
    {
        $dataMahasiswa = $this->mahasiswa->find($nim);
        if (empty($dataMahasiswa)) {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $this->mahasiswa->delete($nim);
        //hapus file image dari folder public$filefoto = $dataMahasiswa->foto;
        $path = '../public/img/';
        @unlink($path . $filefoto);
        session()->setFlashdata('message', 'Delete Data Mahasiswa Berhasil');
        return redirect()->to('/mahasiswa');
    }

    public function view($nim)
    {
        $dataMahasiswa = $this->mahasiswa->find($nim);
        if (empty($dataMahasiswa)) {
            throw new
            \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak ditemukan !');
        }
        $data['pageTitle'] = 'Data Mahasiswa';
        $data['mahasiswa'] = $dataMahasiswa;
        return view('dashboard/mahasiswa_view', $data);
    }
}