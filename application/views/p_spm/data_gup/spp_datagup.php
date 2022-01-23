<table class="table table-hover table-sm" id="tablegup">
    <thead class="thead-light">
    <tr class='text-center'>
        <th>NO. </th>
        <th>Arsip GUP </th>
        <th>Total Nilai </th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1;
    foreach($gu->result() as $data){?>
    <tr class='text-center'>
        <td><?=$no++?>.</td>
        <td><b>GU <?=$data->arsip_gup?></b></td>
        <td><b><?php
        if($data->nilai >= 500000000)  { ?>
        <span class="text-danger"><?=number_format($data->nilai, 0, ',', '.')?></span>
        <?php } elseif ($data->nilai >= 400000000 && $data->nilai < 500000000) { ?>
        <span class="text-warning"><?=number_format($data->nilai, 0, ',', '.')?></span>
        <?php } else { ?>
        <span class="text-success"><?=number_format($data->nilai, 0, ',', '.')?></span>
        <?php }?></b>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
      $('#tablegup').dataTable({
           "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
           stateSave: true
      })
    })
  </script>