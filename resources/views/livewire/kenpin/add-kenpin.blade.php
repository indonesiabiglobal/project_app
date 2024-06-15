@model App.Domain.KenpinAssembly
@{
	var mode = ViewBag.crudMode;
	var title = mode == "I" ? "Add" : (mode == "U" ? "Update" : "Delete");
	string _url = Url.Content("~/") + "kenpin/InfureUpdate";
}

<form id="frmCrud" method="post" action="@_url" onsubmit="return formSubmitNext(this, '#btnFilter', 'returnAfterSave');" style="width:95%;height:100%; overflow:hidden">
	@Html.AntiForgeryToken()

	<div class="col-lg-1"></div>
	<div class="col-lg-11">
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Tanggal Kenpin</label>
			<div class="input-group col-md-9 col-xs-12">
				@Html.TextBoxFor(m => m.kenpin_date_str, "{0:dd/MM/yyyy}", new { @class = "form-control required dateManual", placeholder = "tgl kenpin", @tabindex = "-1" })
				<div>@Html.ValidationMessageFor(m => m.kenpin_date_str)</div>
				<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Nomor Kenpin</label>
			<div class="input-group col-md-9 col-xs-12">
				@Html.TextBoxFor(m => m.kenpin_no, new { @class = "form-control required", placeholder = "nomor kenpin", maxlength = 8, @tabindex = "-1" })
				<div>@Html.ValidationMessageFor(m => m.kenpin_no)</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12"><a href="#" onclick="return viewLPK('@Model.lpk_id')" title="more info" tabindex="-1">Nomor LPK <i class="fa fa-lg fa-info-circle" style="color:green"></i></a></label>
			<div class="input-group col-md-9 col-xs-12">
				<table>
					<tr>
						<td style="width:130px">@Html.TextBoxFor(m => m.lpk_no, new { @class = "form-control required lpk_no", maxlength = 10 })</td>
						<td style="width:205px;white-space:nowrap;text-align:right;padding-right:5px">Tanggal LPK</td>
						<td style="width:15%;white-space:nowrap"><span class="form-control lpk_date readOnly" style="text-align:center">@(Model.id == 0 ? "-" : Model.lpk_date.ToString("dd/MMM/yyyy"))</span></td>
						<td style="white-space:nowrap;text-align:right;padding-right:5px"><span class="hidden-xs">Panjang&nbsp;</span>LPK</td>
						<td style="width:12%;white-space:nowrap"><span class="form-control panjang_lpk readOnly" placeholder="-" style="text-align:right"> @(Model.id == 0 ? "-" : Model.panjang_lpk.ToString("#,#.##"))</span></td>
						<td style="width:36px;text-align:center"><span class="form-control readOnly">m</span></td>
					</tr>
				</table>
				<div>@Html.ValidationMessageFor(m => m.lpk_no)</div>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12"><a href="#" onclick="return viewProduct('@Model.product_id')" title="more info" tabindex="-1">Nomor Order <i class="fa fa-lg fa-info-circle" style="color:green"></i></a></label>
			<div class="input-group col-md-9 col-xs-12">
				<table>
					<tr>
						<td style="width:130px"><span class="form-control product_code readOnly" placeholder="-"> @(Model.id == 0 ? "-" : Model.product_code)</span></td>
						<td>
							<span class="form-control readonly" readonly="readonly">
								<span class="product_name">@(Model.id == 0 ? "-" : Model.product_name)</span>
							</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Petugas</label>
			<div class="input-group col-md-9 col-xs-12">
				<table>
					<tr>
						<td style="width:130px">@Html.TextBoxFor(m => m.employeeNo, new { @class = "form-control required employeeNo", placeholder = "...", maxlength = 10 })</td>
						<td>
							<span class="form-control readonly" readonly="readonly">
								<span class="empName">@(Model.id == 0 ? "-" : Model.empName)</span><span>@Html.ValidationMessageFor(m => m.employeeNo)</span>
							</span>
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">NG</label>
			<div class="input-group col-md-9 col-xs-12">
				@Html.TextBoxFor(m => m.remark, new { @class = "form-control", placeholder = "...", maxlength = 50 })
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-3 col-xs-12">Status</label>
			<div class="input-group col-md-9 col-xs-12">
				<select class="js-states form-control" id="status_kenpin" name="status_kenpin">
					<option value="">- pilih -</option>
					<option @(Model.status_kenpin == 1 ? "selected='selected" : "") value="1">Proses</option>
					<option @(Model.status_kenpin == 2 ? "selected='selected" : "") value="2">Finish</option>
				</select>
			</div>
			<div>@Html.ValidationMessageFor(m => m.status_kenpin)</div>
		</div>
	</div>

	<div class="col-lg-1"></div>
	<div class="col-lg-11">
		<div class="col-md-12" style="padding:0">
			<hr />
			<div style="float:left;margin-top:1px;margin-left:2px;width:35%" class="hidden-xs">
				<button type="button" class="btn btn-success btnCreate-detail" style="width:125px;"><i class="fa fa-plus"></i> Add Gentan</button>
			</div>
			<div style="float:right;margin-top:1px;margin-right:1px">
				<button type="button" class="btn btn-default formCancel"><i class="fa fa-close"></i> Close</button>
				<button type="button" class="btn btn-danger btn-delete remove" asp-app-role="delete" onclick="deleteThis(@Model.id)" style="display:none"><i class="fa fa-trash-o"></i> Delete</button>
				<button type="submit" class="btn btn-success btn-update" onclick="$('[name=SaveNext]').val('false');"><i class="fa fa-save"></i> @(mode == "I" ? "Save" : "Update")</button>
				<button type="submit" class="btn btn-success btn-updateP" onclick="$('[name=SaveNext]').val('true');" title="@(mode == "I" ? "Save" : "Update") & print"><i class="fa fa-save"></i>_Print_<i class="fa fa-print"></i></button>
			</div>
			<span class='messageForm' style='padding-left:5px;color:Red;font-weight:bolder;font-size:17px;'></span>
			<table id="tblDet" class="table table-bordered" data-height="195">
				<tfoot>
					<tr>
						<td colspan="7" style="text-align:right;font-weight:bold">Berat Loss Total (kg):&nbsp;</td>
						<td class="totalBerat" style="text-align:right;font-weight:bold; color:Red; padding-right:4px"></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>

	@Html.HiddenFor(m => m.id)
	@Html.HiddenFor(m => m.lpk_id)
	@Html.HiddenFor(m => m.lpk_date)
	@Html.HiddenFor(m => m.employee_id)
	@Html.HiddenFor(m => m.created_on)
	@Html.HiddenFor(m => m.created_by)
	@Html.HiddenFor(m => m.updated_by)
	@Html.HiddenFor(m => m.updated_on)
	@Html.HiddenFor(m => m.product_id)
	<input type="hidden" name="SaveNext" value="" />
	<input id="lpk_no_selected" type="hidden" value="" />
	<input id="employeeNo_selected" type="hidden" value="" />
