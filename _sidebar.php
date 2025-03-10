<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="bo" class="brand-link">
      <img src="dist/img/seniman-koding.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">POS - APOTEK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar04.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $_SESSION['user_nama']; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if ( $levelLogin !== "kurir" ) { ?>
          <li class="nav-item">
            <a href="bo" class="nav-link">
              <i class="nav-icon fa fa-desktop"></i> 
              <p>
                 Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-cart"></i>
              <p>
                Penjualan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Kasir
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="beli-langsung?customer=<?= base64_encode(0); ?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Customer Umum</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="beli-langsung?customer=<?= base64_encode(1); ?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Grosir 1</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="beli-langsung?customer=<?= base64_encode(2); ?>" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Grosir 2</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="customer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="penjualan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Penjualan</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Piutang
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="piutang" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Belum Lunas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="piutang-menunggak" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Piutang Menunggak</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="piutang-lunas" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Lunas</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin !== "kasir" && $levelLogin !== "kurir" ) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-shopping-bag"></i>
              <p>
                Pembelian
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="transaksi-pembelian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="supplier" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pembelian" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice Pembelian</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Hutang
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="hutang" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Belum Lunas</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hutang-menunggak" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Hutang Menunggak</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="hutang-lunas" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Lunas</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin !== "kasir" && $levelLogin !== "kurir" ) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-exchange"></i>
              <p>
                Transfer Stock
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="transfer-stock-cabang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Transaksi</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Data Transfer Stock
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="transfer-stock-cabang-masuk" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Masuk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="transfer-stock-cabang-keluar" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Keluar</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin !== "kasir" && $levelLogin !== "kurir" ) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-university"></i>
              <p>
                Master
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="kategori" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kategori</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="satuan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Satuan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="barang" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Obat</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="ekspedisi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ekspedisi</p>
                </a>
              </li> -->
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin !== "kurir" ) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-calculator"></i>
              <p>
                Stock Opname
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="stock-opname-per-produk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Per Produk</p>
                </a>
              </li>

              <?php if ( $levelLogin !== "kasir" ) { ?>
              <li class="nav-item">
                <a href="stock-opname-keseluruhan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keseluruhan</p>
                </a>
              </li>
              <?php } ?>

              <li class="nav-item">
                <a href="stock-opname-data-produk" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Print Data Produk</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin !== "kasir" && $levelLogin !== "kurir" ) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-line-chart"></i>
              <p>
                Laba Bersih
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="laba-bersih-data" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Operasional</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laba-bersih-laporan" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Laba Bersih</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin === "kurir" ) { ?>
          <li class="nav-item">
            <a href="kurir-data" class="nav-link">
              <i class="nav-icon fa fa-table"></i> 
              <p>
                 Data Kurir
              </p>
            </a>
          </li>
          <?php } ?>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Laporan
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            
            <ul class="nav nav-treeview">
              <?php if ( $levelLogin !== "kasir" && $levelLogin !== "kurir" ) { ?>
              <li class="nav-item">
                <a href="laporan-kasir" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kasir</p>
                </a>
              </li>
              <?php } ?>

              <?php if ( $levelLogin === "kasir" ) { ?>
              <li class="nav-item">
                <a href="laporan-kasir-pribadi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kasir Pribadi</p>
                </a>
              </li>
              <?php } ?>

              <?php if ( $levelLogin === "kurir" ) { ?>
              <li class="nav-item">
                <a href="laporan-kurir-pribadi" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kurir Pribadi</p>
                </a>
              </li>
              <?php } ?>

              <?php if ( $levelLogin !== "kurir" ) { ?>
              <li class="nav-item">
                <a href="laporan-kurir" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Kurir</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan-customer" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customer</p>
                </a>
              </li>
              <?php } ?>

              <?php if ( $levelLogin !== "kasir" && $levelLogin !== "kurir" ) { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Penjualan
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="periode" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Per Periode</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporan-produk" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Per Produk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="edit-transaksi" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Retur</p>
                    </a>
                  </li>
                </ul>
              </li>
              
              <li class="nav-item">
                <a href="laporan-supplier" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Supplier</p>
                </a>
              </li>

              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Pembelian
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="periode-pembelian" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Per Periode</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="laporan-produk-pembelian" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Per Produk</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="edit-transaksi-pembelian" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Retur</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-item">
                <a href="terlaris" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Terlaris</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="stok" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stok Terkecil</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan-obat-mendekati-kadaluarsa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mendekati Kadaluarsa</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="laporan-obat-kadaluarsa" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Obat Kadaluarsa</p>
                </a>
              </li>
            </ul>
            <?php } ?>
          </li>
          
          <?php if ( $levelLogin === "super admin" ) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database"></i>
              <p>
                Backup & Restore
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="backup" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Backup</p>
                </a>
              </li>
              <?php if ( $sessionCabang < 1 ) { ?>
              <li class="nav-item">
                <a href="restore" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Restore</p>
                </a>
              </li>
              <?php } ?>
            </ul>
          </li>
          <?php } ?>

          <?php if ( $levelLogin === "super admin" ) { ?>
          <li class="nav-header">SETTINGS</li>
          <li class="nav-item">
            <a href="user-type" class="nav-link">
              <i class="nav-icon fa fa-users"></i> 
              <p>
                 Users
              </p>
            </a>
          </li>
          <?php if ( $sessionCabang == 0 ) { ?>
          <li class="nav-item">
            <a href="toko" class="nav-link">
              <i class="nav-icon fa fa-id-card-o"></i> 
              <p>
                 Toko
              </p>
            </a>
          </li>
          <?php } ?>
        <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>