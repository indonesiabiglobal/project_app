{{-- <title>Order Entry</title> --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-6 mb-3">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Nomor Palet </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input wire:model.defer="searchTerm" class="form-control" type="text" placeholder="A0000-000000" />
                </div>
            </div>
        </div>    
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Produk</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select class="form-control" placeholder="- all -"></select>
                </div>
            </div>            
        </div>
    
        <div class="col-lg-12" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" wire:click="search" type="button" class="btn btn-info" style="width:125px;">
                    <i class="fa fa-search"></i> Filter
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
                            <th class="border-0">No Palet</th>
                            <th class="border-0">No Order</th>
                            <th class="border-0">Nama Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @foreach ($data as $item)
                        <tr>
                            <td>
                                {{-- <a href="{{ route('edit-nippo', ['orderId' => $item->id]) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a> --}}
                            </td>
                            <td>                                
                                {{ $item->nomor_palet }}
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                {{ $item->product_id }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12 text-end">
        <button type="button" class="btn btn-success">
            <i class="fa fa-plus"></i> Proses Retur
        </button>
    </div>
</div>
