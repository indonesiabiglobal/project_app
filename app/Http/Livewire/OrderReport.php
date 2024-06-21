<?php

namespace App\Http\Livewire;

use App\Models\MsProduct;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OrderReport extends Component
{
    // public function export()
    // {
    //     $products = MsProduct::take(10)->get();

    //     $filename = 'export.csv';
    //     $handle = fopen(storage_path('app/exports/' . $filename), 'w+');
    //     fputcsv($handle, array('id', 'code', 'name')); // Gantilah ini dengan nama kolom yang sesuai

    //     foreach ($products as $product) {
    //         fputcsv($handle, array($product->id, $product->code, $product->name)); // Gantilah ini dengan data kolom yang sesuai
    //     }

    //     fclose($handle);

    //     return response()->download(storage_path('app/exports/' . $filename));
    // }

    public function export()
    {
        Storage::disk('exports')->download('export.csv');
    }

    public function render()
    {
        return view('livewire.order-lpk.order-report');
    }
}
