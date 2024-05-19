<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-8">
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Departemen</label>
			<div class="input-group col-md-9 col-xs-12">
				<select id="printDept" class="js-states form-control" placeholder="- all -">
					<option value="all">- all -</option>
					<option value="INFURE">INFURE</option>
					<option value="SEITAI">SEITAI</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor LPK</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" id="searchLpkNo" class="form-control lpkManual" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal LPK</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="lpk_date" class="form-control readonly" readonly="readonly" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Jumlah LPK</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="qty_lpk" class="form-control readonly integer" readonly="readonly" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor Order</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="product_code" class="form-control readonly" readonly="readonly" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nama Produk</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="product_name" class="form-control readonly" readonly="readonly" />
			</div>
		</div>
		<div class="form-group reprint_no">
			<label class="control-label col-md-3 col-xs-12">Re-Print</label>
			<div class="input-group col-md-9 col-xs-12">
				<input type="text" name="reprint_no" class="form-control readonly" readonly="readonly" />
			</div>
		</div>
		<hr />
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12"></label>
			<div class="input-group col-md-9 col-xs-12">
				<button type="button" class="btn btn-success btn-print" disabled="disabled"><i class="fa fa-print"></i> Print</button>
			</div>
		</div>
	</div>
	<div class="col-lg-2"></div>
</div>
<input name="lpk_id" type="hidden" value="" />
<input id="searchLpkNo_selected" type="hidden" value="" />