<?php

namespace App\Http\Livewire;

use App\Models\MsEmployee;
use App\Models\MsMachine;
use App\Models\TdJamKerjaMesin;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SeitaiJamKerjaController extends Component
{
    public $tglMasuk;
    public $tglKeluar;
    // public $jamkerja = [];
    public $machinename;
    public $machineno;
    public $machine;
    public $msemployee;
    public $employeeno;
    public $transaksi;
    public $working_date;
    public $empname;
    public $work_shift;
    public $machine_id;
    public $employee_id;
    public $work_hour;
    public $on_hour;
    public $orderid;

    public function mount()
    {
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d'); 
        $this->machine  = MsMachine::limit(10)->get();
        $this->working_date = Carbon::now()->format('Y-m-d');
    }

    public function search(){
        if($this->transaksi == 2){
            // $tglMasuk = '';
            // if (isset($this->tglMasuk) && $this->tglMasuk != '') {
            //     $tglMasuk = "WHERE tdpg.production_date >= '" . $this->tglMasuk . "'";
            // }
            // $tglKeluar = '';
            // if (isset($this->tglKeluar) && $this->tglKeluar != '') {
            //     $tglKeluar = "AND tdpg.production_date <= '" . $this->tglKeluar . "'";
            // }
            // // produk
            // // mesin
            // // status
            // $searchTerm = '';
            // if (isset($this->searchTerm) && $this->searchTerm != '') {
            //     $searchTerm = "AND (tdol.lpk_no ilike '%" . $this->searchTerm . 
            //     "%' OR tdpg.production_no ilike '%" . $this->searchTerm . 
            //     "%' OR tdpg.product_id ilike '%" . $this->searchTerm .
            //     "%' OR tdpg.machine_id ilike '%" . $this->searchTerm . 
            //     "%')";
            // }

            // $this->loss = DB::select("
            // SELECT
            //     tdpg.ID AS ID,
            //     tdpg.production_no AS production_no,
            //     tdpg.production_date AS production_date,
            //     tdpg.employee_id AS employee_id,
            //     tdpg.employee_id_infure AS employee_id_infure,
            //     tdpg.work_shift AS work_shift,
            //     tdpg.work_hour AS work_hour,
            //     tdpg.machine_id AS machine_id,
            //     tdpg.lpk_id AS lpk_id,
            //     tdpg.product_id AS product_id,
            //     tdpg.qty_produksi AS qty_produksi,
            //     tdpg.seitai_berat_loss AS seitai_berat_loss,
            //     tdpg.infure_berat_loss AS infure_berat_loss,
            //     tdpg.nomor_palet AS nomor_palet,
            //     tdpg.nomor_lot AS nomor_lot,
            //     tdpg.seq_no AS seq_no,
            //     tdpg.status_production AS status_production,
            //     tdpg.status_warehouse AS status_warehouse,
            //     tdpg.kenpin_qty_loss AS kenpin_qty_loss,
            //     tdpg.kenpin_qty_loss_proses AS kenpin_qty_loss_proses,
            //     tdpg.created_by AS created_by,
            //     tdpg.created_on AS created_on,
            //     tdpg.updated_by AS updated_by,
            //     tdpg.updated_on AS updated_on,
            //     tdol.order_id AS order_id,
            //     tdol.lpk_no AS lpk_no,
            //     tdol.lpk_date AS lpk_date,
            //     tdol.panjang_lpk AS panjang_lpk,
            //     tdol.qty_gentan AS qty_gentan,
            //     tdol.qty_gulung AS qty_gulung,
            //     tdol.qty_lpk AS qty_lpk,
            //     tdol.total_assembly_qty AS total_assembly_qty 
            // FROM
            //     tdProduct_Goods AS tdpg
            //     INNER JOIN tdOrderLpk AS tdol ON tdpg.lpk_id = tdol.ID 
            // $tglMasuk
            // $tglKeluar
            // $searchTerm
            // limit 5
            // ");
        } else {
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tdjkm.working_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tdjkm.working_date <= '" . $this->tglKeluar . "'";
            }
            $searchTerm = '';
            if (isset($this->searchTerm) && $this->searchTerm != '') {
                $searchTerm = "AND (tdol.lpk_no ilike '%" . $this->searchTerm . 
                "%' OR tdpg.production_no ilike '%" . $this->searchTerm . 
                "%' OR tdpg.product_id ilike '%" . $this->searchTerm .
                "%' OR tdpg.machine_id ilike '%" . $this->searchTerm . 
                "%')";
            }

            $jamkerja = DB::select("
            SELECT
                tdjkm.ID AS ID,
                tdjkm.working_date AS working_date,
                tdjkm.work_shift AS work_shift,
                tdjkm.machine_id AS machine_id,
                tdjkm.department_id AS department_id,
                tdjkm.employee_id AS employee_id,
                tdjkm.work_hour AS work_hour,
                tdjkm.off_hour AS off_hour,
                tdjkm.on_hour AS on_hour,
                tdjkm.created_by AS created_by,
                tdjkm.created_on AS created_on,
                tdjkm.updated_by AS updated_by,
                tdjkm.updated_on AS updated_on 
            FROM
                tdJamKerjaMesin AS tdjkm
            $tglMasuk
            $tglKeluar
            LIMIT 5
            ");
        }
    }

    public function edit($orderid)
    {
        $item = TdJamKerjaMesin::find($orderid);
        if($item){
            $machine=MsMachine::where('id', $item->machine_id)->first();
            $msemployee=MsEmployee::where('id', $item->employee_id)->first();

            $this->orderid = $item->id;
            $this->working_date = $item->working_date;
            $this->work_shift = $item->work_shift;
            $this->machineno = $machine->machineno;
            $this->machinename = $machine->machinename;
            $this->employeeno = $msemployee->employeeno;
            $this->empname = $msemployee->empname;
            $this->work_hour = Carbon::parse($item->work_hour)->format('H:i');
            $this->on_hour = Carbon::parse($item->on_hour)->format('H:i');
        }else{
            return redirect()->to('jam-kerja/seitai');
        }
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->working_date = '';
        $this->work_shift = '';
        $this->machineno = '';
        $this->employeeno = '';
        $this->work_hour = '';
        $this->on_hour = '';
    }

    public function save(){
        $validatedData = $this->validate([
            'working_date' => 'required',
            'work_shift' => 'required',
            'machineno' => 'required',
            'employeeno' => 'required',
            'work_hour' => 'required',
            'on_hour' => 'required'
        ]);

        try {
            if(isset($this->orderid)){
                $machine=MsMachine::where('machineno', $this->machineno)->first();
                $msemployee=MsEmployee::where('employeeno', $this->employeeno)->first();

                TdJamKerjaMesin::where('id',$this->orderid)->update([
                    'working_date' => $this->working_date,
                    'work_shift' => $this->work_shift,
                    'machine_id' => $machine->id,
                    'employee_id' => $msemployee->id,
                    'work_hour' => $this->work_hour,
                    'on_hour' => $this->on_hour
                ]);
                $this->reset(['employeeno', 'empname', 'machineno', 'machinename', 'working_date', 'work_shift']);
                $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            }else {
                $machine=MsMachine::where('machineno', $this->machineno)->first();
                $msemployee=MsEmployee::where('employeeno', $this->employeeno)->first();

                $orderlpk = new TdJamKerjaMesin();
                $orderlpk->working_date = $this->working_date;
                $orderlpk->work_shift = $this->work_shift;
                $orderlpk->machine_id = $machine->id;
                $orderlpk->employee_id = $msemployee->id;
                $orderlpk->work_hour = $this->work_hour;
                $orderlpk->on_hour = $this->on_hour;
                
                $orderlpk->save();
            }

            $this->reset(['employeeno', 'empname', 'machineno', 'machinename', 'working_date', 'work_shift']);
            $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            return redirect()->route('seitai-jam-kerja');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Failed to save the order: ' . $e->getMessage()]);
        }
    }

    public function render()
    {
        if(isset($this->machineno) && $this->machineno != ''){
            $machine=MsMachine::where('machineno', $this->machineno)->first();
            
            if($machine == null){
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Machine ' . $this->machineno . ' Tidak Terdaftar']);
            } else {
                $this->machinename = $machine->machinename;
            }
        }

        if(isset($this->employeeno) && $this->employeeno != ''){
            $msemployee=MsEmployee::where('employeeno', $this->employeeno)->first();

            if($msemployee == null){
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Employee ' . $this->employeeno . ' Tidak Terdaftar']);
            } else {
                $this->empname = $msemployee->empname;
            }
        }

        $jamkerja = DB::select("
        SELECT
            tdjkm.id AS orderid,
            tdjkm.working_date AS working_date,
            tdjkm.work_shift AS work_shift,
            tdjkm.machine_id AS machine_id,
            tdjkm.department_id AS department_id,
            tdjkm.employee_id AS employee_id,
            tdjkm.work_hour AS work_hour,
            tdjkm.off_hour AS off_hour,
            tdjkm.on_hour AS on_hour,
            tdjkm.created_by AS created_by,
            tdjkm.created_on AS created_on,
            tdjkm.updated_by AS updated_by,
            tdjkm.updated_on AS updated_on 
        FROM
            tdJamKerjaMesin AS tdjkm
        WHERE tdjkm.working_date >= '01-06-2024'
        AND tdjkm.working_date <= '29-06-2024'
        LIMIT 5
        ");

        return view('livewire.jam-kerja.seitai', ['jamkerja' => $jamkerja]);
    }
}
