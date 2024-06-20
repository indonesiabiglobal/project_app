{{-- <title>Order Entry</title> --}}
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="DatePeriod"><span class="hidden-xs" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Filter </span>Tanggal</label>
                <div class="input-group col-md-9 col-xs-8">
                    <table>
                        <tr style="white-space:nowrap">
                            <td class="hidden-xs" valign="top">
                                <select class="form-select mb-0" wire:model.defer="transaksi">
                                    <option value="1">Proses</option>
                                    <option value="2">Order</option>
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
                <label class="control-label col-md-3 col-xs-4" resources="Search">Search</label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='searchText' name='searchText' class="form-control" type="text"  placeholder="search nomor PO, nama produk" />
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Mesin</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select class="form-control" placeholder="- all -">
                        <option value="">- all -</option>
                        @foreach ($machine as $item)
                            <option value="{{ $item->id }}">{{ $item->machinename }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4">Shift</label>
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

                <button id="btnCreate" type="button" data-bs-toggle="modal" data-bs-target="#modal-add" class="btn btn-success" style="width:125px;">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
        </div>
        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Add Jam Kerja Infure</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-1">
                                <label for="">Tanggal</label>
                                <div class="form-group" style="margin-left:1px; white-space:nowrap">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <svg class="icon icon-xs" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                            </svg>
                                        </span>
                                        <input data-datepicker=""
                                        class="form-control datepicker-input" id="birthday" type="text"
                                        placeholder="yyyy/mm/dd">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label>Shift </label>
                                    <div class="input-group col-md-9 col-xs-8">
                                        <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label>Nomor Mesin </label>
                                    <div class="input-group col-md-9 col-xs-8">
                                        <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label>Petugas </label>
                                    <div class="input-group col-md-9 col-xs-8">
                                        <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="..." />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <label for="">Jam Kerja</label>
                                <div class="form-group" style="margin-left:1px; white-space:nowrap">
                                    <input class="form-control" id="time" type="time" placeholder="hh:mm">
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <label for="">Lama Mesin Mati</label>
                                <div class="form-group" style="margin-left:1px; white-space:nowrap">
                                    <input class="form-control" id="time" type="time" placeholder="hh:mm">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        {{-- <button type="button" class="btn btn-secondary">Accept</button> --}}
                        <button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">
                            Save
                        </button>
                    </div>
                </div>
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
                            <th class="border-0">Tanggal</th>
                            <th class="border-0">Shift</th>
                            <th class="border-0">Nomor Mesin</th>
                            <th class="border-0">NIK</th>
                            <th class="border-0">Petugas</th>
                            <th class="border-0 rounded-end">Jam Kerja</th>
                            <th class="border-0">Jam Mati</th>
                            <th class="border-0">Jam Jalan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        @foreach ($jamkerja as $item)
                        <tr>
                            <td>
                                <a href="{{ route('edit-seitai', ['orderId' => $item->id]) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                            <td>                                
                                {{ $item->working_date }}
                            </td>
                            <td>
                                {{ $item->work_shift }}
                            </td>
                            <td>
                                {{ $item->machine_id }}
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                {{ $item->work_hour }}
                            </td>
                            <td>
                                {{ $item->off_hour }}
                            </td>
                            <td>
                                {{ $item->on_hour }}
                            </td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
