<?php

namespace App\Http\Livewire;

use App\Models\MsProduct;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;

class OrderReport extends Component
{
    public function export()
    {
        return Excel::download(new ProductsExport, 'order_report.xlsx');
    }

    public function render()
    {
        return view('livewire.order-lpk.order-report');
    }
}
