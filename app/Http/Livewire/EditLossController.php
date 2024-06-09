<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrderLpk;
use App\Models\MsBuyer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EditLossController extends Component
{
    public $buyer;
    public $orderId;
    public $lpk_no;
    public $lpk_date;
    public $order_id;
    public $product_id;
    public $machine_id;
    public $qty_gentan;
    public $qty_gulung;
    public $qty_lpk;
    public $prev_lpk_no;
    public $prev_product_code;

    public function mount($orderId)
    {
        $this->buyer = MsBuyer::limit(10)->get();

        $order = TdOrderLpk::findOrFail($orderId);
        $this->lpk_no = $order->lpk_no;
        $this->lpk_date = $order->lpk_date;
        $this->order_id = $order->order_id;
        $this->product_id = $order->product_id;
        $this->machine_id = $order->machine_id;
        $this->qty_gentan = $order->qty_gentan;
        $this->qty_gulung = $order->qty_gulung;
        $this->qty_lpk = $order->qty_lpk;
        $this->prev_product_code = $order->prev_product_code;
        $this->prev_lpk_no = $order->prev_lpk_no;
    }

    public function save()
    {
        $order = TdOrderLpk::findOrFail($this->orderId);
        $order->po_no = $this->po_no;
        $order->product_id = $this->product_id;
        $order->order_qty = $this->order_qty;
        $order->save();

        session()->flash('message', 'Order updated successfully.');
        return redirect()->route('loss-infure');
    }

    public function delete()
    {
        $order = TdOrderLpk::findOrFail($this->orderId);
        $order->delete();

        session()->flash('message', 'Order deleted successfully.');
        return redirect()->route('loss-infure');
    }

    public function cancel()
    {
        return redirect()->route('loss-infure');
    }

    public function render()
    {
        return view('livewire.nippo-infure.edit-loss');
    }
}

