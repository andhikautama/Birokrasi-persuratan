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

			<!-- Button tambah Surat Dispo -->
			<div class="table-responsive">
				<hr style="margin:0px">
				<br>
				<!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSkModal"> -->
				<a href="<?= base_url('user/tambahDisposisi') ?>" class="btn btn-primary mb-3">
					<i class="fas fa-envelope-open-text"></i>
					Tambah Surat Disposisi
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
							<th class="text-center">Id Disposisi</th>
							<th class="text-center">Surat Dari</th>
							<th class="text-center">Tgl Surat</th>
							<th class="text-center">No. Surat</th>
							<th class="text-center">Diterima Tanggal</th>
							<th class="text-center">No. Agenda</th>
							<th class="text-center">Perihal</th>
							<th class="text-center">Diteruskan Kepada</th>
							<th class="text-center">Isi Disposisi</th>
							<th colspan="4" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						<?php foreach ($disposisi as $d) : ?>
							<tr>
								<td scope="row" class="text-center"><?= $i; ?></td>
								<td class="text-center text-gray-800"><?= $d['id_disposisi']; ?></td>
								<td class="text-center text-gray-800"><?= $d['surat_dari']; ?></td>
								<td class="text-center text-gray-800"><?= date('d F Y', strtotime($d['tgl_surat'])); ?></td>

								<td class="text-center text-gray-800"><?= $d['no_surat']; ?></td>
								<td class="text-center text-gray-800"><?= date('d F Y', strtotime($d['diterima_tgl'])); ?>
								</td>

								<td class="text-center text-gray-800"><?= $d['no_agenda']; ?></td>
								<td class="text-center text-gray-800"><?= $d['perihal']; ?></td>
								<td class="text-center text-gray-800"><?= $d['diteruskan_kepada']; ?></td>
								<td class="text-center text-gray-800"><?= $d['isi_disposisi']; ?></td>
								<td class="text-center">
									<a class="btn btn-sm btn-success mb-3" href="<?= base_url() ?>user/updateDisposisi/<?= $d['id_disposisi']; ?>">
										Edit
									</a>
									<a class="btn btn-sm btn-danger mb-3" href="<?= base_url('user/deleteDisposisi/') . $d['id_disposisi']; ?>" onclick="return confirm('Yakin Data ini akan dihapus?');">Delete</a>
									<a class="btn btn-sm btn-warning mb-3" href="<?= base_url('user/printDisposisi/') . $d['id_disposisi']; ?>">Print</a>
									<a class="btn btn-sm btn-info m-0" href="<?= base_url('user/detail/') . $d['id_disposisi']; ?>">
										Detail
									</a>
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
<div class="modal fade" id="newDisposisiModal" tabindex="-1" aria-labelledby="newDisposisiModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newDisposisiModalLabel">Tambah Disposisi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('user/disposisi'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group text-gray-800">
						<b><label for="surat_dari">Surat Dari</label></b>
						<input type="text" class="form-control" id="surat_dari" name="surat_dari" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="tgl_surat">Tanggal Surat</label></b>
						<input type="date" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="no_surat">No. Surat</label></b>
						<input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="diterima_tgl">Diterima Tanggal</label></b>
						<input type="date" class="form-control" id="diterima_tgl" name="diterima_tgl" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="no_agenda">No. Agenda</label></b>
						<input type="text" class="form-control" id="no_agenda" name="no_agenda" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="perihal">Perihal</label></b>
						<input type="text" class="form-control" id="perihal" name="perihal" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="diteruskan_kepada">Diteruskan Kepada</label></b>
						<input type="text" class="form-control" id="diteruskan_kepada" name="diteruskan_kepada" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="isi_disposisi">Isi Disposisi</label></b>
						<input type="text" class="form-control" id="isi_disposisi" name="isi_disposisi" placeholder="">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">Tambah Disposisi</button>
				</div>
			</form>
		</div>
	</div>
</div>
</div>