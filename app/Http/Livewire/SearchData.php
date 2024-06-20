<?php

namespace App\Http\Livewire;

use App\Models\MsProduct;
use Livewire\Component;
use App\Models\YourModel; // Ganti dengan model Anda

class SearchData extends Component
{
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $results = MsProduct::where('name', 'ilike', $searchTerm)->limit(10)->get(); // Ganti 'your_field' dengan field yang ingin dicari

        return view('livewire.search-data', [
            'results' => $results,
        ]);
    }
}

