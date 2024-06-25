<div class="row">
	@if (session()->has('message'))
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
	@endif
    <form wire:submit.prevent="save">
        <div class="row mt-2">
			<div class="col-12 col-lg-12">
				<div class="form-group">                            
					<div class="input-group">
						<label class="control-label col-12 col-lg-2">Tanggal Kenpin</label>
						<input class="form-control datepicker-input" type="date" wire:model.defer="production_date" placeholder="yyyy/mm/dd"/>
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-12 mt-1">
				<div class="form-group">
					<div class="input-group">
						<label class="control-label col-12 col-lg-2">Nomor Kenpin</label>
						<input type="text" class="form-control"  wire:model="lpk_no" />
					</div>
				</div>
			</div>			
			<div class="col-12 col-lg-4 mt-1">
				<div class="form-group">
					<div class="input-group">
						<label class="control-label col-12 col-lg-6">Nomor Order</label>
						<input type="text" placeholder="-" class="form-control col-4" wire:model="noorder" />
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8 mt-1">
				<div class="form-group">                            
					<div class="input-group">
						<label class="control-label"></label>
						<input type="text" placeholder="-" class="form-control col-8 readonly" readonly="readonly" wire:model="noorder" />
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-4 mt-1">
				<div class="form-group">
					<div class="input-group">
						<label class="control-label col-12 col-lg-6">Petugas</label>
						<input type="text" placeholder="-" class="form-control" wire:model="userid" />
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-8 mt-1">
				<div class="form-group">
					<div class="input-group">
						<label class="control-label"></label>
						<input type="text" placeholder="-" class="form-control readonly" readonly="readonly" wire:model="created_by" />
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-12 mt-1">
				<div class="form-group">
					<div class="input-group">
						<label class="control-label col-12 col-lg-2">NG</label>
						<input type="text" class="form-control"  wire:model="lpk_no" />
					</div>
				</div>
			</div>
			<div class="col-12 col-lg-12 mt-1">
				<div class="form-group">
					<div class="input-group">
						<label class="control-label col-12 col-lg-2">Status</label>
						<select class="form-control" placeholder="- all -">
							<option value="">- all -</option>
							<option value="0">Proses</option>
							<option value="1">Finish</option>
						</select>
					</div>
				</div>
			</div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-12 col-lg-5">
                <div class="form-group">				
					<div class="input-group">
						<span class="input-group-text readonly">
							Nomor Palet
						</span>
						<input wire:model.defer="searchTerm" class="form-control" type="text" placeholder="A0000-000000" />
						<button wire:click="search" type="button" class="btn btn-info">
							<i class="fa fa-search"></i>
						</button>
					</div>
				</div>
            </div>
			<div class="col-lg-3"></div>
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
                                <th class="border-0">Nomor Palet</th>
                                <th class="border-0">Nomor LOT</th>
								<th class="border-0">No LPK</th>
                                <th class="border-0">Tgl Produksi</th>
								<th class="border-0">Quantity</th>
                                <th class="border-0 rounded-end">Loss (Lembar)</th>
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
                                <td colspan="7" class="text-center">No results found</td>
                            </tr>
                            <tr>
                                <td colspan="6" class="text-end">Berat Loss Total (kg):</td>
                                <td colspan="1" class="text-center">0</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>