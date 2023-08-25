@extends('template.index')

@section('contents')

<div class="position-relative overflow-hidden w-100 bg-light" id="gallery">
      <div class="container-fluid">
          <div class="col-12">
            <div class="row vw-100 px-0 py-vh-5 d-flex align-items-center scrollx">
              <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <img src="img/webp/people2.webp" class="img-fluid rounded shadow" alt="nice gallery image" width="844"
                  height="1054">
              </div>
                <div class="col-lg-4">
                    <span class="h5 fw-lighter">🦷 Dra. Ana Paula Marostica Ferreira</span>
                    <h3 class="py-5 border-top border-dark" data-aos="fade-left">Como especialistas em ortodontia, trazemos um toque artístico à ciência, 
                        moldando não apenas dentes, mas sorrisos que refletem personalidades. Nossa abordagem vai além do alinhamento dental; 
                        buscamos criar obras-primas estéticas que transbordam confiança.</h3>
                    <p data-aos="fade-left" data-aos-delay="200">Especialista em Ortodontia<br>CRO: 48.556
                    </p>
                </div>
            </div>
            <div class="row vw-100 px-0 py-vh-5 d-flex align-items-center scrollx">
              <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <img src="img/webp/people2.webp" class="img-fluid rounded shadow" alt="nice gallery image" width="844"
                  height="1054">
              </div>
                <div class="col-lg-4">
                <span class="h5 fw-lighter">🦷 Dr. Eduardo Wilson Ferreira</span>
                    <h3 class="py-5 border-top border-dark" data-aos="fade-left">No mundo da odontologia de precisão, eu lidero a revolução dos implantes dentários. 
                        Cada sorriso perdido é uma oportunidade de transformação. Com tecnologia de ponta e habilidade cirúrgica incomparável, devolvemos não apenas dentes, mas a alegria de viver.</h3>
                    <p data-aos="fade-left" data-aos-delay="200">Especialista em Periodontia<br>CRO: 50.489
                    </p>
                </div>
          </div>
        </div>

    </div>


@endsection
