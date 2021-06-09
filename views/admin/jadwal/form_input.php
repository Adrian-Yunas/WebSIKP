<html>

<head>
    <title>Halaman Edit Data</title>
</head>

<body>
    <h3>Form Input Data Jadwal Ujian</h3>

    <table>
        <form action="<?php echo base_url('Admin/AksiInsert') ?>" method="post">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Jurusan</td>
                <td>:</td>
                <td><input type="text" name="jurusan" required></td>
            </tr>
            <tr>
                <td>Jadwal ujian</td>
                <td>:</td>
                <td><input type="int" name="jadwal_ujian" required></td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td>:</td>
                <td><input type="text" name="ruangan" required></td>
            </tr>
            <tr>
                <td>Dosen penguji</td>
                <td>:</td>
                <td><input type="text" name="dosen_penguji" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" value="Simpan"></td>
            </tr>
        </form>
    </table>

</body>

</html>