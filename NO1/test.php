<!DOCTYPE html>
<html>
 <head>
  <title>Biodata</title>
 </head>
 <body>
  <table border=0>
  <form action="Hasil.php" method="POST">
  
   <tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td><input type=text name=Nama></td>
   </tr>
   
   <tr>
    <td>Tempat dan Tanggal Lahir</td>
    <td>:</td>
    <td><input type=text name=Tempat size=15>
    <select name=Tgl>
    <option name=Tgl>Tanggal
    <option name=Tgl>1
    <option name=Tgl>2
    <option name=Tgl>3
    <option name=Tgl>4
    <option name=Tgl>5
    <option name=Tgl>6
    <option name=Tgl>7
    <option name=Tgl>8
    <option name=Tgl>9
    <option name=Tgl>10
    <option name=Tgl>11
    <option name=Tgl>12
    <option name=Tgl>13
    <option name=Tgl>14
    <option name=Tgl>15
    <option name=Tgl>16
    <option name=Tgl>17
    <option name=Tgl>18
    <option name=Tgl>19
    <option name=Tgl>20
    <option name=Tgl>21
    <option name=Tgl>22
    <option name=Tgl>23
    <option name=Tgl>24
    <option name=Tgl>26
    <option name=Tgl>27
    <option name=Tgl>28
    <option name=Tgl>29
    <option name=Tgl>30
    <option name=Tgl>31
    </select>
    <select name=Bln>
    <option name=Bln>Bulan
    <option name=Bln>Januari
    <option name=Bln>Februari
    <option name=Bln>Maret
    <option name=Bln>April
    <option name=Bln>Mei
    <option name=Bln>Juni
    <option name=Bln>Juli
    <option name=Bln>Agustus
    <option name=Bln>September
    <option name=Bln>Oktober
    <option name=Bln>November
    <option name=Bln>Desember
    </select>
    <select name=Thn>
    <option name=Thn>Tahun
    <option name=Thn>2020
    <option name=Thn>2019
    <option name=Thn>2018
    <option name=Thn>2017
    <option name=Thn>2016
    <option name=Thn>2015
    <option name=Thn>2014
    </select>
    </td>
   </tr>
   
   <tr>
    <td>Alamat</td>
    <td>:</td>
    <td><textarea rows="5" cols="22" name="alamat"></textarea></td>
   </tr>

   <tr>
    <td>No. Telp HP</td>
    <td>:</td>
    <td><input type=text name=Nama></td>
   </tr>

   <tr>
    <td>Jenis Kelamin</td>
    <td>:</td>
    <td><input type=radio name=JK value=Laki-laki>Laki-laki<input type=radio name=JK value=Perempuan>Perempuan</td>
   </tr>

   <tr>
    <td>Agama</td>
    <td>:</td>
    <td>
    <select name=Tgl>
    <option name=Tgl>Islam
    <option name=Tgl>Kristen
    <option name=Tgl>Katolik
    <option name=Tgl>Budha

    </select>

    <tr>
    <td>Hobi</td>
    <td>:</td>
    <td><input type=radio name=JK value=bacabuku>Baca Buku<input type=radio name=JK value=olahraga>Olahraga<input type=radio name=JK value=olahraga>Main Game<input type=radio name=JK value=olahraga>Hiking</td>
   </tr>
   
   <tr>
    <td> </td>
    <td> </td>
    <td><input type="submit" name="submit" value="Tampilkan">
    <input type="reset" name="reset" value="Reset"></td>
   </tr>
  </form>
  </table>
 </body>
</html>