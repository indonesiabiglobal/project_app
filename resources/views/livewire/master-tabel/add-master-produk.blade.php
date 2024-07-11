<div class="row mt-2">
	{{-- <div class="col-lg-2"></div> --}}
	<div class="col-lg-12">
        <form wire:submit.prevent="save">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Nomor Order</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="code" placeholder="KODE" />
                            @error('code')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Nama Produk</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="name" placeholder="nama" />
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Kode Tipe</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="product_type_code" placeholder="nama" />
                            @error('product_type_code')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Kode Produk (Alias)</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="code_alias" placeholder="KODE" />
                            @error('code_alias')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Dimensi (T x L x P)</label>
                            <span class="input-group-text">
                                T
                            </span>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Tebal" />
                            @error('ketebalan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <span class="input-group-text">
                                L
                            </span>
                            <input type="text" class="form-control" wire:model="diameterlipat" placeholder="Lebar" />
                            @error('diameterlipat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <span class="input-group-text">
                                P
                            </span>
                            <input type="text" class="form-control" wire:model="productlength" placeholder="Panjang" />
                            @error('productlength')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Berat Satuan</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                            <span class="input-group-text">
                                gram
                            </span>
                            @error('unit_weight')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Satuan</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="product_unit" placeholder="Pilih" />
                            @error('product_unit')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <p class="text-success fw-bold">INFURE</p>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Dimensi</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Tebal" />
                            <span class="input-group-text">
                                x
                            </span>
                            <input type="text" class="form-control" wire:model="diameterlipat" placeholder="Lebar" />
                            @error('diameterlipat')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <span class="input-group-text">
                                mm
                            </span>
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Panjang Gulung</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                            <span class="input-group-text">
                                m
                            </span>
                            @error('unit_weight')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Material</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="product_unit" placeholder="Pilih" />
                            @error('product_unit')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Embos</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="product_unit" placeholder="Pilih" />
                            @error('product_unit')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Corona</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="product_unit" placeholder="Pilih" />
                            @error('product_unit')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-5">MB -1 (Master Batch) </label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="warna mb 1" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">MB -2 </label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="warna mb 2" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">MB -3 </label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="warna mb 3" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Catatan </label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Catatan" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-3">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Gentan</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Tebal" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Gazette</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                            
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">GZ Dimensi</label>
                            <span class="input-group-text"> 
                                A
                            </span>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />

                            <span class="input-group-text"> 
                                B
                            </span>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">-</label>
                            <span class="input-group-text"> 
                                C
                            </span>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />

                            <span class="input-group-text"> 
                                D
                            </span>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-3 d-flex justify-content-center">
                    <img src="assets\img\img-uk-produk.png" width="240" height="130" alt="img">
                </div>
                <div class="col-12">
                    <p class="text-success">HAGATA</p>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Kode Nukigata</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">A.</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">B.</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">C.</label>
                            <input type="text" class="form-control col-12 col-lg-8" wire:model="unit_weight" placeholder="0" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 mt-3 d-flex justify-content-center">
                    <img src="" width="240" height="130" alt="img">
                </div>
                <div class="col-12">
                    <p class="text-success">PRINTING</p>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">*</label>
                            <span class="input-group-text"> 
                                Warna Depan:
                            </span>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">1</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">2</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">3</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">4</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">5</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">*</label>
                            <span class="input-group-text"> 
                                Warna Belakang:
                            </span>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">1</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">2</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">3</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">4</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-1">5</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Jenis Cetak</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Sifat Tinta</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Endless</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-4">Arah Gulung</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="..." />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-success">SEITAI</p>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Klarifikasi Seal</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Jarak Seal dari Pola</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Jarak Seal Bawah</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Jumlah Baris Palet</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Jarak Seal Bawah</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Jumlah Baris Palet</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-6">Isi Baris Palet</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-3">Kode Gasio</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-3">Kode Box</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-3">Kode Inner</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-3">Kode Layer</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Pilih" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-3">Kode Gasio</label>
                            <textarea name="" id="" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-2">Isi</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="0" />
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Unit" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-2">Isi</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="0" />
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Unit" />
                        </div>
                    </div>
                    <div class="form-group mt-1">
                        <div class="input-group">
                            <label class="control-label col-12 col-lg-2">Isi</label>
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="0" />
                            <input type="text" class="form-control" wire:model="ketebalan" placeholder="Unit" />
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            <div class="col-lg-12" style="border-top:1px solid #efefef">
                <div class="toolbar">
                    <button id="btnFilter" type="button" class="btn btn-warning" wire:click="cancel">
                        <i class="fa fa-back"></i> Close
                    </button>
                    <button id="btnCreate" type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Save
                    </button>
                </div>
            </div>
        </form>        
	</div>
</div>