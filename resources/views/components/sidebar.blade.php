 <!--  Body Wrapper -->
 <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
 data-sidebar-position="fixed" data-header-position="fixed">
 <!-- Sidebar -->
 <aside class="left-sidebar">
     <div class="brand-logo d-flex align-items-center justify-content-between">
         <a href="./index.html" class="text-nowrap logo-img">
             <img src="{{ asset('template/src/assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
         </a>
         <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
             <i class="ti ti-x fs-8"></i>
         </div>
     </div>
     <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
         <ul id="sidebarnav">
             <li class="nav-small-cap">
                 <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                 <span class="hide-menu">Home</span>
             </li>
             <li class="sidebar-item">
                 <a class="sidebar-link" href="./home" aria-expanded="false">
                     <i class="ti ti-layout-dashboard"></i>
                     <span class="hide-menu">Dashboard</span>
                 </a>
             </li>
             <li class="sidebar-item">
                 <a class="sidebar-link" href="/polis" aria-expanded="false">
                     <i class="ti ti-layout-dashboard"></i>
                     <span class="hide-menu">Data Poli</span>
                 </a>
             </li>
             <li class="sidebar-item">
                 <a class="sidebar-link" href="/pasien" aria-expanded="false">
                     <i class="ti ti-layout-dashboard"></i>
                     <span class="hide-menu">Data Pasien</span>
                 </a>
             </li>
             <li class="sidebar-item">
                 <a class="sidebar-link" href="/pasien/create" aria-expanded="false">
                     <i class="ti ti-layout-dashboard"></i>
                     <span class="hide-menu">Tambah Pasien</span>
                 </a>
             </li>
             <li class="sidebar-item">
                 <a class="sidebar-link" href="/daftar" aria-expanded="false">
                     <i class="ti ti-layout-dashboard"></i>
                     <span class="hide-menu">Pendaftaran Pasien</span>
                 </a>
             </li>
         </ul>
     </nav>
 </aside>
 <!-- End Sidebar -->
