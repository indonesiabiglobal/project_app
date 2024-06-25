<form>
	<div class="row mt-3">
		<div class="col-12 col-lg-6">
			<div class="form-group">				
				<div class="input-group">
					<span class="input-group-text readonly">
						Nomor Palet Sumber
					</span>
					<input wire:model.defer="searchTerm" class="form-control" type="text" placeholder="A0000-000000" />
					<button wire:click="search" type="button" class="btn btn-info">
						<i class="fa fa-search"></i>
					</button>
				</div>
			</div>

			<div class="card border-0 shadow mb-4 mt-4">
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-centered table-nowrap mb-0 rounded">
							<thead class="thead-light">
								<tr>
									<th class="border-0 rounded-start">Nomor LOT</th>
									<th class="border-0">Mesin</th>
									<th class="border-0">Tg. Produksi</th>
									<th class="border-0">Jumlah Box</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td colspan="8" class="text-center">No results found</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<div class="form-group">
				<div class="input-group">
					<label class="control-label col-3">Nama Produk</label>
					<input type="text" class="form-control readonly" readonly="readonly" wire:model="product_name" />
				</div>
			</div>
			<div class="form-group mt-1">
				<div class="input-group">
					<label class="control-label col-3">Nama Produk</label>
					<input type="text" class="form-control readonly" readonly="readonly" wire:model="product_name" />
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4 col-xs-12"></label>
				<div class="input-group">
					<button type="button" class="btn btn-success btn-print" style="width:99%"><i class="fa fa-print"></i> Print</button>
				</div>
			</div>
		</div>
		
	</div>
</form>

<button type="button" class="btn-filter-reset" style="display:none"></button>