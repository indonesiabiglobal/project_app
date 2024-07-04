<?php

namespace App\Exports;

use App\Models\MsProduct;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class GeneralReportExport implements FromCollection, WithHeadings
{
    // use Exportable;
    protected $tglMasuk;
    protected $tglKeluar;

    public function __construct($tglMasuk, $tglKeluar)
    {
        $this->tglMasuk = $tglMasuk;
        $this->tglKeluar = $tglKeluar;
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
            'Departemen','Kode Mesin','Nama Mesin','Berat Standar(kg)','Berat Produksi (kg)',
            'Weight Rate','Infure Cost','Loss (kg)','Loss (%)','Panjang Infure (Meter)','Inline Printing (Meter)','Inline Printing Cost','Proses Cost','Jam Jalan (h:m)','Jam Off (h:m)','(%) Jalan Mesin'
        ];
    }
}

