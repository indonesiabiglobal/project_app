<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PengembalianPalet extends Component
{
    public $data = [];
    public $tglMasuk;
    public $tglKeluar;
    public $machine;
    public $transaksi;
    public $searchTerm;

    public function mount()
    {
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d'); 
    }

    public function search(){
        $tglMasuk = '';
        if (isset($this->tglMasuk) && $this->tglMasuk != '') {
            $tglMasuk = "WHERE tdpg.production_date >= '" . $this->tglMasuk . "'";
        }
        $tglKeluar = '';
        if (isset($this->tglKeluar) && $this->tglKeluar != '') {
            $tglKeluar = "AND tdpg.production_date <= '" . $this->tglKeluar . "'";
        }
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = " WHERE tdpg.nomor_palet ilike '%" . $this->searchTerm .
            "%'";
        }

        $this->data = DB::select("
        SELECT
            X.product_id AS product_id,
            X.nomor_palet AS nomor_palet 
        FROM
            (
            SELECT DISTINCT
                tdpg.product_id AS product_id,
                tdpg.nomor_palet AS nomor_palet 
            FROM
                tdProduct_Goods AS tdpg
                $searchTerm                 
            ) AS X
        limit 5
        ");
    }

    public function render()
    {
        return view('livewire.warehouse.pengembalian-palet');
    }
}
