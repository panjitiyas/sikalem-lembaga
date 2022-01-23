<!--------CONTENT START----------->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Proses PUMK</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="">Pengajuan Keuangan</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="<?= site_url('proses_pumk') ?>">Proses PUMK</a>
                    </li>
                </ol>
            </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="col-md-8 offset-md-2">
        <div class="card card-outline card-orange">
            <div class="card-header">
                <h3 class="card-title">Proses PUMK</h3>
                <small><span class="float-right font-weight-bold text-uppercase"><?= $row->k_subs ?></span></small><br>
                <h6><span class="text-secondary text-xs"> <b> ID PROSES </b> : <?= $row->id_proses ?></span></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= form_open_multipart('proses_pumk/proses') ?>
                        <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h6><b>Proses Tidak Dapat Dilanjutkan!</b></h6>
                                <small>
                                    <?php echo validation_errors() ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </small>
                            </div>
                        <?php } ?>
                        <table class="table table-sm ">
                            <tr>
                                <td width="20%"><span class="font-weight-bold">
                                        <p class="word-break ">No. Undangan</p>
                                    </span></td>
                                <td width="2%">:</td>
                                <td colspan="4" width="78%">
                                    <p class="word-break"><?= $row->no_undangan ?></p>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <span class="font-weight-bold">
                                        <p class="word-break ">Kegiatan</p>
                                    </span>
                                </td>
                                <td width="2%">:</td>
                                <td colspan="4" width="78%">
                                    <span class="text-left"><?= $row->nm_keg ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <span class="font-weight-bold">Tgl. Mulai</span>
                                </td>
                                <td width="2%">:</td>
                                <td colspan="4" width="78%">
                                    <span class="text-dark"><?= tanggal_indonesia($row->tgl_mulai) ?></span>
                            </tr>
                            <tr>
                                </td>
                                <td width="20%">
                                    <span class="font-weight-bold">Tgl. Selesai</span>
                                </td>
                                <td width="2%">:</td>
                                <td colspan="4" width="78%">
                                    <span class="text-dark"><?= tanggal_indonesia($row->tgl_selesai) ?></span>
                                </td>
                            </tr>
                            <tr>
                                </td>
                                <td width="20%">
                                    <span class="font-weight-bold">Kode Anggaran</span>
                                </td>
                                <td width="2%">:</td>
                                <td colspan="4" width="78%">
                                    <span class="text-dark"><?= $row->kd_anggaran ?></span>
                                    <input type="hidden" name="kdpagu" value="<?= $row->kd_anggaran ?>">
                                </td>
                            </tr>
                        </table>
                        <?php if ($this->fungsi->user_login()->nama != "Putri Nailatul Himma") : ?>
                            <table>
                                <tr class="rpd">
                                    <td rowspan="4" width="20%">
                                        <span class="font-weight-bold">Perjalanan Dinas</span>
                                    </td>
                                    </td>
                                    <td rowspan="4" width="2%">:</td>
                                    <td rowspan="4" width="6.5%"><?= $row->sis_byr ?></td>
                                <tr class="rpd" id="r1">
                                    <td width="45%"><input value="<?= $this->input->post('nilai_pd1') ?? $row->nilai_pd1 ?>" type="text" name="nilai_pd1" id="n1" class="form-control form-control-sm uang <?= form_error('nilai_pd1') ? "is-invalid text-danger" : "" ?>" placeholder="masukan nilai pengajuannya.." <?= empty($row->tgl_ok) ? '' : 'disabled' ?> <?= empty($row->sis_byr) ? '' : 'required' ?>></td>
                                    <td width="22%"><select name="akun_pd1" class="form-control form-control-sm" <?= empty($row->tgl_ok) ? '' : 'disabled' ?> <?= empty($row->sis_byr) ? "" : 'required' ?>>
                                            <option value="" class="form-control form-control-sm">pilih....</option>
                                            <?php $pd1 = $this->input->post('akun_pd1') ? $this->input->post('akun_pd1') : $row->akun_pd1 ?>
                                            <option value="524119" class="form-control form-control-sm" <?php echo $pd1 == "524119" ? 'selected' : ''; ?>>LK</option>
                                            <option value="524114" class="form-control form-control-sm" <?php echo $pd1 == "524114" ? 'selected' : ''; ?>>DK</option>
                                            <option value="524111" class="form-control form-control-sm" <?php echo $pd1 == "524111" ? 'selected' : ''; ?>>LPS</option>
                                            <option value="524219" class="form-control form-control-sm" <?php echo $pd1 == "524219" ? 'selected' : ''; ?>>LN</option>
                                        </select></td>
                                    <td>
                                        <a href=# id="t1" class="text-success text-xs"><i class="fas fa-plus-circle"></i></a>
                                    </td>
                                </tr>
                                <tr class="rpd" id="r2">
                                    <td width="45%"><input value="<?= $this->input->post('nilai_pd2') ?? $row->nilai_pd2 ?>" type="text" name="nilai_pd2" id="n2" class="form-control form-control-sm uang <?= form_error('nilai_pd2') ? "is-invalid text-danger" : "" ?>" placeholder="masukan nilai pengajuannya.." <?= empty($row->tgl_ok) ? '' : "disabled" ?>></td>
                                    <td width="20%"><select name="akun_pd2" class="form-control form-control-sm" <?= empty($row->tgl_ok) ? '' : 'disabled' ?>>
                                            <option value="" class="form-control form-control-sm">pilih....</option>
                                            <?php $pd2 = $this->input->post('akun_pd2') ? $this->input->post('akun_pd2') : $row->akun_pd2 ?>
                                            <option value="524119" class="form-control form-control-sm" <?php echo $pd2 == "524119" ? 'selected' : ''; ?>>LK</option>
                                            <option value="524114" class="form-control form-control-sm" <?php echo $pd2 == "524114" ? 'selected' : ''; ?>>DK</option>
                                            <option value="524111" class="form-control form-control-sm" <?php echo $pd2 == "524111" ? 'selected' : ''; ?>>LPS</option>
                                            <option value="524219" class="form-control form-control-sm" <?php echo $pd2 == "524219" ? 'selected' : ''; ?>>LN</option>
                                        </select></td>
                                    <td>
                                        <a href=# id="t2" class="text-success text-xs"><i class="fas fa-plus-circle"></i></a>
                                        <a href=# id="h1" class="text-danger text-xs"><i class="fas fa-minus-circle"></i></a>
                                    </td>
                                </tr>
                                <tr class="rpd" id="r3">
                                    <td width="45%"><input value="<?= $this->input->post('nilai_pd3') ?? $row->nilai_pd3 ?>" type="text" name="nilai_pd3" id="n3" class="form-control form-control-sm uang <?= form_error('nilai_pd3') ? "is-invalid text-danger" : "" ?>" placeholder="masukan nilai pengajuannya.." <?= empty($row->tgl_ok) ? "" : "disabled" ?>></td>
                                    <td width="20%"><select name="akun_pd3" class="form-control form-control-sm " <?= empty($row->tgl_ok) ? '' : 'disabled' ?>>
                                            <option value="" class="form-control form-control-sm">pilih....</option>
                                            <?php $pd3 = $this->input->post('akun_pd3') ? $this->input->post('akun_pd3') : $row->akun_pd3 ?>
                                            <option value="524119" class="form-control form-control-sm" <?php echo $pd3 == "524119" ? 'selected' : ''; ?>>LK</option>
                                            <option value="524114" class="form-control form-control-sm" <?php echo $pd3 == "524114" ? 'selected' : ''; ?>>DK</option>
                                            <option value="524111" class="form-control form-control-sm" <?php echo $pd3 == "524111" ? 'selected' : ''; ?>>LPS</option>
                                            <option value="524219" class="form-control form-control-sm" <?php echo $pd3 == "524219" ? 'selected' : ''; ?>>LN</option>
                                        </select></td>
                                    <td>
                                        <a href=# id="h2" class="text-danger text-xs"><i class="fas fa-minus-circle"></i></a>
                                    </td>
                                </tr>
                                </tr>
                            </table>
                            <table class="table table-sm">
                                <tr id="rhr">
                                    <td width="20%">
                                        <span class="font-weight-bold">Honorarium</span>
                                    </td>
                                    <td width="2%">:</td>
                                    <td width="5%"><?= $row->sis_byr_hr ?></td>
                                    <td colspan="3" width="73%"><input value="<?= $this->input->post('nilai_hr') ?? $row->nilai_hr ?>" type="text" name="nilai_hr" class="form-control form-control-sm uang <?= form_error('nilai_hr') ? "is-invalid text-danger" : "" ?>" placeholder="masukan nilai pengajuannya" <?= empty($row->tgl_ok) ? "" : "disabled"?> <?= !empty($row->sis_byr_hr) ? "required" : "" ?>></td>
                                </tr>
                            </table>
                        <?php endif ?>
                        <hr>
                        <?php if ($this->fungsi->user_login()->nama != "Putri Nailatul Himma") { ?>
                            <fieldset>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <!-- <label>Tgl. Pengajuan UMK</label> -->
                                            <input type="hidden" name="id" value=<?= $row->id_pumk ?>>
                                            <input type="checkbox" name="tgl_proses" value="1" <?= $row->tgl_proses != null ? "checked" : "" ?> 
                                            <?php if (empty($bpp->tgl_dispo) || $row->tgl_proses != null) {
                                                    echo "disabled";
                                                } else {
                                                    echo "required";
                                                } ?>>
                                            <?php if ($row->tgl_proses != null) { ?>
                                                <span class="text-success text-sm"><b><i>Sudah diajukan : Tgl. <?= tanggal_indonesia($row->tgl_proses) ?></i></b></span>
                                            <?php } else { ?>
                                                <span class="text-secondary"><b>Ajukan UMK</b></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group float-right">
                                            <input type="checkbox" name="tgl_lpj" value="1" <?= $row->tgl_lpj != null ? "checked" : "" ?> 
                                            <?php if (empty($row->tgl_proses) && empty($bpp->tgl_umk) || !empty($row->tgl_proses) && empty($bpp->tgl_umk) || !empty($row->tgl_proses) && !empty($bpp->tgl_umk) && !empty($row->tgl_lpj)) {
                                                        echo "disabled";
                                                    } elseif (!empty($row->tgl_proses) && !empty($bpp->tgl_ok) && !empty($row->tgl_lpj)) {
                                                        echo "required";
                                                    } else {
                                                        echo "";
                                                    } ?>>
                                            <?php if ($row->tgl_lpj != null) { ?>
                                                <span class="text-success text-sm"><b><i>Sudah LPJ tanggal: <?= tanggal_indonesia($row->tgl_lpj) ?></i></b></span>
                                            <?php } else { ?>
                                                <span class="text-secondary"><b>Proses Penyelesaian LPJ</b></span>
                                                <input value="<?= empty($row->nilai_lpj) ? $row->nilai_umk : $row->nilai_lpj ?>" type="text" name="nilai_lpj" class="form-control form-control-sm uang" placeholder="masukan nilai LPJ" <?= $row->tgl_umk == null ? "disabled" : "required" ?>>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <?php
                                        if ($row->dok_aju != null) { ?>
                                            <a class="text-success" href="<?= base_url('uploads/pumk/' . $row->k_subs . '/' . $row->dok_aju) ?>"><b>Bukti Transfer<small> *dalam format rar/zip</small></b> <i class="fas fa-check"></i><small> (<?= $row->dok_aju ?>)</small></a>
                                        <?php } else { ?>
                                            <label>Bukti Transfer<small> *dalam format pdf/rar/zip</label>
                                        <?php } ?>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input form-control-sm" name="dok_aju" id="FileAju" 
                                            <?= !empty($row->tgl_proses) && empty($row->dok_aju) ? 'required' : '' ?> 
                                            <?= empty($row->tgl_proses) && empty($bpp->tgl_ok) && empty($bpp->tgl_umk) || !empty($row->tgl_proses) && empty($bpp->tgl_ok) || !empty($row->tgl_proses) && !empty($bpp->tgl_ok) && empty($bpp->tgl_umk) ? "disabled" : "" ?>>
                                            <label class="custom-file-label" for="FileAju" data-browse="Telusuri">Pilih Berkas</label>
                                            <br><small> *biarkan kosong jika tidak ada perubahan </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group float-right">
                                    <button name="update" type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                                    <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                                    <a href="<?= site_url('proses_pumk') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
                                </div>
                                <?= form_close() ?>
                            <?php } else { ?>
                                <?= form_open_multipart('proses_pumk/proses') ?>
                                <fieldset>
                                    <div class="form-group">
                                        <table class="table table-sm table-borderless">
                                            <tr>
                                                <td width="20%"><span class="font-weight-bold">Akomodasi</span></td>
                                                <td width="2%">:</td>
                                                <td width="5%"><?= $row->sis_byr_akom ?></td>
                                                <td width="45%"><input value="<?= $this->input->post('nilai_ak') ?? $row->nilai_ak ?>" type="text" name="nilai_ak" class="input-sm form-control form-control-sm uang <?= form_error('nilai_ak') ? "is-invalid text-danger" : "" ?>" placeholder="masukan nilai akom..." <?= empty($row->tgl_selesaiproses_akom) ? '' : 'disabled' ?> required></td>
                                                <td width="40%">
                                                    <select name="akun_ak" class="form-control form-control-sm " <?= empty($row->tgl_selesaiproses_akom) ? '' : 'disabled' ?> required>
                                                        <option value="" class="form-control form-control-sm">pilih....</option>
                                                        <option value="524119" class="form-control form-control-sm" <?php echo $row->akun_ak == "524119" ? 'selected' : ''; ?>>Paket Meeting Luar Kota</option>
                                                        <option value="524114" class="form-control form-control-sm" <?php echo $row->akun_ak == "524114" ? 'selected' : ''; ?>>Paket Meeting Dlm Kota</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <!-- <label>Tgl. Pengajuan UMK</label> -->
                                                <input type="hidden" name="id" value=<?= $row->id_pumk ?>>
                                                <input type="checkbox" name="tgl_proses_akom" value="1" <?= $row->tgl_proses_akom != null ? "checked" : "" ?> 
                                                <?php if (empty($bpp->tgl_dispo) || $row->tgl_proses_akom != null) {
                                                        echo "disabled";
                                                    } else {
                                                        echo "";
                                                    } ?> required>
                                                <?php if ($row->tgl_proses_akom != null) { ?>
                                                    <span class="text-success text-sm"><b><i>Sudah Proses Akom pada tanggal <?= tanggal_indonesia($row->tgl_proses) ?></i></b></span>
                                                <?php } else { ?>
                                                    <span class="text-secondary"><b>Proses Akom</b></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input type="checkbox" name="tgl_selesaiproses_akom" value="1" <?= $row->tgl_selesaiproses_akom != null ? "checked" : "" ?> 
                                                <?php if (empty($bpp->tgl_dispo) || empty($row->tgl_proses_akom) || !empty($row->tgl_selesaiproses_akom)) {
                                                        echo "disabled";
                                                    } else {
                                                        echo "";
                                                    } ?>>
                                                <?php if ($row->tgl_selesaiproses_akom != null) { ?>
                                                    <span class="text-success text-sm"><b><i>Selesai Proses Akom tanggal <?= tanggal_indonesia($row->tgl_proses) ?></i></b></span>
                                                <?php } else { ?>
                                                    <span class="text-secondary"><b>Selesai Proses Akom</b></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group float-right">
                                        <button name="update" type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                                        <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                                        <a href="<?= site_url('proses_pumk') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
                                    </div>
                                    <?= form_close() ?>
                                <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>



<script>
    var nilai1 = document.getElementById("n1").value;
    var nilaip2 = document.getElementById("n2").value;
    var nilaip3 = document.getElementById("n3").value;
    var nilai2 = <?php echo empty($row->nilai_pd2) ? 0 : 1 ?>;
    var nilai3 = <?php echo  empty($row->nilai_pd3) ? 0 : 1 ?>;
    var byr_pd = <?php echo  empty($row->sis_byr) ? 0 : 1 ?>;
    var byr_hr = <?php echo  empty($row->sis_byr_hr) ? 0 : 1 ?>;
    if (byr_pd == "1") {
        $('.rpd').show();
    } else {
        $('.rpd').hide();
    }

    if (byr_hr == "1") {
        $('#rhr').show();
    } else {
        $('#rhr').hide();
    }

    if (nilai2 == "0" && nilaip2 =="") {
        $('#r2').hide();
    };
    if (nilai3 == "0" && nilaip3 =="") {
        $('#r3').hide();
    };
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '#pilih_dipa', function() {
            var opt = $(this).data('output');
            var sopt = $(this).data('suboutput');
            var komp = $(this).data('komponen');
            var skomp = $(this).data('subkomponen');
            $('#opt').val(opt);
            $('#sopt').val(sopt);
            $('#komp').val(komp);
            $('#skomp').val(skomp);
            $('#modal_dipa').modal('hide');
        })
    })
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '#pilih_akun', function() {
            var akun = $(this).data('akun');
            $('#akun').val(akun);
            $('#modal_akun').modal('hide');
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#t1').click(function() {
            $('#r2').show();
        })
        $('#t2').click(function() {
            $('#r3').show();
        })
        $('#h1').click(function() {
            $('#r2').hide();
        })
        $('#h2').click(function() {
            $('#r3').hide();
        })
    })
</script>