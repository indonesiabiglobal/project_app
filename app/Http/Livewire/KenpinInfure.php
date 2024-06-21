<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\MsProduct;
use Illuminate\Support\Facades\DB;

class KenpinInfure extends Component
{
    use WithPagination;

    public $infure;
    public $product;
    // public $buyer;
    public $tglMasuk;
    public $tglKeluar;

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d');
    }

    public function search(){
        $tglMasuk = '';
        if (isset($this->tglMasuk) && $this->tglMasuk != '') {
            $tglMasuk = "WHERE tdjkm.working_date >= '" . $this->tglMasuk . "'";
        }
        $tglKeluar = '';
        if (isset($this->tglKeluar) && $this->tglKeluar != '') {
            $tglKeluar = "AND tdjkm.working_date <= '" . $this->tglKeluar . "'";
        }
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "AND (tdol.lpk_no ilike '%" . $this->searchTerm . 
            "%' OR tdpg.production_no ilike '%" . $this->searchTerm . 
            "%' OR tdpg.product_id ilike '%" . $this->searchTerm .
            "%' OR tdpg.machine_id ilike '%" . $this->searchTerm . 
            "%')";
        }

        $this->infure = DB::select("
        SELECT
            tdjkm.ID AS ID,
            tdjkm.working_date AS working_date,
            tdjkm.work_shift AS work_shift,
            tdjkm.machine_id AS machine_id,
            tdjkm.department_id AS department_id,
            tdjkm.employee_id AS employee_id,
            tdjkm.work_hour AS work_hour,
            tdjkm.off_hour AS off_hour,
            tdjkm.on_hour AS on_hour,
            tdjkm.created_by AS created_by,
            tdjkm.created_on AS created_on,
            tdjkm.updated_by AS updated_by,
            tdjkm.updated_on AS updated_on 
        FROM
            tdJamKerjaMesin AS tdjkm
        $tglMasuk
        $tglKeluar
        LIMIT 5
        ");
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function render()
    {
        return view('livewire.kenpin.kenpin-infure');
    }
}
