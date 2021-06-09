<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Form Jadwal Ujian</title>
    <link rel="stylesheet" href="">
</head>

<body>
    <h1>Data Jadwal Ujian</h1>

    <button onclick="document.location.href='<?php echo base_url('admin/formInput') ?>' ">Tambah Jadwal Ujian</button>
    <br>
    <br>
    <table border="1">
        <tr>
            <td><b>NO</b></td>
            <td><b>Nama</b></td>
            <td><b>Jurusan</b></td>
            <td><b>Jadwal Ujian</b></td>
            <td><b>Ruangan</b></td>
            <td><b>Dosen Penguji</b></td>
            <td><b>Aksi</b></td>
        </tr>

        <?php

        $no = 1;
        foreach ($jadwal as $jdwl) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $jdwl->nama ?></td>
                <td><?php echo $jdwl->jurusan ?></td>
                <td><?php echo $jdwl->jadwal_ujian ?></td>
                <td><?php echo $jdwl->ruangan ?></td>
                <td><?php echo $jdwl->dosen_penguji ?></td>
                <td><a href="<?php echo base_url('admin/formEdit/') . $jdwl->nama ?>">Edit</a> <a href="<?php echo base_url('admin/AksiDeleteData/') . $jdwl->nama ?>">Delete</a></td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>