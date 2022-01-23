 <?php
    $row = $this->pesan_m->get_new();
    foreach ($row->result() as $key => $data) { ?>
     <a href="" class="dropdown-item">
         <div class="media">
             <div class="media-body">
                 <h3 class="dropdown-item-title">
                     <?= $data->pengirim ?>
                     <?php
                        if ($data->sifat == 1) {
                            echo '<span class="text-sm text-success float-right"><i class="fas fa-star"></i></span>';
                        } elseif ($data->sifat == 2) {
                            echo '<span class="text-sm text-warning float-right"><i class="fas fa-star"></i></span>';
                        } elseif ($data->sifat == 3) {
                            echo '<span class="text-sm text-danger float-right"><i class="fas fa-star"></i></span>';
                        } else {
                            echo '<span class="text-sm text-muted float-right"><i class="fas fa-star"></i></span>';
                        }
                        ?>
                 </h3>
                 <p class="text-sm"><b><?= $data->judul ?></b></p>
                 <p class="text-sm"><?=substr($data->pesan,0,60)?>...</p>
                 <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo hitung_jam($data->jam) ?> yang lalu</p> -->
                 <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i><?=date('d F Y H:i',strtotime($data->jam))?></p>
                 <div class="dropdown-divider"></div>

             </div>
         </div>
     </a>
 <?php } ?>
 <div class="dropdown-divider"></div>
 <?php 
$hitung_pesan = $this->pesan_m->tot_new();
if ($hitung_pesan!== 0) {?>
<a href= "<?=site_url('pesan')?>" class="dropdown-item dropdown-footer text-primary">cek kotak masuk</a>
<?php } else {?>
<span class="dropdown-item dropdown-footer text-muted"><i>Tidak ada pesan baru</i></span>
<?php } ?>