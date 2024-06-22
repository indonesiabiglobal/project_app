<div class="container">
	<div class="row">
		<div class="col-lg-2"></div>
		<div class="col-lg-6">
			<div class="form-group">
				<label class="control-label col-md-4 col-xs-12">Filter Tanggal</label>
				{{-- <div class="input-group col-md-8 col-xs-12"> --}}
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Awal:&nbsp;</span>
							<input class="form-control datepicker-input" type="date" wire:model.defer="tglMasuk" placeholder="yyyy/mm/dd"/>
						</div>
					</div>
				{{-- </div> --}}
			</div>
			<div class="form-group">
				<label class="control-label col-md-12 col-xs-12"></label>
				{{-- <div class="input-group col-lg-1"> --}}
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Akhir:&nbsp;</span>
							<input class="form-control datepicker-input" type="date" wire:model.defer="tglKeluar" placeholder="yyyy/mm/dd"/>
						</div>
					</div>
				{{-- </div> --}}
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-xs-12"></label>
				{{-- <div class="input-group col-md-8 col-xs-12"> --}}
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Filter:&nbsp;</span>
							<select class="form-control">
								<option value=""> -- ALL --</option>
								<option value="order">Tanggal Order</option>
								<option value="proses">Tanggal Proses</option>
							</select>
						</div>
					</div>
				{{-- </div> --}}
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-xs-12" resources="OrgDivision">Buyer</label>
				<div class="input-group col-md-8 col-xs-12">
					<select id='searchBuyer' class="js-states form-control" placeholder="- all -"></select>
				</div>
			</div>
			<br />
			<div class="form-group">
				<label class="control-label col-md-4 col-xs-12">Jenis Report</label>
				<div class="input-group col-md-8 col-xs-12">
					<select id="typeReport" class="form-control" placeholder="- pilih jenis report -">
						<option value="1">Daftar Order</option>
						<option value="2">Daftar Order Per Buyer Per Tipe</option>
						<option value="3">CheckList Order</option>
						<option value="4">CheckList LPK</option>
						<option value="5">Progress Order</option>
					</select>
				</div>
			</div>
			<hr />
			<div class="form-group">
				<label class="control-label col-md-4 col-xs-12"></label>
				<div class="input-group col-md-8 col-xs-12">
					<button type="button" class="btn btn-success btn-print" wire:click="export" style="width:99%"><i class="fa fa-print"></i> Generate Report</button>
				</div>
			</div>
		</div>
		<div class="col-lg-4"></div>
	</div>
</div>
