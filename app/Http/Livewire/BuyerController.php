<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class BuyerController extends Component
{
    public $buyer = [];
    public $searchTerm='';

    public function search(){
       
    }

    public function render()
    {
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "where (msb.code ilike '%" . $this->searchTerm . 
            "%' OR msb.name ilike '%" . $this->searchTerm . 
            "%' OR msb.address ilike '%" . $this->searchTerm .
            "%' OR msb.city ilike '%" . $this->searchTerm . 
            "%' OR msb.country ilike '%" . $this->searchTerm . 
            "%'
            )";
        }

        $this->buyer = DB::select("
        SELECT
            msb.*
            
        FROM
           msbuyer as msb
           $searchTerm
        ");
        return view('livewire.master-tabel.buyer');
        
    }
}
