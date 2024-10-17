<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sales Report</title>
  <style>
    /* Style untuk PDF */
    @page {
      size: landscape;
    }

    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th,
    td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    th {
      background-color: #f2f2f2;
    }

    /* Style untuk kop surat */
    .header {
      text-align: center;
      margin-bottom: 20px;
    }

    .company-logo {
      margin-bottom: 10px;
    }

    .company-name {
      font-size: 24px;
      font-weight: bold;
    }

    .company-address {
      font-style: italic;
      margin-bottom: 5px;
    }

    .company-contact {
      font-style: italic;
    }
  </style>
</head>

<body>
  <!-- Kop surat -->
  <div class="header">
    <div class="company-name">Toko Kopi Cap Raja Muda</div>
    <div class="company-address">Jl. Rajawali Gg. H. Raja Muda, Kaliawi, Tanjung Karang Pusat, Bandar Lampung</div>
    <div class="company-contact">Telepon: 0812-7946-5681 | Email: kopicaprajamuda@gmail.com</div>
  </div>

  <!-- Tabel Sales Report -->
  <h2>Sales Report</h2>
  <table>
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Pelanggan</th>
        <th>Nama Produk</th>
        <th>Tanggal</th>
        <th>Harga</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($sales as $sale)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ optional($sale->user)->name }}</td>
          <td>{{ optional($sale->product)->product_name }}</td>
          <td>{{ \Carbon\Carbon::parse($sale->updated_at)->format('d-M-Y') }}</td>
          <td>Rp {{ number_format(optional($sale->product)->price_discount, 0, ',', '.') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>
