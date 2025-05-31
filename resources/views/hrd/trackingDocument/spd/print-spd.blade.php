<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    @media print {
        body {
            font-size: 1.5vw;
            visibility: visible !important;
        }

        label {
            font-size: 1.5vw;
        }

        /* .logo-trias .brand .image img {
                width: 150px;
                height: auto;
                margin-top: -20px; 
                margin-bottom: 10px;
            } */
        .container {
            text-align: right;
            margin-left: 150px;
            margin-top: -30px;
            margin-bottom: 10px;
        }

        .no_spd {
            display: inline-block;
            vertical-align: top;
            margin-right: 20px;
        }

        .karyawan {
            padding-left: 10px;
        }

        .head-spd {
            padding-left: 10px;
            background-color: black;
        }

        .head-spd h6 {
            font-family: 'Calibri', sans-serif;
            font-size: 16px;
            font-weight: bold;
            color: white;
        }

        .hrd {
            padding-left: 10px;
            padding-right: 10px;
        }

        .form-grouptglkembali {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .option_tglkembali {
            display: flex;
            margin-left: auto;
            margin-right: 45px;
        }

        .option_tglkembali .pasti,
        .option_tglkembali .tidak_pasti {
            margin-right: 10px;
        }

        .transportasi_optional {
            display: flex;
            flex-direction: row;
            margin-left: 168px;
            margin-bottom: 10px;
        }

        .kendaraan_lainlain {
            margin-left: 20px;
        }

        .garis-bawah {
            margin-left: 550px;
            margin-top: -10px;
            border-top: 2px solid black;
            width: 150px;
            margin-bottom: 10px;
        }

        .garis-bawah2 {
            margin-left: 355px;
            border-top: 2px solid black;
            width: 170px;
        }

        .karyawan2 {
            margin-top: 10px;
            padding-top: 15px;
            padding-left: 10px;
        }

        .ket_spd {
            display: flex;
            flex-direction: row;
            margin-top: 10px;
        }

        .transportasi,
        .kendaraan_oper,
        .akomodasi {
            display: flex;
        }

        .jenis_akomodasi {
            display: flex;
        }

        .serpo_lain {
            display: flex;
            flex-direction: column;
            margin-right: 30px;
        }

        .serpo_lain div {
            margin-bottom: 10px;
            margin-left: 30px;
        }

        .jenis_kendaraan,
        .label_spd_karyawan {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .jenis_kendaraan div {
            margin-bottom: 4px;
            /* Menambah ruang antara setiap elemen di kolom */
            margin-top: 2px;
        }

        .ket_spd .awal,
        .pesawat,
        .sewa {
            margin-right: 10px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        .form-group-catatan {
            /* margin-bottom: 10px;  */
        }

        .form-group-nama {
            margin-top: -20px;
            margin-bottom: 10px;
        }

        .form-group-transport,
        .form-group-bulanan,
        .form-group-grandtotal {
            margin-top: 10px;
        }

        .form-group2 {
            display: flex;
            margin-bottom: 10px;
        }

        .transportasi {
            display: flex;
        }

        .title {
            display: inline-block;
            width: 160px;
        }

        .ya,
        .kereta,
        .bus,
        .travel {
            display: inline-block;
            width: 65px;
        }

        .jenis_akomodasi div {
            margin-right: 22px
        }

        .awal input[type="checkbox"]:checked {
            border: 2px solid orange;
            background-color: orange;
        }

        /* Gaya untuk checkbox yang tidak dicentang (unchecked) */
        .awal input[type="checkbox"] {
            border: 2px solid orange;
        }

        .row {
            display: flex;
        }

        #table-1 {
            border-collapse: collapse;
            width: 40%;
            margin-right: 30px;
            margin-top: 20px;
            margin-left: 15px;
        }

        #table-2 {
            border-collapse: collapse;
            width: 50%;
            margin-left: 15px;
            margin-top: 20px;
        }

        #table-1 th,
        #table-2 th {
            padding: 8px;
            font-size: 14px;
            text-align: center;
            border: 1px solid black;
        }

        #table-1 td,
        #table-2 td {
            padding-left: 8px;
            padding-right: 8px;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 12px;
            text-align: center;
        }

        #table-1 td.rotate-text,
        #table-2 td.rotate-text {
            color: blue;
            white-space: nowrap;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 12px;
            font-weight: bold;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        #table-1 td.bold-text,
        #table-2 td.bold-text {
            font-size: 12px;
            color: black;
            font-weight: bold;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }

        #table-1 td.date_approve,
        #table-2 td.date_approve {
            color: black;
            border: 1px solid black;
        }
    }

    body {
        font-size: 1.5vw;
        visibility: hidden;
    }

    /* img {
                width: 300px;
                height: auto;
            } */
    .spd {
        border: 1px solid;
        border-color: black;
    }

    .karyawan2 {
        /* border-top: 1px solid; */
    }

    .head-spd {
        padding-left: 10px;
    }

    .head-spd h6 {
        font-family: 'Calibri', sans-serif;
        font-size: 16px;
        font-weight: bold;
    }

    label {
        font-size: 1.5vw;
    }

    .ket_spd {
        float: right;
        display: flex;
        margin-right: 50px;
    }
