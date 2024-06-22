{{-- <title>LPK Entry</title> --}}
<div class="container mt-5">
    <div class="row">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="col-lg-6 mb-4">  
            <div class="form-group"> 
                <label class="control-label col-md-3 col-xs-4" resources="DatePeriod"><span class="hidden-xs" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Filter </span>Tanggal</label>
                <div class="input-group col-md-9 col-xs-8">
                    <table>
                        <tr style="white-space:nowrap">
                            <td class="hidden-xs" valign="top">
                                <select class="form-select mb-0" id="gender"
                                    aria-label="Gender select example">
                                    <option selected>Proses</option>
                                    <option value="Female">Order</option>
                                </select>
                            </td>
                            <td>
                                <div class="form-group" style="margin-left:1px; white-space:nowrap">
                                    <div class="input-group">
                                        <input class="form-control datepicker-input" type="date" wire:model.defer="tglMasuk" placeholder="yyyy/mm/dd"/>

                                        <input class="form-control datepicker-input" type="date" wire:model.defer="tglKeluar" placeholder="yyyy/mm/dd"/>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Search </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='search' name='search' wire:model.defer="searchTerm" class="form-control" type="text" placeholder="search nomor PO, nomor LPK, nama produk" />
                </div>
            </div>
            {{-- <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="Search">Nomor PO </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='searchText' name='searchText' class="form-control" type="text" placeholder="search nomor PO, nama produk" />
                </div>
            </div> --}}
        </div>
    
        <div class="col-lg-6">
            {{-- <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Produk</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchProd' name="searchProd" class="js-states form-control" placeholder="- all -">
                        @foreach ($product as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach                        
                    </select>
                </div>
            </div> --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Buyer</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchBuyer' name="searchBuyer" class="js-states form-control" placeholder="- all -">
                        @foreach ($buyer as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Status</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id="printStatus" class="js-states form-control" placeholder="- all -">
                        <option value="">- all -</option>
                        <option value="0">Un-Print</option>
                        <option value="1">Printed</option>
                        <option value="2">Re-Print</option>
                        <option value="3">Belum Produksi</option>
                        <option value="4">Sudah Produksi</option>
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-lg-12" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" wire:click="search" type="button" class="btn btn-info" style="width:125px;">
                    <i class="fa fa-search"></i> Filter
                </button>
                {{-- <button id="btnCreate" type="button" class="btn btn-success" style="width:125px;" asp-app-role="write">
                    <i class="fa fa-plus"></i> Add
                </button> --}}
                <button 
                    id="btnCreate" 
                    type="button" 
                    class="btn btn-success" 
                    style="width:125px;" 
                    asp-app-role="write" 
                    onclick="window.location.href='{{ route('add-lpk') }}'">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
            <table class="table table-bordered" data-height="414" id="tableSrc"></table>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Action</th>
                            <th class="border-0">No LPK</th>
                            <th class="border-0">Tgl LPK</th>
                            <th class="border-0">Panjang LPK</th>
                            <th class="border-0">Jumlah LPK</th>
                            <th class="border-0">Jumlah Gentan</th>
                            <th class="border-0 rounded-end">Master Gulung</th>
                            <th class="border-0">Progres Infure</th>
                            <th class="border-0">Progres Seitai</th>
                            <th class="border-0 rounded-end">Nomor PO</th>
                            <th class="border-0">Kode Produk</th>
                            <th class="border-0 rounded-end">Tanggal Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @foreach ($tdOrderLpk as $item)
                        <tr>
                            <td>
                                <a href="{{ route('edit-lpk', ['orderId' => $item->id]) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                            <td>                                
                                {{ $item->lpk_no }}
                            </td>
                            <td>
                                {{ $item->lpk_date }}
                            </td>
                            <td>
                                {{ $item->panjang_lpk }}
                            </td>
                            <td>
                                {{ $item->qty_lpk }}
                            </td>
                            <td>
                                {{ $item->qty_gentan }}
                            </td>
                            <td>
                                {{ $item->qty_gulung }}
                            </td>
                            <td>
                                {{ $item->infure }}
                            </td>
                            <td>
                                {{ $item->total_assembly_qty }}
                            </td>
                            <td>
                                {{ $item->po_no }}
                            </td>
                            <td>
                                {{ $item->product_code }}
                            </td>
                            <td>
                                {{ $item->tglproses }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
