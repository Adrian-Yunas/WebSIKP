<html>

<head>
    <title>Halaman Form Edit</title>
</head>

<body>
    <h3>Form Edit Data Jadwal Ujian</h3>

    <table>
        <form action="<?php echo base_url('admin/AksiEdit') ?>" method="post">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $data_jdwl->nama ?>"></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><input type="text" name="jurusan" value="<?php echo $data_jdwl->jurusan ?>"></td>
            </tr>
            <tr>
                <td>Jadwal ujian</td>
                <td>:</td>
                <td><input type="int" name="jadwal_ujian" value="<?php echo $data_jdwl->jadwal_ujian ?>"></td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td>:</td>
                <td><input type="text" name="ruangan" value="<?php echo $data_jdwl->ruangan ?>"></td>
            </tr>
            <tr>
                <td>Dosen penguji</td>
                <td>:</td>
                <td><input type="text" name="dosen_penguji" value="<?php echo $data_jdwl->dosen_penguji ?>"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Simpan">
                </td>
            </tr>
        </form>
    </table>
</body>

</html>