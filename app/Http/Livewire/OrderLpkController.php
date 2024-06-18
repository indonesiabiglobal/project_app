<?php

namespace App\Http\Livewire;

use App\Models\MsBuyer;
use App\Models\MsProduct;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class OrderLpkController extends Component
{
    public $tdOrder = [];
    public $product;
    public $buyer;
    public $tglMasuk;
    public $tglKeluar;
    public $searchTerm;
    public $idProduct;
    public $idBuyer;
    public $searchProduct;

    public function mount()
    {
        $this->product = [];
        // $this->product = MsProduct::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d');      
    }

    public function updatedSearchProduct($value)
    {
        $this->product = MsProduct::where('name', 'ilike', '%' . $value . '%')->limit(5)->get();
    }

    public function search(){
        $tglMasuk = '';
        if (isset($this->tglMasuk) && $this->tglMasuk != '') {
            $tglMasuk = "WHERE tod.order_date >= '" . $this->tglMasuk . "'";
        }
        $tglKeluar = '';
        if (isset($this->tglKeluar) && $this->tglKeluar != '') {
            $tglKeluar = "AND tod.order_date <= '" . $this->tglKeluar . "'";
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

        $this->tdOrder = DB::select("
        SELECT
            tod.id,
            tod.po_no,
            mp.name AS produk_name,
            tod.product_code,
            mbu.NAME AS buyer_name,
            tod.order_qty,
            tod.order_date,
            tod.stufingdate,
            tod.etddate,
            tod.etadate,
            tod.processdate,
            tod.processseq,
            tod.updated_by,
            tod.updated_on 
        FROM
            tdorder AS tod
        INNER JOIN msproduct AS mp ON mp.id = tod.product_id
        INNER JOIN msbuyer AS mbu ON mbu.id = tod.buyer_id 
        $tglMasuk
        $tglKeluar
        $searchTerm
        $idProduct
        $idBuyer
        limit 100
        ");
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function render()
    {
        return view('livewire.order-lpk.order-lpk', [
            'tdOrder' => $this->tdOrder,
            'productList' => $this->product
        ]);
    }
}
