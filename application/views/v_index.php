
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buku Tamu</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>/bootstrap/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>/bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>/bootstrap/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/lib/instascan.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>/bootstrap/js/bootstrap.min.js"></script>

    <link href="<?php echo base_url(); ?>/bootstrap/bower_components/bootstrap/table/bootstrap-table.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>/bootstrap/bower_components/bootstrap/table/bootstrap-table.min.js"></script>
    <style type="text/css">
      pre {
          pre {border: 0; background-color: transparent;}
      }
    </style>

   <script type="text/javascript">
function inputAktifitas(id, nama){
		document.getElementById('lbl_idtamu').innerHTML = id;
		document.getElementById('input_idtamu').value = id;
		document.getElementById('lbl_nama').innerHTML = nama;
		$('#modalAktifitas').modal('show');

}

   $(function(){
   		$('#daftarBaru').hide();
   		$('#aktifitasBaru').hide();
   		$('#formCari').submit(function(){
   			event.preventDefault();
   			$('#daftarBaru').hide();
   			$('#aktifitasBaru').hide();
   			$('.searcResult').remove();
   			var idtamu = $('#sidtamu').val();
   			$.ajax({
   				type: 'POST',
   				url: '<?php echo site_url();?>/aktifitas/cariTamu',
   				data: 'idornama=' + idtamu,
   				dataType: 'json',
   			}).done(function(data){
   				if(data !== 0){
   					for(var i=0; i < data.length; i++){
   						var mydata = [];
   						mydata = {id: data[i].id_tamu, name: data[i].nama};
   						$('#aktifitasBaru').append('<li class="searcResult"><a class="clikID" href="#" onclick="inputAktifitas(\'' + data[i].id_tamu + '\',\'' + data[i].nama + '\')">'+data[i].id_tamu+'</a> - '+data[i].nama+
   													' </li>');
   					}
   					$('#aktifitasBaru').show(100);
   				}else{
   					$('#daftarBaru').show(100);
   				}
   			}).fail(function(){
   				alert('Gagal mendapatkan data.');
   			});
   		});

   });


</script>
</head>

<body>
<div class="container">

<div class="row">
    <div class="col-md-8">
      <h1>Buku Tamu</h1>
      <div id="cari">
      <div class="row">
      <div class="col-md-6">

      <div class="panel panel-default">
            	<div class="panel-body">
            	<p><label for="idtamu">ID/Nama</label></p>
        		<p>
        		<form id="formCari" role="form">
        		<div class="form-group input-group">
        		<input type="text" id="sidtamu" name="sidtamu"  class="form-control" placeholder="cari tamu">
        			<span class="input-group-btn">
        			<button type="submit" class="btn btn-default form-control"><i class="fa fa-search"></i></button>
        			</span>
        		</div>
        		</form>
        		</p>
            	</div>

              <div>
                <!-- <video id="preview"></video>
                <script type="text/javascript">
                  let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
                  scanner.addListener('scan', function (content) {
                    alert(content);
                  });
                  Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                      scanner.start(cameras[0]);
                    } else {
                      console.error('No cameras found.');
                    }
                  }).catch(function (e) {
                    console.error(e);
                  });
                </script> -->
              </div>

              <div id="daftarBaru" class="panel-footer">
                	<h3>Tamu Baru!</h3>
                	<form method="POST" action="<?php echo site_url();?>/aktifitas/tambahtamu">
                			<p><label for="idtamu">ID:</label></p>
                			<p><input type="text" id="idtamu" name="idtamu"></p>
                			<p><label>Nama:</label></p>
                			<p><input type="text" id="nama" name="nama"></p>
                			<input type="submit" value="Daftarkan">
              		</form>
            	</div>

            	<div id="aktifitasBaru" class="panel-footer">
            	</div>
      </div>
      <!-- close-panel -->

      </div>
      </div>
      </div>

  	<p>
  	<fieldset>
  		<legend>Aktifitas</legend>
  		<table data-toggle="table">
  			<thead>
  				<th>#</th>
  				<th>Time(Latest)</th>
  				<th>ID</th>
  				<th>Nama</th>
  				<th>Tujuan</th>
  			</thead>
  			<tbody>
  				<?php
  				$i = 0;
  				foreach ($aktifitas as $row) {
  					$i++;
  					echo '<tr>';
  					echo '<td>'.$i.'</td>';
  					echo '<td>'.$row->time.'</td>';
  					echo '<td>'.$row->id_tamu.'</td>';
  					echo '<td>'.$row->nama.'</td>';
  					echo '<td>'.$row->tujuan.'</td>';
  					echo '</tr>';
  				}?>
  			</tbody>
  		</table>

  	</fieldset>
  	</p>
  	<div>
  		<?php

  		echo $this->session->flashdata('msg');
  		?>
  	</div>
    </div>
</div> <!-- /row -->

</div>

 <div class="modal fade" id="modalAktifitas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Aktifitas</h4>
                </div>
                <div class="modal-body">
                <form class="formAddActivity" method="POST" action="<?php echo site_url();?>/aktifitas/tambahaktifitas">
                 <label>No. Identitas:</label>
                 <p id="lbl_idtamu"></p>
                 <input type="hidden" id="input_idtamu" name="input_idtamu">
                 <label>Nama:</label>
                 <p id="lbl_nama"></p>
                 <input type="hidden" id="input_nama" name="input_nama">
                 <label>Tujuan:</label>
                 <p><textarea id="input_tujuan" name="input_tujuan" rows="3"></textarea></p>
                	<input type="submit" value="OK">
                 </form>
                </div>
                <div class="modal-footer">
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</body>
</html>
