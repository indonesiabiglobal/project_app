<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class TipeProdukController extends Component
{

    public $type = [];
    public $searchTerm='';

    public function render()
    {
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "where (pt.code ilike '%" . $this->searchTerm . 
            "%' OR pt.name ilike '%" . $this->searchTerm . 
            "%' OR  pg.name ilike '%" . $this->searchTerm . 
            "%' 
            )";
        }

        $this->type = DB::select("
            SELECT pt.id,pt.code,pt.name,pt.product_group_id,pg.name as jenisproduk, pt.harga_sat_infure,
            pt.harga_sat_infure_loss,pt.harga_sat_seitai,pt.harga_sat_seitai_loss,pt.harga_sat_inline,
            pt.harga_sat_cetak,pt.berat_jenis,pt.status,pt.updated_on,pt.updated_by 
            from msproduct_type as pt
            inner join msproduct_group as pg on pt.product_group_id=pg.id
            $searchTerm
        
        ");

        return view('livewire.master-tabel.tipe-produk');
    }
}
