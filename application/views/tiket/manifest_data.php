<!--------CONTENT START----------->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Manifest Tiket</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="">Informasi</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="<?= site_url('manifest_tiket') ?>">Manifest Tiket</a>
                    </li>
                </ol>
            </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card card-shadow">
        <div class="card-header">
            <h2 class="card-title">Daftar Manifest Tiket</h2>
            <div class="float-right">
                <a type="button" href="<?= site_url('manifest_tiket/export_excel') ?>" role="button" class="btn-sm btn-success"><i class="fas fa-download"></i> Unduh Excel</a>
                <!-- <a href="<?= site_url('manifest_tiket/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Tambah Data</a> -->
                <!-- <a type="button" href="<?= site_url('manifest_tiket/impor') ?>" role="button" class="btn-sm btn-primary"><i class="fas fa-upload"></i> Impor Database</a> -->
                <button class="btn btn-sm btn-warning" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-plus"></i> Tambah Data
                </button>
            </div>
        </div>

        <?php $this->load->view('pesan'); ?>
        <div class="card-body">

            <div class="collapse" id="collapseExample">
                <div class="card card-shadow">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Daftar Manifest Tiket</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?= form_open_multipart('manifest_tiket/proses') ?>
                                <?php if (validation_errors()) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <h6><b>Perhatian!</b></h6>
                                        <small>
                                            <?php echo validation_errors() ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                        </small>
                                    </div>
                                <?php } ?>
                                <div class="form-group text-sm">
                                    <label>Nama Kegiatan </label>
                                    <a href="" class="float-right text-primary font-weight-bold" data-target="#giat" data-toggle="modal">Daftar Kegiatan</a>
                                    <input type="hidden" name="id" value="">
                                    <textarea id="urgiat" rows="2" class="form-control form-control-sm text-sm" name="nmgiat"><?= set_value('nmgiat') ?></textarea>
                                    <input type="hidden" name="direktorat" value="Direktorat Kelembagaan" class="form-control form-control-sm text-sm">
                                </div>
                                <div class="form-row">
                                    <div class="col text-sm">
                                        <label>SPM</label>
                                        <input type="text" name="spm" value="<?= set_value('spm') ?>" class="form-control form-control-sm text-sm">
                                    </div>
                                    <div class="col text-sm">
                                        <label>Nama</label>
                                        <input type="text" name="nmorang" value="<?= set_value('nmorang') ?>" class="form-control form-control-sm text-sm">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col text-sm">
                                        <label>Maskapai Penerbangan</label>
                                        <select name="maskapai" class="form-control form-control-sm text-sm">
                                            <option value="">-pilih-</option>
                                            <option value="Garuda Indonesia">Garuda Indonesia</option>
                                            <option value="Batik Air">Batik Air</option>
                                            <option value="Sriwijaya Air">Sriwijaya Air</option>
                                            <option value="Nam Air">Nam Air</option>
                                            <option value="Lion Air">Lion Air</option>
                                            <option value="Wings Air">Wings Air</option>
                                            <option value="Citilink">Citilink</option>
                                            <option value="Air Asia">Air Asia</option>
                                            <option value="Susi Air">Susi Air</option>
                                        </select>
                                    </div>
                                    <div class="col text-sm">
                                        <label>No. Penerbangan</label>
                                        <input type="text" name="noterbang" value="<?= set_value('noterbang') ?>" class="form-control form-control-sm text-sm">
                                    </div>
                                    <div class="col text-sm">
                                        <label>No. Tiket</label>
                                        <input type="text" name="notiket" value="<?= set_value('notiket')  ?>" class="form-control form-control-sm text-sm">
                                    </div>
                                    <div class="col text-sm">
                                        <label>Kode Booking</label>
                                        <input type="text" name="kdbook" value="<?= set_value('kdbook') ?>" class="form-control form-control-sm text-sm">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col text-sm">
                                        <label>No. Invoice</label>
                                        <input type="text" name="noinvoice" value="<?= set_value('noinvoice') ?>" class="form-control form-control-sm text-sm">
                                    </div>
                                    <div class="col text-sm">
                                        <label>Harga Tiket (Basic Fare)</label>
                                        <input type="text" name="tiketdasar" value="<?= set_value('tiketdasar') ?>" class="form-control form-control-sm text-sm uang">
                                    </div>
                                    <div class="col text-sm">
                                        <label>Harga Tiket (Total)</label>
                                        <input type="text" name="tikettotal" value="<?= set_value('tikettotal') ?>" class="form-control form-control-sm text-sm uang">
                                    </div>
                                </div>
                                <div class="form-group text-sm">
                                    <div class="row">
                                        <div class="col">
                                            <label>Asal</label>
                                        </div>
                                        <div class="col">
                                            <label>Tanggal Berangkat</label>
                                        </div>
                                        <div class="col">
                                            <label>Tujuan</label>
                                        </div>
                                        <div class="col">
                                            <label>Tanggal Pulang</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <input name="asal" class="form-control form-control-sm text-sm" value="<?= set_value('asal') ?>">
                                        </div>
                                        <div class="col">
                                            <input name="tglberangkat" class="form-control form-control-sm text-sm tanggal" value="<?= set_value('tglberangkat') ?>">
                                        </div>
                                        <div class="col">
                                            <input name="tujuan" class="form-control form-control-sm text-sm" value="<?= set_value('tujuan') ?>">
                                        </div>
                                        <div class="col">
                                            <input name="tglpulang" class="form-control form-control-sm text-sm tanggal" value="<?= set_value('pulang') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-sm">
                                    <div class="row">
                                    </div>
                                </div>
                                <div class="form-group text-sm">
                                    <label>Keterangan</label>
                                    <textarea rows="5" type="text" name="ket" class="form-control form-control-sm text-sm"><?= set_value('ket')  ?></textarea>
                                </div>
                            </div>
                            <div class="form-group float-right">
                                <button type="submit" name="tambah" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                                <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                                <button class="btn btn-sm btn-danger" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fa fa-times"></i> Tutup
                                </button>
                                <!-- <a href="<?= site_url('manifest_tiket') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a> -->
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-striped text-sm" width="100%" id="tabletiket">
                    <thead class="bg-dark">
                        <tr class="text-center">
                            <th width="80px" data-priority="1">#</th>
                            <th width="300px" data-priority="2">Kegiatan</th>
                            <th width="200px" data-priority="3">Nama</th>
                            <th width="200px" data-priority="4">Maskapai</th>
                            <th width="200px" data-priority="5">No. Penerbangan</th>
                            <th width="200px" data-priority="6">Asal dan Tujuan</th>
                            <th width="200px" data-priority="7">Tgl. Terbang</th>
                            <th width="200px" data-priority="9">Harga Tiket</th>
                            <th width="150px" data-priority="10">Keterangan</th>
                            <th width="80px" data-priority="8">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hapusLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah yakin data ini akan dihapus?
            </div>
            <div class="modal-footer">
                <form id="formHapus" action="" method="post">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Iya</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="giat" tabindex="-1" aria-labelledby="giatLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="giatLabel">Daftar Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-hover display compact table-sm text-sm table-striped" style="width:100%" id="tablegiat">
                    <thead class="bg-info">
                        <tr class="text-center">
                            <th width="5%" data-priority="1">#</th>
                            <th width="25%" data-priority="2">Kegiatan</th>
                            <th width="15%" data-priority="3">Substansi</th>
                            <th width="25%" data-priority="4">Tgl. Kegiatan</th>
                            <th width="15%" data-priority="5">Lokasi</th>
                            <th width="10%" data-priority="6">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($keg->result() as $key => $data) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?>.</td>
                                <td><?= $data->nm_keg ?></td>
                                <td class="text-center"><?= $data->k_subs ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($data->tgl_selesai == $data->tgl_mulai) {
                                        echo tanggal_indonesia($data->tgl_mulai);
                                    } else {
                                        if (date('M', strtotime($data->tgl_mulai)) == date('M', strtotime($data->tgl_selesai))) {
                                            echo tanggal($data->tgl_mulai) . " s.d " . tanggal_indonesia($data->tgl_selesai);
                                        } else {
                                            echo tgbulan($data->tgl_mulai) . " s.d " . tanggal_indonesia($data->tgl_selesai);
                                        }
                                    } ?>
                                </td>
                                <td><?= $data->lokasi ?></td>
                                <td class="text-center">
                                    <a href=# class="btn btn-xs btn-success" id="pilih" data-giat="<?= $data->nm_keg ?>">pilih</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(document).on('click', '#pilih', function() {
            var giat = $(this).data('giat');
            $('#urgiat').val(giat);
            $('#giat').modal('hide');
        });
        $('#tablegiat').dataTable({
            responsive: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "columnDefs": [{
                    'targets': [0, 2, 3, 5,],
                    'className': "text-center",
                },
                {
                    'targets': [0, 5],
                    'orderable': false,
                },
            ],
        });

        $('#tabletiket').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": '<?= site_url('manifest_tiket/get_ajax') ?>',
                "type": 'POST'
            },
            responsive: true,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            "columnDefs": [{
                    'targets': [0, 2, 3, 4, 5, 6, 7, 8],
                    'className': "text-center",
                },
                {
                    'targets': [0, 4, 5, 6, 7, 8],
                    'orderable': false,
                },
            ],
            stateSave: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            "order": []
        })
    })
</script>