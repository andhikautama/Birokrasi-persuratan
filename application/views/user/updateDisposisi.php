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

	<?= form_open_multipart('user/updateDisposisi'); ?>
	<form action="" method="POST">

		<input type="hidden" name="id_disposisi" value="<?= $disposisi['id_disposisi']; ?>">

		<div class="form-group row">
			<label for="surat_dari" class="col-sm-2 col-form-label">Surat Dari</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="surat_dari" name="surat_dari" value="<?= $disposisi['surat_dari']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="tgl_surat" class="col-sm-2 col-form-label">Tanggal Surat</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" value="<?= $disposisi['tgl_surat']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="no_surat" class="col-sm-2 col-form-label">No. Surat</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="no_surat" name="no_surat" value="<?= $disposisi['no_surat']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="diterima_tgl" class="col-sm-2 col-form-label">Diterima Tanggal</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="diterima_tgl" name="diterima_tgl" value="<?= $disposisi['diterima_tgl']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="no_agenda" class="col-sm-2 col-form-label">No. Agenda</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="no_agenda" name="no_agenda" value="<?= $disposisi['no_agenda']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="perihal" name="perihal" value="<?= $disposisi['perihal']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="diteruskan_kepada" class="col-sm-2 col-form-label">Diteruskan Kepada</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="diteruskan_kepada" name="diteruskan_kepada" value="<?= $disposisi['diteruskan_kepada']; ?>">
			</div>
		</div>

		<div class="form-group row">
			<label for="isi_disposisi" class="col-sm-2 col-form-label">Isi Disposisi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="isi_disposisi" name="isi_disposisi" value="<?= $disposisi['isi_disposisi']; ?>">
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
		<button type="submit" class="btn btn-primary mb-3">Update</button>

		<a href="<?= base_url('user/disposisi'); ?>" class="btn btn-danger mb-3">
			Batal
		</a>
	</form>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->