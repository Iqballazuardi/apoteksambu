<!DOCTYPE html>
<html>

<head>
    <title>Rekap Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
        }

        table th,
        table td {
            border: 1px solid #000;
            padding: 2px;
            text-align: center;
        }

        table th {
            background-color: #161876E1;
            font-weight: bold;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: white;
        }

        table tr:nth-child(odd) {
            background-color: #fff;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img style="width: 75px;" src="<?php echo ('http://localhost/ApotekSambu/assets/images/logo-baru.png') ?>" />
        <img style="width: 100px;" src="<?php echo ('http://localhost/ApotekSambu/assets/images/apoteksambu.png') ?>" />
    </div>

    <h1>Rekap Transaksi</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama </th>
            <th>Keluhan</th>
            <th>Obat</th>
            <th>Pcs</th>
            <th>Harga Satuan</th>
            <th>Total Harga</th>
            <th>Kasir</th>
            <th>Tanggal</th>
        </tr>
        <?php
        $no = 1;
        foreach ($content as $row) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->pasien_nama; ?></td>
                <td><?= $row->keluhan; ?></td>
                <td><?= $row->nama_obat; ?></td>
                <td><?= $row->pcs; ?></td>
                <td>RP <?= number_format($row->harga_satuan, 0, ',', '.');  ?></td>
                <td>RP <?= number_format($row->total_harga, 0, ',', '.');  ?></td>
                
                <td><?= $row->transaksi_updated_by ; ?></td>
                <td><?= $row->create_at ; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>