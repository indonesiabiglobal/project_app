<title>Absensi Pegawai</title>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="DatePeriod"><span class="hidden-xs" style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">Filter Tanggal Masuk</span></label>
                <div class="input-group col-md-9 col-xs-8">
                    <table>
                        <tr style="white-space:nowrap">
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
                    </table>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-xs-4" resources="Search">Search </label>
                <div class="input-group col-md-9 col-xs-8">
                    <input id='searchText' name='searchText' class="form-control" type="text" resources-placeholder="SearchTextOrCode" placeholder="search Nama Pegawai" />
                </div>
            </div>
        </div>
    
        <div class="col-lg-6">
            <div class="form-group">
                <label class="control-label col-md-9 col-xs-8" resources="OrgBranch">Status Pegawai</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchProd' name="searchProd" class="js-states form-control" placeholder="- all -"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-9 col-xs-8" resources="OrgDivision">Sub Unit Kerja</label>
                <div class="input-group col-md-9 col-xs-8">
                    <select id='searchBuyer' name="searchBuyer" class="js-states form-control" placeholder="- all -"></select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-9 col-xs-8" resources="OrgDivision">Kategori Pegawai</label>
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
                {{-- <button id="btnCreate" type="button" class="btn btn-success" style="width:125px;" asp-app-role="write">
                    <i class="fa fa-plus"></i> Add
                </button> --}}
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
                            <th class="border-0 rounded-start">Nama Pegawai</th>
                            <th class="border-0">1 <br> Sen</th>
                            <th class="border-0">2 <br> Sel</th>
                            <th class="border-0">3 <br> Rab</th>
                            <th class="border-0">4 <br> Kam</th>
                            <th class="border-0">5 <br> Jum</th>
                            <th class="border-0">6 <br> Sab</th>
                            <th class="border-0">7 <br> Min</th>
                            <th class="border-0">8 <br> Sen</th>
                            <th class="border-0">9 <br> Sel</th>
                            <th class="border-0">10 <br> Rab</th>
                            <th class="border-0">11 <br> Kam</th>
                            <th class="border-0">12 <br> Jum</th>
                            <th class="border-0">13 <br> Sab</th>
                            <th class="border-0">14 <br> Min</th>
                            <th class="border-0">15 <br> Sen</th>
                            <th class="border-0">16 <br> Sel</th>
                            <th class="border-0">17 <br> Rab</th>
                            <th class="border-0">18 <br> Kam</th>
                            <th class="border-0">19 <br> Jum</th>
                            <th class="border-0">20 <br> Sab</th>
                            <th class="border-0">21 <br> Min</th>
                            <th class="border-0">22 <br> Sen</th>
                            <th class="border-0">23 <br> Sel</th>
                            <th class="border-0">24 <br> Rab</th>
                            <th class="border-0">25 <br> Kam</th>
                            <th class="border-0">26 <br> Jum</th>
                            <th class="border-0">27 <br> Sab</th>
                            <th class="border-0">28 <br> Min</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Item -->
                        <tr>
                            <td>
                                Abdul Sutisna
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Siang
                            </td>
                            <td>
                               Siang
                            </td>
                            <td>
                               Malam
                            </td>
                            <td>
                                Malam
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Libur
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Siang
                            </td>
                            <td>
                               Siang
                            </td>
                            <td>
                               Malam
                            </td>
                            <td>
                                Malam
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Libur
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Siang
                            </td>
                            <td>
                               Siang
                            </td>
                            <td>
                               Malam
                            </td>
                            <td>
                                Malam
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Libur
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Siang
                            </td>
                            <td>
                               Siang
                            </td>
                            <td>
                               Malam
                            </td>
                            <td>
                                Malam
                            </td>
                            <td>
                                Pagi
                            </td>
                            <td>
                                Libur
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sutrisno
                            </td>
                            <td>
                                Malam
                             </td>
                             <td>
                                 Malam
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Libur
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Siang
                             </td>
                             <td>
                                Siang
                             </td><td>
                                Malam
                             </td>
                             <td>
                                 Malam
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Libur
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Siang
                             </td>
                             <td>
                                Siang
                             </td><td>
                                Malam
                             </td>
                             <td>
                                 Malam
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Libur
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Siang
                             </td>
                             <td>
                                Siang
                             </td><td>
                                Malam
                             </td>
                             <td>
                                 Malam
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Libur
                             </td>
                             <td>
                                 Pagi
                             </td>
                             <td>
                                 Siang
                             </td>
                             <td>
                                Siang
                             </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
