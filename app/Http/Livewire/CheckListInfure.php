<?php

namespace App\Http\Livewire;

use App\Exports\CheckListExport;
use App\Exports\InfureExport;
use App\Models\MsDepartment;
use App\Models\MsMachine;
use Livewire\Component;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class CheckListInfure extends Component
{
    public $tglMasuk;
    public $tglKeluar;
    public $machine;
    public $noprosesawal;
    public $noprosesakhir;
    public $lpk_no;
    public $code;
    public $department;
    public $jenisReport;
    public $departemenId;
    public $machineId;
    public $nomor_han;

    public function mount()
    {
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d');
        $this->machine = MsMachine::get();
        $this->department = MsDepartment::get();      
    }

    public function export()
    {
        if($this->jenisReport == 2){
            return Excel::download(new InfureExport(
                $this->tglMasuk, 
                $this->tglKeluar,
                $this->noprosesawal,
                $this->noprosesakhir,
                $this->lpk_no,
                $this->code,
            ), 'LossInfure-Checklist.xlsx');
        } else {
            return Excel::download(new CheckListExport(
                $this->tglMasuk, 
                $this->tglKeluar,
                $this->noprosesawal,
                $this->noprosesakhir,
                $this->lpk_no,
                $this->code,
                $this->departemenId,
                $this->machineId,
                $this->nomor_han,
            ), 'NippoInfure-Checklist.xlsx');
        }
        
    }

    public function render()
    {
        return view('livewire.nippo-infure.check-list');
    }
}
