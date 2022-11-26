<?php
/* @var $this LaporanController */

$this->breadcrumbs=array(
	'Laporan',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php
	
	$pasienGroupByKota = array();
	foreach ($pasienKota as $value) {
		
		array_push(
			$pasienGroupByKota,
			array(
				"value"=>$value['jml'],
				"color"=>'rgba(' . rand(0,56) . ',' . rand(0,255) . ',' . rand(0,56) . ')',
				"label"=>$value['nama'],
			),
		);

	}

	$GroupByObat = array();
	foreach ($obat as $value) {
		
		array_push(
			$GroupByObat,
			array(
				"value"=>(int)$value['jml'],
				"color"=>'rgba(' . rand(0,56) . ',' . rand(0,255) . ',' . rand(0,56) . ')',
				"label"=>$value['nama'],
			),
		);

	}
	
?>
<br>
<br>
<h3>Grafik Jumlah Pasien Berdasarkan Kota</h3>
<?php 
            $this->widget(
                'chartjs.widgets.ChPie', 
                array(
                    'width' => 600,
                    'height' => 300,
                    'htmlOptions' => array(),
                    'drawLabels' => true,
                    'datasets' =>$pasienGroupByKota,
                    'options' => array()
                )
            ); 
        ?>

<br>
<br>
<h3>Grafik Jumlah Penjualan Obat</h3>
	<?php 
        $this->widget(
            'chartjs.widgets.ChDoughnut', 
            array(
                'width' => 600,
                'height' => 300,
                'htmlOptions' => array(),
                'drawLabels' => true,
                'datasets' => $GroupByObat,
                'options' => array()
            )
        ); 
    ?>
