<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing Commission Data</title>
    <!-- Link ke CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table thead {
            background-color: #007bff;
            color: white;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f8f9fa;
        }
        .table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .table td, .table th {
            border-top: 1px solid #dee2e6;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Data Komisi Marketing</h2>
        <!-- Table dengan desain Bootstrap -->
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>Marketing</th>
                    <th>Bulan</th>
                    <th>Omzet</th>
                    <th>Komisi (%)</th>
                    <th>Komisi Nominal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($commissions as $item)
                    <tr>
                        <td>{{ $item->marketing }}</td>
                        <td>{{ $item->month }}</td>
                        <td>{{ number_format($item->omzet, 0, ',', '.') }}</td>
                        <td>{{ $item->komisi_persen }}%</td>
                        <td>{{ number_format($item->komisi_nominal, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>