</form>


<div id="modalDetail" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Infure Gentan</h4>
			</div>
			<form id="frmCrudDetail">
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-12">
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Nomor Gentan</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="gentan_no" id="gentan_no" type="text" class="form-control required" maxlength="10" placeholder="..." tabindex="1" />
									<div><span class="field-validation-valid" data-valmsg-for="loss_infure_code" data-valmsg-replace="true"></span></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Nomor Mesin</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="machine_no" type="text" class="form-control readonly required" readonly="readonly" placeholder="-" tabindex="-1" />
									<div><span class="field-validation-valid" data-valmsg-for="machine_no" data-valmsg-replace="true"></span></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Petugas</label>
								<div class="input-group col-md-9 col-xs-12">
									<input name="empName" type="text" class="form-control readonly required empName2" readonly="readonly" placeholder="-" tabindex="-1" />
									<div><span class="field-validation-valid" data-valmsg-for="empName" data-valmsg-replace="true"></span></div>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3 col-xs-12">Berat Loss</label>
								<div class="input-group col-md-9 col-xs-12">
									<input id="berat_loss" name="berat_loss" type="text" class="form-control currency" placeholder="enter berat loss" required="required" onfocus="this.select()" tabindex="2" />
									<div><span class="field-validation-valid" data-valmsg-for="berat_loss" data-valmsg-replace="true"></span></div>
									<div class="input-group-addon">kg</div>
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
				<input name="product_assembly_id" type="hidden" />
				<input name="work_shift" type="hidden" />
				<input name="production_date" type="hidden" />
				<input name="gentan_no_selected" id="gentan_no_selected" type="hidden" value="" />
				<input name="dml" type="hidden">
			</form>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div>

