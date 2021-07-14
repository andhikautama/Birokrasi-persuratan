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
            <table class="table table-hover table-striped table-bordered">
            <?php foreach ($detail as $dt) : ?>
                <tr>
                    <th>Surat Dari : </th>
                    <td><?php echo $dt->surat_dari; ?></td>
                </tr>

				<tr>
                    <th>Tanggal Surat  : </th>
                    <td><?php echo $dt->tgl_surat; ?></td>
                </tr>

				<tr>
                    <th>No. Surat  : </th>
                    <td><?php echo $dt->no_surat; ?></td>
                </tr>

				<tr>
                    <th>Diterima Tanggal : </th>
                    <td><?php echo $dt->diterima_tgl; ?></td>
                </tr>

				<tr>
                    <th>No. Agenda : </th>
                    <td><?php echo $dt->no_agenda; ?></td>
                </tr>

				<tr>
                    <th>Perihal : </th>
                    <td><?php echo $dt->perihal; ?></td>
                </tr>

				<tr>
                    <th>Diteruskan Kepada : </th>
                    <td><?php echo $dt->diteruskan_kepada; ?></td>
                </tr>

				<tr>
                    <th>Isi Disposisi : </th>
                    <td><?php echo $dt->isi_disposisi; ?></td>
                </tr>

			
            <?php endforeach; ?>
            </table>
			
			<a class="btn btn-primary" href="<?=base_url('user/disposisi');?>"> Kembali</a>
		</div>
	</div>
</div>

<!-- Button trigger modal -->

<!-- Modal Tambah Surat Keluar -->

</div>
