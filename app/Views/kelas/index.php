<div class="row">
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>New Data</b></button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="table1">
                    <thead>
                        <tr>
                            <th width="30px">No</th>
                            <th>Jurusan</th>
                            <th>Kelas</th>
                            <th>Status</th>
                            <th width="22%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kelas as $key => $value) { ?>
                            <tr>
                                <td><?= $no++;  ?></td>
                                <td><?= $value['nama_kelas'];  ?></td>
                                <td><?= $value['lvl_kelas'];  ?></td>
                                <td><?= $value['nama_active'];  ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_kelas']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                    <button class="btn btn-danger btn-sm btnhapus" data-toggle="modal" data-target="#delete<?= $value['id_kelas']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal Add-->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kelas</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('kelas/add')
                ?>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input name="nama_kelas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kelas</label>
                    <input name="lvl_kelas" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input name="active" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-info">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.End modal Add-->

<!-- /.modal Edit-->
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kelas']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Kelas</h4>
                </div>
                <div class="modal-body">
                    <?php
                    echo form_open('kelas/edit/' . $value['id_kelas'])
                    ?>

                    <div class="form-group">
                        <label>Jurusan</label>
                        <input name="nama_kelas" value="<?= $value['nama_kelas']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Kelas</label>
                        <input name="lvl_kelas" value="<?= $value['lvl_kelas']; ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input name="active" value="<?= $value['active']; ?>" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Edit-->

<!-- /.modal Delete-->
<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_kelas']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Kelas</h4>
                </div>
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data <b><?= $value['nama_kelas']; ?></b>...?</h4>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('kelas/delete/' . $value['id_kelas']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Delete-->