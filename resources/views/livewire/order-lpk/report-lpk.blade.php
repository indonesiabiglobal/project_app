<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@php
use Carbon\Carbon;

    $data = collect(DB::select("
                SELECT tdol.lpk_no,tdo.po_no,tdo.order_date, tdo.stufingdate,tdo.order_qty/mp.case_box_count as order_qty,tdol.qty_lpk,mwl.name as warnalpk,
                tdol.panjang_lpk,mm.machineno as nomesin,mp.codebarcode,tdol.qty_gentan as infure_qtygentan,tdol.qty_gulung as infure_pjgulunglpk,  
                mp.id, mp.name as product_name,mp.code_alias,mp.code,
                mpt.code as tipe , mpt.name as tipename,mp.ketebalan as t, mp.diameterlipat as l, mp.productlength as p,
                mp.ketebalan ||'x'||mp.diameterlipat||'x'||mp.productlength as dimensi_txlxp, 
                mp.unit_weight as beratsatuan,mp.inflation_thickness ||'x'||mp.inflation_fold_diameter as infure_dimensi,
                mp.one_winding_m_number as infure_panjanggulung,
                 case when mp.material_classification='0' then 'HD' when mp.material_classification='1' then 'LD' ELSE 'lld' END  as infure_material,
               case when mp.embossed_classification='0' then 'Tidak Ada' else 'Ada' end as infure_embose,case when mp.surface_classification='0' then 'Tidak Ada' when mp.surface_classification='1' then 'Satu sisi' when mp.surface_classification='2' then 'Dua sisi' when mp.surface_classification='3' then 'Satu Sisi Parsial' else 'Dua Sisi Parsial' end as infure_corona,
                case when mp.winding_direction_of_the_web='0' then 'Gulungan Kepala depan' when mp.winding_direction_of_the_web='1' then 'Zugara shiri dashi insatsu-men-hyō maki' when mp.winding_direction_of_the_web='2' then 'Zugara atama dashi insatsu-men ura maki' ELSE 'Zugara shiri dashi insatsu-men ura maki' END  as infur_arahgulungan,
                mli.name as infure_lakbanwarna,
                mp.coloring_1 as infure_mb1_masterbatch,
                mp.coloring_2 as infure_mb2, mp.coloring_3 as infure_mb3,mp.coloring_4 as infure_mb4,mp.coloring_5 as infure_mb5,
                mp.inflation_notes as infure_catatan,
                mp.gentan_classification as infure_gentan,(case when mp.gazette_classification='0' then 'Gazet Biasa' 
		when mp.gazette_classification='1' then 'Hineri Gazet' when mp.gazette_classification='2' then 'Soko Gazet'  when mp.gazette_classification='3' then 'Ato Gazet'  when mp.gazette_classification='4' then 'Kata Gazet' else 'Tidak Ada Gazet' end ) as infure_gazette,
                mp.gazette_dimension_a as infure_gz_dimensi_a,mp.gazette_dimension_b as infure_gz_dimensi_b,
                mp.gazette_dimension_c as infure_gz_dimensi_c,mp.gazette_dimension_d as infure_gz_dimensi_d,
                mk.code ||','||mk.name as hagata_kodenukigata,mp.extracted_dimension_a as hagata_a,
                mp.extracted_dimension_b as hagata_b,mp.extracted_dimension_c as hagata_c,
                mp.number_of_color as printing_warnadepan,mp.color_spec_1 as printing_warnadepan1,mp.color_spec_2 as printing_warnadepan2,mp.color_spec_3 as printing_warnadepan3,
                mp.color_spec_4 as printing_warnadepan4,mp.color_spec_5 as printing_warnadepan5, 
                mp.back_color_number as printing_warnabelakang,mp.back_color_1 as printing_warnabelakang1,
                mp.back_color_2 as printing_warnabelakang2,mp.back_color_3 as printing_warnabelakang3,
                mp.back_color_4 as printing_warnabelakang4,mp.back_color_5 as printing_warnabelakang5,
                mp.print_type as printing_jeniscetak,mp.ink_characteristic as printing_sifattinta,mp.endless_printing as printing_endless,mp.winding_direction_of_the_web as printing_araggulungan,
                mp.seal_classification as seitai_klasifikasiseal,mp.from_seal_design as seitai_jaraksealdaripola,
                mp.lower_sealing_length as seitai_jaraksealbawah,mp.palet_jumlah_baris as seitai_jmlhbarispalet,
                mp.palet_isi_baris as seitai_isibarispalet,	mpb.code as seitai_kodebox , mpb.name as seitai_namabox,
                mp.case_box_count as seitai_isibox, 
                mpg.code as seitai_kodegaiso ,mpg.name as seitai_namagaiso,mp.case_gaiso_count as seitai_isigaiso,
                mpi.code as seitai_kodeinner, mpi.name as seitai_namainner,mp.case_inner_count as seitai_isiinner,
                mpl.code as seitai_kodelayer,mpl.name as seitai_namalayer,mhs.code as kodehagata,mhs.name as namahagata,
                mls.code as seitai_kodelakban,mls.name as seitai_namalakban,mss.name as seitai_stample,'' as jenis,'' as kodeplate,
                mp.manufacturing_summary as seitai_catatan 
                from tdorderlpk as tdol 
                left join tdorder as tdo on tdo.id=tdol.order_id
                left JOIN msproduct as mp on mp.id=tdol.product_id
                left JOIN msproduct_type as mpt on mp.product_type_id=mpt.id
                left JOIN mskatanuki as mk on mp.katanuki_id=mk.id
                left JOIN mspackagingbox as mpb on mp.pack_box_id=mpb.id
                left jOIN mspackaginggaiso as mpg on  mp.pack_gaiso_id=mpg.id
                left join mspackaginginner as mpi on mp.pack_inner_id=mpi.id
                left join mspackaginglayer as mpl on mp.pack_layer_id=mpl.id
                left join msmachine as mm on mm.id=tdol.machine_id
                left join mswarnalpk as mwl on mwl.id=tdol.warnalpkid
                left join mslakbaninfure as mli on mli.id=mp.lakbaninfureid
                left join mslakbanseitai as mls on mls.id=mp.lakbanseitaiid
                left join msstampleseitai as mss on mss.id=mp.stampelseitaiid
                left join mshagataseitai as mhs on mhs.id=mp.hagataseitaiid 
                where tdol.id='$lpk_id'
        "))->first();
        @endphp
<body style="background-color: #CCCCCC;margin: 0">
    <div align="center">
        <table class="bayangprint" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF" border="0" width="950" style="padding:25px">
            <tbody>
                <tr>
                    <td>
                        <table width="100%" cellspacing="0" border="0" cellpadding="3">
                            <tr>
                                
                                <td width="60%">
                                    <h1>LPK {{ $data->lpk_no }}</h1>
                                </td>
                                <td width="30%" style="border: 1px solid black;">
                                    <p>Panjang Sebenarnya {{ $data->panjang_lpk }} m</p>
                                    <p>Selisih -320m</p>
                                </td>
                                <td width="10%">
                                    @php
                                        $url = $data->lpk_no;
                                        $qrCodeUrl = 'https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=' . urlencode($url);
                                    @endphp
                                    <img src="{{ $qrCodeUrl }}" width="80" alt="QR Code">
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0" style="margin-top: 15px;">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        <font style="font-size: 18px;font-weight: bold;">1. ORDER</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Nomor Order</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ $data->code }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center;">
                                    <h3>{{$data->product_name}}</h3>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Nomor Produk</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ $data->code_alias }}</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>PO Number</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->po_no }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Tgl. Order</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ Carbon::parse($data->order_date)->format('d-M-Y') }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Tgl. Stuffing</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ Carbon::parse($data->stufingdate)->format('d-M-Y') }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Jml.Order/case</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->order_qty }} box</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Jumlah LPK</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ $data->qty_lpk }}</font> lbr
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Panjang Order</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->panjang_lpk }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>berat Order</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ $data->qty_lpk/$data->order_qty }}</font> kg
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Tipe Produk</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->tipe }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center;">
                                    <span>Nama Tipe</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 14px;">{{ $data->tipename }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <span>Tebal</span>
                                                <br>
                                                <span>{{ $data->t }} x </span>
                                            </td>
                                            <td>
                                                <span>Lebar</span>
                                                <br>
                                                <span>{{ $data->l }} x </span>
                                            </td>
                                            <td>
                                                <span>Panjang</span>
                                                <br>
                                                <span>{{ $data->p }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr style="font-size: 18px;">
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Warna LPK : </span>
                                    <span>{{ $data->warnalpk }}</span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Nomor Barcode : </span>
                                    <span style="font-weight: bold;">{{ $data->codebarcode }}</span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        <font style="font-size: 18px;font-weight: bold;">2. INFURE</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Nomor Mesin</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 28px;font-weight: bold;">{{ $data->nomesin }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Dimensi Infure</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->infure_dimensi }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Panjang Gulung</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold; ">{{ $data->infure_pjgulunglpk }} m</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Jml Gentan</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ $data->infure_qtygentan }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Berat Standar</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;font-weight: bold;">{{ $data->beratsatuan }}</font> Kg
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Material</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->infure_material }}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>Arah Gulung</span>
                                    <br>
                                    <span>
                                        <font style="font-size: 22px;">{{ $data->infur_arahgulungan}} </font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;" width="45%">
                                    <span>Master Batch</span> <br>
                                    <span style="font-size: 18px; font-weight: bold;">1. {{ $data->infure_mb1_masterbatch}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">2. {{ $data->infure_mb2}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">3. {{ $data->infure_mb3}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">4. {{ $data->infure_mb4}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">5. {{ $data->infure_mb5}}</span><br>
                                    <table>
                                        <tr>
                                            <td>
                                                <span>Catatan : </span>
                                                <span style="font-size: 18px; font-weight: bold;">{{ $data->infure_catatan}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: 1px solid black;" width="20%">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="border-bottom: 1px solid black;">
                                                <span>Embos</span><br>
                                                <span style="font-size: 18px; font-weight: bold;">{{ $data->infure_embose}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1px solid black;">
                                                <span>Corona Discharge</span><br>
                                                <span style="font-size: 18px; font-weight: bold;">{{ $data->infure_corona}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Warna Lakban</span><br>
                                                <span style="font-size: 18px; font-weight: bold;">{{ $data->infure_lakbanwarna}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="border: 1px solid black;">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="border-bottom: 1px solid black;">
                                                <span>{{ $data->infure_gazette}}</span><br>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1px solid black;">
                                                <span>img</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        <font style="font-size: 18px;font-weight: bold;">3. PRINTING</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;" width="40%">
                                    <span>Warna Depan : {{ $data->printing_warnadepan}} warna </span> <br>
                                    <span style="font-size: 18px; font-weight: bold;">1. {{ $data->printing_warnadepan1}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">2. {{ $data->printing_warnadepan2}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">3. {{ $data->printing_warnadepan3}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">4. {{ $data->printing_warnadepan4}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">5. {{ $data->printing_warnadepan5}}</span><br>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;" width="40%">
                                    <span>Warna Belakang : {{ $data->printing_warnabelakang}} warna </span> <br>
                                    <span style="font-size: 18px; font-weight: bold;">1. {{ $data->printing_warnabelakang1}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">2. {{ $data->printing_warnabelakang2}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">3. {{ $data->printing_warnabelakang3}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">4. {{ $data->printing_warnabelakang4}}</span><br>
                                    <span style="font-size: 18px; font-weight: bold;">5. {{ $data->printing_warnabelakang5}}</span><br>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;" width="40%">
                                    <table width="100%" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td style="border-bottom: 1px solid black;">
                                                <span>Jenis Cetak</span><br>
                                                <span style="font-size: 18px;">{{ $data->printing_jeniscetak}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-bottom: 1px solid black;">
                                                <span>Jenis Tinta</span><br>
                                                <span style="font-size: 18px; font-weight: bold;">{{ $data->printing_sifattinta}}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span>Kode Plate</span><br>
                                                <span style="font-size: 18px; font-weight: bold;">{{ $data->kodeplate}}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        <font style="font-size: 18px;font-weight: bold;">4. SEITAI</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        Seal <br>
                                        <font style="font-size: 18px;font-weight: bold;">{{ $data->seitai_klasifikasiseal}}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        Jarak Seal Bawah <br>
                                        <font style="font-size: 18px;font-weight: bold;">{{ $data->seitai_jaraksealbawah}} mm</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        Jarak Seal Dari Pola <br>
                                        <font style="font-size: 18px;font-weight: bold;">{{ $data->seitai_jaraksealdaripola}} mm</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        Jumlah Baris Palet <br>
                                        <font style="font-size: 18px;font-weight: bold;">{{ $data->seitai_jmlhbarispalet}}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        Isi Baris Palet <br>
                                        <font style="font-size: 18px;font-weight: bold;">{{ $data->seitai_isibarispalet}}</font>
                                    </span>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        Kode Hagata <br>
                                        <font style="font-size: 18px;font-weight: bold;">{{ $data->kodehagata}}</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;" width="8%">
                                    <span>
                                        -
                                    </span>
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;">Gaiso</font><br>
                                                <font style="font-weight: bold;">Box</font><br>
                                                <font style="font-weight: bold;">Inner</font><br>
                                                <font style="font-weight: bold;">Layer</font><br>
                                                <font style="font-weight: bold;">Lakban</font><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center; vertical-align: top;" width="8%">
                                    <span>
                                        Kode
                                    </span>
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;">{{ $data->seitai_kodegaiso}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_kodebox}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_kodeinner}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_kodelayer}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_kodelakban}}</font><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center; vertical-align: top;" width="12%">
                                    <span>
                                        Isi
                                    </span>
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;">{{ $data->seitai_isigaiso}}</font> lembar<br>
                                                <font style="font-weight: bold;">{{ $data->seitai_isibox}}</font> lembar<br>
                                                <font style="font-weight: bold;">{{ $data->seitai_isiinner}}</font> lembar<br>
                                            </td>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center; vertical-align: top;" width="8%">
                                    <span>
                                        Jenis
                                    </span>
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;">{{ $data->jenis}}</font><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center; vertical-align: top;" width="10%">
                                    <span>
                                        Stample
                                    </span>
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;">{{ $data->seitai_stample}} </font><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;text-align: center; vertical-align: top;" width="33%">
                                    <span>
                                        Nama
                                    </span>
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;">{{ $data->seitai_namagaiso}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_namabox}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_namainner}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_namalayer}}</font><br>
                                                <font style="font-weight: bold;">{{ $data->seitai_namalakban}}</font><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="padding: 3px;border-right: 1px solid black;">
                                    <span>
                                        Img
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;" width="79%"> - </td>
                                <td style="padding: 3px;border-right: 1px solid black; border-bottom: 1px solid black;" width="21%">
                                    <table>
                                        <tr>
                                            <td>
                                                <font style="font-weight: bold;font-size: 20px;color:red;">A=</font>
                                                <font style="font-weight: bold;font-size: 20px">{{ $data->hagata_a}}</font>
                                            </td>
                                            <td>
                                                <font style="font-weight: bold;font-size: 20px;">B={{ $data->hagata_b}}</font><br>
                                            </td>
                                            <td>
                                                <font style="font-weight: bold;font-size: 20px;">C={{ $data->hagata_c}}</font><br>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        <font style="font-size: 18px;font-weight: bold;">5. CATATAN PRODUKSI</font>
                                    </span>
                                </td>
                            </tr>
                        </table>
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="padding: 3px;border: 1px solid black;" width="70%">
                                    <font style="font-weight: bold;font-size: 20px;">{{ $data->seitai_catatan}}</font><br>
                                </td>
                                <td style="padding: 3px;border: 1px solid black;">
                                    <span>
                                        <p>Blow Ratio</p>
                                        <p>Diameter KB</p>
                                        <p>Tinggi Neck In</p>
                                        <hr>
                                        <p>Operator</p>
                                        <p>Ass Leader</p>
                                        <p>Leader</p>
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>