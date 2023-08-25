<!doctype html>
<html class="h-100" lang="en">

@yield('contents')

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="description" content="A growing collection of ready to use components for the CSS framework Bootstrap 5">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">
  <meta name="author" content="Holger Koenemann">
  <meta name="generator" content="Eleventy v2.0.0">
  <meta name="HandheldFriendly" content="true">
  <title>IESP</title>
  <link rel="stylesheet" href="css/theme.min.css">

  <style>
    /* inter-300 - latin */
    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 300;
      font-display: swap;
      src: local(''),
        url('./fonts/inter-v12-latin-300.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('./fonts/inter-v12-latin-300.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 500;
      font-display: swap;
      src: local(''),
        url('./fonts/inter-v12-latin-500.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('./fonts/inter-v12-latin-500.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }

    @font-face {
      font-family: 'Inter';
      font-style: normal;
      font-weight: 700;
      font-display: swap;
      src: local(''),
        url('./fonts/inter-v12-latin-700.woff2') format('woff2'),
        /* Chrome 26+, Opera 23+, Firefox 39+ */
        url('./fonts/inter-v12-latin-700.woff') format('woff');
      /* Chrome 6+, Firefox 3.6+, IE 9+, Safari 5.1+ */
    }
  </style>

</head>

<body data-bs-spy="scroll" data-bs-target="#navScroll">

  <nav id="navScroll" class="navbar navbar-expand-lg navbar-light fixed-top" tabindex="0">
    <div class="container">
      <a class="navbar-brand pe-4 fs-4" href="/">
        <img src = "img/webp/toothe.webp" width="32" height="32" fill="currentColor" class="bi bi-layers-half" viewbox="0 0 16 16">
        <span class="ms-1 fw-bolder">IESP</span>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/servicos" aria-label="Brings you to the frontpage">
              Serviços
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/quemsomos">
              Quem somos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/galeria">
              Galeria
            </a>
          </li>
        </ul>

        <a href="https://wa.me/5514996975055?text=Olá, vim do seu site. Gostaria de agendar uma consulta." target="blank" data-splitbee-event="Click Download" title="Enviar mensagem pelo WhatsApp" aria-label="Enviar mensagem pelo WhatsApp" class="link-dark pb-1 link-fancy me-2">
          AGENDE UMA CONSULTA
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"></path>
          </svg>
        </a>
      </div>
    </div>
  </nav>

  <main>

  </main>

  <footer>
    <div class="container small border-top">
      <div class="row py-5 d-flex justify-content-between">

        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
        <img src = "img/webp/toothe.webp" width="24" height="24" fill="currentColor" class="bi bi-layers-half"viewbox="0 0 16 16">
          <address class="text-secondary mt-3">
            <strong>IESP, Ltda.</strong><br>
            R. Duque de Caxias, O - 276<br>
            Pederneiras, SP<br>
            <abbr title="Telefone">Tel:</abbr>
            (14) 3284-1427
          </address>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <h3 class="h6 mb-3">LINKS ÚTEIS</h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/servicos">Serviços</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/quemsomos">Quem Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/galeria">Galeria</a>
            </li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 border-end p-5">
          <h3 class="h6 mb-3">Serviços</h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" aria-current="page" href="#">Invisalign</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/servicos">Implantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/servicos">Clareamento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/servicos">Aparelhos em geral</a>
            </li>
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" href="/servicos">Cirurgias em geral</a>
            </li>
          </ul>
        </div>
        <div class="col-12 col-lg-6 col-xl-3 p-5">
          <h3 class="h6 mb-3">Subpages</h3>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link link-secondary ps-0" aria-current="page" href="404.html">404 System Page</a>
              <a class="nav-link link-secondary ps-0" aria-current="page" href="register.html">Register System Page</a>
              <a class="nav-link link-secondary ps-0" aria-current="page" href="content.html">Simple Text Content
                Page</a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container text-center py-3 small">© IESP. Instituto Especializado
    </div>
  </footer>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/aos.js"></script>
  <script>
    AOS.init({
      duration: 800, // values from 0 to 3000, with step 50ms
    });
  </script>

  <script>
    let scrollpos = window.scrollY;
    const header = document.querySelector(".navbar");
    const header_height = header.offsetHeight;

    const add_class_on_scroll = () => header.classList.add("scrolled", "shadow-sm");
    const remove_class_on_scroll = () => header.classList.remove("scrolled", "shadow-sm");

    window.addEventListener('scroll', function () {
      scrollpos = window.scrollY;

      if (scrollpos >= header_height) { add_class_on_scroll(); }
      else { remove_class_on_scroll(); }

      console.log(scrollpos);
    })
  </script>
  <script>
      const currentPath = window.location.pathname; // Get the current path

      // Select all navigation links
      const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

      // Loop through the links and add the "active" class if the link matches the current path
      navLinks.forEach(link => {
          if (link.getAttribute('href') === currentPath) {
              link.classList.add('active');
          }
      });
  </script>
</body>

</html>