<?php

namespace App\Exports;

use App\Models\MsProduct;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class KenpinExport implements FromCollection, WithHeadings
{
    protected $tglMasuk;
    protected $tglKeluar;

    public function __construct($tglMasuk, $tglKeluar)
    {
        $this->tglMasuk = $tglMasuk;
        $this->tglKeluar = $tglKeluar;
    }

    public function collection()
    {
        // if($this->filter == 2){
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tod.order_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tod.order_date <= '" . $this->tglKeluar . "'";
            }
        // } 
        // else {
        //     $tglMasuk = '';
        //     if (isset($this->tglMasuk) && $this->tglMasuk != '') {
        //         $tglMasuk = "WHERE tod.processdate >= '" . $this->tglMasuk . "'";
        //     }
        //     $tglKeluar = '';
        //     if (isset($this->tglKeluar) && $this->tglKeluar != '') {
        //         $tglKeluar = "AND tod.processdate <= '" . $this->tglKeluar . "'";
        //     }
        // }
        // $buyer_id = '';
        // if (isset($this->buyer_id) && $this->buyer_id != '') {
        //     $buyer_id = "AND tod.buyer_id = '" . $this->buyer_id . "'";
        // }
        return collect(DB::select("
            SELECT
                tod.id,
                tod.po_no,
                mp.name AS produk_name,
                tod.product_code,
                mbu.NAME AS buyer_name,
                tod.order_qty,
                tod.order_date,
                tod.stufingdate,
                tod.etddate,
                tod.etadate,
                tod.processdate,
                tod.processseq,
                tod.updated_by,
                tod.updated_on 
            FROM
                tdorder AS tod
            INNER JOIN msproduct AS mp ON mp.id = tod.product_id
            INNER JOIN msbuyer AS mbu ON mbu.id = tod.buyer_id
            $tglMasuk
            $tglKeluar
        "));
    }

    public function headings(): array
    {
        return [
            'Kode','Nama Produk','Nomor Kenpin','Status','Tanggal Kenpin','PIC Kenpin','Nomor LPK','NG','Nomor Gentan','Nomor Mesin','Nomor Han','Tanggal Produksi','Kode Shift','Panjang Infure (meter)','Berat Loss (kg)'
        ];
    }
}

