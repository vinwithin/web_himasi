@extends('guest/layout/index')
@section('content')
<main id="main">
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
          <div class="row">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
              <h2>Kegiatan</h2>
            </div>
            <div class="col-lg-10 entries">
              
              <article class="entry entry-single">
  
                <h2 class="entry-title">
                  <a href="blog-single.html">{{$kegiatan->title}}</a>
                </h2>
  
                <div class="entry-meta">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html">{{!$kegiatan->user->name ? "Ristek Himasi" : $kegiatan->user->name}}</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                  </ul>
                </div>
  
                <div class="entry-content">
                  {!!$kegiatan->body!!}
                </div>
  
                <div class="entry-footer">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>
  
                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div>
  
              </article><!-- End blog entry -->
              </div>
            </div>
        </div>
      </section>

    <section class="inner-page">

    </section>

  </main>
@endsection