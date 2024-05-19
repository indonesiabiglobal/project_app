<div class="row mt-4">
	<div class="col-lg-2"></div>
	<div class="col-lg-6">
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Filter Tanggal</label>
			<div class="input-group col-md-8 col-xs-12">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon" style="padding:2px;width:55px!important">Awal:&nbsp;</span>
						<input  data-datepicker="" id='searchDate1' class="form-control datepicker-input" type="text" placeholder="yyyy/mm/dd"  formatter='date, dd MMM yyyy' required="required" />
                        <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path></svg>
                        </span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12"></label>
			<div class="input-group col-md-8 col-xs-12">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon" style="padding:2px;width:55px!important">Akhir:&nbsp;</span>
						<input  data-datepicker="" id='searchDate1' class="form-control datepicker-input" type="text" placeholder="yyyy/mm/dd"  formatter='date, dd MMM yyyy' required="required" />
                        <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path></svg>
                        </span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12"></label>
			<div class="input-group col-md-8 col-xs-12">
				<div class="form-group">
					<div class="input-group" style="width:100%!important">
						<span class="input-group-addon" style="padding:2px;width:55px!important">Departemen:&nbsp;</span>
						<select id="flag" style="!important;width:100%!important" class="form-control">
							<option value="order">Infure</option>
							<option value="proses">Seitai</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12" resources="OrgDivision">Nomor LPK</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id='searchBuyer' class="js-states form-control" placeholder="- all -"></select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-4 col-xs-12" resources="OrgDivision">Nomor Order</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id='searchBuyer' class="js-states form-control" placeholder="- all -"></select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-4 col-xs-12" resources="OrgDivision">Nomor Kenpin</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id='searchBuyer' class="js-states form-control" placeholder="- all -"></select>
			</div>
		</div>
        <div class="form-group">
			<label class="control-label col-md-4 col-xs-12" resources="OrgDivision">Nomor Han</label>
			<div class="input-group col-md-8 col-xs-12">
				<select id='searchBuyer' class="js-states form-control" placeholder="- all -"></select>
			</div>
		</div>
		<br />
		<div class="form-group">
			<label class="control-label col-md-4 col-xs-12">Status</label>
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
				<button type="button" class="btn btn-success btn-print" style="width:99%"><i class="fa fa-print"></i> Generate Report</button>
			</div>
		</div>
	</div>
	<div class="col-lg-4"></div>
</div>
<input name="lpk_id" type="hidden" value="" />
<input id="lpk_no_selected" type="hidden" value="" />