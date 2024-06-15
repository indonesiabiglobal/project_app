<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use App\Models\MsProduct;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AddSeitaiController extends Component
{
    public $tdOrder;
    public $product;
    public $buyer;
    public $tglMasuk;
    public $po_no;
    public $product_code;
    public $order_qty;
    public $order_unit;
    public $buyer_id;
    public $product_id;
    public $lpk_no;

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->tdOrder = TdOrder::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('d/m/Y');
    }

    public function save()
    {
        $validatedData = $this->validate([
            'lpk_no' => 'required',
        ]);

        try {
            $order = new TdOrder();
            $order->po_no = $this->po_no;
            $order->product_code = $this->product_code;
            $order->product_id = $this->product_id;
            $order->order_qty = $this->order_qty;
            $order->order_unit = $this->order_unit;
            $order->buyer_id = $this->buyer_id;
            $order->save();

            session()->flash('message', 'Order saved successfully.');
            return redirect()->route('nippo-seitai');
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to save the order: ' . $e->getMessage());
        }
    }

    public function cancel()
    {
        return redirect()->route('nippo-seitai');
    }

    public function render()
    {
        return view('livewire.nippo-seitai.add-seitai');
    }
}

