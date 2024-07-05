<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsEmployee;
use App\Models\TdKenpinAssembly;
use App\Models\TdKenpinAssemblyDetail;
use App\Models\TdProductAssembly;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AddKenpinController extends Component
{
    public $kenpin_date;
    public $kenpin_no;
    public $lpk_no;
    public $lpk_date;
    public $panjang_lpk;
    public $code;
    public $name;
    public $employeeno;
    public $empname;
    public $remark;
    public $status_kenpin;
    public $details = [];
    public $lpk_id;
    public $gentan_no;
    public $machineno;
    public $namapetugas;
    public $berat_loss;
    public $orderid;

    public function mount()
    {
        $this->kenpin_date = Carbon::now()->format('Y-m-d');
        $today = Carbon::now();
        $this->kenpin_no = $today->format('ym').'-001';
    }

    public function addGentan()
    {
        $validatedData = $this->validate([
            'kenpin_date' => 'required',
            'lpk_no' => 'required',
            'employeeno' => 'required',
        ]);

        if ($validatedData) {
            $this->emit('showModal');
        }
    }

    public function saveGentan()
    {
        $validatedData = $this->validate([
            'gentan_no' => 'required',
            'berat_loss' => 'required',
        ]);
        
        // $lpkid = TdProductAssembly::where('lpk_id', $this->lpk_id)->first();

        $datas = new TdKenpinAssemblyDetail();
        $datas->product_assembly_id = $this->lpk_id;
        $datas->berat_loss = $this->berat_loss;
        $datas->trial468 = 'T';
        // $datas->lpk_id = $lpkid->lpk_id;
        
        $datas->save();
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Data Berhasil di Hapus']);

        $this->emit('closeModal');
    }

    public function deleteInfure($orderId)
    {
        $data = TdKenpinAssemblyDetail::findOrFail($orderId);
        $data->delete();

        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Data Berhasil di Hapus']);
    }

    public function save()
    {
        $validatedData = $this->validate([
            'employeeno' => 'required',
            'status_kenpin' => 'required',
            'lpk_no' => 'required'
        ]);

        DB::beginTransaction();
        try {

            $mspetugas=MsEmployee::where('employeeno', $this->employeeno)->first();
            
            $product = new TdKenpinAssembly();
            $product->kenpin_no = $this->kenpin_no;
            $product->kenpin_date = $this->kenpin_date;
            $product->employee_id = $mspetugas->id;
            $product->lpk_id = $this->lpk_id;
            $product->berat_loss = $this->berat_loss;
            $product->remark = $this->remark;
            $product->status_kenpin = $this->status_kenpin;
            $product->save();

            TdKenpinAssemblyDetail::where('product_assembly_id', $this->lpk_id)->update([
                'kenpin_assembly_id' => $product->id,
            ]);
            
            DB::commit();
            $transStatus = 'true';            
        } catch (\Exception $e) {            
            $transStatus = 'false';
            DB::rollBack();
        }
        
        if ($transStatus == 'true') {
            session()->flash('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            return redirect()->route('kenpin-infure');
        } else {
            $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Failed to save the order: ' . $e->getMessage()]);
        }
    }

    public function cancel()
    {
        return redirect()->route('kenpin-infure');
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
            // dd($tdorderlpk);

            if($tdorderlpk == null){
                // session()->flash('error', 'Nomor PO ' . $this->po_no . ' Tidak Terdaftar');
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Nomor LPK ' . $this->lpk_no . ' Tidak Terdaftar']);
            } else {
                $this->lpk_date = Carbon::parse($tdorderlpk->lpk_date)->format('Y-m-d');
                $this->panjang_lpk = $tdorderlpk->panjang_lpk;
                $this->code = $tdorderlpk->code;
                $this->name = $tdorderlpk->name;
                $this->lpk_id = $tdorderlpk->id;

                $this->details = DB::table('tdproduct_assembly AS tdpa')
                ->select(
                    'tad.id AS id',
                    'tdpa.lpk_id',
                    'tdol.lpk_no AS lpk_no',
                    'tdol.lpk_date AS lpk_date',
                    'tdol.panjang_lpk AS panjang_lpk',
                    'tdpa.production_date AS tglproduksi',
                    'tdpa.employee_id AS employee_id',
                    'mse.empname AS namapetugas',
                    'tdpa.work_shift AS work_shift',
                    'tdpa.work_hour AS work_hour',
                    'tdpa.machine_id AS machine_id',
                    'msm.machineno AS nomesin',
                    'msm.machinename AS namamesin',
                    'tdpa.nomor_han AS nomor_han',
                    'tdpa.gentan_no AS gentan_no',
                    'tdpa.product_id',
                    'msp.code AS code',
                    'msp.name AS namaproduk',
                    'tad.berat_loss'
                )
                ->join('tdorderlpk AS tdol', 'tdpa.lpk_id', '=', 'tdol.id')
                ->join('msemployee AS mse', 'mse.id', '=', 'tdpa.employee_id')
                ->join('msproduct AS msp', 'msp.id', '=', 'tdpa.product_id')
                ->join('msmachine AS msm', 'msm.id', '=', 'tdpa.machine_id')
                ->join('tdkenpin_assembly_detail AS tad', 'tad.product_assembly_id', '=', 'tdpa.lpk_id')
                ->where('tdpa.lpk_id', $this->lpk_id)
                ->get();
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

        if(isset($this->gentan_no) && $this->gentan_no != ''){
            $gentan=DB::table('tdproduct_assembly AS tdpa')
            ->select(
                'tdpa.id AS id',
                'mse.empname AS namapetugas',
                'msm.machineno AS nomesin',
            )
            ->join('msemployee AS mse', 'mse.id', '=', 'tdpa.employee_id')
            ->join('msmachine AS msm', 'msm.id', '=', 'tdpa.machine_id')
            ->where('tdpa.lpk_id', $this->lpk_id)
            ->where('tdpa.gentan_no', $this->gentan_no)
            ->first();

            if($gentan == null){
                $this->dispatchBrowserEvent('notification', ['type' => 'error', 'message' => 'Nomor Gentan ' . $this->gentan_no . ' Tidak Terdaftar']);
            } else {
                $this->machineno = $gentan->nomesin;
                $this->namapetugas = $gentan->namapetugas;
            }
        }

        return view('livewire.kenpin.add-kenpin');
    }
}

