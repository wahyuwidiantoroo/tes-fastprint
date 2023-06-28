<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk | Tes Fast Print</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container px-5 py-5 my-5 border rounded shadow">
        <div class="row mb-3">
            <h2>Tambah Produk</h2>
        </div>
        <div class="row">
            <div class="col col-lg-9">
                <form action="/tambah" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="id_produk" class="form-label">Id Produk</label>
                        <input type="number" name="id_produk" class="form-control <?= (isset($validation['id_produk'])) ? 'is-invalid' : '' ?>" id="id_produk" value="<?= old('id_produk') ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?php
                            if (isset($validation['id_produk'])) {
                                echo $validation['id_produk'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama_produk" class="form-label">Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control <?= (isset($validation['nama_produk'])) ? 'is-invalid' : '' ?>" id="nama_produk" value="<?= old('nama_produk') ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?php
                            if (isset($validation['nama_produk'])) {
                                echo $validation['nama_produk'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Produk</label>
                        <input type="number" name="harga" class="form-control <?= (isset($validation['harga'])) ? 'is-invalid' : '' ?>" id="harga" value="<?= old('harga') ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?php
                            if (isset($validation['harga'])) {
                                echo $validation['harga'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori Produk</label>
                        <input type="text" name="kategori" class="form-control <?= (isset($validation['kategori'])) ? 'is-invalid' : '' ?>" id="kategori" value="<?= old('kategori') ?>">
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?php
                            if (isset($validation['kategori'])) {
                                echo $validation['kategori'];
                            }
                            ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Produk</label>
                        <select class="form-select <?= (isset($validation['status'])) ? 'is-invalid' : '' ?>" name="status" id="status">
                            <option value="" selected>-- Pilih Status --</option>
                            <option value="bisa dijual">Bisa dijual</option>
                            <option value="tidak bisa dijual">Tidak bisa dijual</option>
                        </select>
                        <div id="validationServerUsernameFeedback" class="invalid-feedback">
                            <?php
                            if (isset($validation['status'])) {
                                echo $validation['status'];
                            }
                            ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Produk</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>