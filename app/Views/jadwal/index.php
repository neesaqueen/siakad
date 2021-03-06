<div class="row">
    <div class="col-md-12">
        <div class="card card-info card-outline">
            <div class="card-header">
                <div class="card-tools float-right">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#add"><i class="fa fa-plus"></i> <b>New Data</b></button>
                </div>
            </div>
            <div class="card-body">

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <table class="table table-bordered table-hover" id="table1">
                    <thead>
                        <tr>
                            <th width="25px">No</th>
                            <th>Kelas</th>
                            <th>Hari</th>
                            <th>Jam</th>
                            <th>Pelajaran</th>
                            <th>Guru</th>
                            <th width="17%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $key => $value) { ?>
                            <tr>
                                <td><?= $no++;  ?></td>
                                <td><?= $value['lvl_kelas'];  ?> - <?= $value['nama_kelas'];  ?></td>
                                <td><?= $value['hari']; ?></td>
                                <td><?= date('H:i', strtotime($value['mulai']));  ?> - <?= date('H:i', strtotime($value['selesai']));  ?></td>
                                <td><?= $value['nama_pelajaran']; ?></td>
                                <td><?= $value['nama_guru']; ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#edit<?= $value['id_jadwal']; ?>"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-danger btn-xs btnhapus" data-toggle="modal" data-target="#delete<?= $value['id_jadwal']; ?>"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Buat Jadwal</h4>
            </div>
            <div class="modal-body">
                <?php
                echo form_open('jadwal/add')
                ?>
                <div class="form-group row">
                    <div class="form-group col-lg-6">
                        <label>Kelas</label>
                        <select name="kelas_id" id="kelas_id" class="form-control" required>
                            <option>- pilih kelas -</option>
                            <?php foreach ($kelas as $key => $value) { ?>
                                <option value="<?= $value['id_kelas'] ?>"><?= $value['nama_kelas'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Hari</label>
                        <select name="hari" id="hari" class="form-control" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label>Pelajaran</label>
                        <select name="pelajaran_id" id="pelajaran_id" class="form-control" required>
                            <option>- pilih mapel -</option>
                            <?php foreach ($pelajaran as $key => $mapel) { ?>
                                <option value="<?= $mapel['id_pelajaran'] ?>"><?= $mapel['nama_pelajaran'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Start</label>
                        <input type="time" name="mulai" class="form-control" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label>End</label>
                        <input type="time" name="selesai" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label>Guru</label>
                        <select name="guru_id" id="guru_id" class="form-control" required>
                            <option>- pilih guru -</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status</label>
                        <select name="active" id="active" class="form-control" required>
                            <option>- status -</option>
                            <?php foreach ($tbl_active as $key => $value) { ?>
                                <option value="<?= $value['id_active'] ?>"><?= $value['nama_active'] ?></option>
                            <?php } ?>
                        </select>
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
</div>
<!-- /.End modal Add-->

<!-- /.modal Edit-->
<?php foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_jadwal']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Jadwal</h4>
                </div>
                <div class="modal-body">

                    <?php
                    echo form_open('jadwal/edit/' . $value['id_jadwal'])
                    ?>

                    <div class="form-group row">
                        <div class="form-group col-lg-8">
                            <label>Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                <?php foreach ($kelas as $key => $row) { ?>
                                    <option value="<?= $row['id_kelas'] ?>" <?php if ($value['kelas_id'] == $row['id_kelas']) {
                                                                                echo "selected";
                                                                            } ?>><?= $row['nama_kelas'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label>Hari</label>
                            <select name="hari" id="hari" class="form-control" required>
                                <option><?= $value['hari'] ?></option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-6">
                            <label>Pelajaran</label>
                            <select name="pelajaran_id" class="form-control" required>
                                <?php foreach ($pelajaran as $key => $mapel) { ?>
                                    <option value="<?= $mapel['id_pelajaran'] ?>" <?php if ($value['pelajaran_id'] == $mapel['id_pelajaran']) {
                                                                                        echo "selected";
                                                                                    } ?>><?= $mapel['nama_pelajaran'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Start</label>
                            <input type="time" name="mulai" value="<?= $value['mulai']; ?>" class="form-control" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label>End</label>
                            <input type="time" name="selesai" value="<?= $value['selesai']; ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-md-8">
                            <label>Guru</label>
                            <select name="guru_id" id="guru_id" class="form-control" required>
                                <?php foreach ($guru as $key => $gur) { ?>
                                    <option value="<?= $gur['id_guru'] ?>" <?php if ($value['guru_id'] == $gur['id_guru']) {
                                                                                echo "selected";
                                                                            } ?>><?= $gur['nama_guru'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Status</label>
                            <select name="active" id="active" class="form-control" required>
                                <?php foreach ($tbl_active as $key => $act) { ?>
                                    <option value="<?= $act['id_active'] ?>" <?php if ($value['active'] == $act['id_active']) {
                                                                                    echo "selected";
                                                                                } ?>><?= $act['nama_active'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
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
<?php foreach ($jadwal as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_jadwal']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Jadwal</h4>
                </div>
                <div class="modal-body">
                    <h4>Yakin ingin menghapus data ini...?</h4>
                </div>
                <div class="modal-footer">
                    <a href="<?= base_url('jadwal/delete/' . $value['id_jadwal']) ?>" type="submit" class="btn btn-danger">Confirm</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
<!-- /.End modal Delete-->