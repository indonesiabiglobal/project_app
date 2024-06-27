<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use App\Models\MsEmployee;
use App\Models\MsMachine;
use App\Models\MsProduct;
use App\Models\MsWorkingShift;
use App\Models\TdOrderLpk;
use App\Models\TdProductAssembly;
use App\Models\TdProductGoods;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddSeitaiController extends Component
{
    public $production_date;
    public $created_on;
    public $work_hour;
    public $lpk_date;
    public $panjang_lpk;
    public $code;
    public $name;
    public $dimensiinfure;
    public $qty_gulung;
    public $qty_gentan;
    public $machinename;
    public $empname;
    public $gentan_no;
    public $lpk_no;
    public $qty_lpk;
    public $machineno;
    public $employeeno;
    public $employeenoinfure;
    public $empnameinfure;
    public $work_shift;
    public $nomor_lot;
    public $qty_produksi;
    public $nomor_palet;
    public $infure_berat_loss;

    public function mount()
    {
        $this->production_date = Carbon::now()->format('Y-m-d');
        $this->created_on = Carbon::now()->format('Y-m-d');
        $this->work_hour = Carbon::now()->format('H:i:s');
        $workingShift = MsWorkingShift::where('work_hour_from', '<=', $this->work_hour)->where('work_hour_till', '>=', $this->work_hour)->first();
        $this->work_shift = $workingShift->id;
    }

    public function save()
    {
        $validatedData = $this->validate([
            'lpk_no' => 'required',
        ]);

        try {
            $lastSeq = TdProductAssembly::whereDate('created_on', Carbon::today())
                    ->orderBy('seq_no', 'desc')
                    ->first();
            $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();
            $machine = MsMachine::where('machineno', $this->machineno)->first();
            $employe = MsEmployee::where('employeeno', $this->employeeno)->first();
            $employeinfure = MsEmployee::where('employeeno', $this->employeenoinfure)->first();
            $products = MsProduct::where('code', $this->code)->first();

            $seqno = 1;
            if(!empty($lastSeq)){
                $seqno = $lastSeq->seq_no + 1;
            }
            $today = Carbon::now();
            // dd($today->format('dmy').'-'.$seqno);

            $data = new TdProductGoods();
            $data->production_no = $today->format('dmy').'-'.$seqno;
            $data->production_date = $this->production_date;
            $data->employee_id = $employe->id;
            $data->employee_id_infure = $employeinfure->id;
            $data->work_shift = $this->work_shift;
            $data->work_hour = $this->work_hour;
            $data->machine_id = $machine->id;
            $data->lpk_id = $lpkid->id;
            $data->product_id = $products->id;
            $data->qty_produksi = $this->qty_produksi;
            $data->infure_berat_loss = $this->infure_berat_loss;
            $data->seq_no = $seqno;  
            $data->nomor_palet = $this->nomor_palet;
            $data->nomor_lot = $this->nomor_lot;
            $data->created_on = $this->created_on;            
            
            $data->save();

            session()->flash('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            return redirect()->route('nippo-seitai');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Failed to save the order: ' . $e->getMessage()]);
        } 
    }

    public function cancel()
    {
        return redirect()->route('nippo-seitai');
    }

    public function render()
    {
        if(isset($this->lpk_no) && $this->lpk_no != ''){
            $tdorderlpk = DB::table('tdorderlpk as tolp')
            ->select(
                'tolp.lpk_date',
                'tolp.panjang_lpk',                
                'tolp.created_on',
                'tolp.qty_lpk',
                'mp.code',
                'mp.name',
                'mp.ketebalan',
                'mp.diameterlipat',
                'tolp.qty_gulung',
                'tolp.qty_gentan'
            )
            ->join('msproduct as mp', 'mp.id', '=', 'tolp.product_id')
            ->where('tolp.lpk_no', $this->lpk_no)
            ->first();

            if($tdorderlpk == null){
                // session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Nomor LPK ' . $this->lpk_no . ' Tidak Terdaftar']);
            } else {
                $this->lpk_date = Carbon::parse($tdorderlpk->lpk_date)->format('Y-m-d');
                $this->panjang_lpk = $tdorderlpk->panjang_lpk;
                $this->created_on = Carbon::parse($tdorderlpk->created_on)->format('Y-m-d');
                $this->code = $tdorderlpk->code;
                $this->name = $tdorderlpk->name;
                $this->dimensiinfure = $tdorderlpk->ketebalan.'x'.$tdorderlpk->diameterlipat;
                $this->qty_gulung = $tdorderlpk->qty_gulung;
                $this->qty_gentan = $tdorderlpk->qty_gentan;
                $this->qty_lpk = $tdorderlpk->qty_lpk;
            }
        }

        if(isset($this->machineno) && $this->machineno != ''){
            $machine=MsMachine::where('machineno', $this->machineno)->first();
            // dd($machine);
            if($machine == null){
                // session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Machine ' . $this->machineno . ' Tidak Terdaftar']);
            } else {
                $this->machinename = $machine->machinename;
            }
        }

        if(isset($this->employeeno) && $this->employeeno != ''){
            $msemployee=MsEmployee::where('employeeno', $this->employeeno)->first();

            if($msemployee == null){
                // session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Employee ' . $this->employeeno . ' Tidak Terdaftar']);
            } else {
                $this->empname = $msemployee->empname;
            }
        }

        if(isset($this->employeenoinfure) && $this->employeenoinfure != ''){
            $msemployeeinfure=MsEmployee::where('employeeno', $this->employeenoinfure)->first();

            if($msemployeeinfure == null){
                // session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Employee ' . $this->employeenoinfure . ' Tidak Terdaftar']);
            } else {
                $this->empnameinfure = $msemployeeinfure->empname;
            }
        }

        $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();

        $this->gentan_no = 1;
        if (!empty($lpkid)) {
            $lastGentan = TdProductAssembly::where('lpk_id', $lpkid->lpk_id)
                ->max('gentan_no');

            $nogentan = 1;
            if(!empty($lastGentan)){
                $nogentan = $lastGentan->seq_no + 1;
            }
            $this->gentan_no=$nogentan;
        }

        return view('livewire.nippo-seitai.add-seitai');
    }
}

