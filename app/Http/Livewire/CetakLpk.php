<?php

namespace App\Http\Livewire;

use App\Models\TdOrderLpk;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class CetakLpk extends Component
{
    public $lpk_no;
    public $lpk_date;
    public $code;
    public $product_name;
    public $qty_lpk;
    public $reprint_no;
    public $results;

    public function print()
    {
        $data = collect(DB::select("
        SELECT
            tod.processdate,
            tod.po_no,
            tod.order_date,
            mp.code,
            mp.name,
            mp.ketebalan||'x'||mp.diameterlipat||'x'||mp.productlength as dimensi,
            tod.order_qty,
            tod.stufingdate,
            tod.etddate,
            tod.etadate,
            mbu.name as namabuyer
        FROM
            tdorder AS tod
            INNER JOIN msproduct AS mp ON mp.ID = tod.product_id
            INNER JOIN msbuyer AS mbu ON mbu.ID = tod.buyer_id 
        WHERE
            tod.id = '12766'
        "))->first();
        
        $this->emit('redirectToPrint', $data);
            
    }
    public function render()
    {
        if(isset($this->lpk_no) && $this->lpk_no != ''){
            $data = DB::table('tdorderlpk as tod')
            ->join('msproduct as mp', 'mp.id', '=', 'tod.product_id')
            ->select(
                'tod.lpk_no',
                'tod.qty_lpk',
                'tod.lpk_date',
                'mp.code',
                'mp.name as product_name',
                'tod.reprint_no as reprint_no'
            )
            ->where('lpk_no', $this->lpk_no)
            ->first();
            if($data == null){
                $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'Mesin ' . $this->lpk_no . ' Tidak Terdaftar']);
            } else {
                $this->lpk_date = $data->lpk_date;
                $this->qty_lpk = $data->qty_lpk;
                $this->code = $data->code;
                $this->product_name = $data->product_name;
                $this->reprint_no = $data->reprint_no;
            }
        }
        // dd($this->results);
        return view('livewire.order-lpk.cetak-lpk', [
            'results' => $this->results,
        ]);
    }
}
