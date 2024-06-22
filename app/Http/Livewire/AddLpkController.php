<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MsMachine;
use App\Models\TdOrder;
use App\Models\TdOrderLpk;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddLpkController extends Component
{
    public $lpk_date;
    public $processdate;
    public $lpk_no;
    public $po_no;
    public $no_order;
    public $machineno;
    public $qty_lpk;
    public $qty_gentan;
    public $product_panjanggulung;
    public $panjang_lpk;
    public $remark;
    public $order_date;
    public $buyer_name;
    public $product_name;
    public $machinename;
    public $dimensi;

    public function mount()
    {
        $this->lpk_date = Carbon::now()->format('Y-m-d');
        $this->processdate = Carbon::now()->format('Y-m-d');
        $today = Carbon::now();
        $this->lpk_no = $today->format('ymd').'-000';
    }

    public function save()
    {
        $validatedData = $this->validate([
            'lpk_date' => 'required',
            'lpk_no' => 'required',
            'po_no' => 'required',
            'machineno' => 'required',
            'qty_lpk' => 'required',
            'qty_gentan' => 'required',
            'product_panjanggulung' => 'required',
            // 'panjang_lpk' => 'required',
            'processdate' => 'required',
        ]);

        try {
            $order = TdOrder::where('po_no', $this->po_no)->first();
            $machine=MsMachine::where('machineno', $this->machineno)->first();
            $lastSeq = TdOrderLpk::whereDate('lpk_date', Carbon::today())
                    ->orderBy('seq_no', 'desc')
                    ->first();

            $seqno = 1;
            if(!empty($lastSeq)){
                $seqno = $lastSeq->seq_no + 1;
            }

            $orderlpk = new TdOrderLpk();
            $orderlpk->lpk_no = $this->lpk_no;
            $orderlpk->lpk_date = $this->lpk_date;
            $orderlpk->order_id = $order->id;
            $orderlpk->product_id = $order->product_id;
            $orderlpk->machine_id = $machine->id;
            $orderlpk->qty_gentan = $this->qty_gentan;
            $orderlpk->qty_lpk = $this->qty_lpk;
            if(isset($this->remark)){
                $orderlpk->remark = $this->remark;
            }
            $orderlpk->qty_gentan = $this->qty_gentan;
            // $orderlpk->panjang_lpk = $this->panjang_lpk;
            $orderlpk->product_panjanggulung = $this->product_panjanggulung;
            $orderlpk->seq_no = $seqno;
            $orderlpk->remark = $order->machine_id;
            $orderlpk->created_on = Carbon::now()->format('Y-m-d H:i:s');
            
            $orderlpk->save();

            TdOrder::where('po_no', $this->po_no)
            ->update(
                ['status_order' => 1]
            );

            session()->flash('message', 'Order saved successfully.');
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
        if(isset($this->po_no) && $this->po_no != ''){
            $tdorder = DB::table('tdorder as tod')
            ->join('msproduct as mp', 'mp.id', '=', 'tod.product_id')
            ->join('msbuyer as mbu', 'mbu.id', '=', 'tod.buyer_id')
            ->select(
                'tod.id',
                'tod.product_code',
                'tod.processdate',
                'tod.order_date',
                'mp.name as produk_name',
                'mbu.name as buyer_name',
                'mp.ketebalan',
                'mp.diameterlipat',
                'mp.productlength'
            )
            ->where('po_no', $this->po_no)
            ->first();


            if($tdorder == null){
                session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
            } else {
                $this->no_order = $tdorder->product_code;
                $this->processdate = $tdorder->processdate;
                $this->order_date = $tdorder->order_date;
                $this->buyer_name = $tdorder->buyer_name;
                $this->product_name = $tdorder->produk_name;
                $this->dimensi = $tdorder->ketebalan.'x'.$tdorder->diameterlipat.'x'.$tdorder->productlength;
            }
        }

        if(isset($this->machineno) && $this->machineno != ''){
            $machine=MsMachine::where('machineno', $this->machineno)->first();
            if($machine == null){
                session()->flash('error', 'Mesin ' . $this->machineno . ' Tidak Terdaftar');
            } else {
                $this->machinename = $machine->machinename;
            }
        }

        return view('livewire.order-lpk.add-lpk');
    }
}

