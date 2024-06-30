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
        $results = DB::table('tdorderlpk as tolp')
            ->join('tdorder as tod', 'tod.id', '=', 'tolp.order_id')
            ->join('msproduct as mp', 'mp.id', '=', 'tolp.product_id')
            ->join('msmachine as mm', 'mm.id', '=', 'tolp.machine_id')
            ->join('msbuyer as mbu', 'mbu.id', '=', 'tod.buyer_id')
            ->select(
                'tolp.lpk_no as lpk_no',
                'tolp.lpk_date as lpk_date',
                'tolp.panjang_lpk as panjang_lpk',
                'tolp.qty_lpk as qty_lpk',
                'tod.po_no as po_no',
                'mp.name as product_name',
                'tod.product_code as product_code',
                'tolp.reprint_no as reprint_no'
            )
            ->where('tolp.lpk_no', $this->lpk_no)
            ->first();

            if ($results) {
                $this->results = (array) $results;
                $this->emit('showPrintModal');
            } else {
                $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'Data Tidak ditemukan']);
            }
            
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
