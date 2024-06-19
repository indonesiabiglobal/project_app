<div class="row">
	@if (session()->has('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
	@endif
    @if (session()->has('error'))
		<div class="alert alert-danger">
			{{ session('error') }}
		</div>
	@endif
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-lg-5 ms-3">
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Tanggal LPK</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input class="form-control datepicker-input" type="date" wire:model="lpk_date" placeholder="yyyy/mm/dd"/>
                            @error('process_date')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Nomor LPK</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="lpk_no" class="form-control"  wire:model="lpk_no" />
                            @error('lpk_no')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">PO Number</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" class="form-control readonly" readonly="readonly" wire:model="po_no" />
                            @error('po_no')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Nomor Order</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="order_id" class="form-control readonly" readonly="readonly"  wire:model="order_id" />
                            @error('order_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Nomor Mesin</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="machine_no" class="form-control" wire:model="machine_no" />
                            @error('machine_no')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Jumlah LPK</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="qty_lpk" class="form-control" wire:model="qty_lpk" />
                            @error('qty_lpk')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Jumlah Gentan</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="qty_gentan" class="form-control" wire:model="qty_gentan" />
                            @error('qty_gentan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Meter Gulung</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="qty_gulung" class="form-control" wire:model="qty_gulung" />
                            @error('qty_gulung')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Panjang LPK</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="panjang_lpk" class="form-control readonly" readonly="readonly" wire:model="panjang_lpk" />
                            @error('panjang_lpk')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                           
                </div>

                <div class="col-lg-5 ms-4">
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Tanggal Proses</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input class="form-control datepicker-input" type="date" wire:model="tglproses" placeholder="yyyy/mm/dd"/>
                            @error('tglproses')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror                            
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-6 col-xs-12">Tanggal PO</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input class="form-control datepicker-input" type="date" wire:model="tgl_po" placeholder="yyyy/mm/dd"/>
                            {{-- @error('tglproses')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror  --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Buyer</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="buyer_id" class="form-control readonly"  readonly="readonly" wire:model="buyer_id" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Nama Produk</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="product_id" class="form-control readonly"  readonly="readonly" wire:model="product_id" />
                            @error('product_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Nama Mesin</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="machine_no" class="form-control readonly" readonly="readonly" wire:model="machine_no" />
                            @error('machine_no')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Panjang Total</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="qty_lpk" class="form-control readonly"  readonly="readonly" wire:model="panjang_total" />
                            {{-- @error('machine_no')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror --}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Dimensi (TxLxP)</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="dimensi" class="form-control readonly"  readonly="readonly" wire:model="dimensi" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Default Gulung</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="default_gulung" class="form-control readonly"  readonly="readonly" wire:model="default_gulung" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-9 col-xs-12">Selisih Kurang</label>
                        <div class="input-group col-md-9 col-xs-12">
                            <input type="text" id="selisih_kurang" class="form-control readonly"  readonly="readonly" wire:model="selisih_kurang" />
                        </div>
                    </div>
                </div>
            </div>
            
           
            <hr/>
            <div class="col-lg-12" style="border-top:1px solid #efefef">
                <div class="toolbar">
                    <button id="btnFilter" type="button" class="btn btn-warning" wire:click="cancel">
                        <i class="fa fa-back"></i> Close
                    </button>

                    <button id="btnFilter" type="button" class="btn btn-danger" wire:click="delete">
                        <i class="fa fa-trash"></i> Delete
                    </button>

                    <button id="btnCreate" type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Update
                    </button>

                    <button type="button" class="btn btn-success btn-print" disabled="disabled">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
            </div>
        </form>        
	
</div>
<input name="lpk_id" type="hidden" value="" />
<input id="searchLpkNo_selected" type="hidden" value="" />