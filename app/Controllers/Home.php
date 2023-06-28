<?php

namespace App\Controllers;

use App\Models\Produk;
use mysqli_result;

class Home extends BaseController
{
    public function index()
    {
        $produk = new Produk();

        $dataProduk = $produk->where('status', 'bisa dijual')->findAll();

        $data = [
            'produk' => $dataProduk
        ];

        return view('index', $data);
    }

    public function tambahProduk()
    {
        $data = [
            'validation' => validation_errors()
        ];

        return view('tambah_produk', $data);
    }

    public function aksiTambahProduk()
    {
        $produk = new Produk();

        if (!$this->validate([
            'id_produk' => [
                'rules' => 'required|is_unique[produk.id_produk]'
            ],
            'nama_produk' => [
                'rules' => 'required'
            ],
            'harga' => [
                'rules' => 'required|numeric'
            ],
            'kategori' => [
                'rules' => 'required'
            ],
            'status' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id_produk' => $this->request->getPost('id_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'kategori' => $this->request->getPost('kategori'),
            'status' => $this->request->getPost('status')
        ];

        $produk->save($data);

        return redirect()->to(base_url())->with('sukses', 'Berhasil menyimpan data');
    }

    public function ubahProduk($id_produk)
    {
        $produk = new Produk();

        $dataProduk = $produk->find($id_produk);

        $data = [
            'validation' => validation_errors(),
            'produk' => $dataProduk
        ];

        return view('ubah_produk', $data);
    }

    public function aksiUbahProduk()
    {
        $produk = new Produk();

        if (!$this->validate([
            'id_produk' => [
                'rules' => 'required'
            ],
            'nama_produk' => [
                'rules' => 'required'
            ],
            'harga' => [
                'rules' => 'required|numeric'
            ],
            'kategori' => [
                'rules' => 'required'
            ],
            'status' => [
                'rules' => 'required'
            ],
        ])) {
            return redirect()->back()->withInput();
        }

        $data = [
            'id_produk' => $this->request->getPost('id_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'harga' => $this->request->getPost('harga'),
            'kategori' => $this->request->getPost('kategori'),
            'status' => $this->request->getPost('status')
        ];

        $produk->save($data);

        return redirect()->to(base_url())->with('sukses', 'Berhasil mengubah data');
    }

    public function aksiHapusProduk()
    {
        $id_produk = $this->request->getPost('id_produk');

        $produk = new Produk();
        $produk->delete($id_produk);

        return redirect()->to(base_url())->with('sukses', 'Data berhasil dihapus');
    }
}
