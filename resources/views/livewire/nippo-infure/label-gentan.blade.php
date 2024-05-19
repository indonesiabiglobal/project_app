<div class="row mt-3">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor LPK</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="lpk_no" class="form-control lpkManual" tabindex="1" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor Gentan</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="gentan_no" class="form-control gentan_no integer" maxlength="3" tabindex="2" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="product_code" class="form-control readonly" readonly="readonly" tabindex="-1" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nama Produk</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="product_name" class="form-control readonly" readonly="readonly" tabindex="-1" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Panjang Produksi</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="panjang_produksi" class="form-control readonly currency" readonly="readonly" tabindex="-1" />
				<div class="input-group-addon">meter</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Berat Gentan</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="berat_produksi" class="form-control readonly currency" readonly="readonly" tabindex="-1" />
				<div class="input-group-addon">kg</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Berat Standard</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="berat_standard" class="form-control readonly currency" readonly="readonly" tabindex="-1" />
				<div class="input-group-addon">kg</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal LPK</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="lpk_date" class="form-control readonly" readonly="readonly" tabindex="-1" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Jumlah LPK</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="qty_lpk" class="form-control readonly integer" readonly="readonly" tabindex="-1" />
			</div>
		</div>
		<hr />
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12"></label>
			<div class="input-group col-md-9 col-xs-12">
				<button type="button" class="btn btn-success btn-print" disabled="disabled"><i class="fa fa-print"></i> Print</button>
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