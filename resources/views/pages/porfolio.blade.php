@extends('layouts.master_home')
@section('home_content')


<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Portolio</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Portolio</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
      <div class="container">

        

        <div class="row portfolio-container" data-aos="fade-up">

          
        @foreach($images as $image)
          <div class="col-lg-4 col-md-6 portfolio-item filter-web">
            <img src="{{$image->image}}" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4>Web 3</h4>
              <p>Web</p>
              <a href="{{$image->image}}" data-gall="portfolioGallery" class="venobox preview-link" title="Web 3"><i class="bx bx-plus"></i></a>
              <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
            </div>
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Portfolio Section -->








@endsection