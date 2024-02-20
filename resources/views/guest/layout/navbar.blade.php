<header id="header" class="fixed-top header-transparent">
    <div
      class="container d-flex align-items-center justify-content-between position-relative"
    >
      <div class="logo">
        <a href="index.html"
          ><img src="/assets_guest/img/logo.png" alt="" class="img-fluid"
        /></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li>
            <a class="nav-link scrollto {{ Request::is('/') ? 'active' : '' }} " href="/">Beranda</a>
          </li>
          <li>
            <a class="nav-link scrollto  {{ Request::is('about*') ? 'active' : '' }} " href="/about"
              >Tentang Kami</a
            >
          </li>
          <li class="dropdown">
            <a href="#"
              ><span>Struktur</span> <i class="bi bi-chevron-down"></i
            ></a>
            <ul>
              <li><a href="struktur/BPH.html">Badan pengurus Harian</a></li>
              <li><a href="struktur/danus.html">Dana Usaha</a></li>
              <li><a href="struktur/humas.html">Hubungan Masyarakat</a></li>
              <li><a href="struktur/mediasi.html">Media dan Informasi</a></li>
              <li><a href="struktur/mdb.html">Minat dan Bakat</a></li>
              <li>
                <a href="struktur/psda.html"
                  >Pengembangan Sumber Daya Anggota</a
                >
              </li>
              <li><a href="struktur/ristek.html">Riset dan Teknologi</a></li>
              <li><a href="struktur/sosgam.html">Sosial dan Keagamaan</a></li>
            </ul>
          </li>
          <li>
            <a class="nav-link scrollto {{ Request::is('articles*') ? 'active' : '' }}" href="/articles"
              >Artikel
            </a>
          </li>
          <li>
            <a class="nav-link scrollto {{ Request::is('news*') ? 'active' : '' }} " href="/news"
              >Berita
            </a>
          </li>
          <li>
            <a class="nav-link scrollto {{ Request::is('events*') ? 'active' : '' }}" href="/events"
              >Kegiatan
            </a>
          </li>
          <li><a class="nav-link scrollto" href="#">Galeri</a></li>
          <li><a class="nav-link scrollto" href="#">Shop</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
      <!-- .navbar -->
    </div>
  </header>