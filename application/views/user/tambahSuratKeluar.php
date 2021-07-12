<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><i class="fas fa-inbox"></i> <?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <hr class="border border-dark border-5 mt-1">

    <form action="<?= base_url('user/tambahSuratKeluar'); ?>" method="post">

        <div class="form-group row">
            <label for="no_surat" class="col-sm-2 col-form-label">No. Surat Keluar</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Nomor Surat Keluar">
                <?= form_error('no_surat', '<small class="text-danger pl-3">', ' </small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="tgl_suratKeluar" class="col-sm-2 col-form-label">Tanggal Surat Keluar</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="tgl_suratKeluar" name="tgl_suratKeluar" placeholder="Tanggal Surat Keluar">
                <?= form_error('tgl_suratKeluar', '<small class="text-danger pl-3">', ' </small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pengirim" name="pengirim" placeholder="Nama Pengirim">
                <?= form_error('pengirim', '<small class="text-danger pl-3">', ' </small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="penerima" name="penerima" placeholder="Nama Penerima">
                <?= form_error('penerima', '<small class="text-danger pl-3">', ' </small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="perihal" name="perihal" placeholder="Perihal Surat">
                <?= form_error('perihal', '<small class="text-danger pl-3">', ' </small>'); ?>
            </div>
        </div>

        <div class="form-group row">
            <label for="disposisi" class="col-sm-2 col-form-label">Disposisi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="disposisi" name="disposisi" placeholder="Disposisi">
                <?= form_error('disposisi', '<small class="text-danger pl-3">', ' </small>'); ?>
            </div>
        </div>

        <!-- <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Lampiran</label>
            <div class="col-sm-10">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Silahkan Masukkan File</label>
                </div>
            </div>
        </div> -->
        <hr>
        <button type="submit" class="btn btn-success mb-3">
            Tambah Data
        </button>

        <a type="button" href="<?= base_url('user/suratKeluar'); ?>" class="btn btn-danger mb-3">
            Batal
        </a>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->