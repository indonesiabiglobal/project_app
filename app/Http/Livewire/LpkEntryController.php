<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\TdOrderLpk;
use App\Models\MsProduct;
use App\Models\MsBuyer;
use Illuminate\Support\Facades\DB;

class LpkEntryController extends Component
{
    public $tdOrderLpk = [];
    public $product;
    public $buyer;
    public $tglMasuk;
    public $tglKeluar;
    public $searchTerm;
    public $transaksi;
    public $idBuyer;
    public $status;

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d'); 
    }

    public function search(){
        if($this->transaksi == 2){
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tolp.lpk_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tolp.lpk_date <= '" . $this->tglKeluar . "'";
            }
        } else {
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tolp.created_on >= '" . $this->tglMasuk . " 00:00'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tolp.created_on <= '" . $this->tglKeluar . " 23:59'";
            }
        }
        
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "AND (mp.name ilike '%" . $this->searchTerm . "%' 
                                OR tolp.lpk_no ilike '%" . $this->searchTerm . "%'
                                OR tod.po_no ilike '%" . $this->searchTerm . "%')";
        }
        $idProduct = '';
        if (isset($this->idProduct) && $this->idProduct != '') {
            $idProduct = "AND mp.name = '" . $this->idProduct . "'";
        }
        $idBuyer = '';
        if (isset($this->idBuyer) && $this->idBuyer != '') {
            $idBuyer = "AND tod.buyer_id = '" . $this->idBuyer . "'";
        }
        $status = '';
        if (isset($this->status) && $this->status != '') {
            if ($this->status == 0){
                $status = "AND tolp.reprint_no = 0";
            } else if ($this->status == 1){
                $status = "AND tolp.reprint_no = 1";
            } else if ($this->status == 2){
                $status = "AND tolp.reprint_no > 1";
            } else if ($this->status == 3){
                $status = "AND tolp.status_lpk = 0";
            } else if ($this->status == 4){
                $status = "AND tolp.status_lpk = 1";
            }
        }

        $this->tdOrderLpk = DB::select("
        SELECT
            tolp.id,
            tolp.lpk_no,
            tolp.lpk_date,
            tolp.panjang_lpk,
            tolp.qty_lpk,
            tolp.qty_gentan,
            tolp.qty_gulung,
            tolp.total_assembly_line AS infure,
            tolp.total_assembly_qty,
            tod.po_no,
            mp.NAME AS product_name,
            tod.product_code,
            mm.machineno AS machine_no,
            mbu.NAME AS buyer_name,
            tolp.created_on AS tglproses,
            tolp.seq_no,
            tolp.updated_by,
            tolp.updated_on AS updatedt 
        FROM
            tdorderlpk AS tolp
            INNER JOIN tdorder AS tod ON tod.ID = tolp.order_id
            INNER JOIN msproduct AS mp ON mp.ID = tolp.product_id
            INNER JOIN msmachine AS mm ON mm.ID = tolp.machine_id
            INNER JOIN msbuyer AS mbu ON mbu.ID = tod.buyer_id 
            $tglMasuk
            $tglKeluar
            $searchTerm
            $idProduct
            $idBuyer
            $status
        ");
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function render()
    {
        return view('livewire.order-lpk.lpk-entry', [
            'tdOrderLpk' => $this->tdOrderLpk,
        ]);
    }
}
