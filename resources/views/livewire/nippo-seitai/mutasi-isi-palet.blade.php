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
									<th class="border-0 rounded-start">Action</th>
									<th class="border-0">Nomor LOT</th>
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
					<span class="input-group-text readonly">
						Nomor Palet Tujuan
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
									<th class="border-0 rounded-start">Action</th>
									<th class="border-0">Nomor LOT</th>
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
			<div class="col-12 col-lg-8">
				<div class="form-group">
					<label class="control-label col-md-3 col-xs-4">Product</label>
					<select class="form-control" id="basic-usage" wire:model.defer="idProduct" placeholder="- all -">
						<option value="">- all -</option>
						{{-- @foreach ($products as $item)
							<option value="{{ $item->id }}">{{ $item->name }}</option>
						@endforeach  --}}
					</select>
				</div>
			</div>
		</div>
		<div class="col-12 col-lg-6">
			<div class="col-lg-12" style="border-top:1px solid #efefef">
                <div class="toolbar">
                    <button id="btnFilter" type="button" class="btn btn-warning" wire:click="cancel">
                        <i class="fa fa-back"></i> Close
                    </button>
					<button id="btnFilter" type="button" class="btn btn-danger" wire:click="delete">
                        <i class="fa fa-trash"></i> Undo
                    </button>
                    <button id="btnCreate" type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Proses Mutasi
                    </button>
                </div>
            </div>
		</div>
	</div>
</form>

<button type="button" class="btn-filter-reset" style="display:none"></button>