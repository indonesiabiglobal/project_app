<div class="row">
	<div class="col-lg-2"></div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Tanggal Periode</label>
			<div class="input-group col-md-8 col-xs-12">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                    <input data-datepicker=""
                        class="form-control datepicker-input" id="birthday" type="text"
                        placeholder="yyyy/mm/dd">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12"></label>
			<div class="input-group col-md-8 col-xs-12">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg></span>
                    <input data-datepicker=""
                        class="form-control datepicker-input" id="birthday" type="text"
                        placeholder="yyyy/mm/dd">
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Nippo</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id="department" class="form-control" placeholder="- pilih jenis report -" onchange="changeDep(this.value)">
					<option value="1">Infure</option>
					<option value="2">Seitai</option>
				</select>
			</div>
		</div>
		<br />
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Jenis Report</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id="typeReport" class="form-control" placeholder="- pilih jenis report -">
					<option value="0">- pilih jenis report -</option>
					<option value="1" selected="selected">Daftar Produksi Per Mesin</option>
					<option value="2">Daftar Produksi Per Tipe Per Mesin</option>
					<option value="3">Daftar Produksi Per Jenis</option>
					<option value="4">Daftar Produksi Per Departemen Per Jenis</option>
					<option value="5">Daftar Produksi Per Tipe</option>
					<option value="6">Daftar Produksi Per Departemen Per Tipe</option>
					<option value="7">Daftar Produksi Per Petugas</option>
					<option value="8" style="display:none">Daftar Produksi Per Palet</option>
					<option value="9">Daftar Loss Per Departemen</option>
					<option value="10">Daftar Loss Per Petugas</option>
					<option value="11">Kapasitas Produksi</option>
				</select>
			</div>
		</div>

		<hr />
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12"></label>
			<div class="input-group col-md-8 col-xs-12">
				<button type="button" class="btn btn-success btn-print" style="width:99%"><i class="fa fa-print"></i> Generate Report</button>
			</div>
		</div>
	</div>
	<div class="col-lg-4"></div>
</div>
<input name="lpk_id" type="hidden" value="" />
<input id="lpk_no_selected" type="hidden" value="" />