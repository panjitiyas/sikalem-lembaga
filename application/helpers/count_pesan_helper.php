<?php


function count_pesan()
{
    $ci = &get_instance();
    // $ci->pesan_m->tot_new();
    $totpesan=$ci->pesan_m->tot_new();
    echo $totpesan;
}
?>