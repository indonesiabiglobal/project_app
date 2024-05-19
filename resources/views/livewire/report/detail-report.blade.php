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
        <div class="form-group">
            <label class="control-label col-md-3 col-xs-4" resources="Search">Nomor LPK </label>
            <div class="input-group col-md-9 col-xs-8">
                <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="000000000-000" />
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-3 col-xs-4" resources="Search">Nomor Order </label>
            <div class="input-group col-md-9 col-xs-8">
                <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="..." />
            </div>
        </div>
        <div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Departemen</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id="department" class="form-control" placeholder="- pilih jenis report -" onchange="changeDep(this.value)">
					<option value="1">-</option>
					<option value="2">-</option>
				</select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Mesin</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id="department" class="form-control" placeholder="- pilih jenis report -" onchange="changeDep(this.value)">
					<option value="1">-</option>
					<option value="2">-</option>
				</select>
			</div>
		</div>
        <div class="form-group">
            <label class="control-label col-md-3 col-xs-4" resources="Search">Nomor Han </label>
            <div class="input-group col-md-9 col-xs-8">
                <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="..." />
            </div>
        </div>
		<br />
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