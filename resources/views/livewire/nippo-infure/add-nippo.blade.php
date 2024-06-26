<div class="row">
	{{-- @if (session()->has('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif --}}
    <form wire:submit.prevent="save">
        <div class="row mt-2">
            <div class="col-4 col-lg-12">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label pe-2">Tanggal Produksi</label>
                                <input class="form-control datepicker-input" type="date" wire:model.defer="production_date" placeholder="yyyy/mm/dd"/>
                                @error('production_date')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label pe-2">Tanggal Proses</label>
                                <input class="form-control datepicker-input" type="date" wire:model.defer="created_on" placeholder="yyyy/mm/dd"/>
                                @error('created_on')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Nomor LPK</label>
                                <input type="text" class="form-control" wire:model.debounce.300ms="lpk_no" />
                                @error('lpk_no')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
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
                                <label class="control-label pe-2">Panjang LPK</label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="panjang_lpk" />
                                <span class="input-group-text">
                                    m
                                </span>
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
                                @error('machineno')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
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
                                @error('employeeno')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
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
                                <label class="control-label col-5">Dimensi Infure</label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="dimensiinfure" />
                                <span class="input-group-text">
                                    mm
                                </span>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-3">Meter Gulung</label>
                                <input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="qty_gulung" />
                                <span class="input-group-text">
                                    m
                                </span>

                                <input type="text" class="form-control readonly" readonly="readonly" placeholder=" .. X .." />
                                <input type="text" class="form-control readonly" readonly="readonly" wire:model="qty_gentan" />
                                <span class="input-group-text">
                                    roll
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label">Panjang Produksi</label>
                                <input type="text" placeholder="-" class="form-control" wire:model="panjang_produksi" />
                                <span class="input-group-text">
                                    m
                                </span>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-6">Total Panjang Produksi</label>
                                <input type="text" placeholder="0" class="form-control readonly" readonly="readonly" wire:model="total_assembly_qty" />
                                <span class="input-group-text">
                                    m
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-3">Selisih</label>
                                <input type="text" placeholder="0" class="form-control readonly" readonly="readonly" wire:model="selisih" />
                                <span class="input-group-text">
                                    m
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5">Berat Gentan</label>
                                <input type="text" class="form-control"  wire:model="qty_gentan" />
                                <span class="input-group-text">
                                    kg
                                </span>
                            </div>                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-6">Berat Standard</label>
                                <input type="text" placeholder="0" class="form-control readonly" readonly="readonly" wire:model="berat_standard" />
                                <span class="input-group-text">
                                    kg
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-3">Rasio</label>
                                <input type="text" placeholder="0" class="form-control readonly" readonly="readonly"  wire:model="rasio" />
                                <span class="input-group-text">
                                    %
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Jam Produksi</label>
                                <input class="form-control" type="time" placeholder="hh:mm" wire:model="work_hour" step="1">
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
                    <div class="col-12 col-lg-4 mt-1">
                        <div class="form-group">
                            <div class="input-group">
                                <label class="control-label col-5 pe-2">Nomor Gentan</label>
                                <input type="text" class="form-control"  wire:model="gentan_no" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8 mt-1">
                        <div class="form-group">                            
                            <div class="input-group">
                                <label class="control-label col-2">Nomor Han</label>
                                <input type="text" class="form-control" placeholder="00-00-00-00A" wire:model="nomor_han" />
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-lg-8">
                <button id="btnCreate" type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Add Loss Infure
                </button>
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
    </form>        

</div>
<input name="lpk_id" type="hidden" value="" />
<input id="searchLpkNo_selected" type="hidden" value="" />