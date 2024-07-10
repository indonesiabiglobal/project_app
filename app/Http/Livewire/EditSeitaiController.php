<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TdOrder;
use App\Models\MsBuyer;
use App\Models\MsEmployee;
use App\Models\MsLossSeitai;
use App\Models\MsMachine;
use App\Models\MsProduct;
use App\Models\MsWorkingShift;
use App\Models\TdOrderLpk;
use App\Models\TdProductAssembly;
use App\Models\TdProductGoods;
use App\Models\TdProductGoodsAssembly;
use App\Models\TdProductGoodsLoss;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EditSeitaiController extends Component
{
    public $orderId;
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
    public $production_no;
    public $detailsGentan = [];
    public $detailsLoss = [];
    public $tdpgId;
    public $berat_produksi;
    public $petugas;
    public $machine_no;
    public $namaloss;
    public $gentan_line;
    public $loss_seitai_id;
    public $berat_loss;

    public function mount($orderId)
    {
        $data = DB::table('tdproduct_goods AS tdpg')
        ->join('msproduct AS msp', 'tdpg.product_id', '=', 'msp.id')
        ->join('msmachine AS msm', 'tdpg.machine_id', '=', 'msm.id')
        ->join('tdorderlpk AS tdol', 'tdpg.lpk_id', '=', 'tdol.id')
        ->join('msemployee AS mse', 'tdpg.employee_id', '=', 'mse.id')
        ->join('msemployee AS mse2', 'tdpg.employee_id_infure', '=', 'mse2.id')
        ->select(
            'tdpg.id AS id', 
            'tdpg.production_no AS production_no', 
            'tdpg.production_date AS production_date', 
            'tdpg.employee_id AS employee_id', 
            'tdpg.employee_id_infure AS employee_id_infure', 
            'tdpg.work_shift AS work_shift', 
            'tdpg.work_hour AS work_hour', 
            'tdpg.machine_id AS machine_id', 
            'tdpg.lpk_id AS lpk_id', 
            'tdpg.product_id AS product_id', 
            'tdpg.qty_produksi AS qty_produksi', 
            'tdpg.seitai_berat_loss AS seitai_berat_loss', 
            'tdpg.infure_berat_loss AS infure_berat_loss', 
            'tdpg.nomor_palet AS nomor_palet', 
            'tdpg.nomor_lot AS nomor_lot', 
            'tdpg.seq_no AS seq_no', 
            'tdpg.status_production AS status_production', 
            'tdpg.status_warehouse AS status_warehouse', 
            'tdpg.kenpin_qty_loss AS kenpin_qty_loss', 
            'tdpg.kenpin_qty_loss_proses AS kenpin_qty_loss_proses', 
            'tdpg.created_by AS created_by', 
            'tdpg.created_on AS created_on', 
            'tdpg.updated_by AS updated_by', 
            'tdpg.updated_on AS updated_on', 
            'tdol.order_id AS order_id', 
            'tdol.lpk_no AS lpk_no', 
            'tdol.lpk_date AS lpk_date', 
            'tdol.panjang_lpk AS panjang_lpk', 
            'tdol.qty_gentan AS qty_gentan', 
            'tdol.qty_gulung AS qty_gulung', 
            'tdol.qty_lpk AS qty_lpk', 
            'tdol.total_assembly_qty AS total_assembly_qty',
            'msp.code',
            'msp.name',
            'msm.machineno',
            'msm.machinename',
            'mse.employeeno',
            'mse.empname',
            'mse2.employeeno as employeenoinfure',
            'mse2.empname as empnameinfure'
        )
        ->where('tdpg.id', $orderId)
        ->first();

        $this->tdpgId = $data->id;
        $this->production_no = $data->production_no;
        $this->production_date = Carbon::parse($data->production_date)->format('Y-m-d');
        $this->created_on = Carbon::parse($data->production_date)->format('Y-m-d');
        $this->lpk_no = $data->lpk_no;
        $this->lpk_date = $data->lpk_date;
        $this->qty_lpk = $data->qty_lpk;
        $this->code = $data->code;
        $this->name = $data->name;
        $this->machineno = $data->machineno;
        $this->machinename = $data->machinename;
        $this->employeeno = $data->employeeno;
        $this->empname = $data->empname;
        $this->qty_produksi = $data->qty_produksi;
        $this->nomor_palet = $data->nomor_palet;
        $this->nomor_lot = $data->nomor_lot;
        $this->infure_berat_loss = $data->infure_berat_loss;
        $this->employeenoinfure = $data->employeenoinfure;
        $this->empnameinfure = $data->empnameinfure;
        $this->work_hour = $data->work_hour;
        $this->work_shift = $data->work_shift;

        $this->detailsGentan = DB::table('tdproduct_assembly as tdpa')
        ->join('tdproduct_goods_assembly as tga', 'tga.product_assembly_id', '=', 'tdpa.id')
        ->leftJoin('msmachine as mm', 'mm.id', '=', 'tdpa.machine_id')
        ->leftJoin('msemployee as mse', 'mse.id', '=', 'tdpa.employee_id')
        ->select(
            'tga.id',
            'tdpa.gentan_no',
            'tga.gentan_line',
            'mm.machineno',
            'tdpa.work_shift',
            'mse.empname',
            'tdpa.production_date',
            'tdpa.berat_produksi'
        )
        ->where('tga.product_goods_id', $orderId)
        ->get();

        $this->detailsLoss = DB::table('tdproduct_goods_loss as tgl')
        ->join('mslossseitai as mss', 'mss.id', '=', 'tgl.loss_seitai_id')
        ->select(
            'tgl.id',
            'mss.code',
            'mss.name',
            'tgl.berat_loss'
        )
        ->where('tgl.product_goods_id', $orderId)
        ->get();
    }

    public function addGentan()
    {
        $validatedData = $this->validate([
            'lpk_no' => 'required',
            'nomor_palet' => 'required',
            'nomor_lot' => 'required',
        ]);

        if ($validatedData) {
            $this->emit('showModalGentan');
        }
    }

    public function addLoss()
    {
        $validatedData = $this->validate([
            'lpk_no' => 'required',
            'nomor_palet' => 'required',
            'nomor_lot' => 'required',
        ]);

        if ($validatedData) {
            $this->emit('showModalLoss');
        }
    }

    public function saveGentan()
    {
        $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();
        $assembly = TdProductAssembly::where('lpk_id', $lpkid->id)
                    ->first();

        $datas = new TdProductGoodsAssembly();
        $datas->product_goods_id = $this->tdpgId;
        $datas->product_assembly_id = $assembly->id;
        $datas->gentan_line = $this->gentan_line;
        $datas->lpk_id = $lpkid->id;
        
        $datas->save();

        $this->emit('closeModalGentan');
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Data Berhasil di Simpan']);
    }

    public function saveLoss()
    {
        $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();
        $loss = MsLossSeitai::where('code', $this->loss_seitai_id)
                    ->first();

        $datas = new TdProductGoodsLoss();
        $datas->product_goods_id = $this->tdpgId;
        $datas->loss_seitai_id = $loss->id;
        $datas->berat_loss = $this->berat_loss;
        $datas->lpk_id = $lpkid->id;
        
        $datas->save();

        $this->emit('closeModalGentan');
        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Data Berhasil di Simpan']);
    }

    public function save()
    {
        $validatedData = $this->validate([
            'lpk_no' => 'required',
        ]);

        try {
            $machine = MsMachine::where('machineno', $this->machineno)->first();
            $employe = MsEmployee::where('employeeno', $this->employeeno)->first();
            $employeinfure = MsEmployee::where('employeeno', $this->employeenoinfure)->first();

            $data = TdProductGoods::findOrFail($this->orderId);
            $data->production_date = $this->production_date;
            $data->machine_id = $machine->id;
            $data->employee_id = $employe->id;
            $data->employee_id_infure = $employeinfure->id;
            $data->qty_produksi = $this->qty_produksi;
            $data->nomor_palet = $this->nomor_palet; 
            $data->nomor_lot = $this->nomor_lot;
            $data->infure_berat_loss = $this->infure_berat_loss; 
            $data->work_shift = $this->work_shift;
            $data->work_hour = $this->work_hour;  
            
            $data->save();

            DB::commit();
            session()->flash('notification', ['type' => 'success', 'message' => 'Order saved successfully.']);
            return redirect()->route('nippo-seitai');
        } catch (\Exception $e) {
            DB::rollBack();
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

                $this->detailsGentan = DB::table('tdproduct_assembly as tdpa')
                ->join('tdproduct_goods_assembly as tga', 'tga.product_assembly_id', '=', 'tdpa.id')
                ->leftJoin('msmachine as mm', 'mm.id', '=', 'tdpa.machine_id')
                ->leftJoin('msemployee as mse', 'mse.id', '=', 'tdpa.employee_id')
                ->select(
                    'tga.id',
                    'tdpa.gentan_no',
                    'tga.gentan_line',
                    'mm.machineno',
                    'tdpa.work_shift',
                    'mse.empname',
                    'tdpa.production_date',
                    'tdpa.berat_produksi'
                )
                ->where('tga.product_goods_id', $this->tdpgId)
                ->get();

                $this->detailsLoss = DB::table('tdproduct_goods_loss as tgl')
                ->join('mslossseitai as mss', 'mss.id', '=', 'tgl.loss_seitai_id')
                ->select(
                    'tgl.id',
                    'mss.code',
                    'mss.name',
                    'tgl.berat_loss'
                )
                ->where('tgl.product_goods_id', $this->tdpgId)
                ->get();
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

        if(isset($this->gentan_no) && $this->gentan_no != ''){
            $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();
            // $tdProduct=TdProductAssembly::where('gentan_no', $this->gentan_no)->where('lpk_id', $lpkid->id)->first();
            $tdProduct = DB::table('tdproduct_assembly as tdpa')
                        ->leftJoin('msmachine as mm', 'mm.id', '=', 'tdpa.machine_id')
                        ->leftJoin('msemployee as mse', 'mse.id', '=', 'tdpa.employee_id')
                        ->select(
                            'mm.machineno',
                            'mse.empname',
                            'tdpa.berat_produksi'
                        )
                        ->where('lpk_id', $lpkid->id)
                        ->where('gentan_no', $this->gentan_no)
                        ->first();

            if($tdProduct == null){
                $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'Nomor Gentan ' . $this->employeenoinfure . ' Tidak Terdaftar']);
            } else {
                $this->petugas = $tdProduct->empname;
                $this->machine_no = $tdProduct->machineno;
                $this->berat_produksi = $tdProduct->berat_produksi;
            }
        }

        if(isset($this->loss_seitai_id) && $this->loss_seitai_id != ''){
            $lossSeitai = MsLossSeitai::where('code', $this->loss_seitai_id)->first();

            if($lossSeitai == null){
                $this->dispatchBrowserEvent('notification', ['type' => 'warning', 'message' => 'Kode Loss ' . $this->employeenoinfure . ' Tidak Terdaftar']);
            } else {
                $this->namaloss = $lossSeitai->name;
            }
        }

        // $lpkid = TdOrderLpk::where('lpk_no', $this->lpk_no)->first();

        // $this->gentan_no = 1;
        // if (!empty($lpkid)) {
        //     $lastGentan = TdProductAssembly::where('lpk_id', $lpkid->lpk_id)
        //         ->max('gentan_no');

        //     $nogentan = 1;
        //     if(!empty($lastGentan)){
        //         $nogentan = $lastGentan->seq_no + 1;
        //     }
        //     $this->gentan_no=$nogentan;
        // }

        return view('livewire.nippo-seitai.edit-seitai');
    }
}

