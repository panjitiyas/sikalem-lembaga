<?php 
$row = $this->pesan_m->get();
foreach ($row->result() as $key => $data) {
if ( $data->dibaca == 'Y'){?>
<span class="text-primary" ><i class="far fa-eye"></i></span>
<?php } else { ?>
<span class="text-gray"><i class="fas fa-eye-slash"></i></a></span>
<?php }  
} ?>
