<?php

namespace App\Exports;

use App\Models\MsProduct;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ProductsExport implements FromCollection, WithHeadings
{
    // use Exportable;
    protected $tglMasuk;
    protected $tglKeluar;
    protected $buyer_id;
    protected $filter;

    public function __construct($tglMasuk, $tglKeluar, $buyer_id, $filter)
    {
        $this->tglMasuk = $tglMasuk;
        $this->tglKeluar = $tglKeluar;
        $this->buyer_id = $buyer_id;
        $this->filter = $filter;
    }

    public function collection()
    {
        if($this->filter == 2){
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tod.order_date >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tod.order_date <= '" . $this->tglKeluar . "'";
            }
        } else {
            $tglMasuk = '';
            if (isset($this->tglMasuk) && $this->tglMasuk != '') {
                $tglMasuk = "WHERE tod.processdate >= '" . $this->tglMasuk . "'";
            }
            $tglKeluar = '';
            if (isset($this->tglKeluar) && $this->tglKeluar != '') {
                $tglKeluar = "AND tod.processdate <= '" . $this->tglKeluar . "'";
            }
        }
        $buyer_id = '';
        if (isset($this->buyer_id) && $this->buyer_id != '') {
            $buyer_id = "AND tod.buyer_id = '" . $this->buyer_id . "'";
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
            $buyer_id
        "));
    }

    public function headings(): array
    {
        return [
            'ID', 'PO No', 'Produk Name', 'Product Code', 'Buyer Name', 
            'Order Qty', 'Order Date', 'Stufing Date', 'ETD Date', 
            'ETA Date', 'Process Date', 'Process Seq', 'Updated By', 'Updated On'
        ];
    }
}

