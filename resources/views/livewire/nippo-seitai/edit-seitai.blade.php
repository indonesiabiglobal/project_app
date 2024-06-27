<div class="row">
    <form wire:submit.prevent="save">
        <div class="row mt-2">
            <div class="col-4 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-5">Tanggal Produksi</label>
                                <input class="form-control datepicker-input" type="date" wire:model.defer="production_date" placeholder="yyyy/mm/dd"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5">Nomor Produksi</label>
                                <input type="text" class="form-control readonly" readonly="readonly" wire:model="production_no" />
                                @error('lpk_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-5">Tanggal Proses</label>
                                <input class="form-control datepicker-input" readonly="readonly" type="date" wire:model.defer="created_on" placeholder="yyyy/mm/dd"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Nomor LPK</label>
                                <input type="text" class="form-control readonly" readonly="readonly"  wire:model="lpk_no" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label pe-2">Tanggal LPK</label>
                                <input class="form-control readonly datepicker-input" readonly="readonly" type="date" wire:model.defer="lpk_date" placeholder="yyyy/mm/dd"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label pe-2">Jumlah LPK</label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="qty_lpk" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Nomor Order</label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="code" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label"></label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="name" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Nomor Mesin</label>
                                <input type="text" placeholder=" ... " class="form-control" wire:model.debounce.300ms="machineno" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label"></label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="machinename" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Petugas</label>
                                <input type="text" placeholder=" ... " class="form-control" wire:model="employeeno" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label"></label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="empname" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5">Jumlah Produksi</label>
                                <input type="text" placeholder="-" class="form-control" wire:model="qty_produksi" />
                                <span class="input-group-text">
                                    mm
                                </span>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-5">Total Produksi</label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="total_produksi" />
                                <span class="input-group-text">
                                    lbr
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-3">Selisih</label>
                                <input type="text" class="form-control readonly" readonly="readonly" wire:model="selisih" />
                                <span class="input-group-text">
                                    lbr
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5">Nomor Palet</label>
                                <input type="text" placeholder="A0000-000000" class="form-control" wire:model="nomor_palet" />
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-3">Nomor LOT</label>
                                <input type="text" placeholder="----------" class="form-control" wire:model="nomor_lot" />

                                <input type="text" class="form-control readonly" readonly="readonly" wire:model="selisih" />
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5">Loss Infure</label>
                                <input type="text" class="form-control"  wire:model="infure_berat_loss" />
                                <span class="input-group-text">
                                    kg
                                </span>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-3">Petugas Infure</label>
                                <input type="text" placeholder="..." class="form-control" wire:model="employeenoinfure" />

                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="empnameinfure" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Jam Produksi</label>
                                <input class="form-control" type="time" placeholder="hh:mm" wire:model="work_hour">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-2">Shift Kerja</label>
                                <input type="text" class="form-control readonly" readonly="readonly" wire:model="work_shift" />
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-lg-8">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="periode1SP-tab" data-bs-toggle="tab" data-bs-target="#periode1SP" type="button" role="tab" aria-controls="periode1SP" aria-selected="true">Gentan(s)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="periode2SP-tab" data-bs-toggle="tab" data-bs-target="#periode2SP" type="button" role="tab" aria-controls="periode2SP" aria-selected="false">Loss(s)</button>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4" style="border-top:1px solid #efefef">
                <div class="toolbar">
                    <button id="btnFilter" type="button" class="btn btn-warning" wire:click="cancel">
                        <i class="fa fa-back"></i> Close
                    </button>
                    <button id="btnCreate" type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button>
                    <button type="button" class="btn btn-success btn-print" disabled="disabled">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
        </div>
        
        
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="periode1SP" role="tabpanel" aria-labelledby="periode1SP-tab">
                <div class="row justify-content-start">
                    <div class="row mt-3">
                        <div class="col-lg-8">
                            <button id="btnCreate" type="submit" class="btn btn-warning">
                                <i class="fa fa-plus"></i> Add Gentan
                            </button>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow mb-4 mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0 rounded-start">Action</th>
                                            <th class="border-0">Gentan</th>
                                            <th class="border-0">Line</th>
                                            <th class="border-0">No Mesin</th>
                                            <th class="border-0">Shift</th>
                                            <th class="border-0">Petugas</th>
                                            <th class="border-0">Tg. Produksi</th>
                                            <th class="border-0 rounded-end">Berat Produksi (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($tdOrderLpk as $item)
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
                                        @endforeach --}}
                                        <tr>
                                            <td colspan="8" class="text-center">No results found</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-end">Berat Total (kg):</td>
                                            <td colspan="1" class="text-center">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="periode2SP" role="tabpanel" aria-labelledby="periode2SP-tab">
                <div class="row justify-content-start">
                    <div class="row mt-3">
                        <div class="col-lg-8">
                            <button id="btnCreate" type="submit" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Loss Seitai
                            </button>
                        </div>
                    </div>
                    
                    <div class="card border-0 shadow mb-4 mt-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0 rounded-start">Action</th>
                                            <th class="border-0">Kode</th>
                                            <th class="border-0">Nama Loss</th>
                                            <th class="border-0 rounded-end">Berat (kg)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @foreach ($tdOrderLpk as $item)
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
                                        @endforeach --}}
                                        <tr>
                                            <td colspan="4" class="text-center">No results found</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-end">Berat Loss Total (kg):</td>
                                            <td colspan="1" class="text-center">0</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>        

</div>
<input name="lpk_id" type="hidden" value="" />
<input id="searchLpkNo_selected" type="hidden" value="" />