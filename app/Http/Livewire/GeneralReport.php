<?php

namespace App\Http\Livewire;

use App\Exports\GeneralReportExport;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class GeneralReport extends Component
{
    public $tglMasuk;
    public $tglKeluar;

    public function mount()
    {
        $this->tglMasuk = Carbon::now()->format('Y-m-d') . ' 00:00';
        $this->tglKeluar = Carbon::now()->format('Y-m-d') . ' 23:59';      
    }

    public function export()
    {
        return Excel::download(new GeneralReportExport(
            $this->tglMasuk, 
            $this->tglKeluar
        ), 'General_Report.xlsx');
    }

    public function render()
    {
        return view('livewire.report.general-report');
    }
}
