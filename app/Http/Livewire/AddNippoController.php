<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use App\Models\MsEmployee;
use App\Models\MsLossInfure;
use App\Models\MsMachine;
use App\Models\MsProduct;
use App\Models\MsWorkingShift;
use App\Models\TdOrderLpk;
use App\Models\TdProductAssembly;
use App\Models\TdProductAssemblyLoss;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddNippoController extends Component
{
    public $production_date;
    public $created_on;
    public $lpk_no;
    public $lpk_date;
    public $panjang_lpk;
    public $dimensiinfure;
    public $code;
    public $name;
    public $machineno;
    public $machinename;
    public $empname;
    public $employeeno;
    public $qty_gulung;
    public $qty_gentan;
    public $work_hour;
    public $work_shift;
    public $gentan_no;
    public $nomor_han;
    public $name_infure;
    public $loss_infure_id;
    public $berat_loss;
    public $details = [];
    public $orderid;

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
            'production_date' => 'required',
            'created_on' => 'required',
            'lpk_no' => 'required',
            'machineno' => 'required',
            'employeeno' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $lastSeq = TdProductAssembly::whereDate('created_on', Carbon::today())
                    ->orderBy('seq_no', 'desc')
                    ->first();
            $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();
            $machine = MsMachine::where('machineno', $this->machineno)->first();
            $employe = MsEmployee::where('employeeno', $this->employeeno)->first();
            $products = MsProduct::where('code', $this->code)->first();

            $seqno = 1;
            if(!empty($lastSeq)){
                $seqno = $lastSeq->seq_no + 1;
            }
            $today = Carbon::now();

            $product = new TdProductAssembly();
            $product->production_no = $today->format('dmy').'-'.$seqno;
            $product->production_date = $this->production_date;
            $product->created_on = $this->created_on;
            $product->machine_id = $machine->id;
            $product->employee_id = $employe->id;
            $product->work_shift = $this->work_shift;
            $product->work_hour = $this->work_hour;
            $product->lpk_id = $lpkid->id;            
            $product->seq_no = $seqno;
            $product->gentan_no = $this->gentan_no;
            $product->nomor_han = $this->nomor_han;
            $product->product_id = $products->id;
            $product->save();

            TdProductAssemblyLoss::where('lpk_id',$lpkid->id)->update([
                'product_assembly_id' => $product->id,
            ]);            

            // $product->panjang_produksi = $this->panjang_produksi;
            // $product->panjang_printing_inline = $this->panjang_printing_inline;
            // $product->berat_standard = $this->berat_standard;
            // $product->berat_produksi = $this->berat_produksi;            
            // $product->status_production = $this->status_production;
            // $product->status_kenpin = $this->status_kenpin;
            // $product->infure_cost = $this->infure_cost;
            // $product->product_id = $this->product_id;
            
            $transStatus = 'true';            
        } catch (\Exception $e) {            
            $transStatus = 'false';
        }
        
        if ($transStatus == 'true') {
            session()->flash('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            // return redirect()->route('nippo-infure');
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Failed to save the order: ' . $e->getMessage()]);
            DB::rollBack();
        }
    }

    public function addLossInfure()
    {
        $validatedData = $this->validate([
            'lpk_no' => 'required',
            'machineno' => 'required',
            'employeeno' => 'required',
            // 'panjang_produksi' => 'required',
            // 'qty_gentan' => 'required'
        ]);

        if ($validatedData) {
            $this->emit('showModal');
        }
    }

    public function saveInfure()
    {
        $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();

        $datas = new TdProductAssemblyLoss();
        $datas->loss_infure_id = $this->loss_infure_id;
        $datas->berat_loss = $this->berat_loss;
        $datas->lpk_id = $lpkid->id;
        
        $datas->save();

        $this->emit('closeModal');
    }

    public function deleteInfure($orderId)
    {
        $data = TdProductAssemblyLoss::findOrFail($orderId);
        $data->delete();

        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Data Berhasil di Hapus']);
    }

    public function cancel()
    {
        return redirect()->route('nippo-infure');
    }

    public function render()
    {
        if(isset($this->lpk_no) && $this->lpk_no != ''){
            $tdorderlpk = DB::table('tdorderlpk as tolp')
            ->select(
                'tolp.id',
                'tolp.lpk_date',
                'tolp.panjang_lpk',                
                'tolp.created_on',
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

                $this->details = DB::table('tdproduct_assembly_loss as tal')
                ->select(
                    'tal.loss_infure_id',
                    'tal.berat_loss',
                    'tal.id',
                    'msi.name as name_infure'
                )
                ->join('mslossinfure as msi', 'msi.id', '=', 'tal.loss_infure_id')
                ->where('tal.lpk_id', $tdorderlpk->id)
                ->get();
            }
        }

        if(isset($this->machineno) && $this->machineno != ''){
            $machine=MsMachine::where('machineno', $this->machineno)->first();

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

        if(isset($this->loss_infure_id) && $this->loss_infure_id != ''){
            $lossinfure=MsLossInfure::where('id', $this->loss_infure_id)->first();

            if($lossinfure == null){
                // session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Employee ' . $this->loss_infure_id . ' Tidak Terdaftar']);
            } else {
                $this->name_infure = $lossinfure->name;
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

        return view('livewire.nippo-infure.add-nippo');
    }
}

