@extends('template.index')

@section('contents')

    <div class="w-100 overflow-hidden bg-gray-100" id="top">

      <div class="container position-relative">
        <div class="col-12 col-lg-8 mt-0 h-100 position-absolute top-0 end-0 bg-cover" data-aos="fade-left"
          style="background-image: url(img/webp/interior11.webp);">

        </div>
        <div class="row">

          <div class="col-lg-7 py-vh-6 position-relative" data-aos="fade-right">
            <h1 class="display-1 fw-bold mt-5">IESP voce tratado por especialistas!</h1>
            <p class="lead">To be honest, this is just a stupid placeholder text. We don´t know how to sell anything,
              not even lesser or slower as you.</p>
            <a href="https://wa.me/5514996975055?text=Olá, vim do seu site. Gostaria de agendar uma consulta." target="blank" class="btn btn-dark btn-xl shadow me-3 rounded-0 my-5">Agende uma consulta</a>
          </div>



        </div>
      </div>

    </div>

    <div class="py-vh-5 w-100 overflow-hidden" id="services">
      <div class="container">
        <div class="row d-flex justify-content-end">
          <div class="col-lg-8"' data-aos="fade-down">
            <h2 class="display-6">Okay, there are three really good reasons for us. There are no more than three, but we
              think three is a reasonable good number of good stuff.</h2>
          </div>
        </div>
        <div class="row d-flex align-items-center">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <span class="h5 fw-lighter">01.</span>
            <h3 class="py-5 border-top border-dark">We rented this fancy startup office in an old factory building.</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus culpa, voluptatibus ex itaque, sapiente a
              consequatur inventore beatae, ipsam debitis omnis consequuntur iste asperiores. Similique quisquam debitis
              corrupti deserunt, dolor.</p>
            <a href="/servicos" class="link-fancy">Veja mais
            </a>
          </div>

          <div class="col-md-6 col-lg-4 py-vh-2 pb-0" data-aos="fade-up" data-aos-delay="400">
            <span class="h5 fw-lighter">02.</span>
            <h3 class="py-5 border-top border-dark">We don´t know exactly what we are doing. But thats good because we
              can´t break something intentionally.</h3>
            <p>Lorem, ipsum dolor sit adipisicing elit. Minus culpa, voluptatibus ex itaque, sapiente a consequatur
              inventore beatae, ipsam debitis omnis consequuntur iste asperiores. Similique quisquam debitis corrupti
              deserunt, dolor.</p>
            <a href="/servicos" class="link-fancy">Veja mais
            </a>
          </div>

          <div class="col-md-6 col-lg-4 py-vh-6 pb-0" data-aos="fade-up" data-aos-delay="600">
            <span class="h5 fw-lighter">03.</span>
            <h3 class="py-5 border-top border-dark">There is no real number three reason. So please read again number
              one and two.</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minus culpa, voluptatibus ex itaque, sapiente a
              consequatur inventore beatae, ipsam debitis omnis consequuntur iste asperiores. Similique quisquam debitis
              corrupti deserunt, dolor.</p>
            <a href="/servicos" class="link-fancy">Veja mais
            </a>
          </div>
        </div>

      </div>
    </div>

    <div class="py-vh-4 bg-gray-100 w-100 overflow-hidden" id="aboutus">
      <div class="container">
      <div class="row d-flex justify-content-between align-items-center">
          <div class="col-lg-6">
            <div class="row gx-5 d-flex">
              <div class="col-md-11">
                <div class="shadow ratio ratio-16x9 rounded bg-cover bp-center align-self-end" data-aos="fade-right"
                  style="background-image: url(img/webp/people15.webp);--bs-aspect-ratio: 50%;">
                </div>
              </div>
              <div class="col-md-5 offset-md-1">
                <div class="shadow ratio ratio-1x1 rounded bg-cover mt-5 bp-center float-end" data-aos="fade-up"
                  style="background-image: url(img/webp/person7.webp);">
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-12 shadow ratio rounded bg-cover mt-5 bp-center" data-aos="fade-left"
                  style="background-image: url(img/webp/people4.webp);--bs-aspect-ratio: 150%;">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <h3 class="py-5 border-top border-dark" data-aos="fade-left">We did some interesting stuff in our field of
              work. For example we collect a lot of these free photos and use them on our website.</h3>
            <p data-aos="fade-left" data-aos-delay="200">Donec id elit non mi porta gravida at eget metus. Fusce
              dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet
              risus.
            </p>
            <p>
              <a href="/quemsomos" class="link-fancy link-dark" data-aos="fade-left" data-aos-delay="400">Veja mais
              </a>
            </p>
          </div>
        </div>

      </div>
    </div>

@endsection