</style>

@php
$nomor_spd = $spd->nomor_spd;
$ket_spd = $spd->ket_spd;
$nama_peg = $spd->nama_peg;
$nik = $spd->nik;
$grade = $spd->grade;
$divisi = $spd->divisi;
$tujuan = $spd->tujuan;
$tgl_berangkat = $spd->tgl_berangkat;
$tgl_kembali = $spd->tgl_kembali;
$ket_tgl_kembali = $spd->ket_tgl_kembali;
$maksud_tujuan = $spd->maksud_tujuan;
$nama_proyek = $spd->nama_proyek;
$catatan = $spd->catatan;
$transportasi = $spd->transportasi;
$akomodasi = $spd->akomodasi;
$jenis_kendaraan = $spd->jenis_kendaraan;
$alasan_sewa = $spd->alasan_sewa;
$jenis_akomodasi = $spd->jenis_akomodasi;
$nama_serpo = $spd->nama_serpo;

$kadiv_hrd = $spd->approve_gm_hrd;

$dataUpd = DB::table('tb_upd')
    ->where('nomor_spd', $nomor_spd)
    ->where('revision_id', function ($query) use ($nomor_spd) {
        $query->selectRaw('MAX(revision_id)')
            ->from('tb_upd')
            ->where('nomor_spd', $nomor_spd);
    })
    ->get();

$dataUpd2 = DB::table('tb_upd')
->where('nomor_spd', $nomor_spd)
->where('revision_id', function ($query) use ($nomor_spd) {
    $query->selectRaw('MAX(revision_id)')
        ->from('tb_upd')
        ->where('nomor_spd', $nomor_spd);
})
->first();


$approve_atasan_1 = $spd->approve_atasan_1;
$approve_atasan_2 = $spd->approve_atasan_2;

$finance_verified = $spd->status_finance_verifikasi;
$treasury = $spd->status_payment;

$created_at = $spd->created_at;
$date_approval_hrd = $spd->date_approve_hrd;
$date_approval_gm_hrd = $spd->date_approve_gm_hrd;
$date_approval_finance_verified = $spd->date_approve_finance_verifikasi;
$date_approval_treasury = $spd->date_approve_finance_treasury;

$id_peg_atasan1 = $spd->atasan1;
$id_peg_atasan2 = $spd->atasan2;

$queryAtasan1 = DB::table('tb_pegawai')
->select('nama')
->where('id_peg', $id_peg_atasan1)
->first();

$queryAtasan2 = DB::table('tb_pegawai')
->select('nama')
->where('id_peg', $id_peg_atasan2)
->first();

$nama_atasan_1 = $queryAtasan1->nama;
$nama_atasan_2 = $queryAtasan2->nama;

$date_approve_atasan1 = $spd->date_approve_atasan1;
$date_approve_atasan2 = $spd->date_approve_atasan2;
@endphp

