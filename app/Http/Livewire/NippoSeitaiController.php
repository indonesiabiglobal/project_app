<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\MsProduct;
use App\Models\MsBuyer;
use App\Models\MsMachine;
use Illuminate\Support\Facades\DB;

class NippoSeitaiController extends Component
{
    public $seitai = [];
    public $product;
    public $buyer;
    public $tglMasuk;
    public $tglKeluar;
    public $machine;
    public $transaksi;

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->machine = MsMachine::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d'); 
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function search(){
        if($this->transaksi == 2){
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tdpg.production_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tdpg.production_date <= '" . $this->tglKeluar . "'";
            }
            // produk
            // mesin
            // status
            $searchTerm = '';
            if (isset($this->searchTerm) && $this->searchTerm != '') {
                $searchTerm = "AND (tdol.lpk_no ilike '%" . $this->searchTerm . 
                "%' OR tdpg.production_no ilike '%" . $this->searchTerm . 
                "%' OR tdpg.product_id ilike '%" . $this->searchTerm .
                "%' OR tdpg.machine_id ilike '%" . $this->searchTerm . 
                "%')";
            }

            $this->seitai = DB::select("
            SELECT
                tdpg.ID AS ID,
                tdpg.production_no AS production_no,
                tdpg.production_date AS production_date,
                tdpg.employee_id AS employee_id,
                tdpg.employee_id_infure AS employee_id_infure,
                tdpg.work_shift AS work_shift,
                tdpg.work_hour AS work_hour,
                tdpg.machine_id AS machine_id,
                tdpg.lpk_id AS lpk_id,
                tdpg.product_id AS product_id,
                tdpg.qty_produksi AS qty_produksi,
                tdpg.seitai_berat_loss AS seitai_berat_loss,
                tdpg.infure_berat_loss AS infure_berat_loss,
                tdpg.nomor_palet AS nomor_palet,
                tdpg.nomor_lot AS nomor_lot,
                tdpg.seq_no AS seq_no,
                tdpg.status_production AS status_production,
                tdpg.status_warehouse AS status_warehouse,
                tdpg.kenpin_qty_loss AS kenpin_qty_loss,
                tdpg.kenpin_qty_loss_proses AS kenpin_qty_loss_proses,
                tdpg.created_by AS created_by,
                tdpg.created_on AS created_on,
                tdpg.updated_by AS updated_by,
                tdpg.updated_on AS updated_on,
                tdol.order_id AS order_id,
                tdol.lpk_no AS lpk_no,
                tdol.lpk_date AS lpk_date,
                tdol.panjang_lpk AS panjang_lpk,
                tdol.qty_gentan AS qty_gentan,
                tdol.qty_gulung AS qty_gulung,
                tdol.qty_lpk AS qty_lpk,
                tdol.total_assembly_qty AS total_assembly_qty 
            FROM
                tdProduct_Goods AS tdpg
                INNER JOIN tdOrderLpk AS tdol ON tdpg.lpk_id = tdol.ID 
            $tglMasuk
            $tglKeluar
            $searchTerm
            limit 5
            ");
        } else {
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tdpa.production_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tdpa.production_date <= '" . $this->tglKeluar . "'";
            }
            // produk
            // mesin
            // status
            $searchTerm = '';
            if (isset($this->searchTerm) && $this->searchTerm != '') {
                $searchTerm = "AND (tdol.lpk_no ilike '%" . $this->searchTerm . 
                "%' OR tdpa.production_no ilike '%" . $this->searchTerm . 
                "%' OR tdpa.product_id ilike '%" . $this->searchTerm .
                "%' OR tdpa.machine_id ilike '%" . $this->searchTerm . 
                "%')";
            }

            $this->seitai = DB::select("
            SELECT
                tdpa.ID AS ID,
                tdpa.production_no AS production_no,
                tdpa.production_date AS production_date,
                tdpa.employee_id AS employee_id,
                tdpa.work_shift AS work_shift,
                tdpa.work_hour AS work_hour,
                tdpa.machine_id AS machine_id,
                tdpa.lpk_id AS lpk_id,
                tdpa.product_id AS product_id,
                tdpa.panjang_produksi AS panjang_produksi,
                tdpa.panjang_printing_inline AS panjang_printing_inline,
                tdpa.berat_standard AS berat_standard,
                tdpa.berat_produksi AS berat_produksi,
                tdpa.nomor_han AS nomor_han,
                tdpa.gentan_no AS gentan_no,
                tdpa.seq_no AS seq_no,
                tdpa.status_production AS status_production,
                tdpa.status_kenpin AS status_kenpin,
                tdpa.infure_cost AS infure_cost,
                tdpa.infure_cost_printing AS infure_cost_printing,
                tdpa.infure_berat_loss AS infure_berat_loss,
                tdpa.kenpin_berat_loss AS kenpin_berat_loss,
                tdpa.kenpin_meter_loss AS kenpin_meter_loss,
                tdpa.kenpin_meter_loss_proses AS kenpin_meter_loss_proses,
                tdpa.created_by AS created_by,
                tdpa.created_on AS created_on,
                tdpa.updated_by AS updated_by,
                tdpa.updated_on AS updated_on,
                tdol.order_id AS order_id,
                tdol.lpk_no AS lpk_no,
                tdol.lpk_date AS lpk_date,
                tdol.panjang_lpk AS panjang_lpk,
                tdol.qty_gentan AS qty_gentan,
                tdol.qty_gulung AS qty_gulung,
                tdol.qty_lpk AS qty_lpk,
                tdol.total_assembly_line AS total_assembly_line,
                tdol.total_assembly_qty AS qty_produksi 
            FROM
                tdProduct_assembly AS tdpa
                INNER JOIN tdOrderLpk AS tdol ON tdpa.lpk_id = tdol.ID 
            $tglMasuk
            $tglKeluar
            $searchTerm
            limit 5
            ");
        }
        
    }

    public function render()
    {
        return view('livewire.nippo-seitai.nippo-seitai');
    }
}
