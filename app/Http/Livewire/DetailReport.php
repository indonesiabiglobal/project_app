<?php

namespace App\Http\Livewire;

use App\Exports\DetailReportExport;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class DetailReport extends Component
{
    public $tglMasuk;
    public $tglKeluar;
    public $nippo='1';
    public $nolpk;
    public $noorder;

    public function mount()
    {
        $this->tglMasuk = Carbon::now()->format('Y-m-d') . ' 00:00';
        $this->tglKeluar = Carbon::now()->format('Y-m-d') . ' 23:59';      
    }

    public function export()
    {
        
        return Excel::download(new DetailReportExport(
            $this->tglMasuk, 
            $this->tglKeluar,
            $this->nippo,
            $this->nolpk,
            $this->noorder
        ), 'Detail_Report.xlsx');
    }
    public function render()
    {
        return view('livewire.report.detail-report');
    }
}
