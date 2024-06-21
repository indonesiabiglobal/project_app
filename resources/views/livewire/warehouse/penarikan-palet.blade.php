{{-- <title>Order Entry</title> --}}
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-6 mb-3">
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
        </div>    
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="OrgBranch">Produk</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchProd' name="searchProd" class="js-states form-control" placeholder="- all -"></select>
                </div>
            </div>            
        </div>
    
        <div class="col-lg-12" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" wire:click="search" type="button" class="btn btn-info" style="width:125px;">
                    <i class="fa fa-search"></i> Filter
                </button>
                <button id="btnCreate" type="button" class="btn btn-success" style="width:125px;" asp-app-role="write">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
            <table class="table table-bordered" data-height="414" id="tableSrc"></table>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-2">
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
                        @foreach ($penarikan as $item)
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
</div>
