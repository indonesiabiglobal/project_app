<?php

namespace App\Http\Livewire;

use App\Exports\SeitaiExport;
use Livewire\Component;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CheckListSeitai extends Component
{
    public $tglMasuk;
    public $tglKeluar;
    public $machine;
    public $noprosesawal;
    public $noprosesakhir;
    public $lpk_no;
    public $code;
    public $department;

    public function mount()
    {
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d');    
    }

    public function export()
    {
        return Excel::download(new SeitaiExport(
            $this->tglMasuk, 
            $this->tglKeluar,
        ), 'checklist-infure.xlsx');
    }

    public function render()
    {
        return view('livewire.nippo-seitai.check-list-seitai');
    }
}
