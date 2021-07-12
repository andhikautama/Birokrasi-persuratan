<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger alert-dismissible fade show" roles="alert">
                    <?= validation_errors(); ?></div>
            <?php endif; ?>

            <?= $this->session->flashdata('message'); ?>
                <!-- alert berhasil tambah disposisi -->
            <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Holy guacamole!</strong> Tambah surat disposisi telah berhasil
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div> -->

            <div class="table-responsive">
                <hr style="margin:0px">
                <br>
                <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newSkModal">
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
                            <th class="text-center">Surat dari</th>
                            <th class="text-center">Tgl Surat</th>
                            <th class="text-center">Nomor Surat</th>
                            <th class="text-center">Diterima Tanggal</th>
                            <th class="text-center">Nomor Agenda</th>
                            <th class="text-center">Perihal</th>
                            <th class="text-center">Diteruskan Kepada</th>
                            <th class="text-center">Isi Disposisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($disposisi as $dd) : ?>
                            <tr>
                                <td scope="row" class="text-center"><?= $i; ?></td>
                                <td class="text-center"><?= $dd['surat_dari']; ?></td>
                                <td class="text-center"><?= $dd['tgl_surat']; ?></td>
                                <td class="text-center"><?= $dd['no_surat']; ?></td>
                                <td class="text-center"><?= $dd['diterima_tgl']; ?></td>
                                <td class="text-center"><?= $dd['no_agenda']; ?></td>
                                <td class="text-center"><?= $dd['perihal']; ?></td>
                                <td class="text-center"><?= $dd['diteruskan_kepada']; ?></td>
                                <td class="text-center"><?= $dd['isi_disposisi']; ?></td>
                                <!-- <td class="text-center">
                                    <a class="btn btn-sm btn-success mb-3" href="">Update</a>
                                    <a class="btn btn-sm btn-danger mb-3" href="">Delete</a>
                                    <a class="btn btn-sm btn-warning mb-3" href="">Print</a>
                                </td> -->
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

        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="newSkModal" tabindex="-1" aria-labelledby="newSkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSkModalLabel">Tambah Surat Keluar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('user/disposisi'); ?>" method="post">
                <div class="modal-body">
                    <div class="form-group text-gray-800">
                        <b><label for="surat_dari">Surat dari</label></b>
                        <input type="text" class="form-control" id="surat_dari" name="surat_dari" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="tgl_surat">Tanggal Surat</label></b>
                        <input type="date" class="form-control" id="tgl_surat" name="tgl_surat" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="no_surat">Nomor Surat</label></b>
                        <input type="text" class="form-control" id="no_surat" name="no_surat" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="diterima_tgl">Diterima Tanggal</label></b>
                        <input type="date" class="form-control" id="diterima_tgl" name="diterima_tgl" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="no_agenda">Nomor Agenda</label></b>
                        <input type="text" class="form-control" id="no_agenda" name="no_agenda" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="perihal">Perihal</label></b>
                        <input type="text" class="form-control" id="perihal" name="perihal" placeholder="">
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="isi_disposisi">Diteruskan Kepada</label></b>
                        <input type="text" class="form-control" id="diteruskan_kepada" name="diteruskan_kepada" placeholder="">
                        <!-- <select name="name" id="isi_disposisi" class="form-control">
                            <option value=""> Untuk DIketahui</option>
                            <option value=""> UMP</option>
                            <option value=""> Hadir</option> 

                        </select> -->
                    </div>
                    <div class="form-group text-gray-800">
                        <b><label for="isi_disposisi">Isi Disposisi</label></b>
                        <input type="text" class="form-control" id="isi_disposisi" name="isi_disposisi" placeholder="">
                        <!-- <select name="name" id="isi_disposisi" class="form-control">
                            <option value=""> Untuk DIketahui</option>
                            <option value=""> UMP</option>
                            <option value=""> Hadir</option> 

                        </select> -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah Surat Disposisi</button>
                </div>
            </form>
        </div>
    </div>
</div>