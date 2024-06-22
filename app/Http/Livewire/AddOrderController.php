<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use App\Models\MsProduct;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AddOrderController extends Component
{
    public $process_date;
    public $product;
    public $product_id;
    public $buyer_id;
    public $buyer;
    public $po_no;
    public $order_date;
    public $product_code;
    public $order_qty;
    public $unit_id;
    public $stufingdate;
    public $etddate;
    public $etadate;

    public function mount()
    {
        $this->process_date = Carbon::now()->format('Y-m-d');
        $this->order_date = Carbon::now()->format('Y-m-d');
        $this->stufingdate = Carbon::now()->format('Y-m-d');
        $this->etddate = Carbon::now()->format('Y-m-d');
        $this->etadate = Carbon::now()->format('Y-m-d');
        $this->product = MsProduct::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
    }

    public function addorder(){
        // dd('test');
        if(isset($this->product_code)){
            session()->flash('message', 'test.');

        }
    }

    public function save()
    {
        $validatedData = $this->validate([
            'po_no' => 'required',
            'product_code' => 'required',
            'order_qty' => 'required|integer',
            'order_date' => 'required',
            'stufingdate' => 'required',
            'etddate' => 'required',
            'etadate' => 'required',
            'product_id' => 'required',
            'buyer_id' => 'required',
        ]);

        try {
            $order = new TdOrder();
            $order->processdate = $this->process_date;
            $order->po_no = $this->po_no;
            $order->order_date = $this->order_date;
            $order->product_code = $this->product_code;
            $order->product_id = $this->product_id;
            $order->order_qty = $this->order_qty;
            $order->order_unit = $this->unit_id;
            $order->buyer_id = $this->buyer_id;
            $order->stufingdate = $this->stufingdate;
            $order->etddate = $this->etddate;
            $order->etadate = $this->etadate;
            $order->save();
    
            session()->flash('message', 'Order saved successfully.');
    
            return redirect()->route('order-entry');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save the order: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        return redirect()->route('order-entry');
    }

    public function render()
    {
        return view('livewire.order-lpk.add-order');
    }
}

