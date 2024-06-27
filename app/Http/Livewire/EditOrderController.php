<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use App\Models\MsProduct;
use App\Models\TdOrderLpk;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EditOrderController extends Component
{
    public $buyer;
    public $orderId;
    public $po_no;
    public $product_id;
    public $product_code;
    public $order_qty;
    public $process_date;
    public $order_date;
    public $stufingdate;
    public $etddate;
    public $etadate;
    public $buyer_id;
    public $unit_id;
    public $status_order;

    public function mount($orderId)
    {        
        $this->buyer = MsBuyer::limit(10)->get();

        $order = TdOrder::findOrFail($orderId);
        $this->orderId = $order->id;
        $this->po_no = $order->po_no;
        $this->product_code = $order->product_code;
        $this->order_qty = $order->order_qty;
        $this->process_date = Carbon::parse($order->processdate)->format('Y-m-d');
        $this->order_date = Carbon::parse($order->order_date)->format('Y-m-d');
        $this->stufingdate = Carbon::parse($order->stufingdate)->format('Y-m-d');
        $this->etddate = Carbon::parse($order->etddate)->format('Y-m-d');
        $this->etadate = Carbon::parse($order->etadate)->format('Y-m-d');
        $this->product_id = MsProduct::where('id', $order->product_id)->pluck('name')->first();
        $this->buyer_id = $order->buyer_id;
        $this->unit_id = $order->order_unit;
        $this->status_order = $order->status_order;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'po_no' => 'required',
            'product_code' => 'required',
            'order_qty' => 'required',
            'process_date' => 'required',
            'order_date' => 'required',
            'stufingdate' => 'required',
            'etddate' => 'required',
            'etadate' => 'required',
            'unit_id' => 'required',
            'buyer_id' => 'required',
        ]);

        try {
            $order = TdOrder::findOrFail($this->orderId);
            $order->po_no = $this->po_no;
            $order->product_code = $this->product_code;
            $order->order_qty = $this->order_qty;
            $order->processdate = $this->process_date;
            $order->stufingdate = $this->stufingdate;
            $order->etddate = $this->etddate;
            $order->etadate = $this->etadate;
            $order->order_unit = $this->unit_id;
            $order->buyer_id = $this->buyer_id;
            $order->save();

            // session()->flash('message', 'Order updated successfully.');
            session()->flash('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            return redirect()->route('order-entry');
        } catch (\Exception $e) {
            // session()->flash('error', 'Failed to save the order: ' . $e->getMessage());
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Failed to save order: ' . $e->getMessage()]);
        }
    }

    public function delete()
    {
        try {
            $order = TdOrder::findOrFail($this->orderId);
            $order->delete();

            session()->flash('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Failed to save order: ' . $e->getMessage()]);
        }
    }

    public function cancel()
    {
        return redirect()->route('order-entry');
    }

    public function print()
    {
        $this->emit('redirectToPrint');
    }

    public function render()
    {
        return view('livewire.order-lpk.edit-order');
    }
}

