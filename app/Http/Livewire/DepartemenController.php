<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DepartemenController extends Component
{
    public $departemen = [];
    public $searchTerm='';

    public function render()
    {
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "where (msd.code ilike '%" . $this->searchTerm . 
            "%' OR msd.name ilike '%" . $this->searchTerm . 
            "%'
            )";
        }

        $this->departemen = DB::select("
        SELECT
            msd.*
        FROM
           msdepartment as msd
           $searchTerm
        ");
        
        return view('livewire.master-tabel.departemen');
    }
}
