<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" roles="alert">
                    <?= validation_errors(); ?></div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>

            <div class="table-responsive">
                <hr style="margin:0px">
                <br>
                <!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSkModal"> -->
                <a href="<?= base_url('user/tambahSuratKeluar') ?>" class="btn btn-primary mb-3">
                    <i class="fas fa-envelope-open-text"></i>
                    Tambah Surat Keluar
                </a>

                <!-- Kolom Search -->
                <div class="input-group rounded mb-3 mr-lg-5">
                    <input type="search" class="rounded mr-2 border-0" placeholder="Search" aria-label="Search" aria-describedby="search-addon">
                    <!-- <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
                    aria-describedby="search-addon" /> -->
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
                <table id="tes" class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">No. Surat</th>
                            <th class="text-center">Tgl Surat Keluar</th>
                            <th class="text-center">Pengirim</th>
                            <th class="text-center">Penerima</th>
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Disposisi</th>
                            <th colspan="4" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($surat_keluar as $sk) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $i; ?></td>
                                <td class="text-center"><?= $sk['no_surat']; ?></td>
                                <td class="text-center"><?= date('d F Y', strtotime($sk['tgl_suratKeluar'])); ?></td>
                                <td class="text-center"><?= $sk['pengirim']; ?></td>
                                <td class="text-center"><?= $sk['penerima']; ?></td>
                                <td class="text-center"><?= $sk['perihal']; ?></td>
                                <td class="text-center"><?= $sk['disposisi']; ?></td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-success mb-3" href="<?= base_url() ?>user/updateSuratKeluar/<?= $sk['id_suratKeluar']; ?>">Update</a>
                                    <a class="btn btn-sm btn-danger mb-3" href="<?= base_url('user/deleteSK/') . $sk['id_suratKeluar']; ?>" onclick="return confirm('Yakin Data ini akan dihapus?');">Delete</a>
                                    <a class="btn btn-sm btn-warning mb-3" href="">Print</a>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- <script>
        $(document).ready(function() {
            $('#tes').DataTable();
        });
    </script> -->

    </div>
</div>

<!-- Button trigger modal -->

<!-- Modal Tambah Surat Keluar -->
<div class="modal fade" id="newSkModal" tabindex="-1" aria-labelledby="newSkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSkModalLabel">Tambah Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/suratKeluar'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group text-gray-800">
                        <b><label for="no_surat">No. Surat Keluar</label></b>
                        <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="tgl_suratKeluar">Tanggal Surat Keluar</label></b>
                        <input type="date" class="form-control" id="tgl_suratKeluar" name="tgl_suratKeluar" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="pengirim">Pengirim</label></b>
                        <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="penerima">Penerima</label></b>
                        <input type="text" class="form-control" id="penerima" name="penerima" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="perihal">Perihal</label></b>
                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="disposisi">Disposisi</label></b>
                        <input type="text" class="form-control" id="disposisi" name="disposisi" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah Surat Keluar</button>
                </div>
            </form>
        </div>
    </div>
</div>