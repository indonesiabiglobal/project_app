<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
    <form wire:submit.prevent="save">
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Proses</label>
			<div class="input-group col-md-9 col-xs-12">
				<div class="input-group col-md-9 col-xs-12">
					<input class="form-control datepicker-input" type="date" wire:model="process_date" placeholder="yyyy/mm/dd"/>
					@error('process_date')
						<span class="invalid-feedback">{{ $message }}</span>
					@enderror
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">PO Number</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" class="form-control" wire:model="po_no" placeholder="NOMOR PO" />
				@error('po_no')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input class="form-control datepicker-input" type="date" wire:model="order_date" placeholder="yyyy/mm/dd"/>
				@error('order_date')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12" wire:click="noorder">Nomor Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" class="form-control" wire:model.debounce.300ms="product_id"  placeholder="nomor order" />
				@error('product_id')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nama Produk</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" class="form-control readonly" wire:model="product_name" readonly="readonly" placeholder="-" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Dimensi</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" class="form-control readonly" readonly="readonly" wire:model="dimensi" placeholder="-" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Jumlah Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="order_qty" class="form-control" wire:model="order_qty" placeholder="jumlah order" />
				@error('order_qty')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Unit</label>
			<div class="input-group col-md-9 col-xs-12">
				<select id="order_unit" class="js-states form-control" placeholder="" wire:model="unit_id">
					<option value="">- Select -</option>
					<option value="0">Set</option>
					<option value="1">Lembar</option>
                    <option value="2">Meter</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Stuffing</label>
			<input class="form-control datepicker-input" type="date" wire:model="stufingdate" placeholder="yyyy/mm/dd"/>
			@error('stufingdate')
				<span class="invalid-feedback">{{ $message }}</span>
			@enderror
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">ETD</label>
			<div class="input-group col-md-9 col-xs-12">
				<input class="form-control datepicker-input" type="date" wire:model="etddate" placeholder="yyyy/mm/dd"/>
				@error('etddate')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">ETA</label>
			<div class="input-group col-md-9 col-xs-12">
				<input class="form-control datepicker-input" type="date" wire:model="etadate" placeholder="yyyy/mm/dd"/>
				@error('etadate')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Buyer</label>
			<div class="input-group col-md-9 col-xs-12">
				<select class="form-control" wire:model="buyer_id" placeholder="">
					<option value="">- pilih -</option>
					@foreach ($buyer as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
				</select>
				@error('buyer_id')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<hr />
		<div class="col-lg-12" style="border-top:1px solid #efefef">
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
    </form>        
	</div>
</div>