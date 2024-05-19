<form id="frmCrud" method="post" action="@_url" onsubmit="return formSubmit(this, '.btn-filter-reset');" role="form" style="padding-top:25px">
	<div class="col-lg-12">
		<div class="col-md-6" style="padding-right:25px">
			<div class="input-group">
				<span class="input-group-addon">Nomor Palet Sumber</span>
				<input id="searchPalet1" type="text" class="form-control nomor_palet" placeholder="search nomor palet ..." tabindex="1" style = "text-transform: uppercase" />
				<span class="input-group-addon searchPalet1-btn"><i class="fa fa-search"></i></span>
			</div>
			<table id="tblDet1" class="table table-bordered" data-height="333"></table>
		</div>

		<div class="col-md-6" style="padding-left:25px">
			<div class="input-group">
				<span class="input-group-addon">Nomor Palet Tujuan</span>
				<input id="searchPalet2" type="text" class="form-control nomor_palet" placeholder="search nomor palet ..." tabindex="2" style = "text-transform: uppercase" />
				<span class="input-group-addon searchPalet2-btn"><i class="fa fa-search"></i></span>
			</div>
			<table id="tblDet2" class="table table-bordered" data-height="333"></table>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="modal-footer" style="padding-right:40px;">
			<div class="col-md-6" style="float:left">
				<div class="form-group searchProd" style="text-align:left">
					<label class="control-label col-md-2 col-xs-4">Produk</label>
					<div class="input-group col-md-10 col-xs-8">
						<select id='searchProd' class="js-states form-control required" placeholder="- pilih -" onchange="refreshPalet(this.value)"></select>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<button type="button" class="btn btn-default" style="width:80px">Close</button>
				<button type="button" class="btn btn-danger" style="width:80px" onclick="getPaletNo();"><i class="fa fa-undo"></i> Undo</button>
				<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Proses Mutasi</button>
			</div>
		</div>
	</div>

	<input type="hidden" name="SaveNext" value="" />
	<input id="product_code_selected" type="hidden" value="" />
	<input id="employeeNo_selected" type="hidden" value="" />
	<input id="searchPalet_selected" type="hidden" value="" />
</form>

<div id="modalDetail1" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><span class="modal-subtitle"></span></h4>
			</div>
			<form id="frmCrudDetail1">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Nomor Lot</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="nomor_lot" id="nomor_lot" type="text" class="form-control required readonly" readonly="readonly" tabindex="-1" />
									<div><span class="field-validation-valid" data-valmsg-for="nomor_lot" data-valmsg-replace="true"></span></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Jumlah Box Seitai</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="qty_produksi_orig" type="text" class="form-control currency" placeholder="enter jumlah box" readonly="readonly" tabindex="-1" />
									<div class="input-group-addon">box</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Jumlah Box Mutasi</label>
								<div class="input-group col-md-9 col-xs-12">
									<input id="qty_produksi" name="qty_produksi" type="text" class="form-control currency" placeholder="enter jumlah box" required="required" maxlength="18" tabindex="1" onfocus="this.select();" />
									<div><span class="field-validation-valid" data-valmsg-for="qty_produksi" data-valmsg-replace="true"></span></div>
									<div class="input-group-addon">box</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-close" data-dismiss="modal" tabindex="-1">Close</button>
					<button type="submit" class="btn btn-success btn-submit" tabindex="22">Submit</button>
				</div>
				<input name="id" id="id" data-val="true" data-val-required="The SeqNo field is required." type="hidden">
				<input name="loss_infure_id" type="hidden" />
				<input name="loss_infure_code_selected" id="loss_infure_code_selected" type="hidden" value="" />
				<input name="dml" type="hidden">
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<div id="modalDetail2" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title"><span class="modal-subtitle"></span></h4>
			</div>
			<form id="frmCrudDetail2">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Nomor Lot</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="nomor_lot" id="nomor_lot" type="text" class="form-control required readonly" readonly="readonly" tabindex="-1" />
									<div><span class="field-validation-valid" data-valmsg-for="nomor_lot" data-valmsg-replace="true"></span></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Jumlah Box Seitai</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="qty_produksi_orig" type="text" class="form-control currency" placeholder="enter jumlah box" readonly="readonly" tabindex="-1" />
									<div class="input-group-addon">box</div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Jumlah Box Mutasi</label>
								<div class="input-group col-md-9 col-xs-12">
									<input id="qty_produksi" name="qty_produksi" type="text" class="form-control currency" placeholder="enter jumlah box" required="required" maxlength="18" tabindex="1" onfocus="this.select();" />
									<div><span class="field-validation-valid" data-valmsg-for="qty_produksi" data-valmsg-replace="true"></span></div>
									<div class="input-group-addon">box</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-default btn-close" data-dismiss="modal" tabindex="-1">Close</button>
					<button type="submit" class="btn btn-success btn-submit" tabindex="4">Submit</button>
				</div>
				<input name="id" id="id" data-val="true" data-val-required="The SeqNo field is required." type="hidden">
				<input name="loss_infure_id" type="hidden" />
				<input name="loss_infure_code_selected" id="loss_infure_code_selected" type="hidden" value="" />
				<input name="dml" type="hidden">
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<button type="button" class="btn-filter-reset" style="display:none"></button>