<canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

<script>
$(document).ready(function() {
      

var datals =  [<?php for ($i=0; $i <=11 ; $i++) {
        foreach ($ls as $data) {
            echo date('F',strtotime($data->tgl_spp)) == $bulan[$i] ? $data->nilai_spp/1000000 .',' : 0 .',';
} }?>];
var datagup = [
      <?php for ($i=0; $i <=11 ; $i++) { 
        foreach ($gup as $dt) {
            echo date('F',strtotime($dt->tgl_spp)) == $bulan[$i] ? $dt->nilai/1000000 .',' : 0 .',';
} }?>];

var barChartCanvas = $('#barChart').get(0).getContext('2d')
var Data = {
  labels  :['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember'],
  datasets: [
    {
      label               : 'LS',
      backgroundColor     : "rgba(75, 192, 192, 0.4)",
      borderColor         : "rgb(54, 162, 235)",
      borderWidth         : '1',
      pointRadius         : false,
      pointColor          : '#3b8bba',
      pointStrokeColor    : 'rgba(60,141,188,1)',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(60,141,188,1)',
      data                : datals
    },
    {
      label               : 'GUP',
      backgroundColor     : "rgba(255, 99, 132, 0.4)",
      borderColor         : "rgb(255, 99, 132)",
      borderWidth         : '1',
      pointRadius         : false,
      pointColor          : 'rgba(210, 214, 222, 1)',
      pointStrokeColor    : '#c1c7d1',
      pointHighlightFill  : '#fff',
      pointHighlightStroke: 'rgba(220,220,220,1)',
      data                : datagup
    },
  ]
}
var barChartData = jQuery.extend(true, {}, Data)
var temp0 = Data.datasets[0]
var temp1 = Data.datasets[1]
barChartData.datasets[0] = temp1
barChartData.datasets[1] = temp0

var Options = {
  responsive          : true,
  maintainAspectRatio : false,
  datasetFill         : false,
  scales              :{
      xAxes   :[{
        display    :true,
        scaleLabel :{
            display     :true,
            labelString : 'Periode Bulan'
        }
      }],
      yAxes   :[{
        display    :true,
        scaleLabel :{
            display     :true,
            labelString : 'Rp (dalam jutaan)'
        }
      }]
  }
}
var barChart = new Chart(barChartCanvas, {
  type: 'bar', 
  data: barChartData,
  options: Options
})
})
</script>