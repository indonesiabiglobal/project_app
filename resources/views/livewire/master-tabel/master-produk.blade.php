{{-- <title>Order Entry</title> --}}
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-6 mb-2">
            {{-- <button id="btnCreate" type="button" data-bs-toggle="modal" data-bs-target="#modal-add-rev" class="btn btn-success" style="width:125px;">
                <i class="fa fa-plus"></i> Add New
            </button> --}}
            <button 
                type="button" 
                class="btn btn-success" 
                style="width:125px;"
                onclick="window.location.href='{{ route('add-master-produk') }}'">
                <i class="fa fa-plus"></i> Add
            </button>
        </div>
    
        <div class="col-lg-6">
            <div class="form-group">
                <div class="input-group col-12 col-lg-6 text-end">
                    <label class="control-label col-12 col-lg-4 pe-2">Filter</label>
                    <input class="form-control" type="text"  placeholder="Pencarian" />
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-labelledby="modal-add" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="h6 modal-title">Add Master Tipe Produk</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label col-12">Kode Tipe Produk </label>
                                    <div class="input-group col-12">
                                        <input class="form-control" type="text" placeholder="KODE TIPE" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label col-12">Nama Tipe Produk </label>
                                    <div class="input-group col-12">
                                        <input class="form-control" type="text" placeholder="nama tipe" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label col-12">Alamat </label>
                                    <div class="input-group col-12">
                                        <select id="printStatus" class="form-control" placeholder="- all -">
                                            <option value="">- all -</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-1">
                                <div class="form-group">
                                    <label class="control-label col-12">Kota </label>
                                    <div class="input-group col-12">
                                        <input class="form-control" type="text" placeholder="kota" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <div class="form-group">
                                    <label class="control-label col-12">Negara </label>
                                    <div class="input-group col-12">
                                        <input class="form-control" type="text" placeholder="negara" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success">
                                    Save
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Action</th>
                            <th class="border-0">Nama Produk</th>
                            <th class="border-0">Nomor Order</th>
                            <th class="border-0">Kode Tipe</th>
                            <th class="border-0">Jenis Tipe</th>
                            <th class="border-0">Dimensi (T*L*P)</th>
                            <th class="border-0">Berat Satuan</th>
                            <th class="border-0">Katanuki</th>
                            <th class="border-0">Warna Font</th>
                            <th class="border-0 rounded-end">Warna Back</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        {{-- @foreach ($jamkerja as $item)
                        <tr>
                            <td>
                                <a href="{{ route('edit-seitai', ['orderId' => $item->id]) }}" class="btn btn-info">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                            </td>
                            <td>                                
                                {{ $item->working_date }}
                            </td>
                            <td>
                                {{ $item->work_shift }}
                            </td>
                            <td>
                                {{ $item->machine_id }}
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                
                            </td>
                            <td>
                                {{ $item->work_hour }}
                            </td>
                            <td>
                                {{ $item->off_hour }}
                            </td>
                            <td>
                                {{ $item->on_hour }}
                            </td>
                            </td>
                        </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
