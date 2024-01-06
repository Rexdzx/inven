<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    </style>
</head>

<body>

    <h2
        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
        Data Barang</h2>

    <table>
        <tr>
            <th style="text-align: center;width: 6%">NO.</th>
            <th>NAMA BARANG</th>
            <th>MEREK BARANG</th>
            <th>KONDISIBARANG</th>
        </tr>
        <?php foreach($barang as $no => $item) :?>
        <tr class="text-center">
            <th scope="row" style="text-align: center">
                <?= ++$no ?></th>
            <td><?= $item->nama ?></td>
            <td><?= $item->merek ?></td>
            <td><?= $item->kondisi ?></td>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
</body>

</html>