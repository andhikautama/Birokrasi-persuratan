<!-- Begin Page Content -->
<div class="container-fluid">

<form method="post" action="<?= base_url('User/proses_edit_data')?>">

    <!-- Page Heading -->
    <h1 class="h3 mb-3 text-gray-800"><i class="fas fa-inbox"></i> <?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <hr class="border border-dark border-5 mt-1">

        <input type="hidden" name="id" value="<?= $surat_masuk['id'];?>">
        
        <div class="form-group row">
            <label for="no_surat" class="col-sm-2 col-form-label">No. Surat</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="no_surat" required="" value="<?= $surat_masuk['no_surat']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="tgl_suratMasuk" class="col-sm-2 col-form-label">Tanggal Surat Masuk</label>
            <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_suratMasuk" required="" value="<?= $surat_masuk['tgl_suratMasuk']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="pengirim" class="col-sm-2 col-form-label">Pengirim</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="pengirim" required="" value="<?= $surat_masuk['pengirim']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="penerima" class="col-sm-2 col-form-label">Penerima</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="penerima" required="" value="<?= $surat_masuk['penerima']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="perihal" required="" value="<?= $surat_masuk['perihal']; ?>">
            </div>
        </div>

        <div class="form-group row">
            <label for="disposisi" class="col-sm-2 col-form-label">Disposisi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="disposisi" required="" value="<?= $surat_masuk['disposisi']; ?>">
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
    <a href="<?= base_url('user/suratMasuk') ?>" class="btn btn-success mb-3">
        Update
    </a>

    <a href="<?= base_url('user/suratMasuk'); ?>" class="btn btn-danger mb-3">
        Batal
    </a>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->