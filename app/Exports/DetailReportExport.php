<?php

namespace App\Exports;

use App\Models\MsProduct;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class DetailReportExport implements FromCollection, WithHeadings
{
    // use Exportable;
    protected $tglMasuk;
    protected $tglKeluar;
    protected  $nippo;
    protected $nolpk;
    protected $noorder;

    public function __construct($tglMasuk, $tglKeluar, $nippo,$nolpk,$noorder)
    {
        $this->tglMasuk = $tglMasuk;
        $this->tglKeluar = $tglKeluar;
        $this->nippo = $nippo;
        $this->nolpk = $nolpk;
        $this->noorder = $noorder;
    }

    public function collection()
    {
        $tglMasuk = '';
        if (isset($this->tglMasuk) && $this->tglMasuk != '') {
            $tglMasuk = "WHERE tod.processdate >= '" . $this->tglMasuk . "'";
        }
        $tglKeluar = '';
        if (isset($this->tglKeluar) && $this->tglKeluar != '') {
            $tglKeluar = "AND tod.processdate <= '" . $this->tglKeluar . "'";
        }

        if ($this->nippo==1){
                return collect(DB::select("
                SELECT
                    tdpa.production_date AS tglproduksi,
                    tdpa.employee_id AS employee_id, 
                    mse.employeeno AS nik,
                    mse.empname AS namapetugas,
                    msd.name AS deptpetugas,
                    tdpa.work_shift AS work_shift, 
                    tdpa.work_hour AS work_hour, 
                    tdpa.machine_id AS machine_id,
                    msm.machineno AS nomesin,
                    msm.machinename AS namamesin,
                    tdpa.product_id AS product_id,
                    msp.code AS produkcode,
                    msp.name AS namaproduk,
                    tdpa.lpk_id AS lpk_id, 
                    tdol.lpk_no AS lpk_no,
                    tdpa.nomor_han AS nomor_han, 
                    tdpa.gentan_no AS gentan_no,
                    tdpa.panjang_produksi AS panjang_produksi, 
                    tdpa.panjang_printing_inline AS panjang_printing_inline, 
                    tdpa.berat_produksi AS berat_produksi,
                    msli.code AS losscode,
                    msli.name AS lossname,
                    tdpal.berat_loss 
                FROM tdProduct_Assembly AS tdpa
                INNER JOIN tdOrderLpk AS tdol ON tdpa.lpk_id = tdol.id
                INNER JOIN msEmployee AS mse ON mse.id = tdpa.employee_id
                INNER JOIN msMachine AS msm ON msm.id = tdpa.machine_id
                INNER JOIN msProduct AS msp ON msp.id = tdpa.product_id
                INNER JOIN msDepartment AS msd ON msd.id = mse.department_id
                LEFT JOIN tdProduct_Assembly_Loss AS tdpal ON tdpal.product_assembly_id = tdpa.id
                LEFT JOIN msLossInfure AS msli ON msli.id = tdpal.loss_infure_id
                WHERE tdpa.production_date >= '$this->tglMasuk'
                AND tdpa.production_date <= '$this->tglKeluar'
                AND tdpa.product_id = 1309;
            "));
        }else{
             return collect(DB::select("
             
             "));

        }

        
    }

    public function headings(): array
    {
        return [
            'Kode','Nama Produk','Tanggal Produksi','Jam','NIK','Nama Petugas','Dept. Petugas','Mesin','No LPK','Nomor Gentan','Nomor Han','Panjang Produksi (meter)','Berat Produksi (kg)','Loss','Berat Loss (kg)'
        ];
    }
}

