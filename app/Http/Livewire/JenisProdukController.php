<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class JenisProdukController extends Component
{
    public $jenisproduk = [];
    public $searchTerm='';

    public function render()
    {
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "where (mspg.code ilike '%" . $this->searchTerm . 
            "%' OR mspg.name ilike '%" . $this->searchTerm . 
            "%' 
            )";
        }

        $this->jenisproduk = DB::select("
            SELECT * from msproduct_group as mspg
           $searchTerm
        ");

        return view('livewire.master-tabel.jenis-produk');
    }
}
