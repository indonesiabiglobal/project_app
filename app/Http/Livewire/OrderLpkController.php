<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\TdOrder;
use App\Models\MsProduct;
use App\Models\MsBuyer;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderLpkController extends Component
{
    use WithPagination;

    public $tdOrder;
    public $product;
    public $buyer;
    public $tglMasuk;
    public $search = '';
    public $message = '';

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();        
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('d/m/Y');

        $this->tdOrder = DB::select("
        SELECT
            tod.id,
            tod.po_no,
            mp.NAME AS produk_name,
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
        INNER JOIN msproduct AS mp ON mp.ID = tod.product_id
        INNER JOIN msbuyer AS mbu ON mbu.ID = tod.buyer_id 
        LIMIT 10
        ");
    }

    public function search()
    {
        $this->message = 'test';
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function render()
    {
        return view('livewire.order-lpk.order-entry', [
            'message' => $this->message,
        ]);
    }
}
