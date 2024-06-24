<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-6">
		<div class="form-group">
			<div class="input-group col-md-9 col-xs-8">
				<label class="control-label col-4">Tanggal Produksi</label>
				<div class="col-12 col-lg-8">
					<select class="form-select mb-0" wire:model.defer="transaksi">
						<option value="1">Produksi</option>
						<option value="2">Order</option>
					</select>
				</div>
			</div>
			<div class="col-12 mt-1">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon col-12 col-lg-2">Awal: </span>
						<input class="form-control datepicker-input" type="datetime-local" wire:model.defer="tglMasuk" placeholder="yyyy/mm/dd hh:mm" />
					</div>
				</div>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="col-12">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon col-12 col-lg-2">Akhir: </span>
						<input class="form-control datepicker-input" type="datetime-local" wire:model.defer="tglAkhir" placeholder="yyyy/mm/dd hh:mm" />
					</div>
				</div>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Jenis Report </span>
				<select id="department" class="form-control" placeholder="- pilih jenis report -" onchange="changeDep(this.value)">
					<option value="1">Check List</option>
					<option value="2">Loss Infure</option>
				</select>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Nomor Proses </span>
				<input type="text" class="form-control" placeholder="1">
				<span class="input-group-text readonly" readonly="readonly">
					~
				</span>
				<input type="text" class="form-control" placeholder="1000">
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Nomor LPK </span>
				<input type="text" class="form-control" placeholder="000000-000">
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Nomor Order </span>
				<input type="text" class="form-control" placeholder="..">
			</div>
		</div>
        <div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Departement</span>
				<select class="form-control">
					<option value="">- all -</option>
					<option value="1"></option>
					<option value="2"></option>
				</select>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Mesin</span>
				<select class="form-control">
					<option value="">- all -</option>
					<option value="1"></option>
					<option value="2"></option>
				</select>
			</div>
		</div>
		<div class="form-group mt-1">
			<div class="input-group">
				<span class="input-group-addon col-12 col-lg-3">Nomor Han</span>
				<input type="text" class="form-control" placeholder="00-00-00A" />
			</div>
		</div>
		<hr />
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12"></label>
			<div class="input-group">
				<button type="button" class="btn btn-success btn-print" style="width:99%"><i class="fa fa-print"></i> Generate Report</button>
			</div>
		</div>
	</div>
	<div class="col-lg-4"></div>
</div>

<input name="lpk_id" type="hidden" value="" />
<input id="lpk_no_selected" type="hidden" value="" />
<input name="product_id" type="hidden" value="" />
<input id="product_code_selected" type="hidden" value="" />