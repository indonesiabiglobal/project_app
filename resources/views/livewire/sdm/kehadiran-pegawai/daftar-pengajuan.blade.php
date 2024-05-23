<title>Daftar Pengajuan</title>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="DatePeriod"><span class="hidden-xs" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Filter </span>Tanggal</label>
                <div class="input-group col-md-9 col-xs-8">
                    <table>
                        <tr style="white-space:nowrap">
                            <td class="hidden-xs" valign="top">
                                <select class="form-select mb-0" id="gender"
                                    aria-label="Gender select example">
                                    <option selected>Proses</option>
                                    <option value="Female">Order</option>
                                </select>
                            </td>
                            <td>
                                <div class="form-group" style="margin-left:1px; white-space:nowrap">
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
                            </td>
                        </tr>
                        {{-- <div class="row">
                            <div class="col-4">
                                <select class="form-select mb-0" id="gender"
                                    aria-label="Gender select example">
                                    <option selected>Proses</option>
                                    <option value="Female">Order</option>
                                </select>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg></span>
                                    <input data-datepicker=""
                                        class="form-control datepicker-input" id="birthday" type="text"
                                        placeholder="yyyy/mm/dd" disabled>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="input-group">
                                    <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                clip-rule="evenodd"></path>
                                        </svg></span>
                                    <input data-datepicker=""
                                        class="form-control datepicker-input" id="birthday" type="text"
                                        placeholder="yyyy/mm/dd" disabled>
                                </div>
                            </div>
                            
                        </div> --}}
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="Search">Search </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="search nomor PO, nama produk" />
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="OrgBranch">Produk</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchProd' name="searchProd" class="js-states form-control" placeholder="- all -"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="OrgDivision">Mesin</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchBuyer' name="searchBuyer" class="js-states form-control" placeholder="- all -"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="OrgDivision">Status</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id="printStatus" class="js-states form-control" placeholder="- all -">
                        <option value="">- all -</option>
                        <option value="0">Belum LPK</option>
                        <option value="1">SUdah LPK</option>
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-lg-12" style="border-top:1px solid #efefef">
            <div class="toolbar">
                <button id="btnFilter" type="button" class="btn btn-info" style="width:125px;"><i class="fa fa-search"></i> Filter</button>
                <button id="btnCreate" type="button" class="btn btn-success" style="width:125px;" asp-app-role="write">
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
            <table class="table table-bordered" data-height="414" id="tableSrc"></table>
        </div>
    </div>
    <div class="card border-0 shadow mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">Action</th>
                            <th class="border-0">Nomor LPK</th>
                            <th class="border-0">Panjang Produksi</th>
                            <th class="border-0">Berat Gentan</th>
                            <th class="border-0">Nomor Gentan</th>
                            <th class="border-0">Nomor Order</th>
                            <th class="border-0 rounded-end">Mesin</th>
                            <th class="border-0">Tanggal Produksi</th>
                            <th class="border-0">Jam</th>
                            <th class="border-0 rounded-end">Shift</th>
                            <th class="border-0 rounded-end">Seq</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">1</a> </td>
                            <td class="fw-bold d-flex align-items-center">
                                <svg class="icon icon-xxs text-gray-500 me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.332 8.027a6.012 6.012 0 011.912-2.706C6.512 5.73 6.974 6 7.5 6A1.5 1.5 0 019 7.5V8a2 2 0 004 0 2 2 0 011.523-1.943A5.977 5.977 0 0116 10c0 .34-.028.675-.083 1H15a2 2 0 00-2 2v2.197A5.973 5.973 0 0110 16v-2a2 2 0 00-2-2 2 2 0 01-2-2 2 2 0 00-1.668-1.973z" clip-rule="evenodd"></path></svg>
                                Direct
                            </td>
                            <td>
                                Direct
                            </td>
                            <td>
                               - 
                            </td>
                            <td>
                               --
                            </td>
                            <td>
                                <div class="row d-flex align-items-center">
                                    <div class="col-12 col-xl-2 px-0">
                                        <div class="small fw-bold">51%</div>
                                    </div>
                                    <div class="col-12 col-xl-10 px-0 px-xl-1">
                                        <div class="progress progress-lg mb-0">
                                            <div class="progress-bar bg-dark" role="progressbar" aria-valuenow="51" aria-valuemin="0" aria-valuemax="100" style="width: 51%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-success">
                                <div class="d-flex align-items-center">
                                    <svg class="icon icon-xs me-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"></path></svg>                                   
                                    <span class="fw-bold">2.45%</span>
                                </div>
                            </td>
                            <td>
                                Direct
                            </td>
                            <td>
                               - 
                            </td>
                            <td>
                               --
                            </td>
                            <td>
                                --
                             </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
