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

    <h1>Struk Pembelian</h1>
    <table>
        <?php
        
        foreach ($content as $row) { ?>
           <tr> 
                <th>Nama</th>
                <td><?= $row->pasien_nama; ?></td>
           </tr>
           <tr> 
                <th>Keluhan</th>
                <td><?= $row->keluhan; ?></td>
           </tr>
           <tr> 
                <th>Obat</th>
                <td><?= $row->nama_obat; ?></td>
           </tr>
           <tr> 
                <th>Pcs</th>
                <td><?= $row->pcs; ?></td>
           </tr>
           <tr> 
                <th>Harga Satuan</th>
                <td><?= number_format($row->harga_satuan, 0, ',', '.');  ?></td>
           </tr>
           <tr> 
                <th>Total Harga</th>
                <td><?= number_format($row->total_harga, 0, ',', '.');  ?></td>
           </tr>
           <tr> 
                <th>Kasir</th>
                <td><?= $row->transaksi_updated_by; ?></td>
           </tr>
           <tr> 
                <th>Tanggal</th>
                <td><?= $row->create_at; ?></td>
           </tr>
              
            
        <?php } ?>
    </table>

    <div class="thank-you"> Thank you for your purchase! Paid! </div>
    
</body>

</html>