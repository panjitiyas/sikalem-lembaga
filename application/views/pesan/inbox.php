<table class="table table-sm table-hover" id="table3">
        <thead class="thead-light">
          <tr class="text-center">
            <!-- <th width="2px">#</th> -->
            <th width="10px"><span class="text-sm text-muted">*</i></span></th>
            <th>Dari</th>
            <th>Perihal</th>
            <th width="1px"></th>
            <th>Waktu</th>
            <th width="10px">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $row = $this->pesan_m->get();
          $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr class="<?=$data->dibaca=="N" ? "table-warning" :""?>">
              <!-- <td class="text-center"><?= $no++ ?>.</td> -->
              <td class="text-center"><?php
                  if ($data->sifat == 1) {
                    echo '<span class="text-xs text-success"><i class="fas fa-star"></i></span>';
                  } elseif ($data->sifat == 2) {
                    echo '<span class="text-xs text-warning"><i class="fas fa-star"></i></span>';
                  } elseif ($data->sifat == 3) {
                    echo '<span class="text-xs text-danger"><i class="fas fa-star"></i></span>';
                  } else {
                    echo '<span class="text-xs text-muted"><i class="fas fa-star"></i></span>';
                  }
                  ?>
              </td>
              <td>
              <?php if ($data->dibaca == 'N'){?>
                <a id="detail" href="#" class="text-dark" data-toggle="modal" data-target="#modal_pesan" data-id="<?= $data->id_pesan ?>" data-pengirim="<?= $data->pengirim ?>" data-judul="<?= $data->judul ?>" data-pesan="<?= $data->pesan ?>"><b><?=$data->pengirim ?></b></a>
              <?php } else { ?>
                <a id="detail" href="#" class="text-gray" data-toggle="modal" data-target="#modal_pesan" data-id="<?= $data->id_pesan ?>" data-pengirim="<?= $data->pengirim ?>" data-judul="<?= $data->judul ?>" data-pesan="<?= $data->pesan ?>"><?=$data->pengirim ?></a>
              <?php } ?>
              </td>
              <td>
              <?php if ($data->dibaca == 'N'){?>
              <b><?= $data->judul ?></b> : <i><?=substr($data->pesan,0,60)?>....</i>
              <?php } else { ?>
              <span class="text-gray"><?= $data->judul ?> : <?=substr($data->pesan,0,60)?>....</span>
              <?php } ?>
              </td>
              <td>
              <?php if ($data->lampiran != null) { ?>
                  <a href="<?= base_url('uploads/pesan/' . $data->lampiran) ?>" class="text-danger"><i class="fa fa fa-paperclip"></i></a>
                <?php } ?>
              </td>
              <!-- <td class="text-center"><?= tanggal_indonesia($data->tanggal) ?></td> -->
              <td class="text-center"><?= date('d F Y H:i',strtotime($data->jam)) ?></td>
              <td class="text-center">                  
                <a href="#hapus" onclick="$('#hapus #formHapus').attr('action','<?= site_url('pesan/del/' . $data->id_pesan) ?>' )" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <script>
    $(document).ready(function() {
      $('#table3').dataTable({
        "columnDefs": [{
           "orderable": false,"targets":[0,2,3]
           }],
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
           stateSave: true,
           "language":{
          "url":"//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
        }
      })
    })
  </script>