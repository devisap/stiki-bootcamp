<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Buku</h1>
<form action="<?= site_url('buku/proses_edit')?>" method="post">
        ISBN : <input type="text" name="isbn" value="<?php echo $buku->ISBN?>" />
        <input type="hidden" name="isbn_lama" value="<?php echo $buku->ISBN?>" />
        Judul : <input type="text" name="judul" value="<?php echo $buku->JUDUL?>" />
        Pengarang : <input type="text" name="pengarang" value="<?php echo $buku->PENGARANG?>" />
        <button type="submit">Simpan</button>
    </form>
</body>
</html>