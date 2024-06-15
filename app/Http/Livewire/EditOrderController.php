<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EditOrderController extends Component
{
    public $buyer;
    public $orderId;
    public $po_no;
    public $product_id;
    public $order_qty;
    public $process_date;
    public $order_date;
    public $stufingdate;
    public $etddate;
    public $etadate;

    public function mount($orderId)
    {
        $this->buyer = MsBuyer::limit(10)->get();

        $order = TdOrder::findOrFail($orderId);
        $this->orderId = $order->id;
        $this->po_no = $order->po_no;
        $this->product_id = $order->product_id;
        $this->order_qty = $order->order_qty;
        $this->process_date = Carbon::parse($order->process_date)->format('d/m/y');
        $this->order_date = Carbon::parse($order->order_date)->format('d/m/y');
        $this->stufingdate = Carbon::parse($order->stufingdate)->format('d/m/y');
        $this->etddate = Carbon::parse($order->etddate)->format('d/m/y');
        $this->etadate = Carbon::parse($order->etadate)->format('d/m/y');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'po_no' => 'required',
        ]);

        try {
            $order = TdOrder::findOrFail($this->orderId);
            $order->po_no = $this->po_no;
            $order->product_id = $this->product_id;
            $order->order_qty = $this->order_qty;
            $order->save();

            session()->flash('message', 'Order updated successfully.');
            return redirect()->route('order-entry');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save the order: ' . $e->getMessage());
        }
    }

    public function delete()
    {
        try {
            $order = TdOrder::findOrFail($this->orderId);
            $order->delete();

            session()->flash('message', 'Order deleted successfully.');
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
        return view('livewire.order-lpk.edit-order');
    }
}