<style>
	table {width: 100%;}
</style>

<script>
	$(".breadcrumb-msg").html("/ @title");
	var productionId = '@Model.id', mode = '@mode', status = '@Model.status_kenpin';

	$(document).ready(function () {		
		var $modalDetail = $('#modalDetail').modal({ show: false });
		$('#_detail').css({ 'overflow': 'auto' });
		$('.currency').autoNumeric('init', {aPad: false });
		$("#kenpin_no").mask("9999-999", { placeholder: "0000-000" });

		if (mode != 'I') {
			$('#kenpin_date_str,#kenpin_no').prop("readonly", true).addClass("readonly");
			$('#lpk_no').prop("readonly", true).addClass("readonly");
			$('.btn-delete,.btn-update').show();			
		}
		else {
			$("#lpk_no").focus();
			$('#created_on_str, #kenpin_date_str').blur();
		}

		$("#kenpin_date_str").on("change", function (evt) {
			if (mode != 'I') return;
			var code = $("#kenpin_date_str").val();
			$.ajax({
				url: _root + "Picker/GetDateSequenceSelected",
				type: "POST",
				data: { code: code },
				success: function (item) {
					$('[name=lpk_no]').val(item.seqno);
					$("#lpk_no").focus();
				}
			})
		});


		deleteThis = function (id) {
			sAlertAsk(null, function () {
				var _urlDel = ((_root == '/' ? '' : _root) + _modul + 'DeleteById').replace('//', '/');
				$.ajax({
					type: "post",
					url: _urlDel,
					beforeSend: function () { $('.fixed-table-toolbar').hide(); $('.fixed-table-loading').show(); },
					complete: function () { $('.fixed-table-toolbar').show(); $('.fixed-table-loading').hide(); },
					data: { id: id },
					dataType: "json",
					success: function (d) {
						$("#btnFilter").trigger('click');
						formCancel();
						if (d.Msg != undefined) {
							sAlert('Success', d.Msg, 'success');
						}
					},
					error: function (xHr, textStatus, errorThrown) {
						sAlert('Error', xHr.status + " " + xHr.statusText, "error");
					}
				});
			});
		};

		returnAfterSave = function (v) {
			var id = v.id || ''; if (id == '') return;
			return printDetail(id);
		};
		printDetail = function (id) {
			if (id == undefined || id == '0') {
				sAlert('Error', 'Data belum tersimpan ...!', "error");
				return;
			}
			return generateExcel('report/label_kk_infure', { id: id });		
		};


		$("#gentan_no").mask("999", { placeholder: "---" });
		$("#gentan_no").on("blur focusout", function (e) { getGentanNo(); });
		$('#gentan_no').keypress(function (e) { if (e.which == 13) getGentanNo(); });
		$("#gentan_no").keydown(function (e) { if (e.which == 9) getGentanNo(); });

		getGentanNo = function () {
			$('#divSmallBoxes').empty();
			var code = ($("#gentan_no").val() || '').trim();
			if (code == $('#gentan_no_selected').val()) return;
			$('#gentan_no_selected').val(code);

			enableLink(false);
			$.ajax({
				url: myApp.root + "Picker/GetProductAssemblyItemByGentanNo",
				type: "POST",
				dataType: "json",
				data: { lpkId: $("[name=lpk_id]").val(), gentan: code},
				success: function (item) {
					enableLink(true);
					if (code == '') return;
					$("[name=product_assembly_id]").val(item.id);
					$("[name=machine_no]").val(item.machine_no).trigger('change');
					$("[name=production_date]").val(item.production_date).trigger('change');
					$("[name=work_shift]").val(item.work_shift).trigger('change');
					$(".empName2").val(item.empName).trigger('change');
					
					if (item.id == '' || item.id == '0' || item.status == '2') {
						$("#gentan_no").val('').trigger('change');
						$("[name=machine_no]").val('').trigger('change');
						$("[name=work_shift]").val('').trigger('change');
						$("[name=production_date]").val('').trigger('change');
						$(".empName2").val('').trigger('change');
						$('#frmCrudDetail #gentan_no').focus();
						sAlert('Error', 'Gentan ' + code + (item.status != '2' ? ' tidak terdaftar' : ' sedang diproses kenpin') + ' ..!', "error");
					}
					else {
						$('#frmCrudDetail #gentan_no').blur();
						$('#frmCrudDetail #berat_loss').focus();
					}
				}
			})
		};

		//$tblDet.bootstrapTable('load', { rows: null, total: 0 });
		var $tblDet = $('#tblDet').bootstrapTable({
			toolbar: '',
			pagination: false,
			pageSize: 99999,
			showColumns: false,
			columns: [
				{
					field: 'action',
					title: 'Action',
					width: '88px',
					align: 'center',
					formatter: operateFormatter({ Edit: true, Delete: true }),
					events: {
						'click .edit': function (e, value, row, index) {
							e.preventDefault();
							editModal(row)
						},
						'click .remove': function (e, value, row, index) {
							e.preventDefault();
							thisDetailCrud.deleteData({ id: row.id });
						}
					},
					showFooter: false,
					switchable: false
				},
				{
					field: 'gentan_no',
					title: 'Gentan',
					switchable: false,
					halign: 'center',
					align: 'center'
				},
				{
					field: 'machine_no',
					title: 'No Mesin',
					switchable: false,
				},
				{
					field: 'work_shift',
					title: 'Shift',
					switchable: false,
					halign: 'center',
					align: 'center'
				},
				{
					field: 'empName',
					title: 'Petugas',
					switchable: false,
				},
				{
					field: 'nomor_han',
					title: 'Nomor Han',
					halign: 'center',
					align: 'center'
				},
				{
					field: 'production_date',
					title: 'tg. Produksi',
					halign: 'right',
					align: 'right',
					formatter: 'dateFormatter',
				},
				{
					field: 'berat_loss',
					title: 'Berat Loss (kg)',
					halign: 'right',
					align: 'right',
					formatter: 'decimalFormatter',
					switchable: false
				}
			]
		});

		/* table detail */
		var objTableDet = new myApp.bootstrapTable_({
			objTable: $tblDet,
			url: _modul + '_DetailList?id=' + $('[name=id]').val(),
			afterComplete: function (v) {
				var beratloss = 0;
				$(v).each(function (i) {
					beratloss = beratloss + parseFloat(v[i].berat_loss);
				});
				$('.totalBerat').html(decimalFormatter(beratloss));

				if (mode == 'I') {
					if (v.length > 0)
						$('#lpk_no').prop("readonly", true).addClass("readonly");
					else
						$('#lpk_no').prop("readonly", false).removeClass("readonly");
				}
				enableLink(true);
			}
		});

		if (mode != 'I') {
			objTableDet.loadData();
		}
		else {
			$tblDet.bootstrapTable('load', { rows: null, total: 0 });
		}

		/* crud  */
		var thisDetailCrud = new myApp.crudForm({
			title: 'Gentan Infure ',
			objElement: $modalDetail,
			objForm: '#frmCrudDetail',
			urlUpdate: _modul + 'DetailUpdate',
			urlDelete: _modul + 'DetailDelete',
			deleteConfirmation: false,
			returnAction: function (v) {
				$('.formCancel').attr("isDirty", 'true');
				objTableDet.loadData({});
			}
		});

		editModal = function (row) {
			row = row || { dml: 'I', id: '0', berat_loss:0, product_assembly_id: 0, loss_infure_id: '', loss_infure_code: '', loss_infure_name: '', loss_infure_code_selected: '' };
			row.dml = row.id == '0' ? 'I' : 'U';
			thisDetailCrud.setFormValue(row);
			$('input#gentan_no_selected').val('');
			if (row.dml == 'I') {
				$('input#gentan_no').prop("readonly", false).removeClass("readonly");
				$('input#gentan_no').focus();
			}
			else {
				$('input#gentan_no').prop("readonly", true).addClass("readonly");
				$('input#berat_loss').focus();
			}
		};

		$modalDetail.on('shown.bs.modal', function () {
			if (($('input#gentan_no').val() || '') == '') {
				$('input#gentan_no').focus();
			}
			else {
				$('input#berat_loss').focus();
			}
		})

		$(".btnCreate-detail").click(function () {
			if (!$("form#frmCrud").valid()) {
				sAlert('Error', 'Data belum lengkap ..!', "error");
			}
			else {
				editModal(null);
			}
		});

		$('#modalDetail').draggable({ cursor: 'move', handle: '.modal-header' });
		$('.modal-dialog').resizable({ minHeight: 200, minWidth: 200 });
	})
</script>