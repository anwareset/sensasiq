<!DOCTYPE html>
<html lang="en">
<head>
<?php $this->load->view("partials/head.php") ?>
</head>
<body id="page-top">
<div id="wrapper">
  <div id="content-wrapper">

    <div class="container-fluid">
    <div class="card mb-3">
            <div class="card-header">             
              Rekap nilai kelas <strong><?php echo $cetak[0]['kelas'] ?></strong>
                </div>    
           <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table id="add-row" class="display table table-striped table-hover" >
                  <thead>
                    <tr>                      
                      <th>Waktu</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Mata Kuliah</th>
                      <th>Kelas</th>                      
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>                      
                      <th>Waktu</th>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Mata Kuliah</th>
                      <th>Kelas</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php foreach ($cetak as $c) : ?>
                  <tr>                  
                    <td><?php echo $c['waktu']; ?></td>
                    <td><?php echo $c['nim']; ?></td>
                    <td><?php echo $c['nama']; ?></td>
                    <td><?php echo $c['matkul']; ?></td>
                    <td><?php echo $c['kelas']; ?></td>               
                  </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
              </div>
            </div>   
          </div>       

    </div>
  </div>
</div>
<script>
  window.print();
</script> 
</body>
</html>
