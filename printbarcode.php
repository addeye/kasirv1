<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Barcode</title>
</head>
<body>
    <table width="100%" align="center" border="1" cellpadding="5" cellspacing="2">
        <?php for ($i = 0; $i < 10; $i++): ?>
        <tr>
            <td>
                <img alt="<?='barang-' . $i . '1'?>" src="/library/barcode.php?text=<?='barang-' . $i . '1'?>&print=true"/>
            </td>
            <td>
                <img alt="<?='barang-' . $i . '2'?>" src="/library/barcode.php?text=<?='barang-' . $i . '2'?>&print=true"/>
            </td>
            <td>
                <img alt="<?='barang-' . $i . '3'?>" src="/library/barcode.php?text=<?='barang-' . $i . '3'?>&print=true"/>
            </td>
        </tr>
        <?php endfor; ?>
    </table>
</body>
</html>