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

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d'); 
    }

    public function search(){
        // dd($searchTerm);
        $tglMasuk = '';
        if (isset($this->tglMasuk) && $this->tglMasuk != '') {
            $tglMasuk = "WHERE tolp.lpk_date >= '" . $this->tglMasuk . "'";
        }
        $tglKeluar = '';
        if (isset($this->tglKeluar) && $this->tglKeluar != '') {
            $tglKeluar = "AND tolp.lpk_date <= '" . $this->tglKeluar . "'";
        }
        $searchTerm = '';
        if (isset($this->searchTerm) && $this->searchTerm != '') {
            $searchTerm = "AND (mp.name ilike '%" . $this->searchTerm . "%' OR tod.po_no ilike '%" . $this->searchTerm . "%')";
        }
        $idProduct = '';
        if (isset($this->idProduct) && $this->idProduct != '') {
            $idProduct = "AND mp.name = '" . $this->idProduct . "'";
        }
        $idBuyer = '';
        if (isset($this->idBuyer) && $this->idBuyer != '') {
            $idBuyer = "AND tod.buyer_id = '" . $this->idBuyer . "'";
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
            limit 10
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
