<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ubah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Ubah Transaksi</h5>
                    </div>
                    <form action="{{ route('simpan') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="id">Id transaksi: <span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="id" type="text" name="id"
                                        value="{{ $transaksi[0]->id_transaksi }}" required="required" readonly>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="transaction_date">Tanggal Transaksi:<span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="transaction_date" type="date"
                                        name="transaction_date" value="{{ $transaksi[0]->tanggal }}" required="required">
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="formcontrol-select1">Kategori<span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <select class="form-control btn-square" id="formcontrol-select1" name="id_kategori"
                                        value="" required="required">
                                        @foreach ($kategori as $k)
                                            @if ($k->id == $kategori[0]->id)
                                                <option value="{{ $k->id }}" selected>{{ $k->id }} -
                                                    {{ $k->nama }}
                                                </option>
                                            @else
                                                <option value="{{ $k->id }}">{{ $k->id }} -
                                                    {{ $k->nama }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="nominal">Nominal<span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="nominal" type="number" name="nominal"
                                        value="{{ $transaksi[0]->nominal }}" required="required">
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" for="keterangan">Keterangan<span
                                        style="color: red">*</span></label>
                                <div class="col-sm-9">
                                    <input class="form-control" id="keterangan" type="text" name="keterangan"
                                        value="{{ $transaksi[0]->keterangan }}" required="required">
                                    <div class="invalid-feedback">Required</div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" id='submitbutton' style='width:100%;'
                                type="submit">Simpan</button>
                        </div>
                    </form>
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
