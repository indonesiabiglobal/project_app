<div class="row mt-3">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="form-group">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Nomor LPK</label>
				<input type="text" id="lpk_no" class="form-control" placeholder="000000-000"/>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Nomor Gentan</label>
				<input type="text" id="gentan_no" class="form-control" placeholder="..." />
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Nomor Order</label>
				<input type="text" name="product_code" class="form-control readonly" readonly="readonly" />
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Nama Produk</label>
				<input type="text" name="product_name" class="form-control readonly" readonly="readonly" />
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Panjang Produksi</label>
				<input type="text" name="panjang_produksi" class="form-control readonly currency" readonly="readonly" />
				<span class="input-group-text">
					meter
				</span>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Berat Gentan</label>
				<input type="text" name="berat_produksi" class="form-control readonly currency" readonly="readonly" />
				<span class="input-group-text">
					kg
				</span>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Berat Standard</label>
				<input type="text" name="berat_standard" class="form-control readonly currency" readonly="readonly" />
				<span class="input-group-text">
					kg
				</span>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Tanggal LPK</label>
				<input class="form-control readonly datepicker-input" readonly="readonly" type="date" wire:model.defer="tglMasuk" />
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<label class="control-label col-12 col-lg-3">Jumlah LPK</label>
				<input type="text" name="qty_lpk" class="form-control readonly integer" readonly="readonly" />
			</div>
		</div>
		<hr />
		<div class="form-group">
			<div class="input-group">				
				<button type="button" class="btn btn-success btn-print" disabled="disabled">
					<i class="fa fa-print"></i> Print
				</button>
				<div style="float:right" class="text-danger">Paper: A4-Portrait or Thermal </div>
			</div>
		</div>
	</div>
	<div class="col-lg-2"></div>
</div>

<input name="lpk_id" type="hidden" value="" />
<input id="lpk_no_selected" type="hidden" value="" />
<input name="product_assembly_id" type="hidden" value="" />
<input name="gentan_no_selected" id="gentan_no_selected" type="hidden" value="" />