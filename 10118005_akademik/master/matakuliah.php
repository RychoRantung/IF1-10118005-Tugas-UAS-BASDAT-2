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
             Mata Kuliah
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="index1.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Mata Kuliah</a></li>
            <li class="active">List Mata Kuliah</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
             
            <!--edit-->
            <?php
            
                        $kode_mk=$_GET['kode_mk'];
                        $sql="SELECT  * FROM matakuliah where kode_mk='$kode_mk' ";
                        
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
            <div class="box">
            <div class="box-header with-border">
                  Edit Mata Kuliah
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div> 
            </div> 
                <form action="aksimatkul.php?sender=edit" method="POST">
                  <div class="box-body">
                        <div class="row">
                <div class="col-md-12 form-group">
                <label>Kode Mata Kuliah</label>
                    <input readonly="" type="hidden" name="kode_mk" value="<?php echo $row['kode_mk'];?>" class="form-control" placeholder="Enter..." required="">
                    <input type="text" name="kode_mk" value="<?php echo $row['kode_mk'];?>" class="form-control" placeholder="Enter..." required="">
                    </div> 
                    <label>Nama Mata Kuliah</label>
                    <input type="text" name="nama_mk" value="<?php echo $row['nama_mk'];?>" class="form-control" placeholder="Enter..." required="">
                    </div> 
                   
                    <label>SKS</label>
                    <input type="text" name="sks_mk" value="<?php echo $row['sks_mk']?>" class="form-control" placeholder="Enter..." required="">
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
                        <th>Kode Mata Kuliah</th>
                        <th>Nama Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Aksi</th>

                         
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql="SELECT  * FROM matakuliah";
                        $no=1;
                        if (!$result=  mysqli_query($config, $sql)){
                        die('Error:'.mysqli_error($config));
                        }  else {
                        if (mysqli_num_rows($result)> 0){
                        while ($row=  mysqli_fetch_assoc($result)){
                    ?>
                    
                        <tr>
                            <td><?php echo $no ;?></td>
                            <td><?php echo $row['kode_mk'];?></td>
                            <td><?php echo $row['nama_mk'];?></td>
                            <td><?php echo $row['sks_mk'];?></td>
                            <td>
                                <a href="<?php $_SERVER[SCRIPT_NAME] ;?>?page=matakuliah&kode_mk=<?php echo $row['kode_mk'];?>" class="btn btn-info"><li class="fa fa-pencil"></li> Edit</a> 
                                <a href="aksimatkul.php?sender=hapus&kode_mk=<?php echo $row['kode_mk']; ?>" class="btn btn-danger"><li class="fa fa-trash-o"></li> Hapus</a> 
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
<form action="aksimatkul.php?sender=matakuliah" method="POST" >
<div class="modal fade" id="my-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
       
<div class="modal-content">
<div class="modal-header">

<h4 class="modal-title" id="myModalLabel">Tambah Mata Kuliah</h4>
</div>
   
<div class="modal-body center"> 
 <!--Content-->
 
  <div class="form-group">
      <label>Kode Mata Kuliah</label>
      <textarea type="text" name="kode_mk" class="form-control" placeholder="Enter ..."></textarea> 
    </div>

    <div class="form-group">
      <label>Nama Mata Kuliah</label>
      <input type="text" name="nama_mk" class="form-control" required="" placeholder="Enter ...">
    </div>
 
    

    <div class="form-group">
      <label>SKS</label>
      <textarea type="text" name="sks_mk" class="form-control" placeholder="Enter ..."></textarea> 
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