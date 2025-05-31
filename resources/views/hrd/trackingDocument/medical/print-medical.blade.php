<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Print Out Medical</title>
</head>
<style>
    @media print {

        body {
            /* display:block; */
            font-size: 1.5vw;
        }

        .head {
            background-color: #BFBFBF !important;
        }

        .container {
            border: 1px solid black;
            padding-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: .3rem 1rem;
            font-size: 1.5vw;
        }

        #table-1 {
            border-collapse: collapse;
            width: 35%;
            margin-right: 70px;
            margin-top: 20px;
            margin-left: 110px;
            font-size: 1.5vw;
        }

        #table-2 {
            border-collapse: collapse;
            width: 25%;
            margin-left: 15px;
            margin-top: 20px;
            font-size: 1.5vw;
        }

        #table-1 th,
        #table-2 th {
            padding: 8px;
            /* font-size: 11px; */
            text-align: center;
            border: 1px solid black;
        }

        #table-1 td,
        #table-2 td {
            padding-left: 8px;
            padding-right: 8px;
            padding-top: 4px;
            padding-bottom: 4px;
            /* font-size: 10px; */
            text-align: center;
        }

        #table-1 td.rotate-text {
            color: blue;
            white-space: nowrap;
            padding-top: 20px;
            padding-bottom: 20px;
            font-size: 13px;
            font-weight: bold;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        #table-2 td.rotate-text {
            color: blue;
            white-space: nowrap;
            padding-top: 15px;
            padding-bottom: 15px;
            font-size: 13px;
            font-weight: bold;
            border-left: 1px solid black;
            border-right: 1px solid black;
        }

        #table-1 td.bold-text {
            /* font-size: 12px; */
            /* color: black; */
            font-weight: bold;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }

        #table-2 td.bold-text {
            padding-top: 10px;
            padding-bottom: 10px;
            font-weight: bold;
            border-left: 1px solid black;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }

        #table-1 td.date_approve {
            color: black;
            border: 1px solid black;
        }

        #table-2 td.date_approve {
            /* padding-top: -50px;
            padding-bottom: -20px; */
            color: black;
            border: 1px solid black;
        }

    }

    @media screen {
        body {
            display: none;
        }
    }
</style>

<body class="show" onload="window.print()">
    <div class="container">
        <div class="row text-center head">
            <h5>FORM REIMBURSEMENT PENGOBATAN</h5>
            <hr>
        </div>
        <div class="p-1">
            <table style="overflow: hidden;">
                <thead>
                    <tr>
                        <div style="margin-top:1rem; margin-bottom:2px; font-weight:bold;">
                            <div>Nomor Medical : {{ $nomor_medical_claim }}</div>
                            <div>Nama : {{ $nama }}</div>
                            <div>NIK : {{ $nik }}</div>
                            <div>Tanggal Pengajuan : {{ $createdAt }}</div>
                        </div>
                    </tr>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Kwitansi</th>
                        <th>Tertanggung</th>
                        <th>Keterangan</th>
                        <th>Jumlah (Rp)</th>
                        <th>Penggantian (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medicalDetails as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ \Carbon\Carbon::parse($detail->tgl_bukti_kwitansi)->translatedFormat('d F Y') }}</td>
                            <td>{{ $detail->tertanggung }}</td>
                            <td>{{ $detail->keterangan }}</td>
                            <td>Rp. {{ number_format($detail->jumlah, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($detail->jumlah, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" style="text-align: right; font-weight: bold;">Total</td>
                        <td>Rp. {{ number_format($totalJumlah, 0, ',', '.') }}</td>
                        <td>Rp. {{ number_format($totalJumlah, 0, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <table id="table-1">
            <thead>
                <tr>
                    <th>Disiapkan oleh,</th>
                    <th>Diperiksa oleh,</th>
                    <th>Disetujui oleh,</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="rotate-text">Request By</td>
                    <td class="rotate-text">Verified</td>
                    <td class="rotate-text">Approved</td>
                </tr>
                <tr>
                    <td class="bold-text">{{ $nama }}</td>
                    <td class="bold-text">HRD Verifikasi</td>
                    <td class="bold-text">{{ $namaKadivHrd }}</td>
                </tr>
                <tr>
                    <td class="date_approve">{{ $createdAt }}</td>
                    <td class="date_approve">{{ $dateApprovalHrd }}</td>
                    <td class="date_approve">{{ $dateApprovalGmHrd }}</td>
                </tr>
            </tbody>
        </table>
        <table id="table-2">
            <thead>
                <tr>
                    <th>Finance Verifikasi</th>
                    <th>Finance Treasury</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @if ($financeVerified == 'verified' && $treasury == 'process')
                        <td class="rotate-text">Verified</td>
                        <td class="rotate-text"></td>
                    @elseif($financeVerified == 'verified' && $treasury == 'paid')
                        <td class="rotate-text">Verified</td>
                        <td class="rotate-text">Paid</td>
                    @else
                        <td class="rotate-text"></td>
                        <td class="rotate-text"></td>
                    @endif
                </tr>
                <tr>
                    <td class="bold-text">Finance Admin</td>
                    <td class="bold-text">Treasury</td>
                </tr>
                <tr>
                    @if ($financeVerified == 'verified' && $treasury == 'process')
                        <td class="date_approve">{{ $dateApprovalFinanceVerified }}</td>
                    @elseif($financeVerified == 'verified' && $treasury == 'paid')
                        <td class="date_approve">{{ $dateApprovalFinanceVerified }}</td>
                        <td class="date_approve">{{ $dateApprovalTreasury }}</td>
                    @else
                        <td class="date_approve">-</td>
                        <td class="date_approve">-</td>
                    @endif
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
