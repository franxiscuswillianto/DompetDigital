<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Anak Pak Budi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Dashboard Anak Pak Budi</h5>
                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Jumlah</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Saldo : </th>
                                    <td>{{ $balance[0]->saldo }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Pemasukan 1 tahun : </th>
                                    <td> <?php echo ($pemasukan[0]->pemasukan == null) ? 0 : $pemasukan[0]->pemasukan; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Pengeluaran 1 tahun : </th>
                                    <td><?php echo ($pengeluaran[0]->pengeluaran == null) ? 0 : $pengeluaran[0]->pengeluaran; ?></td>
                                </tr>
                                <tr>
                                  <th scope="row">Pemasukan belum terverifikasi : </th>
                                  <td> <?php echo ($pemasukan_v[0]->pemasukan == null) ? 0 : $pemasukan_v[0]->pemasukan; ?></td>
                              </tr>
                              <tr>
                                  <th scope="row">Pengeluaran belum terverifikasi : </th>
                                  <td><?php echo ($pengeluaran_v[0]->pengeluaran == null) ? 0 : $pengeluaran_v[0]->pengeluaran; ?></td>
                              </tr>
                            </tbody>
                        </table>
                        <a class="btn btn-primary" href="{{  route('pemasukan.daftar')  }}" role="button">Buka daftar pemasukan</a>
                        <a class="btn btn-primary" href="{{  route('pengeluaran.daftar')  }}" role="button">Buka daftar pengeluaran</a>
                        <a class="btn btn-primary" href="{{  route('dashboard')  }}" role="button">Dashboard Pak Budi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        document.getElementById('transaction_date').valueAsDate = new Date();
    });
</script>
