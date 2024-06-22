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

    public function collection()
    {
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
            limit 5
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

