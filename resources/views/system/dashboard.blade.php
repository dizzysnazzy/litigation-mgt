<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Litigation Management || Portal</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/css/bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{ asset ('dash/ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/font-awesome-4.7.0/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/bootstrap/js/bootstrap-formhelpers-phone.js')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('dash/dist/css/iMond.min.css')}}">
  <!-- iMond Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset ('dash/dist/css/skins/_all-skins.min.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/iCheck/flat/blue.css')}}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/morris/morris.css')}}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset ('dash/imond.css')}}">
  <link rel="stylesheet" href="{{ asset ('dash/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/datepicker/datepicker3.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset ('dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link rel="stylesheet" href="https://fonts.google.com/specimen/Metamorphous?selection.family=Ubuntu:200,400,300,500,600,700">
  <link rel="icon" href="{{url('/imond/img/imond.png')}}">
  <script src="/blog/tinymce/tinymce.min.js"></script>
  <!-- All CSS Plugins -->
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('blog/css/plugin.css')}}"> -->

  <!-- Main CSS Stylesheet -->
  <link rel="stylesheet" type="text/css" href="{{ asset('blog/css/style.css')}}">

  @stack('css')

  <script>
    tinymce.init({
      selector: 'textarea',
      height: 500,
      setup: function (editor) {
        editor.on('init change', function () {
          editor.save();
        });
      },
      plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste imagetools"
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ],
      image_title: true,
      automatic_uploads: true,
      images_upload_url: '/upload',
      file_picker_types: 'image',
      file_picker_callback: function(cb, value, meta) {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function() {
          var file = this.files[0];
          var reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = function () {
            var id = 'blobid' + (new Date()).getTime();
            var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            cb(blobInfo.blobUri(), { title: file.name });
          };
        };
        input.click();
      }
    });
  </script>

</head>
<body class="hold-transition skin-green-light sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="/system/admin" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>MP</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Kalya</b>LIT</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu imondbg">
        <ul class="nav navbar-nav" >
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset ('/images/kim.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{Sentinel::getUser()->first_name}}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset ('/images/kim.png')}}" class="img-circle" alt="User Image">

                <p>
                  {{Sentinel::getUser()->first_name}} -
                  <small>System || Admin</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/system/admin/profile" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a class="btn btn-flat btn-danger" href="{{ url('/logout') }}"
                     onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Logout
                  </a>

                  <form id="logout-form" action="/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset ('/images/kim.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{Sentinel::getUser()->first_name}} || Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i> <span>Manage Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/system/new_user"><i class="fa fa-angle-double-right"></i>Add User</a></li>
            <li><a href="/system/view/users"><i class="fa fa-angle-double-right"></i>View Users</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gavel"></i> <span>Matters</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/system/matter/new"><i class="fa fa-angle-double-right"></i>New Matter</a></li>
            <li><a href="/system/cases/view"><i class="fa fa-angle-double-right"></i>View Matters</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-phone"></i> <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/system/new_user"><i class="fa fa-angle-double-right"></i>Add Contact</a></li>
            <li><a href="/system/view/users"><i class="fa fa-angle-double-right"></i>View Contacts</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h4>
        Dashboard
        <small>Control panel</small>
      </h4>

    @yield('content')
  </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 1.0.0
  </div>
  <p>&copy;
    <script>
      document.write(new Date().getFullYear())
    </script>,
    <a href="http://www.imond.co.ke" target="_blank">kalya &amp; CO</a>. All rights
    reserved.</p>
</footer>

</div>
<!-- ./wrapper -->
@stack('js')
<!-- jQuery 2.2.3 -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<!-- <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script> -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script>
  $(".delete").on("submit", function(){
    return confirm("You are about to delete a record, Continue?");
  });
</script>

<script>
  $(".hire").on("submit", function(){
    return confirm("You are about to Hire a Writer, Continue?");
  });
</script>

<script>
  $(".deletexp").on("submit", function(){
    return confirm("You are about to permanently delete an applicaation record, Continue?");
  });
</script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset ('dash/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset ('dash/plugins/morris/morris.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ asset ('dash/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{ asset ('dash/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset ('dash/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset ('dash/plugins/knob/jquery.knob.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ asset ('dash/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- datepicker -->
<script src="{{ asset ('dash/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset ('dash/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<!-- Slimscroll -->
<script src="{{ asset ('dash/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ asset ('dash/plugins/fastclick/fastclick.js')}}"></script>
<!-- iMond App -->
<script src="{{ asset ('dash/dist/js/app.min.js')}}"></script>
<!-- iMond dashboard demo (This is only for demo purposes) -->
<script src="{{ asset ('dash/dist/js/pages/dashboard.js')}}"></script>
<!-- iMond for demo purposes -->
<script src="{{ asset ('dash/dist/js/demo.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset ('dash/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset ('dash/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

</body>
</html>