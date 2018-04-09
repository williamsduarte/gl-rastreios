<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">

    <li>
      <a href="{{ url('/') }}">
        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
      </a>
    </li>
    <li>
      <a href="{{ route('categories') }}">
        <i class="fa fa-th"></i> <span>Categorias</span>
      </a>
    </li>
    <li>
      <a href="{{ route('refactory') }}">
        <i class="fa fa-recycle"></i> <span>Refatoração</span>
        <span class="pull-right-container">
          <small class="label pull-right bg-green">new</small>
        </span>
      </a>
    </li>

  </ul>
</section>
<!-- /.sidebar -->
</aside>
