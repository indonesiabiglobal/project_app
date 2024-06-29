<?php

namespace App\Exports;

use App\Models\MsProduct;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class InfureExport implements FromCollection, WithHeadings
{
    // use Exportable;
    protected $tglMasuk;
    protected $tglKeluar;
    protected $noprosesawal;
    protected $noprosesakhir;
    protected $lpk_no;
    protected $code;

    public function __construct($tglMasuk, $tglKeluar, $noprosesawal, $noprosesakhir, $lpk_no, $code)
    {
        $this->tglMasuk = $tglMasuk;
        $this->tglKeluar = $tglKeluar;
        $this->noprosesawal = $noprosesawal;
        $this->noprosesakhir = $noprosesakhir;
        $this->lpk_no = $lpk_no;
        $this->code = $code;
    }

    public function collection()
    {
        // if($this->filter == 2){
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tdpa.production_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tdpa.production_date <= '" . $this->tglKeluar . "'";
            }
        // } else {
        //     $tglMasuk = '';
        //     if (isset($this->tglMasuk) && $this->tglMasuk != '') {
        //         $tglMasuk = "WHERE tod.processdate >= '" . $this->tglMasuk . "'";
        //     }
        //     $tglKeluar = '';
        //     if (isset($this->tglKeluar) && $this->tglKeluar != '') {
        //         $tglKeluar = "AND tod.processdate <= '" . $this->tglKeluar . "'";
        //     }
        // }
        $noprosesawal = '';
        if (isset($this->noprosesawal) && $this->noprosesawal != '') {
            $noprosesawal = "AND tdpa.seq_no >= '" . $this->noprosesawal . "'";
        }
        $noprosesakhir = '';
        if (isset($this->noprosesakhir) && $this->noprosesakhir != '') {
            $noprosesakhir = "AND tdpa.seq_no <= '" . $this->noprosesakhir . "'";
        }
        $lpk_no = '';
        if (isset($this->lpk_no) && $this->lpk_no != '') {
            $lpk_no = "AND tdol.lpk_no = '" . $this->lpk_no . "'";
        }
        // $code = '';
        // if (isset($this->code) && $this->code != '') {
        //     $code = "AND tdol.lpk_no = '" . $this->code . "'";
        // }

        return collect(DB::select("
            SELECT 
                tdpa.id AS id, 
                tdpa.production_no AS production_no, 
                tdpa.production_date AS production_date, 
                tdpa.employee_id AS employee_id, 
                tdpa.work_shift AS work_shift, 
                tdpa.work_hour AS work_hour, 
                tdpa.machine_id AS machine_id, 
                tdpa.lpk_id AS lpk_id, 
                tdpa.product_id AS product_id, 
                tdpa.panjang_produksi AS panjang_produksi, 
                tdpa.panjang_printing_inline AS panjang_printing_inline, 
                tdpa.berat_standard AS berat_standard, 
                tdpa.berat_produksi AS berat_produksi, 
                tdpa.nomor_han AS nomor_han, 
                tdpa.gentan_no AS gentan_no, 
                tdpa.seq_no AS seq_no, 
                tdpa.status_production AS status_production, 
                tdpa.status_kenpin AS status_kenpin, 
                tdpa.infure_cost AS infure_cost, 
                tdpa.infure_cost_printing AS infure_cost_printing, 
                tdpa.infure_berat_loss AS infure_berat_loss, 
                tdpa.kenpin_berat_loss AS kenpin_berat_loss, 
                tdpa.kenpin_meter_loss AS kenpin_meter_loss, 
                tdpa.kenpin_meter_loss_proses AS kenpin_meter_loss_proses, 
                tdpa.created_by AS created_by, 
                tdpa.created_on AS created_on, 
                tdpa.updated_by AS updated_by, 
                tdpa.updated_on AS updated_on, 
                tdol.order_id AS order_id, 
                tdol.lpk_no AS lpk_no, 
                tdol.lpk_date AS lpk_date, 
                tdol.panjang_lpk AS panjang_lpk, 
                tdol.qty_gentan AS qty_gentan, 
                tdol.qty_gulung AS qty_gulung, 
                tdol.qty_lpk AS qty_lpk, 
                tdol.total_assembly_line AS total_assembly_line, 
                tdol.total_assembly_qty AS total_assembly_qty
            FROM tdProduct_assembly AS tdpa
                INNER JOIN tdOrderLpk AS tdol ON tdpa.lpk_id = tdol.id
            $tglMasuk
            $tglKeluar
            $noprosesawal
            $noprosesakhir
            $lpk_no
        "));
    }

    public function headings(): array
    {
        return [
            'ID', 'PO No', 'Tanggal Produksi', 'Product Code', 'Buyer Name', 
            'Order Qty', 'Order Date', 'Stufing Date', 'ETD Date', 
            'ETA Date', 'Process Date', 'Process Seq', 'Updated By', 'Updated On'
        ];
    }
}

