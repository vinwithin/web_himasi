@extends('guest/layout/index')
@section('content')
<main id="main">
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-title" data-aos="fade-in" data-aos-delay="100">
                <h2>Berita HIMASI</h2>
            </div>
            <div class="row">
              
                <div class="col-lg-8 entries">
                  @foreach ($berita as $item)
                    <article class="entry">
                        <div class="entry-img">
                            <img src="/storage/media/berita/thumbnails/{{$item->image_berita}}" alt="" class="img-fluid">
                        </div>
                        <h2 class="entry-title">
                            <a href="single-berita.html">{{$item->title}}</a>
                        </h2>
                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">{{$item->user->name}}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-at"></i>{{$item->category_berita->name}}</li>
                            </ul>
                        </div>
                        <div class="entry-content">
                            <p>
                                {{$item->excerpt}}
                            </p>
                            <div class="read-more">
                                <a href="/news/{{$item->slug}}">Read More</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endforeach




                    <!-- End blog entry -->
                    <!-- START PAGINATAION -->
                    {{ $berita->links() }}
                    <!-- END PAGINATION -->
                </div><!-- End blog entries list -->

                <div class="col-lg-4">

                    <div class="sidebar">

                        <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            @foreach ($category_berita as $category)
                                
                           
                            <ul>
                                <!-- KATEGORI -->
                                <li><a href="#">{{$category->name}} <span>({{count($category->berita)}})</span></a></li>
                               
                                <!-- END KATEGORI -->
                            </ul>
                            @endforeach
                        </div><!-- End sidebar categories-->

                       

                        </div><!-- End sidebar recent posts-->
                    </div><!-- End sidebar -->
                </div><!-- End blog sidebar -->
            </div>

        </div>
    </section>

    <section class="inner-page">

    </section>

</main>
@endsection
