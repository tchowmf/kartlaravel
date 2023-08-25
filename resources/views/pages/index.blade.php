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
            <p class="lead">Onde a inovação e a excelência se encontram para criar sorrisos deslumbrantes e saudáveis! 
                Somos uma referência em odontologia, liderando os tratamentos ortodônticos e de implantes dentários.</p>
            <a href="https://wa.me/5514996975055?text=Olá, vim do seu site. Gostaria de agendar uma consulta." target="blank" class="btn btn-dark btn-xl shadow me-3 rounded-0 my-5">Agende uma consulta</a>
          </div>



        </div>
      </div>

    </div>

    <div class="py-vh-5 w-100 overflow-hidden" id="services">
      <div class="container">
        <div class="row d-flex justify-content-end">
          <div class="col-lg-8"' data-aos="fade-down">
            <h2 class="display-6">Bem-vindo a um mundo de confiança e autoexpressão através de um sorriso radiante! 
              Nossos serviços foram criados para atender às suas necessidades únicas e oferecer resultados que vão muito além das suas expectativas. 
              Explore um pouco do que temos a oferecer:</h2>
          </div>
        </div>
        <div class="row d-flex align-items-center">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <span class="h5 fw-lighter">Invisalign</span>
            <h3 class="py-5 border-top border-dark">Invisalign: Reimagine o Seu Sorriso, sem Limitações!</h3>
            <p>Você merece um sorriso alinhado e cativante, e o Invisalign é a chave para alcançar isso de maneira discreta e eficaz. 
              <br>Diga adeus aos tradicionais aparelhos metálicos e dê as boas-vindas a alinhadores transparentes e confortáveis. <br>Com Invisalign, 
              cada etapa do processo é um passo em direção à sua confiança renovada e a um sorriso que reflete a verdadeira você.<p>
            <a href="/servicos" class="link-fancy">Veja mais
            </a>
          </div>

          <div class="col-md-6 col-lg-4 py-vh-2 pb-0" data-aos="fade-up" data-aos-delay="400">
            <span class="h5 fw-lighter">Implantes</span>
            <h3 class="py-5 border-top border-dark">Implantes: Restaurando Sorrisos, Revivendo Confiança!</h3>
            <p>Quando se trata de recuperar um sorriso completo e saudável, nossos serviços de implantes dentários são inigualáveis. 
              Restauramos não apenas dentes, mas também a capacidade de saborear a vida plenamente. <br>Com tecnologia de ponta e expertise cirúrgica, 
              nossa equipe dedicada oferece soluções personalizadas para cada necessidade, para que você possa sorrir, mastigar e viver sem limitações.</p>
            <a href="/servicos" class="link-fancy">Veja mais
            </a>
          </div>

          <div class="col-md-6 col-lg-4 py-vh-6" data-aos="fade-up" data-aos-delay="600">
            <span class="h5 fw-lighter">Clareamento</span>
            <h3 class="py-5 border-top border-dark">Clareamento Dental: Ilumine o Seu Sorriso, Ilumine o Seu Dia!</h3>
            <p>Um sorriso brilhante é uma introdução memorável. <br>Com nossos serviços de clareamento dental, você pode remover anos de manchas e descolorações, 
              revelando um sorriso luminoso que projeta confiança e vitalidade. <br>Nossos métodos seguros e eficazes são projetados para 
              oferecer resultados visíveis e duradouros, para que você possa iluminar qualquer ambiente com seu sorriso radiante.</p>
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
          <span class="h5 fw-lighter">Quem somos?</span>
            <h3 class="py-5 border-top border-dark" data-aos="fade-left">Não somos apenas dentistas somos apaixonados, destinados a criar sorrisos que iluminam vidas. 
              Junte-se a nós e descubra como o IESP está moldando sorrisos. Sua jornada para um sorriso espetacular começa aqui!</h3>
            <p data-aos="fade-left" data-aos-delay="200">Ana Paula Marostica Ferreira<br>CRO: 48.556<br>Especialista em Ortodontia
            </p>
            <p data-aos="fade-left" data-aos-delay="400">Eduardo Wilson Ferreira<br>CRO: 50.489<br>Especialista em Periodontia</p>
            <p>
              <a href="/quemsomos" class="link-fancy link-dark" data-aos="fade-left" data-aos-delay="600">Veja mais
              </a>
            </p>
          </div>
        </div>

      </div>
    </div>

@endsection