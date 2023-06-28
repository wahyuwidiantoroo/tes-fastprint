<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tes Fast Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <?php if (session()->getFlashdata('sukses')) : ?>
        <script>
            alert('<?= session()->getFlashdata('sukses') ?>');
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('gagal')) : ?>
        <script>
            alert('<?= session()->getFlashdata('gagal') ?>');
        </script>
    <?php endif; ?>

    <div class="container px-5 py-5 my-5">
        <div class="row text-center">
            <div class="col">
                <div class="h1">Data Produk</div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <a class="btn btn-primary shadow" href="/tambah-produk">Tambah Produk</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-bordered shadow">
                    <thead class="text-center">
                        <tr>
                            <th class="col">Id</th>
                            <th class="col-4">Nama Produk</th>
                            <th class="col">Harga</th>
                            <th class="col">Kategori</th>
                            <th class="col">Status</th>
                            <th class="col-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($produk as $p) : ?>
                            <tr>
                                <td class="text-center"><?= $p['id_produk'] ?></td>
                                <td><?= $p['nama_produk'] ?></td>
                                <td class="text-center"><?= $p['harga'] ?></td>
                                <td class="text-center"><?= $p['kategori'] ?></td>
                                <td class="text-center"><?= $p['status'] ?></td>
                                <td class="text-center">
                                    <div class="row">
                                        <div class="col">
                                            <a class="btn btn-secondary" href="/ubah-produk/<?= $p['id_produk'] ?>">Ubah</a>
                                        </div>
                                        <div class="col">
                                            <form class="hapus-form" action="/hapus" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="id_produk" value="<?= $p['id_produk'] ?>">
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>