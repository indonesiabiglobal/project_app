<form id="frmCrud" method="post" action="@_url" onsubmit="return formSubmit(this, '.btn-filter-reset');" role="form" style="padding-top:25px">
	@Html.AntiForgeryToken()
	<div class="col-lg-12">
		<div class="col-md-6" style="padding-right:25px">
			<div class="input-group">
				<span class="input-group-addon">Nomor Palet</span>
				<input id="searchPalet1" type="text" class="form-control nomor_palet" placeholder="search nomor palet ..." tabindex="1" style = "text-transform: uppercase" />
				<span class="input-group-addon searchPalet1-btn"><i class="fa fa-search"></i></span>
			</div>
			<table id="tblDet1" class="table table-bordered" data-height="333"></table>
		</div>

		<div class="col-md-6" style="padding-left:25px">
			<div class="form-group">
				<label class="control-label col-md-3 col-xs-12">Nomor Product</label>
				<div class="input-group col-md-9 col-xs-12">
					<span class="form-control SpanFor product_code"></span>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-3 col-xs-12">Nama Product</label>
				<div class="input-group col-md-9 col-xs-12">
					<span class="form-control SpanFor product_name"></span>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-3 col-xs-12"></label>
				<div class="input-group col-md-9 col-xs-12">
					<button type="button" class="btn btn-success btn-print" disabled="disabled" style="width:100%"><i class="fa fa-print"></i> Print</button>
				</div>
			</div>

		</div>

	</div>

	<div class="col-lg-12 select-product" style="display:none">
		<div class="modal-footer" style="padding-right:40px;">
			<div class="col-md-6" style="float:left">
				<div class="form-group" style="text-align:left">
					<label class="control-label col-md-2 col-xs-4">Produk</label>
					<div class="input-group col-md-10 col-xs-8">
						<select id='searchProd' class="js-states form-control required" placeholder="- pilih -"></select>
					</div>
				</div>
			</div>
		</div>
	</div>

	<input type="hidden" name="SaveNext" value="" />
	<input id="product_code_selected" type="hidden" value="" />
	<input id="employeeNo_selected" type="hidden" value="" />
	<input id="searchPalet_selected" type="hidden" value="" />
</form>

<button type="button" class="btn-filter-reset" style="display:none"></button>