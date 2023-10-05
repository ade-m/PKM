<!-- Sidebar user panel (optional) -->
<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
    <a href="#" class="d-block"><?php echo $_SESSION['username']; ?></a>
  </div>
</div>

<?php
$hak_akses = isset($_SESSION["hak_akses"]) ? $_SESSION["hak_akses"]  : '';

function isPageActive($linkURL)
{
  $currentUrl = $_GET["module"];
  return ($currentUrl == $linkURL);
}

if ($hak_akses == 'Super Admin') {
?>
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
      <li class="nav-item">
        <a href="?module=beranda" class="nav-link <?php echo isPageActive('beranda') ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-home"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="javascript:void(0);" class="nav-link <?php echo isPageActive('monitoring') ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-tv"></i>
          <p>
            Monitor
            <i class="fas fa-angle-right right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview pl-2">
          <li class="nav-item">
            <a href="?module=dataNutrisi" class="nav-link <?php echo isPageActive('dataNutrisi') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-seedling"></i>
              <p>Data Nutrisi</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=dataSuhu" class="nav-link <?php echo isPageActive('dataSuhu') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-thermometer-empty"></i>
              <p>Data Suhu</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=datapH" class="nav-link <?php echo isPageActive('datapH') ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-vial "></i>
              <p>Data pH</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=hamaTanaman" class="nav-link <?php echo isPageActive('hamaTanaman') ? 'active' : ''; ?>">
              <i class="nav-icon fa-solid fa-bug"></i>
              <p>Hama Tanaman</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="?module=action" class="nav-link <?php echo isPageActive('action') ? 'active' : ''; ?>">
          <i class="nav-icon fa-regular fa-circle-dot"></i>
          <p>
            Action
          </p>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link <?php echo isPageActive('action') ? 'active' : ''; ?>">
          <i class="nav-icon fa-regular fa-circle-dot"></i>
          <p>
            Action
            <i class="fas fa-angle-right right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview pl-2">
          <li class="nav-item">
            <a href="?module=kandunganAir" class="nav-link <?php echo isPageActive('kandunganAir') ? 'active' : ''; ?>">
              <i class="nav-icon fa-solid fa-bottle-water"></i>
              <p>Kandungan Air</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?module=hamaTanaman" class="nav-link <?php echo isPageActive('hamaTanaman') ? 'active' : ''; ?>">
              <i class="nav-icon fa-solid fa-bug"></i>
              <p>Hama Tanaman</p>
            </a>
          </li>
        </ul>
      </li> -->
      <li class="nav-item">
        <a href="?module=config" class="nav-link <?php echo isPageActive('config') ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-tools"></i>
          <p>
            Settings
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="?module=User" class="nav-link <?php echo isPageActive('User') ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-user"></i>
          <p>
            User
          </p>
        </a>
      </li>
    </ul>
  </nav>
<?php
}
?>