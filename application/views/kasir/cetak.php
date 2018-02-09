<html>
  <head>
  
	    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css')?>"> 
	    <link rel="stylesheet" href="<?= base_url('assets/fonts/font-awesome.min.css')?>"> 
	  	<style type="text/css">
		  	
	  		#alamat{
	  			font-size: 13px;
	  		}

	  		#print{
	  			font-size: 15px;
	  		}
		</style>
  	</head>
  	<body>
  		<div class="col-md-3"></div>
	    <div class='col-md-6'>
	    <h2 style='text-align: center'> Broto Restro</h2>
	    <hr>

	<div class="panel panel-default">
	    <table  class="table  table-condensed table-hover">
	    	<thead>
	    			<th>
		    			<td id="alamat">Jl.Sekeloa Utara No.14, <br>Dipatiukur, Bandung</td>
		    			<td></td>
		    			<td><b>I<?=$detail[0]->id_pesanan ?> </b></td>
		    		</th>
	    	</thead>
	    <tbody>
			  <tr>
			  	<td><?=$detail[0]->tgl_pemesanan ?></td><td></td><td></td>
			  </tr>

			  <tr id="isi">
			  	<td>Nama Menu</td>
			  	<td>Jumlah</td>
			  	<td>Harga</td>
			  	<td>Sub Total</td>
			  	
			  </tr>

			  <?php foreach ($detail as  $value): ?>
			  	
			  <tr id="isi">
			  	<td><?=$value->nama_menu ?></td>
			  	<td><?=$value->jml_pesanan ?></td>
			  	<td><?=$value->harga_menu ?></td>
			  	<td><?=$value->total ?></td>
			  	
			  </tr>

			  <?php endforeach ?>
	
			<tr >
				<td></td>
				<td></td>
				<td>Total Harga</td>
			  	<td><?=$detail[0]->total_harga ?></td>
			 </tr>

			 
	  	</tbody>
	  	</table>

	  </div>
	  	<p align='center' id="print">
	  
		<a href="#" onClick="window.print();return false">
	   	<i class="icon-print"></i>Cetak </a>
	    </p>
	    </div>


  		<div class="col-md-3"></div>
  </body>
</html>