<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use App\Models\TdOrder;
use App\Models\MsProduct;
use App\Models\MsBuyer;

class OrderLpk extends Component
{
    use WithPagination;

    public $tdOrder;
    public $product;
    public $buyer;
    public $tglMasuk;

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->tdOrder = TdOrder::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('d/m/Y');
    }

    public function render()
    {
        return view('livewire.order-lpk.order-entry');
    }
}
