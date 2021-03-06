<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Data Bayi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              
              <span class="hidden-xs">Elsi</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="">
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="treeview">
          <a href="data-bayi.php">
            <i class="fa fa-map-o"></i> <span>Data Bayi</span>
          </a>
        </li>
        <li class="treeview">
          <a href="data-ibu-hamil.php">
            <i class="fa fa-map-o"></i> <span>Data Ibu Hamil</span>
          </a>
        </li>
        <li class="treeview">
          <a href="data-posyandu.php">
            <i class="fa fa-map-o"></i> <span>Data Posyandu</span>
          </a>
        </li>
        <li class="treeview">
            <a href="laporan.php">
            <i class="fa fa-map-marker"></i> <span>Laporan</span>
          </a>
        </li>
        <li class="treeview">
          <a href="login.php">
            <i class="fa fa-user-times"></i> <span>Logout</span>
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
        Data Bayi
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">   
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
               <TABLE>Tambahkan</TABLE>
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-striped">
                <?php
                  include 'koneksi.php';

                  $sql = "SELECT * FROM data_bayi";
                  $query = mysqli_query($koneksi, $sql);
                  $no = 0
                ?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Bayi</th>
                  <th>Jenis Kelamin</th>
                  <th>Tanggal Lahir</th>
                  <th>BB Lahir</th>
                  <th>TB Lahir</th>
                  <th>Nama Ortu</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <?php
                    while($data = mysqli_fetch_array($query)) {
                      $no++
                  ?>
                  <td><?= $no ?></td>
                  <td><?= $data['nama_bayi'] ?></td>
                  <td>
                    <?php
                      if($data['jenis_kelamin'] == 'L') {
                        echo("Laki-Laki");
                      } 
                      else {
                        echo("Perempuan");
                      }
                    ?>
                  </td>
                  <td><?= $data['tgl_lahir'] ?></td>
                  <td><?= $data['bb_lahir'] ?></td>
                  <td><?= $data['tb_lahir'] ?></td>
                  <td><?= $data['nama_ortu'] ?></td>
                  <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit<?= $data['id'] ?>">
                      Edit
                    </button>
                    <a href="hapus-data-bayi.php?id=<?php echo $data['id']?>" class="btn btn-danger">
                      Hapus
                    </a>
                  </td>
                </tr>
                <div class="modal fade" id="modal-edit<?php echo $data['id']; ?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data Bayi</h4>
                      </div>
                      <?php
                            $id = $data['id'];
                            $query_data = mysqli_query($koneksi, "SELECT * FROM data_bayi WHERE id = $id");
                            $baris = mysqli_fetch_array($query_data);

                          ?>
                          <div class="modal-body">
                          <!-- form start -->
            <form action="edit-data-bayi.php" method="post">
            <input type="hidden" name="id" value="<?= $baris['id']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Bayi</label>
                  <input type="text" class="form-control" name="nama_bayi" value="<?=  $baris['nama_bayi'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value='L'>Laki - Laki</option>
                    <option value='P'>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" value="<?=  $baris['tgl_lahir'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">BB Lahir</label>
                  <input type="number" class="form-control" name="bb_lahir" value="<?=  $baris['bb_lahir'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">TB Lahir</label>
                  <input type="number" class="form-control" name="tb_lahir" value="<?=  $baris['tb_lahir'] ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ortu</label>
                  <input type="text" class="form-control" name="nama_ortu" value="<?=  $baris['nama_ortu'] ?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">Elsi Yuni Dita</a>.</strong>
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

 <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Form Tambahkan Data Bayi</h4>
              </div>
              <div class="modal-body">
               <!-- form start -->
            <form action="input-data-bayi-proses.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Bayi</label>
                  <input type="text" class="form-control" name="nama_bayi" placeholder="Enter Nama Bayi">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <select class="form-control" name="jenis_kelamin">
                    <option value='L'>Laki - Laki</option>
                    <option value='P'>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" placeholder="Enter Tanggal Lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">BB Lahir</label>
                  <input type="number" class="form-control" name="bb_lahir" placeholder="Enter BB Lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">TB Lahir</label>
                  <input type="number" class="form-control" name="tb_lahir" placeholder="Enter TB Lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Ortu</label>
                  <input type="text" class="form-control" name="nama_ortu" placeholder="Enter Nama Orangtua">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  });
</script>
</body>
</html>
