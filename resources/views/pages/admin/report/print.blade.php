<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengaduan - MORACARE</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 13px;
            color: #333;
            margin: 50px;
            position: relative;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .header h2 {
            margin: 0;
            font-size: 20px;
            text-transform: uppercase;
        }

        .header .divider {
            border-bottom: 2px solid #444;
            margin: 10px auto;
            width: 60%;
        }

        .subtitle {
            text-align: center;
            font-size: 12px;
            color: #555;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            background-color: #fff;
        }

        th {
            background-color: #f1f1f1;
            font-weight: bold;
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        td {
            border: 1px solid #ccc;
            padding: 7px;
            vertical-align: top;
        }

        tr:nth-child(even) {
            background-color: #fafafa;
        }

        .watermark {
            position: fixed;
            top: 35%;
            left: 25%;
            width: 50%;
            font-size: 60px;
            color: rgba(200, 200, 200, 0.15);
            text-align: center;
            transform: rotate(-30deg);
            z-index: -1;
            user-select: none;
        }

        @media print {
            .no-print {
                display: none;
            }

            body {
                margin: 0;
            }

            .watermark {
                display: block;
            }

            table {
                page-break-inside: auto;
            }

            tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
</head>

<body>

    <div class="watermark">MORACARE</div>

    <div class="header">
        <h2>Laporan Data Pengaduan</h2>
        <div class="divider"></div>
    </div>

    <div class="subtitle">
        Dicetak pada {{ \Carbon\Carbon::now()->format('d M Y, H:i') }}
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Pelapor</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $report->code }}</td>
                    <td>{{ $report->resident->user->name }}<br><small>({{ $report->resident->user->email }})</small></td>
                    <td>{{ $report->reportCategory->name }}</td>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->description }}</td>
                    <td>{{ $report->address }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
