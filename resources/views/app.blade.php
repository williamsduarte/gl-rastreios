<!DOCTYPE html>
<html>

@include('layouts.html-head')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  
  @include('layouts.html-header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.html-sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('layouts.html-content-header')

    <!-- Main content -->
    <section class="content">
      @yield('main-content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.html-footer')


  <!-- Control Sidebar -->
  @include('layouts.html-control-sidebar')
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
  
  @include('layouts.html-scripts') 

</body>
</html>
