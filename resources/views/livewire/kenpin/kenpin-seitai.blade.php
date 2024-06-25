<title>Kenpin Seitai</title>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-12">
                    <span class="hidden-xs">Tanggal </span>Kenpin
                </label>
                <div class="input-group col-md-9 col-xs-8">
                    <div class="col-12">
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
                <label class="control-label col-md-3 col-xs-4" resources="Search">Search </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="search nomor PO, nama produk" />
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
                <label class="control-label col-md-3 col-xs-4" resources="OrgDivision">Nomor Palet</label>
                <div class="input-group col-md-9 col-xs-8">
                    <input type="text" class="form-control" placeholder="A0000-000000">
                    <span class="input-group-text readonly" readonly="readonly">
                        NO. LOT
                    </span>
                    <input type="text" class="form-control" placeholder="---">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Status</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select class="form-control" placeholder="- all -">
                        <option value="">- all -</option>
                        <option value="0">Proses</option>
                        <option value="1">Finish</option>
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
                    onclick="window.location.href='{{ route('add-kenpin-seitai') }}'">
                    <i class="fa fa-plus"></i> Add
                </button>
                {{-- <button id="btnCreate" type="button" class="btn btn-success" style="width:125px;">
                    <i class="fa fa-plus"></i> Add
                </button> --}}
            </div>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Action</th>
                            <th class="border-0">Tgl. Kenpin</th>
                            <th class="border-0">No Kenpin</th>
                            <th class="border-0">Nama Produk</th>
                            <th class="border-0">No. Order</th>
                            <th class="border-0">Petugas</th>
                            <th class="border-0">Jumlah Loss (lbr)</th>
                            <th class="border-0">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">1</a> </td>
                            <td class="fw-bold d-flex align-items-center">
                                <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                Direct
                            </td>
                            <td>
                                Direct
                            </td>
                            <td>
                               - 
                            </td>
                            <td>
                               --
                            </td>
                            <td>
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-xl-2 px-0">
                                        <div class="small fw-bold">51%</div>
                                    </div>
                                    <div class="col-12 col-xl-10 px-0 px-xl-1">
                                        <div class="progress progress-lg mb-0">
                                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="51" aria-valuemin="0" aria-valuemax="100" style="width: 51%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>                                   
                                    <span class="fw-bold">2.45%</span>
                                </div>
                            </td>
                            <td>
                                Direct
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
