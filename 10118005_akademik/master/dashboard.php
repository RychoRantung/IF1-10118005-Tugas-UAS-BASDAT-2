<?php include 'theme/header.php'; ?>

     
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
       
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
           <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active">
                <a href="<?php $_SERVER[SCRIPT_NAME];?>index1.php">  
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
        
     
<?php 

?>