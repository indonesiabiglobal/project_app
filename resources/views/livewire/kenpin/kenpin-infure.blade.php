{{-- <title>Kenpin Infure</title> --}}
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="DatePeriod"><span class="hidden-xs" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Filter </span>Tanggal</label>
                <div class="input-group col-md-9 col-xs-8">
                    <table>
                        <tr style="white-space:nowrap">
                            <td>
                                <div class="form-group" style="margin-left:1px; white-space:nowrap">
                                    <div class="input-group">
                                        <input class="form-control datepicker-input" type="date" wire:model.defer="tglMasuk" placeholder="yyyy/mm/dd"/>
                                        
                                        <input class="form-control datepicker-input" type="date" wire:model.defer="tglKeluar" placeholder="yyyy/mm/dd"/>
                                    {{-- <input data-datepicker=""
                                        class="form-control datepicker-input" id="birthday" type="text"
                                        placeholder="yyyy/mm/dd">
                                    <input data-datepicker=""
                                        class="form-control datepicker-input" id="birthday" type="text"
                                        placeholder="yyyy/mm/dd"> --}}
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
                    <input wire:model.defer="searchTerm" class="form-control" type="text" placeholder="search nomor PO, nama produk" />
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            {{-- <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="OrgBranch">Produk</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchProd' name="searchProd" class="js-states form-control" placeholder="- all -"></select>
                </div>
            </div> --}}
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Nomor Palet</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select class="form-control" placeholder="- all -"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Status</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id="printStatus" class="form-control" placeholder="- all -">
                        <option value="">- all -</option>
                        <option value="0">Belum LPK</option>
                        <option value="1">SUdah LPK</option>
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-lg-12 mt-3" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" type="button" class="btn btn-info" style="width:125px;"><i class="fa fa-search"></i> Filter</button>
                <button 
                    id="btnCreate" 
                    type="button" 
                    class="btn btn-success" 
                    style="width:125px;"
                    onclick="window.location.href='{{ route('add-kenpin') }}'">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Action</th>
                            <th class="border-0">PO Number</th>
                            <th class="border-0">Nama Produk</th>
                            <th class="border-0">Kode Produk</th>
                            <th class="border-0">Buyer</th>
                            <th class="border-0">Quantity</th>
                            <th class="border-0 rounded-end">Tgl. Order</th>
                            <th class="border-0">Etd</th>
                            <th class="border-0">Tgl Proses</th>
                            <th class="border-0 rounded-end">No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @foreach ($tdOrder as $item)
                        <tr>
                            <td>        
                                {{-- <button id="btnCreate" type="button" class="btn btn-info">
                                    <i class="fa fa-plus"></i> Edit
                                </button> --}}
                                <a href="{{ route('edit-order', ['orderId' => $item->id]) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                            <td>                                
                                {{ $item->po_no }}
                            </td>
                            <td>
                                {{ $item->product_id }}
                            </td>
                            <td>
                                {{ $item->product_code }}
                            </td>
                            <td>
                                {{ $item->order_qty }}
                            </td>
                            <td>
                                {{ $item->order_unit }}
                            </td>
                            <td>
                                {{ $item->qty_gentan }}
                            </td>
                            <td>
                                {{ $item->qty_gulung }}
                            </td>
                            <td>
                                {{ $item->qty_lpk }}
                            </td>
                            <td>
                                {{ $item->panjang_lpk }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
