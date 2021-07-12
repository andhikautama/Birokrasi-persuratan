<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-3 text-gray-800"><i class="fas fa-users"></i> <?= $title; ?></h1>
	<!-- <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div> -->

	<hr class="border border-dark border-5 mt-0">

	<div class="table-responsive">
		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newModal">
			<i class="fas fa-envelope-open-text"></i>
			Tambah Data User
		</a>

		<table id="tes" class="table table-bordered table-striped">
			<thead class="table-dark">
				<tr>
					<th class="text-center">No</th>
					<th class="text-center">id</th>
					<th class="text-center">nama lengkap</th>
					<th class="text-center">username</th>
					<th class="text-center">image</th>
					<th class="text-center">password</th>
					<th class="text-center">role id</th>
					<th class="text-center">is active</th>
					<th class="text-center">created</th>

					<th colspan="4" class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $i = 1; ?>
				<?php foreach ($user as $u) : ?>
				<tr>
					<td scope="row" class="text-center"><?= $i; ?></td>
					<td class="text-center"><?= $u['id']; ?></td>
					<td class="text-center"><?= $u['name']; ?></td>
					<td class="text-center"><?= $u['username']; ?></td>
					<td class="text-center"><?= $u['image']; ?></td>
					<td class="text-center"><?= $u['password']; ?></td>
					<td class="text-center"><?= $u['role_id']; ?></td>
					<td class="text-center"><?= $u['is_active']; ?></td>
					<td class="text-center"><?= $u['date_created']; ?></td>

					<td class="text-center">
						<a class="btn btn-sm btn-success mb-3" href="">Edit</a> <a class="btn btn-sm btn-danger mb-3"
							href="">Detail</a>
					</td>
				</tr>
				<?php $i++; ?>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newModalLabel">Tambah Data</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('user/users'); ?>" method="post">
				<div class="modal-body">
					<div class="form-group text-gray-800">
						<b><label for="nama_lengkap">Nama Lengkap</label></b>
						<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="username">Username</label></b>
						<input type="text" class="form-control" id="username" name="username" placeholder="">
					</div>
					<div class="form-group text-gray-800">
						<b><label for="level">level</label></b>
						<input type="text" class="form-control" id="level" name="level" placeholder="">
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
