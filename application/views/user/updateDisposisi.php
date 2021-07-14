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

	<?php foreach($disposisi as $di) :?>
	<form action="<?= base_url('user/updateAksiDisposisi'); ?>">
		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Id Disposisi</label>

			<div class="col-sm-10">
				<input type="text" class="form-control" id="id_disposisi" name="id_disposisi"
					value="<?php echo $di->id_disposisi;?>" placeholder="Tanggal Surat Keluar" >
				<?= form_error('id_disposisi', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>

		</div>

		<div class="form-group row">

			<label class="col-sm-2 col-form-label">Surat Dari</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="surat_dari" name="surat_dari" 
					value="<?php echo $di->surat_dari ?>"	placeholder="Asal Surat">
				<?= form_error('surat_dari', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>

		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tanggal Surat</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="tgl_surat" name="tgl_surat"
					value="<?php echo $di->diterima_tgl ?>"	placeholder="Tanggal Surat Keluar">
				<?= form_error('tgl_surat', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No. Surat</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="no_surat" name="no_surat" 
					value="<?php echo $di->no_surat ?>"	placeholder="Nomor Surat Keluar">
				<?= form_error('no_surat', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>



		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Diterima Tanggal</label>
			<div class="col-sm-10">
				<input type="date" class="form-control" id="diterima_tgl" name="diterima_tgl" 
					value="<?php echo $di->diterima_tgl ?>"	placeholder="">
				<?= form_error('diterima_tgl', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="no_agenda" class="col-sm-2 col-form-label">No. Agenda</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="no_agenda" name="no_agenda" 
					value="<?php echo $di->no_agenda ?>"	placeholder="">
				<?= form_error('no_agenda', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="perihal" class="col-sm-2 col-form-label">Perihal</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="perihal" name="perihal" 
					value="<?php echo $di->perihal ?>"	placeholder="Perihal Surat">
				<?= form_error('perihal', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="diteruskan_kepada" class="col-sm-2 col-form-label">Diteruskan Kepada</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="diteruskan_kepada" name="diteruskan_kepada" 
					value="<?php echo $di->diteruskan_kepada ?>"	placeholder="">
				<?= form_error('diteruskan_kepada', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="isi_disposisi" class="col-sm-2 col-form-label">Isi Disposisi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="isi_disposisi" name="isi_disposisi" 
					value="<?php echo $di->isi_disposisi ?>"	placeholder="">
				<?= form_error('isi_disposisi', '<small class="text-danger pl-3">', ' </small>'); ?>
			</div>
		</div>
	</form>
	<?php endforeach;?>



	<hr>
	<a href="<?= base_url('user/disposisi') ?>" class="btn btn-success mb-3">
		Update
	</a>

	<a href="<?= base_url('user/disposisi'); ?>" class="btn btn-danger mb-3">
		Batal
	</a>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
