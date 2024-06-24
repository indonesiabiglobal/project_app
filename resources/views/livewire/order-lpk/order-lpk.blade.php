{{-- <title>Order Entry</title> --}}
<div class="container mt-4">
    <div class="row">
        {{-- @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif --}}
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">
                    <span class="hidden-xs" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Filter </span>Tanggal
                </label>
                <div class="input-group col-md-9 col-xs-8">
                    <div class="col-4 pe-1">
                        <select class="form-select mb-0" wire:model.defer="transaksi">
                            <option value="1">Proses</option>
                            <option value="2">Order</option>
                        </select>
                    </div>
                    <div class="col-8">
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control datepicker-input" type="date" wire:model.defer="tglMasuk" placeholder="yyyy/mm/dd"/>
    
                                <input class="form-control datepicker-input" type="date" wire:model.defer="tglKeluar" placeholder="yyyy/mm/dd"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Search </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='search' name='search' wire:model.defer="searchTerm" class="form-control" type="text" placeholder="search nomor PO, nama produk" />
                </div>
            </div>
        </div>
        <div class="col-lg-6">            
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Product</label>
                <select class="form-control" id="basic-usage" wire:model.defer="idProduct" placeholder="- all -">
                    <option value="">- all -</option>
                    @foreach ($products as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach 
                </select>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Buyer</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select class="form-control" wire:model.defer="idBuyer" placeholder="- all -">
                        <option value="">- Pilih Buyer -</option>
                        @foreach ($buyer as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
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
    
        <div class="col-lg-12 mt-4" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" wire:click="search" type="button" class="btn btn-info" style="width:125px;">
                    <i class="fa fa-search"></i> Filter
                </button>
                
                <!-- Indikator Loading untuk Tombol Filter -->
                <div wire:loading wire:target="search">
                    <i class="fa fa-spinner fa-spin"></i> Loading...
                </div>

                <button 
                    id="btnCreate" 
                    type="button" 
                    class="btn btn-success" 
                    style="width:125px;"
                    onclick="window.location.href='{{ route('add-order') }}'">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
            <table class="table table-bordered" data-height="414" id="tableSrc"></table>
        </div>
    </div>

    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-0 rounded-start">Action</th>
                    <th class="border-0">PO Number</th>
                    <th class="border-0">Nama Produk</th>
                    <th class="border-0">Kode Produk</th>
                    <th class="border-0">Buyer</th>
                    <th class="border-0">Quantity</th>
                    <th class="border-0">Tgl. Order</th>
                    <th class="border-0">Etd</th>
                    <th class="border-0">Tgl Proses</th>
                    <th class="border-0 rounded-end">No.</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($tdOrder as $item)
                    <tr>
                        <td>
                            <a href="{{ route('edit-order', ['orderId' => $item->id]) }}" class="btn btn-info">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                        </td>
                        <td>{{ $item->po_no }}</td>
                        <td>{{ $item->produk_name }}</td>
                        <td>{{ $item->product_code }}</td>
                        <td>{{ $item->buyer_name }}</td>
                        <td>{{ $item->order_qty }}</td>
                        <td>{{ $item->order_date }}</td>
                        <td>{{ $item->etddate }}</td>
                        <td>{{ $item->processdate }}</td>
                        <td>{{ $no++ }}</td>
                    </tr>
                @endforeach                                        
            </tbody>
        </table>
    </div>
</div>


<script>
    $( '#basic-usage' ).select2( {
        theme: "bootstrap-5",
        width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        placeholder: $( this ).data( 'placeholder' ),
        allowClear: true
    } );
    $('#basic-usage').on('change', function (e) {
        @this.set('idProduct', $(this).val(), true);
    });

    document.addEventListener('livewire:update', function () {
        $('#basic-usage').select2({
            theme: "bootstrap-5",
            width: '100%',
            placeholder: '- all -',
            allowClear: true
        });
    });
</script>