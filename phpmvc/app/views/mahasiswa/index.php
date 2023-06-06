<div class="container">

    <div class="row">
        <div class="col-6 mt-4">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mt-4 mb-3">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mt-3 tambah" data-bs-toggle="modal" data-bs-target="#tambahData">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-6 mt-4 mb-3">
            <form action="<?= BASEURL; ?>/mahasiswa/cari" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Mahasiswa" name="keyword" id="keyword" autocomplete="off">
                    <button class="btn btn-primary" type="submit" id="tombol-cari">Cari</button>
                </div>
            </form>
        </div>
    </div>


    <h1>Daftar Mahasiswa</h1>
    <div class="col-6 mt-4">
        <?php foreach ($data['nama'] as $nama) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <?= $nama['nama']; ?>
                    <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $nama['id']; ?>"><span class="badge bg-primary rounded-pill float-end ms-2">Detail</span></a>
                    <a href="<?= BASEURL; ?>/mahasiswa/ubah/<?= $nama['id']; ?>" data-bs-toggle="modal" data-bs-target="#tambahData" data-id="<?= $nama['id']; ?>" class="badge bg-success rounded-pill float-end ms-2 tampilUbah">Ubah</a>
                    <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $nama['id']; ?>"><span class="badge bg-danger rounded-pill float-end ms-2" onclick="return confirm('yakin dihapus?');">Hapus</span></a>
                </li>
            </ul>
        <?php
        endforeach; ?>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="tambahDataLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tambahDataLabel">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="Nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="text" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label">Nim</label>
                        <input type="number" class="form-control" id="nim" aria-describedby="emailHelp" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" aria-label="Default select example" id="jurusan" name="jurusan">
                        <option selected>Open this select menu</option>
                        <option value="ti">ti</option>
                        <option value="si">si</option>
                        <option value="tm">tm</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data Mahasiswa</button>
            </div>
            </form>
        </div>
    </div>
</div>