<!DOCTYPE html>
<html>

<head>
    <title>Master Supplier</title>
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
            padding: 8px;
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

    <h1>Data Supplier</h1>
    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>Nomor</th>
            <th>Ditambahkan Oleh</th>
        </tr>
        <?php
        $no = 1;
        foreach ($content as $row) { ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row->nama; ?></td>
                <td><?= $row->alamat; ?></td>
                <td><?= $row->email; ?></td>
                <td><?= $row->nomor; ?></td>
                <td><?= $row->updated_by ; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>