<?php

namespace App\Http\Livewire;

use App\Exports\OrderEntryExport;
use App\Exports\OrderEntryImport;
use App\Models\MsBuyer;
use App\Models\MsProduct;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithPagination;

class OrderLpkController extends Component
{
    public $tdOrder = [];
    public $products = [];
    public $buyer;
    public $tglMasuk;
    public $tglKeluar;
    public $searchTerm;
    public $idProduct;
    public $idBuyer;
    public $transaksi;
    public $status;

    use WithFileUploads;
    public $file;

    use WithPagination;
    public $headers;
    public $currentPage = 1;

    private function headerConfig()
    {
        return [
            'id' => '#',
            'po_no' => 'PO Number',
            'produk_name' => 'Nama Produk',
            'product_code' => 'Kode Produk',
            'buyer_name' => 'Buyer',
            'order_qty' => 'Quantity',
            'order_date' => 'Tgl. Order',
            'etddate' => 'Etd',
            'processdate' => 'Tgl Proses',
            // 'seq_no' => 'No.',
        ];
    }

    public function mount()
    {
        $this->products = MsProduct::get();
        $this->buyer = MsBuyer::limit(10)->get();
        $this->tglMasuk = Carbon::now()->format('Y-m-d');
        $this->tglKeluar = Carbon::now()->format('Y-m-d');
        
        $this->headers = $this->headerConfig();
    }

    public function search(){
        $this->render();
    }

    public function add()
    {
        return redirect()->route('add-order');
    }

    public function previousPage()
    {
        if ($this->currentPage > 1) {
            $this->currentPage--;
        }
    }

    public function nextPage()
    {
        $this->currentPage++;
    }

    public function download()
    {
        return Excel::download(new OrderEntryExport, 'Template_Order.xlsx');
    }

    public function updatedFile()
    {
        $this->import();
    }

    public function import()
    {   
        $this->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        Excel::import(new OrderEntryImport, $this->file->path());

        $this->dispatchBrowserEvent('notification', ['type' => 'success', 'message' => 'Excel imported successfully.']);
    }

    public function render()
    {
        $data = DB::table('tdorder AS tod')
            ->select('tod.id', 'tod.po_no', 'mp.name AS produk_name', 'tod.product_code', 
                     'mbu.name AS buyer_name', 'tod.order_qty', 'tod.order_date', 
                     'tod.stufingdate', 'tod.etddate', 'tod.etadate', 
                     'tod.processdate', 'tod.processseq', 'tod.updated_by', 'tod.updated_on')
            ->join('msproduct AS mp', 'mp.id', '=', 'tod.product_id')
            ->join('msbuyer AS mbu', 'mbu.id', '=', 'tod.buyer_id');

        if($this->transaksi == 2){
            if (isset($this->tglMasuk) && $this->tglMasuk != "" && $this->tglMasuk != "undefined") {
                $data = $data->where('tod.order_date', '>=', $this->tglMasuk);
            }
    
            if (isset($this->tglKeluar) && $this->tglKeluar != "" && $this->tglKeluar != "undefined") {
                $data = $data->where('tod.order_date', '<=', $this->tglKeluar);
            }
        } else {
            if (isset($this->tglMasuk) && $this->tglMasuk != "" && $this->tglMasuk != "undefined") {
                $data = $data->where('tod.processdate', '>=', $this->tglMasuk);
            }
    
            if (isset($this->tglKeluar) && $this->tglKeluar != "" && $this->tglKeluar != "undefined") {
                $data = $data->where('tod.processdate', '<=', $this->tglKeluar);
            }
        }

        if (isset($this->searchTerm) && $this->searchTerm != "" && $this->searchTerm != "undefined") {
            $data = $data->where(function($query) {
                $query->where('mp.name', 'ilike', "%{$this->searchTerm}%")
                      ->orWhere('mbu.name', 'ilike', "%{$this->searchTerm}%")
                      ->orWhere('tod.po_no', 'ilike', "%{$this->searchTerm}%");
            });
        }

        if (isset($this->idProduct) && $this->idProduct != "" && $this->idProduct != "undefined") {
            $data = $data->where('mp.id', $this->idProduct);
        }

        if (isset($this->idBuyer) && $this->idBuyer != "" && $this->idBuyer != "undefined") {
            $data = $data->where('tod.buyer_id', $this->idBuyer);
        }

        if (isset($this->status) && $this->status != "" && $this->status != "undefined") {
            $data = $data->where('tod.status_order', $this->status);
        }

        $total = $data->count();
        $perPage = 7;
        $orders = $data->offset(($this->currentPage - 1) * $perPage)
                       ->limit($perPage)
                       ->get();

        return view('livewire.order-lpk.order-lpk', [
            'orders' => $orders,
            'total' => $total,
            'currentPage' => $this->currentPage,
            'perPage' => $perPage,
            'headers' => $this->headerConfig()
        ]);
    }
}
