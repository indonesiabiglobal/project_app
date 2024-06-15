<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\TdOrderLpk;
use App\Models\MsProduct;
use App\Models\MsBuyer;

class NippoSeitaiController extends Component
{
    public $tdOrderLpk;
    public $product;
    public $buyer;
    public $tglMasuk;

    public function mount()
    {
        $this->product = MsProduct::limit(10)->get();
        $this->tdOrderLpk = TdOrderLpk::limit(10)->get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('d/m/Y');
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function render()
    {
        return view('livewire.nippo-seitai.nippo-seitai');
    }
}