<body onload="window.print()">
    <br><br>
    <div class="container">
        <div class="no_spd">
            <label>No:
                <?= $spd['nomor_spd'] ?>
            </label>
        </div>
        <div class="garis-bawah2"></div>
    </div>
    <!-- <div class="logo-trias">
                <div class="brand">
                <span class="image"><img alt="triasmitra" src="../../../assets/img/logo_trias.png"></span> 
                </div>
            </div> -->
    <div class="spd">
        <div class="head-spd">
            <h6>SURAT PERJALANAN DINAS</h6>
        </div>
        <div class="karyawan">
            <div class="ket_spd">
                <div class='awal'>
                    <input type="checkbox" name="ket_spd" value="Awal" {{ ($ket_spd ?? '' )=='Awal' ? 'checked' : '' }}>
                    <label>Awal</label>
                </div>
                <div class='perpanjang'>
                    <input type="checkbox" name="ket_spd" value="Perpanjang" {{ ($ket_spd ?? '' )=='Perpanjang'
                        ? 'checked' : '' }}>
                    <label>Perpanjang</label>
                </div>
            </div>
            <br>
            <br><br>
            <div class="form-group-nama">
                <label class="title">Nama </label>
                <label class="description"> : &nbsp; {{ $nama_peg }}</label>
            </div>
            <div class="form-group">
                <label class="title">Nik/Grade</label>
                <label class="description"> : &nbsp; {{ $nik }}/{{ $grade }}</label>
            </div>
            <div class="form-group">
                <label class="title">Divisi</label>
                <label class="description"> : &nbsp; {{ $divisi }}</label>
            </div>
            <div class="form-group">
                <label class="title">Tujuan</label>
                <label class="description"> : &nbsp; {{ $tujuan }}</label>
            </div>
            <div class="form-group">
                <label class="title">Tanggal Berangkat</label>
                <label class="description"> : &nbsp; {{ $tgl_berangkat }}</label>
            </div>
            <div class="form-grouptglkembali">
                <label class="title">Tanggal Kembali</label>
                <label class="description"> &nbsp;: &nbsp; {{ $tgl_kembali }}</label>
                <div class="option_tglkembali">
                    <div class='pasti'>
                        <input type="checkbox" {{ ($ket_tgl_kembali ?? '' )=='Pasti' ? 'checked' : '' }}>
                        <label>Pasti</label>
                    </div>
                    <div class='tidak_pasti'>
                        <input type="checkbox" {{ ($ket_tgl_kembali ?? '' )=='Tidak Pasti' ? 'checked' : '' }}>
                        <label>Tidak Pasti</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="title">Maksud & Tujuan</label>
                <label class="description"> : &nbsp; {{ $maksud_tujuan }}</label>
            </div>
            <div class="form-group">
                <label class="title">Nama Proyek</label>
                <label class="description"> : &nbsp; {{ $nama_proyek }}</label>
            </div>
            <div class="form-group">
                <label class="title">Catatan</label>
                <label class="description"> : &nbsp; {{ $catatan }}</label>
            </div>
            <div class="form-group2">
                <label class="title">Transportasi</label>
                <label class="description">: &nbsp; </label>
                <div class="transportasi">
                    <div class='pesawat'>
                        <input type="checkbox" value="Pesawat" {{ ($transportasi ?? '' )=='Pesawat' ? 'checked' : '' }}>
                        <label>Pesawat</label>
                    </div>
                    <div class='kereta'>
                        <input type="checkbox" value="Kereta" {{ ($transportasi ?? '' )=='Kereta' ? 'checked' : '' }}>
                        <label>Kereta</label>
                    </div>
                    <div class='bus'>
                        <input type="checkbox" value="Bus" {{ ($transportasi ?? '' )=='Bus' ? 'checked' : '' }}>
                        <label>Bus</label>
                    </div>
                    <div class='travel'>
                        <input type="checkbox" value="Travel" {{ ($transportasi ?? '' )=='Travel' ? 'checked' : '' }}>
                        <label>Travel</label>
                    </div>
                    <div class='kendaraan_pribadi'>
                        <input type="checkbox" value="Kendaraan pribadi" {{ ($transportasi ?? '' )=='Kendaraan Pribadi'
                            ? 'checked' : '' }}>
                        <label>Kendaraan pribadi</label>
                    </div>
                </div>
            </div>
            <div class="form-group2">
                <label class="title">Kendaraan Operasional</label>
                <label class="description">: &nbsp; </label>
                <div class="kendaraan_oper">
                    <div class='ya'>
                        <input type="checkbox" {{ ($akomodasi ?? '' )=='Ya' ? 'checked' : '' }}>
                        <label>Ya</label>
                    </div>
                    <div class='tidak'>
                        <input type="checkbox" {{ ($akomodasi ?? '' )=='Tidak' ? 'checked' : '' }}>
                        <label>Tidak</label>
                    </div>
                </div>
            </div>
            <div class="form-group2">
                <label class="title">Selama Perjalanan Dinas</label>
                <label class="description">: &nbsp; </label>
                <div class="jenis_kendaraan">
                    <div class='HO'>
                        <input type="checkbox" id="ho" {{ ($jenis_kendaraan ?? '' )=='Kendaraan Operasional Kantor'
                            ? 'checked' : '' }}>
                        <label for="ho">Kendaraan Operasional Kantor (HO atau Area/Site)</label>
                    </div>
                    <div class='Transportasi_online'>
                        <input type="checkbox" id="to" {{ ($jenis_kendaraan ?? '' )=='Transportasi Online' ? 'checked'
                            : '' }}>
                        <label for="to">Transporasi Online</label>
                    </div>
                    <div class='sewa'>
                        <input type="checkbox" id='sewa' {{ ($jenis_kendaraan ?? '' )=='Sewa' ? 'checked' : '' }}>
                        <label for='sewa'>Sewa,
                            @if ($alasan_sewa != null || $alasan_sewa != '')
                            Alasan : {{ $alasan_sewa }}
                            @endif
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group2">
                <label class="title">Akomodasi Penginapan</label>
                <label class="description">: &nbsp; </label>
                <div class="akomodasi">
                    <div class='ya'>
                        <input type="checkbox" {{ ($akomodasi ?? '' )=='Ya' ? 'checked' : '' }}>
                        <label>Ya</label>
                    </div>
                    <div class='tidak'>
                        <input type="checkbox" {{ ($akomodasi ?? '' )=='Tidak' ? 'checked' : '' }}>
                        <label>Tidak</label>
                    </div>
                </div>
            </div>
            <div class="form-group2">
                <label class="title"></label>
                <label class="description">: &nbsp; </label>
                <div class="jenis_akomodasi">
                    <div class='hotel'>
                        <input type="checkbox" {{ ($jenis_akomodasi ?? '' )=='Hotel' ? 'checked' : '' }}>
                        <label>Hotel</label>
                    </div>
                    <div class='kos'>
                        <input type="checkbox" {{ ($jenis_akomodasi ?? '' )=='Kos' ? 'checked' : '' }}>
                        <label>Kos</label>
                    </div>
                    <div class='serpo'>
                        <input type="checkbox" {{ ($jenis_akomodasi ?? '' )=='Serpo/BaseCamp' ? 'checked' : '' }}>
                        <label>Serpo/BaseCamp
                            @if ($nama_serpo != null || $nama_serpo != '')
                            {{ $nama_serpo }}
                            @endif
                        </label>
                    </div>
                    <div class='lainlain'>
                        <input type="checkbox" {{ ($jenis_akomodasi ?? '' )=='Lain-Lain' ? 'checked' : '' }}>
                        <label>Lain-Lain</label>
                    </div>
                </div>
            </div>
        </div>

        @if ($kadiv_hrd == 2)
        <div class='hrd'>
            <div style="padding:1rem 1rem 1rem 1rem; border: solid 1px black; margin-top:10px; margin-bottom:10px;">
                <h5 style="margin-bottom:1rem;">UPD untuk Karyawan</h5>
                <div class="form-upd">
                    <label style="font-weight: bold; font-size: 14px;">UPD Harian</label>
                    <table style="font-size:12px;" class="table">
                        <thead>
                            <tr>
                                <th style="min-width:1rem;" scope="col">Kategori</span></th>
                                <th scope="min-width:1rem;" scope="col">Wilayah</span></th>
                                <th scope="min-width:1rem;" scope="col">Zona</th>
                                <th style="min-width:1rem;" scope="col">Jumlah Hari</span></th>
                                <th style="min-width:1rem;" scope="col">Jumlah UPD</span></th>
                                <th style="min-width:1rem;" scope="col">Total UPD</th>
                            </tr>
                        </thead>
                        <tbody id="tableToModify">
                            @foreach ($dataUpd as $data)
                            @php
                            $upd_transportasi = $data->upd_transportasi;
                            $upd_bulanan = $data->upd_bulanan;
                            $grand_total = $data->grand_total;
                            @endphp
                            <tr id="rowToClone">
                                <td>
                                    {{ $data->kategori }}
                                </td>
                                <td>
                                    {{ $data->wilayah }}
                                </td>
                                <td>
                                    {{ $data->zona }}
                                </td>
                                <td>
                                    {{ $data->jml_hari }}
                                </td>
                                <td>Rp.
                                    {{ number_format($data->upd_harian ?? 0, 0, ',', '.') }}
                                </td>
                                <td>Rp.
                                    {{ number_format($data->total_upd_harian ?? 0, 0, ',', '.') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="form-group-transport">
                        <label style="font-weight: bold; font-size: 14px;" class="title">Upd Transportasi </label>
                        <label style="font-weight: bold; font-size: 14px;" class="description"> : &nbsp; Rp.
                            {{ number_format($dataUpd2->upd_transportasi ?? 0, 0, ',', '.') }}
                        </label>
                    </div>
                    <div class="form-group-bulanan">
                        <label style="font-weight: bold; font-size: 14px;" class="title">Upd Bulanan </label>
                        <label style="font-weight: bold; font-size: 14px;" class="description"> : &nbsp; Rp.
                            {{ number_format($dataUpd2->upd_bulanan ?? 0, 0, ',', '.') }}
                        </label>
                    </div>
                    <div class="form-group-grandtotal">
                        <label style="font-weight: bold; font-size: 14px;" class="title">Grand Total </label>
                        <label style="font-weight: bold; font-size: 14px;" class="description"> : &nbsp; Rp.
                            {{ number_format($dataUpd2->grand_total ?? 0, 0, ',', '.') }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div></div>
        @endif
    </div>
    <div class="row">
        <table id="table-1">
            <thead>
                <tr>
                    <th>Karyawan Bersangkutan</th>
                    <th>Atasan 1</th>
                    <th>Atasan 2</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (($approve_atasan_1 == '0') && ($approve_atasan_2 == '0'))
                        <td class="rotate-text">Request By</td>
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                    @elseif (($approve_atasan_1 == '2') && ($approve_atasan_2 == '0'))
                        <td class="rotate-text">Request By</td>
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text"></td>
                    @elseif (($approve_atasan_1 == '2') && ($approve_atasan_2 == '2'))
                        <td class="rotate-text">Request By</td>
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text">Approved</td>
                    @else
                        <td class="rotate-text">Request By</td>
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                    @endif
                </tr>
                <tr>
                    <td class="bold-text">
                       {{ $nama_peg }}
                    </td>
                    <td class="bold-text">
                        {{ $nama_atasan_1 }}
                    </td>
                    <td class="bold-text">
                        {{ $nama_atasan_2 }}
                    </td>
                </tr>
                <tr>
                    @if (($approve_atasan_1 == '0') && ($approve_atasan_2 == '0'))
                        <td class="date_approve">{{ $created_at }}</td>
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                    @elseif (($approve_atasan_1 == '2') && ($approve_atasan_2 == '0'))
                        <td class="date_approve">{{ $created_at }}</td>
                        <td class="date_approve">{{ $date_approve_atasan1 }}</td>
                        <td class="date_approve">-</td>
                    @elseif (($approve_atasan_1 == '2') && ($approve_atasan_2 == '2'))
                        <td class="date_approve">{{ $created_at }}</td>
                        <td class="date_approve">{{ $date_approve_atasan1 }}</td>
                        <td class="date_approve">{{ $date_approve_atasan2 }}</td>
                    @else
                        <td class="date_approve">{{ $created_at }}</td>
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                    @endif
                </tr>
            </tbody>
        </table>
        <table id="table-2">
            <thead>
                <tr>
                    <th>HRD Admin</th>
                    <th>GM HRD & GA</th>
                    <th>Finance Verifikasi</th>
                    <th>Treasury</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if (($kadiv_hrd == '2') && ($finance_verified == 'process'))
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                    @elseif (($finance_verified == 'verified') && ($treasury == 'process'))
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text">Verified</td>
                        <td class="rotate-text"></td>
                    @elseif (($finance_verified == 'verified') && ($treasury == 'paid'))
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text">Approved</td>
                        <td class="rotate-text">Verified</td>
                        <td class="rotate-text">Paid</td>
                    @else
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                    @endif
                </tr>
                <tr>
                    <td class="bold-text">HRD Admin</td>
                    <td class="bold-text">Asthono Prihadi</td>
                    <td class="bold-text">Admin Finance</td>
                    <td class="bold-text">Admin Treasury</td>
                </tr>
                <tr>
                    @if (($kadiv_hrd == '2') && ($finance_verified == 'process'))
                        <td class="date_approve">{{ $date_approval_hrd }} </td>
                        <td class="date_approve">{{ $date_approval_gm_hrd }}</td>
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                    @elseif (($finance_verified == 'verified') && ($treasury == 'process'))
                        <td class="date_approve">{{ $date_approval_hrd }} </td>
                        <td class="date_approve">{{ $date_approval_gm_hrd }}</td>
                        <td class="date_approve">{{ $date_approval_finance_verified }}</td>
                        <td class="date_approve">-</td>
                    @elseif (($finance_verified == 'verified') && ($treasury == 'paid'))
                        <td class="date_approve">{{ $date_approval_hrd }} </td>
                        <td class="date_approve">{{ $date_approval_gm_hrd }}</td>
                        <td class="date_approve">{{ $date_approval_finance_verified }}</td>
                        <td class="date_approve">{{ $date_approval_treasury }}</td>
                    @else
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
</script>

</html>