<!--------CONTENT START----------->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Informasi Anggaran</h1>
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
                        <a href="<?= site_url('cek_anggar') ?>">Informasi Anggaran</a>
                    </li>
                </ol>
            </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="card card-shadow">
        <div class="card-header">
            <h2 class="card-title">Informasi Anggaran</h2>
        </div>
        <div class="card-body table-responsive">
            <form action="">
                <div class="col-md-12">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td width="15%"><span class="font-weight-bold text-sm">Program - Kegiatan</span></td>
                            <td width="2%">:</td>
                            <td width="83%">
                                <select name="kd_1" id="kd_1" class="form-control form-control-sm">
                                    <option value="">-Pilih-</option>
                                    <?php foreach ($kd1->result() as $key => $data) : ?>
                                        <option value="<?= $data->kd_1 ?>" class="text-center"><?= $data->kd_1 . ' - ' . $data->nm_kd_1 ?></option>
                                    <?php endforeach ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="15%"><span class="font-weight-bold text-sm">KRO - RO</span></td>
                            <td width="2%">:</td>
                            <td width="83%">
                                <select name="kd_2" id="kd_2" class="form-control form-control-sm">
                                    <option value="">-Pilih-</option>
                                </select>
                                <!-- <div id="loading" style="margin-top: 15px;"> -->
                                <!-- <div id="loading" class="spinner-border spinner-border-sm  text-primary" role="status">
                    <span class="sr-only">loading...</span>
                  </div> -->
                </div>
                </td>
                </tr>
                <tr>
                    <td width="15%"><span class="font-weight-bold text-sm">Komp-Subkomp</span></td>
                    <td width="2%">:</td>
                    <td width="83%">
                        <select name="kd_3" id="kd_3" class="form-control form-control-sm">
                            <option value="">-Pilih-</option>
                        </select>
                    </td>
                </tr>
                </table>
        </div>
        <hr>
        </form>
        <div class="col-md-12">
        <!-- <span class="text-success text-right spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading"></span> -->
                <table id="cekanggaran" class="table table-sm text-sm table-striped" style="width:100%">
                    <thead class="text-center bg-navy">
                        <tr>
                            <th width="80px" data-priority="1">MAK</th>
                            <th width="300px" data-priority="2">Nama MAK</th>
                            <th width="150px" data-priority="3">Pagu</th>
                            <th width="150px" data-priority="4">Realisasi</th>
                            <th width="150px" data-priority="5">Sisa</th>
                            <th width="40px" data-priority="6">Status</th>
                        </tr>
                    </thead>
                    <tbody id="datanya">

                    </tbody>
                </table>
        </div>
    </div>
    </div>
</section>


<script>
    $(document).ready(function() {

    })
</script>
<script>
    $(document).ready(function() {
        // $('#loading').hide();
        $('#cekanggaran').dataTable({
            "paging": false,
            "ordering": false,
            "info": false,
            "searching": false,
            bAutowidth:true,
            responsive: true,
            // "columnDefs": [{
            //         'targets': [0, 2, 3, 4, 5],
            //         'className': "text-left",
            //     },
            //     // {
            //     //     'targets': [0],
            //     //     'orderable': true,
            //     // },
            // ],
            stateSave: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
            // "order": []
        });
        $("#kd_1").change(function() {
            var id = $("#kd_1").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url("cek_anggar/ambil_kd2"); ?>",
                data: {
                    id: id
                },
                dataType: "json",

                success: function(data) {
                    var html = '<option value=""> -Pilih- </option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kd_2 + '>' + data[i].kd_2 + ' - ' + data[i].nm_kd_2 + '</option>';
                    }
                    $("#kd_2").html(html);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $("#kd_2").change(function() {
            var id = $("#kd_2").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url("cek_anggar/ambil_kd3"); ?>",
                data: {
                    id: id
                },
                dataType: "json",

                success: function(data) {
                    var html = '<option value=""> -Pilih- </option>';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kd_3 + '>' + data[i].kd_3 + ' - ' + data[i].nm_kd_3 + '</option>';
                    }
                    $("#kd_3").html(html);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        });

        $("#kd_3").change(function() {
            
            tampil_data();
            

        });

        function tampil_data() {
            
            var id = $("#kd_1").val() + '.' + $("#kd_2").val() + '.' + $("#kd_3").val();
            $.ajax({
                type: "POST",
                url: "<?= site_url("cek_anggar/ambil_anggaran"); ?>",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        var keterangan = '';
                        var pagu = data[i].pagu;
                        var real = data[i].realisasi;
                        var sisapagu = parseInt(data[i].pagu) - parseInt(data[i].realisasi);
                        var persen = real / pagu * 100;
                        if (persen >=80  && persen <= 100) {
                            keterangan = '<span class="text-warning font-weight-bold"><i class="fas fa-exclamation-triangle"></i></span>';
                        } else if(persen >= 100) {
                            keterangan = '<span class="text-danger font-weight-bold"><i class="fas fa-times"></i></span>';
                        } else {
                            keterangan = '<span class="text-success font-weight-bold"><i class="fas fa-check"></i></span>';
                        };

                        if (persen >=80  && persen <= 100) {
                            sisa =  '<span class="text-warning font-weight-bold">'+formatRupiah(String(sisapagu), 'Rp.')+'</span>';
                        } else if(persen >= 100) {
                            sisa =  '<span class="text-danger font-weight-bold">'+formatRupiah(String(sisapagu), 'Rp.')+'</span>';
                        } else {
                            sisa =  '<span class="text-success font-weight-bold">'+formatRupiah(String(sisapagu), 'Rp.')+'</span>';
                        };

                        html += '<tr>' +
                            '<td class="text-center font-weight-bold">' + data[i].kd_mak + '</td>' +
                            '<td >' + data[i].nm_kd_mak + '</td>' +
                            '<td class="text-right text-navy font-weight-bold">' + formatRupiah(pagu, 'Rp.') + '</td>' +
                            '<td class="text-right text-primary font-weight-bold">' + formatRupiah(real, 'Rp.') + '</td>' +
                            '<td class="text-right">' + sisa+ '</td>' +
                            '<td class="text-center">' + keterangan + '</td>' +
                            '</tr>';
                    }
                    $("#datanya").html(html);
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        }
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
        setInterval(tampil_data,10000);
    });
</script>