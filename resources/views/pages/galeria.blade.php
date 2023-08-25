@extends('template.index')

@section('contents')

<div class="position-relative overflow-hidden w-100 bg-light" id="gallery">
      <div class="container-fluid">
          <div class="col-12">
            <div class="row vw-100 px-0 py-vh-5 d-flex align-items-center scrollx">
              <div class="col-md-2" data-aos="fade-up">
                <img src="img/webp/interior37.webp" class="rounded shadow img-fluid" alt="nice gallery image"
                  width="512" height="341">
                  <div class="row mt-4">
                        <div class="col">
                            <img src="img/webp/people23.webp" class="rounded shadow img-fluid" alt="bottom image"
                                width="512" height="341">
                        </div>
                </div>
              </div>

              <div class="col-md-2" data-aos="fade-up" data-aos-delay="200">
                <img src="img/webp/people1.webp" class="img-fluid rounded shadow" alt="nice gallery image" width="1164"
                  height="776">
                  
                  <div class="row mt-4">
                        <div class="col">
                        <img src="img/webp/interior37.webp" class="rounded shadow img-fluid" alt="nice gallery image"
                  width="512" height="341">
                        </div>
                </div>
              </div>

              <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <img src="img/webp/people2.webp" class="img-fluid rounded shadow" alt="nice gallery image" width="844"
                  height="1054">
              </div>

              <div class="col-md-3" data-aos="fade-up" data-aos-delay="600">
                <img src="img/webp/interior29.webp" class="img-fluid rounded shadow" alt="nice gallery image"
                  width="844" height="562">
              </div>
            </div>
          </div>
        </div>

    </div>

@endsection



