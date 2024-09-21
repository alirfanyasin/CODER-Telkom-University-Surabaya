<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SK Aktif CODER Telkom University</title>

  <style>
    header {
      text-align: center;
      margin-bottom: 2px;
      border-bottom: 5px solid black;
    }

    h1 {
      font-size: 16px;
      margin: 10px 0;
    }

    img {
      width: 100px;
    }

    a {
      color: blue;
    }

    .left,
    .right {
      width: 100px;
      vertical-align: middle;
    }

    .center {
      width: auto;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <header>
    <table style="width: 100%; text-align: center; margin-bottom: 10px;">
      <tr>
        <td class="left">
          <img src="{{ public_path('assets/images/logo/logo-telkomsby.png') }}" alt="Logo telkom surabaya">
        </td>
        <td class="center">
          <h1>CREATIVE ON DIGITAL ENVIRONMENT IN ROOM OF <br> TECHNOLOGY TELKOM UNIVERSITY SURABAYA</h1>
          <p>
            Jl. Ketintang No. 156, Surabaya, Jawa Timur 60231, Telp. (031) 8280800 <br>
            Website: <a href="https://surabaya.telkomuniversity.ac.id/">https://surabaya.telkomuniversity.ac.id/</a>.
            Email : <a href="publicrelationssby@telkomuniversity.ac.id">publicrelationssby@telkomuniversity.ac.id</a>
          </p>
        </td>
        <td class="right">
          <img src="{{ public_path('assets/images/logo/main-logo.png') }}" alt="Logo telkom surabaya">
        </td>
      </tr>
    </table>
  </header>

  <hr style="border: 1px solid black;">

  <?php
  $hariIndo = [
      'Sunday' => 'Minggu',
      'Monday' => 'Senin',
      'Tuesday' => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday' => 'Kamis',
      'Friday' => 'Jum’at',
      'Saturday' => 'Sabtu',
  ];
  $day = $hariIndo[date('l', strtotime($date_published))];
  $date = date('d F Y', strtotime($date_published));
  ?>

  <p style="text-align: right;"> {{ $day . ', ' . $date }}</p>

  <table>
    <tr>
      <td>Nomor</td>
      <td>:</td>
      <td>{{ $reference_number }}</td>
    </tr>
    <tr>
      <td>Lampiran</td>
      <td>:</td>
      <td>-</td>
    </tr>
    <tr>
      <td>Perihal</td>
      <td>:</td>
      <td>Surat Keterangan Aktif</td>
    </tr>
  </table>

  <h1 style="text-align: center; font-size: 20px; margin: 50px 0;">SURAT KETERANGAN AKTIF ORGANISASI</h1>

  <p>Dengan hormat, <br> Bersama dengan ini, kami menerangkan bahwa daftar nama berikut:</p>
  <table>
    <tr>
      <td>Nama</td>
      <td>:</td>
      <td>{{ Auth::user()->name }}</td>
    </tr>
    <tr>
      <td>NIM</td>
      <td>:</td>
      <td>{{ Auth::user()->nim }}</td>
    </tr>
    <tr>
      <td>Prodi</td>
      <td>:</td>
      <td>{{ Auth::user()->major }}</td>
    </tr>
    <tr>
      <td>Angkatan</td>
      <td>:</td>
      <td>{{ Auth::user()->batch }}</td>
    </tr>
    <tr>
      <td>Jabatan</td>
      <td>:</td>
      <td>{{ Auth::user()->label }}</td>
    </tr>

  </table>

  <p>Adalah benar-benar mahasiswa yang masih aktif sebagai Unit Kegiatan Mahasiswa CODER (Creativity On Digital
    Environment In Room Of Technolgy) masa jabatan/kepengurusan {{ $length_of_service }}.</p>
  <p>Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.</p>


  <table style="width: 100%; text-align: center; margin-top: 50px;">
    <tr>
      <td class="left"></td>
      <td class="center"></td>
      <td style="width: 170px;">
        <p>Mengetahui, <br><span style="font-weight: bold;">Ketua UKM CODER <br> Telkom University Surabaya</span></p>
      </td>
    </tr>
    <tr>
      <td class="left"></td>
      <td class="center"></td>
      <td style="width: 200px;">
        <img src="{{ public_path('storage/signature/' . $signature) }}" alt="Logo telkom surabaya" style="width: 60%;">
      </td>
    </tr>
    <tr>
      <td class="left"></td>
      <td class="center"></td>
      <td style="width: 200px;">
        <p style="border-bottom: 1px solid black; font-weight: bold; text-align: left;">{{ $leaders_name }}</p>
        <p style="font-weight: bold; text-align: left; margin-top: -15px;">{{ $nim }}</p>
      </td>
    </tr>
  </table>

</body>

</html>
