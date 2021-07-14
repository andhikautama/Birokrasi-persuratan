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

	<form action="<?= base_url('user/tambahDisposisi'); ?>" method="post">

		<div class="form-group row">
			<label for="surat_dari" class="col-sm-2 col-form-label">Surat Dari</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="surat_dari" name="surat_dari" placeholder="Masukkan Asal Surat">
				<?= form_error('surat_dari', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

        <div class="form-group row">
			<label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="Masukkan Tanggal Surat Keluar">
				<?= form_error('tgl_surat', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="no_surat" class="col-sm-2 col-form-label">No. Surat</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="Masukkan Nomor Surat">
				<?= form_error('no_surat', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		

		<div class="form-group row">
			<label for="diterima_tgl" class="col-sm-2 col-form-label">Diterima Tanggal</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="diterima_tgl" name="diterima_tgl" placeholder="">
				<?= form_error('diterima_tgl', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="no_agenda" class="col-sm-2 col-form-label">No. Agenda</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="no_agenda" name="no_agenda" placeholder="Masukkan Nomor Agenda">
				<?= form_error('no_agenda', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="perihal" name="perihal" placeholder="Masukkan Perihal Surat">
				<?= form_error('perihal', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="diteruskan_kepada" class="col-sm-2 col-form-label">Diteruskan Kepada</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="diteruskan_kepada" name="diteruskan_kepada" placeholder="Masukkan Tujuan">
				<?= form_error('diteruskan_kepada', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

        <div class="form-group row">
			<label for="isi_disposisi" class="col-sm-2 col-form-label">Isi Disposisi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="isi_disposisi" name="isi_disposisi" placeholder="Masukkan Isi Disposisi">
				<?= form_error('isi_disposisi', '<small class="text-danger pl-3">', ' </small>'); ?>
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

		<a type="button" href="<?= base_url('user/disposisi'); ?>" class="btn btn-danger mb-3">
			Batal
		</a>
	</form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
