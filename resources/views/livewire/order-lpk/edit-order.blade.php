<div class="row">
	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif
	@if (session()->has('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
    <form wire:submit.prevent="save">
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Proses</label>
			<div class="input-group col-md-9 col-xs-12">
				<input class="form-control datepicker-input readonly" readonly="readonly" type="date" wire:model="process_date" placeholder="yyyy/mm/dd"/>
				@error('process_date')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">PO Number</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" class="form-control"  wire:model="po_no" />
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
			<label class="control-label col-md-3 col-xs-12">Nomor Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="nomorPo" class="form-control"  wire:model="product_code" />
				@error('product_code')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
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
				@error('order_qty')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Unit</label>
			<div class="input-group col-md-9 col-xs-12">
				<select id="unit" class="form-control" wire:model="unit_id" placeholder="">
					<option value="0">Set</option>
					<option value="1">Lembar</option>
					<option value="2">Meter</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Stuffing</label>
			<div class="input-group col-md-9 col-xs-12">
				<input class="form-control datepicker-input" type="date" wire:model="stufingdate" placeholder="yyyy/mm/dd"/>
				@error('stufingdate')
					<span class="invalid-feedback">{{ $message }}</span>
				@enderror
			</div>
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
				<select id="printDept" class="form-control" wire:model="buyer_id" placeholder="">
					@foreach ($buyer as $item)
						@if ( $item->id == $buyer_id )
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@else
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endif                        
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

				@if ($status_order == 0)
					<button id="btnFilter" type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#modal-default">
						<i class="fa fa-trash"></i> Delete
					</button>

					<button id="btnCreate" type="submit" class="btn btn-success">
						<i class="fa fa-plus"></i> Update
					</button>

					<button type="button" class="btn btn-success btn-print" wire:click="print">
						<i class="fa fa-print"></i> Print
					</button>				
				@endif
				@if ($status_order == 1)
					<p class="text-secondary mb-0">Data sudah di LPK ! ..</p>
				@endif
                
				<script>
					document.addEventListener('livewire:load', function () {
						Livewire.on('redirectToPrint', function () {
							window.open('{{ route('cetak-order') }}', '_blank');
						});
					});
				</script>
            </div>
        </div>
		<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					{{-- <div class="modal-header">
						<h2 class="h6 modal-title">Terms of Service</h2>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div> --}}
					<div class="modal-body">
						<h3>
							Are you sure want to delete ?
						</h3>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" wire:click="delete">Yes</button>
						<button type="button" class="btn btn-link text-gray-600 ms-auto" data-bs-dismiss="modal">No</button>
					</div>
				</div>
			</div>
		</div>
    </form>        
	</div>
	<div class="col-lg-2"></div>
</div>
<input name="lpk_id" type="hidden" value="" />
<input id="searchLpkNo_selected" type="hidden" value="" />