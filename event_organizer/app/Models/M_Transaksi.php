<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Transaksi extends Model
{

    protected $table = ('tbl_transaksi');

    public function getAll()
    {
        return $this->findAll();
    }

    public function findData($id, $status)
    {
        return $this->db->table('tbl_transaksi as trs')
            ->join('tbl_tempat as tp', 'tp.id_tempat = trs.id_tempat')
            ->join('tbl_kategori as kt', 'kt.id_kategori = trs.id_kategori')
            ->join('tbl_paket as pk', 'pk.id_paket = trs.id_paket')

            ->select(
                'tp.nama, tp.gambar, tp.harga, tp.kota, 
        trs.kode_transaksi, trs.status, trs.start_event, 
        trs.end_event, trs.img_pembayaran, trs.konsep,
        trs.verifikasi, trs.id_user, trs.id, kt.nama_kategori, kt.deskripsi, kt.gambar',
                'pk.nama_paket',
                'pk.harga_paket',
                'pk.kapasitas'
            )
            ->where('trs.id_user', $id)
            ->where('trs.status', $status)
            ->get()->getResultArray();
    }

    public function findTransaksi($id, $status)
    {
        return $this->db
            ->table('tbl_transaksi')
            ->join('tbl_tempat as a', 'a.id_tempat = tbl_transaksi.id_tempat', 'left')
            ->join('tbl_kategori as b', 'b.id_kategori = tbl_transaksi.id_kategori', 'left')
            ->join('tbl_paket as d', 'd.id_paket = tbl_transaksi.id_paket', 'left')
            ->select('*')
            ->where('tbl_transaksi.id_user', $id)
            ->where('tbl_transaksi.status', $status)
            ->get()->getResultArray();
    }

    public function findTransaksiProses()
    {
        return $this->db
            ->table('tbl_transaksi')
            ->join('tbl_tempat as a', 'a.id_tempat = tbl_transaksi.id_tempat', 'left')
            ->join('tbl_kategori as b', 'b.id_kategori = tbl_transaksi.id_kategori', 'left')
            ->join('tbl_paket as d', 'd.id_paket = tbl_transaksi.id_paket', 'left')
            ->select('*')
            ->where('tbl_transaksi.status', 'Proses')
            ->get()->getResultArray();
    }

    public function findTransaksiSelesai()
    {
        return $this->db
            ->table('tbl_transaksi')
            ->join('tbl_tempat as a', 'a.id_tempat = tbl_transaksi.id_tempat', 'left')
            ->join('tbl_kategori as b', 'b.id_kategori = tbl_transaksi.id_kategori', 'left')
            ->join('tbl_paket as d', 'd.id_paket = tbl_transaksi.id_paket', 'left')
            ->select('*')
            ->where('tbl_transaksi.status', 'Selesai')
            ->get()->getResultArray();
    }

    public function findTransaksiBatal()
    {
        return $this->db
            ->table('tbl_transaksi')
            ->join('tbl_tempat as a', 'a.id_tempat = tbl_transaksi.id_tempat', 'left')
            ->join('tbl_kategori as b', 'b.id_kategori = tbl_transaksi.id_kategori', 'left')
            ->join('tbl_paket as d', 'd.id_paket = tbl_transaksi.id_paket', 'left')
            ->select('*')
            ->where('tbl_transaksi.status', 'Dibatalkan')
            ->get()->getResultArray();
    }

    public function cariTransaksi($dari, $sampai){
        return $this->db->table('tbl_transaksi')
        ->join('tbl_tempat as a', 'a.id_tempat = tbl_transaksi.id_tempat', 'left')
            ->join('tbl_kategori as b', 'b.id_kategori = tbl_transaksi.id_kategori', 'left')
            ->join('tbl_paket as d', 'd.id_paket = tbl_transaksi.id_paket', 'left')
            ->select('*')
        // ->where('tbl_transaksi.start_event BETWEEN "'. $dari. '" AND "'. $sampai. '" ')
        ->where('date(tbl_transaksi.start_event) >= ', date('Y-m-d', strtotime($dari)))
		 ->where('date(tbl_transaksi.end_event) <= ', date('Y-m-d', strtotime($sampai)))
        ->get()->getResultArray(); 
    }

    public function cari($id)
    {
        return $this->db
            ->table('tbl_transaksi')
            ->join('tbl_tempat as a', 'a.id_tempat = tbl_transaksi.id_tempat', 'left')
            ->join('tbl_kategori as b', 'b.id_kategori = tbl_transaksi.id_kategori', 'left')
            ->join('tbl_paket as d', 'd.id_paket = tbl_transaksi.id_paket', 'left')
            ->select('*')
            ->where('tbl_transaksi.id', $id)
            ->get()->getResultArray();
    }

    public function updateTransaksi($data, $id)
    {
        $query = $this->db->table('tbl_transaksi')->update($data, array('id' => $id));
        return $query;
    }
}