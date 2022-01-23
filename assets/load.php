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
                 <p class="text-sm"><?= $data->judul ?></p>
                 <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> <?php echo hitung_jam($data->jam) ?> yang lalu</p>
             </div>
         </div>
     </a>
 <?php } ?>