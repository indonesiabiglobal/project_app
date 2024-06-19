<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrderLpk;
use App\Models\MsBuyer;
use App\Models\MsProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EditLpkController extends Component
{
    public $buyer;
    public $orderId;
    public $lpk_date;
    public $lpk_no;
    public $po_no; 
    public $order_id;
    public $machine_no; 
    public $qty_lpk; 
    public $qty_gentan; 
    public $qty_gulung; 
    public $panjang_lpk; 
    public $tglproses; 
    public $tgl_po; 
    public $buyer_id; 
    public $product_id;

    public function mount($orderId)
    {
        $this->buyer = MsBuyer::limit(10)->get();

        // $order = TdOrderLpk::findOrFail($orderId);
        $order = DB::table('tdorderlpk as tolp')
        ->select(
            'tolp.id',
            'tolp.order_id',
            'tolp.lpk_no',
            'tolp.lpk_date',
            'tolp.panjang_lpk',
            'tolp.qty_lpk',
            'tolp.qty_gentan',
            'tolp.qty_gulung',
            'tolp.total_assembly_line as infure',
            'tolp.total_assembly_qty',
            'tod.po_no',
            'mp.name as product_name',
            'tod.product_code',
            'mm.machineno as machine_no',
            'mbu.id as buyer_id',
            'mbu.name as buyer_name',
            'tolp.created_on as tglproses',
            'tolp.seq_no',
            'tolp.updated_by',
            'tolp.updated_on as updatedt'
        )
        ->join('tdorder as tod', 'tod.id', '=', 'tolp.order_id')
        ->join('msproduct as mp', 'mp.id', '=', 'tolp.product_id')
        ->join('msmachine as mm', 'mm.id', '=', 'tolp.machine_id')
        ->join('msbuyer as mbu', 'mbu.id', '=', 'tod.buyer_id')
        ->where('tolp.id', $orderId)
        ->first();
        
        $this->lpk_date = Carbon::parse($order->lpk_date)->format('Y-m-d');
        $this->lpk_no = $order->lpk_no;
        $this->po_no = $order->po_no;
        $this->order_id = $order->order_id;
        $this->machine_no = $order->machine_no;
        $this->qty_lpk = $order->qty_lpk;
        $this->qty_gentan = $order->qty_gentan;
        $this->qty_gulung = $order->qty_gulung;
        $this->panjang_lpk = $order->panjang_lpk;
        $this->tglproses = Carbon::parse($order->tglproses)->format('Y-m-d');
        // $this->tgl_po = 
        $this->buyer_id = $order->buyer_name;
        $this->product_id = $order->product_name;
        // $this->panjang_total = 
        // $this->dimensi = 
        // $this->default_gulung =
        // $this->selisih_kurang = 
    }

    public function save()
    {
        $validatedData = $this->validate([
            'lpk_date' => 'required',
            'lpk_no' => 'required',
            'po_no' => 'required',
            'order_id' => 'required',
            'machine_no' => 'required',
            'qty_lpk' => 'required',
            'qty_gentan' => 'required',
            'qty_gulung' => 'required',
            'panjang_lpk' => 'required',
            'tglproses' => 'required',
            'buyer_id' => 'required',
            'product_id' => 'required',
        ]);

        try {
            $order = TdOrderLpk::findOrFail($this->orderId);
            $order->lpk_date = $this->lpk_date;
            $order->lpk_no = $this->lpk_no;
            // $order->po_no = $this->po_no;
            // $order->order_id = $this->order_id;
            // $order->machine_no = $this->machine_no;
            $order->qty_lpk = $this->qty_lpk;
            $order->qty_gentan = $this->qty_gentan;
            $order->qty_gulung = $this->qty_gulung;
            $order->panjang_lpk = $this->panjang_lpk;
            // $order->tglproses = $this->tglproses;
            // $order->buyer_id = $this->buyer_id;
            // $order->product_id = $this->product_id;
            $order->save();

            session()->flash('message', 'Order updated successfully.');
            return redirect()->route('lpk-entry');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save the order: ' . $e->getMessage());
        }

        
    }

    public function delete()
    {
        try {
            $order = TdOrderLpk::findOrFail($this->orderId);
            $order->delete();

            session()->flash('message', 'Order deleted successfully.');
            return redirect()->route('lpk-entry');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save the order: ' . $e->getMessage());
        }

        
    }

    public function cancel()
    {
        return redirect()->route('lpk-entry');
    }

    public function render()
    {
        return view('livewire.order-lpk.edit-lpk');
    }
}

