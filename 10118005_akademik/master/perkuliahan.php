<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
           
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
              <a href="index1.php">
                 <i class="fa fa-home"></i> <span>Dashboard</span>
              </a>
            </li> 
            <li class="active" >
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=mahasiswa">
                <i class="fa fa-user"></i> <span>Mahasiswa</span>  
              </a>
            </li> 
            </li> 
            <li class="active" >
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=dosen">
                <i class="fa fa-user"></i> <span>Dosen</span>  
              </a>
            </li> 
            <li class="active" >
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=matakuliah">
                <i class="fa fa-user"></i> <span>Mata Kuliah</span>  
              </a>
            </li> 
            <li class="active" >
              <a href="<?php $_SERVER[SCRIPT_NAME];?>?page=perkuliahan">
                <i class="fa fa-user"></i> <span>Perkuliahan</span>  
              </a>
            </li> 
           
           </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
      
       <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
             Perkuliahan
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index1.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Perkuliahan</a></li>
            <li class="active">Perkuliahan</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $nim=$_GET['nim'];
                        $sql="SELECT  * FROM perkuliahan where nim='$nim' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Perkuliahan
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksipk.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                <div class="col-md-12 form-group">
                <label>NIM</label>
                    <input readonly="" type="hidden" name="nim" value="<?php echo $row['nim'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="nim" value="<?php echo $row['nim'];?>" class="form-control" placeholder="Enter..." required="">
                    </div> 
                    <label>NIP</label>
                    <input type="text" name="nip" value="<?php echo $row['nip'];?>" class="form-control" placeholder="Enter..." required="">
                    </div> 
                   
                    <label>Kode Matakuliah</label>
                    <input type="text" name="kode_mk" value="<?php echo $row['kode_mk']?>" class="form-control" placeholder="Enter..." required="">
                    </div> 
                    <label>Nilai</label>
                    <input type="text" name="nilai" value="<?php echo $row['nilai']?>" class="form-control" placeholder="Enter..." required="">
                    </div> 
                 <div class="col-md-12 form-group"> 
                   <button type="submit" class="btn btn-primary btn-flat pull-right"><span class="fa fa-send"></span> Simpan</button>
                 </div>
                </div> 
                  </div></form>
              </div>
                   <?php                
                        }
                    }  else {
                    echo '';    
                    }
                    }?> 
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> <a href="#" data-toggle="modal" data-target="#my-modal1" class="btn btn-info"><li class="fa fa-plus"></li> Tambah</a></h3>
              <div class="box-tools pull-right">
                 </div>
            </div>
            <div class="box-body">
                               <table id="example1" class="table table-striped dataTable no-footer">
                    <thead>
                      <tr> 
                        <th>#</th>
                        <th>NIM</th>
                        <th>NIP</th>
                        <th>Kode Mata Kuliah</th>
                        <th>Nilai</th>
                        <th>Aksi</th>

                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM perkuliahan";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            <td><?php echo $no ;?></td>
                            <td><?php echo $row['nim'];?></td>
                            <td><?php echo $row['nip'];?></td>
                            <td><?php echo $row['kode_mk'];?></td>
                            <td><?php echo $row['nilai'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=perkuliahan&nim=<?php echo $row['nim'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="aksipk.php?sender=hapus&nim=<?php echo $row['nim']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
                             </td>
                        </tr> 
                            <?php    
                    $no++;                    
                        }
                    }  else {
                    echo '';    
                    }
                    }?>
                    </tbody>
                   
                     
                  </table>
            </div><!-- /.box-body -->
             
          </div><!-- /.box --> 
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
      
      
      <!-- Bootstrap Modal - To Add New Record -->
<!-- Modal -->
<form action="aksipk.php?sender=perkuliahan" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah Mata Kuliah</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
  <div class="form-group">j
      <label>NIM</label>
      <textarea type="text" name="nim" class="form-control" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>NIP</label>
      <input type="text" name="nip" class="form-control" required="" placeholder="Enter ...">
    </div>

    <div class="form-group">
      <label>Kode Mata Kuliah</label>
      <textarea type="text" name="kode_mk" class="form-control" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>Nilai</label>
      <textarea type="text" name="nilai" class="form-control" placeholder="Enter ..."></textarea> 
    </div>
 
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
<button type="submit" class="btn btn-info"> Simpan</button> 
  
</div>
   
</div>
</div>
</div>
</form>

      <!-- Content Wrapper. Contains page content -->
      
     
<?php include 'theme/footer.php'; ?>