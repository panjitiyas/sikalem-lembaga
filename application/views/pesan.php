<?php if($this->session->has_userdata('sukses')){?>
    <script>
        Swal.fire({
            title : 'Sukses',
            text  : '<?=$this->session->flashdata('sukses')?>',
            icon  : 'success',
            timer : 2500,
            showConfirmButton : false
        })
    </script>
<?php } elseif ($this->session->has_userdata('gagal')) { ?>
    <script>
        Swal.fire({
            title : 'Maaf...',
            text  : '<?=$this->session->flashdata('gagal')?>',
            icon  : 'error',
            timer : 2500,
            showConfirmButton : false
        })
    </script>
<?php }?>

<?php if($this->session->has_userdata('berhasil')){?>
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-check"></i>
    <?=$this->session->flashdata('berhasil')?>
    </div>
<?php } elseif ($this->session->has_userdata('kesalahan')) { ?>
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-ban"></i>
    <?=strip_tags(str_replace('</p>','', $this->session->flashdata('kesalahan')));?>
    </div>
<?php }?>