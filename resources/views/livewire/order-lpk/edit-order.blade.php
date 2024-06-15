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
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
    <form wire:submit.prevent="save">
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Proses</label>
			<div class="input-group col-md-9 col-xs-12">
				<input data-datepicker="" class="form-control datepicker-input" id="tglProses" type="text" placeholder="yyyy/mm/dd" wire:model="process_date">
                <span class="input-group-text">
                    <svg class="icon icon-xs" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                </span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">PO Number</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="searchLpkNo" class="form-control lpkManual"  wire:model="po_no" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input data-datepicker="" class="form-control datepicker-input" id="order_date" type="text" placeholder="yyyy/mm/dd" wire:model="order_date">
                <span class="input-group-text">
                    <svg class="icon icon-xs" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                </span>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="nomorPo" class="form-control lpkManual"  wire:model="po_no" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nama Produk</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="product_id" class="form-control readonly"  readonly="readonly" wire:model="product_id" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Dimensi</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="dimensi" class="form-control readonly"  readonly="readonly" wire:model="po_no" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Jumlah Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="order_qty" class="form-control" wire:model="order_qty" />
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Unit</label>
			<div class="input-group col-md-9 col-xs-12">
				<select id="printDept" class="js-states form-control" placeholder="">
					<option value="Set">Set</option>
					<option value="Lembar">Lembar</option>
                    <option value="Meter">Meter</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Stuffing</label>
			<div class="input-group col-md-9 col-xs-12">
				<input data-datepicker="" class="form-control datepicker-input" id="stufingdate" type="text" placeholder="yyyy/mm/dd" wire:model="stufingdate">
                <span class="input-group-text">
                    <svg class="icon icon-xs" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                </span>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">ETD</label>
			<div class="input-group col-md-9 col-xs-12">
				<input data-datepicker="" class="form-control datepicker-input" id="etddate" type="text" placeholder="yyyy/mm/dd" wire:model="etddate">
                <span class="input-group-text">
                    <svg class="icon icon-xs" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                </span>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">ETA</label>
			<div class="input-group col-md-9 col-xs-12">
				<input data-datepicker="" class="form-control datepicker-input" id="etadate" type="text" placeholder="yyyy/mm/dd" wire:model="etadate">
                <span class="input-group-text">
                    <svg class="icon icon-xs" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                    </svg>
                </span>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Buyer</label>
			<div class="input-group col-md-9 col-xs-12">
				<select id="printDept" class="js-states form-control" placeholder="">
					@foreach ($buyer as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
				</select>
			</div>
		</div>
		<hr />
		<div class="col-lg-12" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" type="button" class="btn btn-warning" wire:click="cancel">
                    <i class="fa fa-back"></i> Close
                </button>

                <button id="btnFilter" type="button" class="btn btn-danger" wire:click="delete">
                    <i class="fa fa-trash"></i> Delete
                </button>

                <button id="btnCreate" type="submit" class="btn btn-success">
                    <i class="fa fa-plus"></i> Update
                </button>

                <button type="button" class="btn btn-success btn-print" disabled="disabled">
                    <i class="fa fa-print"></i> Print
                </button>
            </div>
        </div>
    </form>        
	</div>
	<div class="col-lg-2"></div>
</div>
<input name="lpk_id" type="hidden" value="" />
<input id="searchLpkNo_selected" type="hidden" value="" />