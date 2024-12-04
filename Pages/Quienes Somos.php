<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Coarsa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="/Estilos/EstiloPrincipal.css"/>
  </head>
  <body class="body">
    <!-- Contenedor principal con imagen de fondo y navegación -->
    <div class="banner">
      <div class="navbar">
        <img
          src="/Estilos/images/Logo coarsa SOLIDO.jpg"
          alt="Logo"
          class="logo"
          
        />

        <!-- Botón de hamburguesa -->
        <button class="hamburger" id="hamburger-btn">
          <div></div>
          <div></div>
          <div></div>
        </button>

        <!-- Menú de navegación -->
        <ul id="navbar-links">
          <li><a href="/Pages/Quienes Somos.php">Quiénes somos</a></li>
          <li><a href="/Pages/Vacantes.php">Trabaja con nosotros</a></li>
          <li><a href="/Pages/Log In.php">Ingresar</a></li>
        </ul>
      </div>
    </div>

    <main class="main">
      <br />
      <!-- Contenedor de quienes somos que debería aparecer debajo del principal -->
      <div class="section">
        <h1>¿Quiénes somos?</h1>
        <p>
          Coarsa S.A es una empresa distribuidora de productos masivos de marcas
          exclusivas, esto significa que la empresa solamente distribuye marcas
          que no sean competencia entre sí, comprometiéndose a lograr la más
          amplia cobertura y distribución de estas representaciones.
        </p>
      </div>
      <div class="content">
        <div class="values">
          <div class="section">
            <h2>Misión</h2>
            <p>
              Satisfacer al cliente brindando productos de calidad a un precio
              competitivo, con el mejor equipo humano a través de un trato
              personalizado con respeto y honradez.
            </p>
          </div>
          <img
            alt="Company logo with blue and yellow arrows"
            height="100"
            src="/Estilos/images/Logo Coarsa pequño PNG.png"
            width="100"
          />
          <div class="section">
            <h2>Visión</h2>
            <p>
              Consolidarse como una empresa líder en calidad, distribución y
              cobertura de productos de consumo masivo.
            </p>
          </div>
        </div>
      </div>
      <div class="section">
        <h2>Valores</h2>
        <p class="valuesP">
          Amor. <br />
          Trabajo en equipo. <br />
          Responsabilidad. <br />
          Honradez. <br />
          Lealtad y Respeto <br />
        </p>
        <br><br>
      </div>
      <!-- esturctura de la historia COARSA-->
      <div class="title">Nuestra historia</div>
      <div class="timeline-container">
        <button class="prev-btn">
            <img src="/Estilos/images/flecha adelante.png" alt="prev">
        </button>
        <div class="timeline">
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/1.png"
              width="200"
            />
            <div class="year">1999</div>
            <div class="description">
              Leonardo Arguedas junto a su esposa Kattya Alpizar fundan Distribudora Coarsa, la
              buena relación con sus socios comerciales impulsó el desarrollo de este proyecto
              que busca brindar un servicio de distribución exclusiva más enfocado y eficiente,
              acorde con las necesidades de las marcas.
              Coarsa inicia operaciones en la zona de Occidente de Costa Rica.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/2.png"
              width="200"
            />
            <div class="year">2004</div>
            <div class="description">
              Ante el cumplimiento de los objetivos establecidos y su compromiso Coarsa
              extiende sus operaciones al Pacífico Central.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/3.png"
              width="200"
            />
            <div class="year">2010</div>
            <div class="description">
              Se adquiere distribución en el área de Alajuela y Heredia.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/4.png"
              width="200"
            />
            <div class="year">2012</div>
            <div class="description">
              Se obtuvo el ingreso de nuevos proveedores y cuentas especiales.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Graph showing growth"
              height="150"
              src="/Estilos/images/5.png"
              width="200"
            />
            <div class="year">2014</div>
            <div class="description">
              Desarrollo de canal alternativo y de conveniencia.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Digital transformation image"
              height="150"
              src="/Estilos/images/6.png"
              width="200"
            />
            <div class="year">2016</div>
            <div class="description">
              Migración de sistema informático, cambiando el modelo de venta
              directa por sistema preventa, lo cual permitió agilizar los
              procesos, mejorando la eficiencia.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Map showing expansion to San José"
              height="150"
              src="/Estilos/images/7.png"
              width="200"
            />
            <div class="year">2018-2019</div>
            <div class="description">Expansión de distribución a San José.</div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/8.png"
              width="200"
            />
            <div class="year">2020</div>
            <div class="description">
              Eco-Proyectos
              -Instalación de paneles solares
              -Proceso de refinación de aceites para todos los camiones
              -Programa de Reciclaje
              -Instalación de orinales secos, sanitarios con aire, grifos reguladores
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/9.png"
              width="200"
            />
            <div class="year">2021</div>
            <div class="description">
              Renovacion de flotilla vehicular.
              Gestios de logística sistemaizada.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/10.png"
              width="200"
            />
            <div class="year">2022</div>
            <div class="description">
              Compra de Bodegas ubicadas en Escazú.
            </div>
          </div>
          <div class="timeline-item">
            <img
              alt="Handshake image"
              height="150"
              src="/Estilos/images/11.png"
              width="200"
            />
            <div class="year">2023-2024</div>
            <div class="description">
              Ampliación de Bodega Central y reomodelación de oficianas centrales
              Expansión de distribución a Cartago.
            </div>
          </div>
        </div>
        <button class="next-btn">
    <img src="/Estilos/images/flecha adelante.png" alt="next">
  </button>
      </div>
      </section>
      <br><br><br><br>
      <!--Marcas que distribuye la Empresa -->
      <br />
      <section class="product">
        <div class="brands-background">
            <h2 class="product-category">Nuestras Marcas</h2>
            <div class="container-product">
                <div class="row" id="imageRow">
                    <div class="circle">
                        <img src="/Estilos/Alimer/Logo Santa Cruz.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Alimer/LogoToños.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Alimer/Merjal.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Britt/Britt.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Britt/Leyenda.jpg" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Essity/Flen.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Essity/Leukoplast.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Essity/Nevax.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Essity/Saba.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Essity/Tena.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Essity/Tork.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Heinz/Heinz.jpg" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Heinz/Banquete.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Heinz/Kraft.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Jota&Ce/Aleve.jpg" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Jota&Ce/AlkaSeltzer.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Jota&Ce/Aspirina.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Jota&Ce/Dorival.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Jota&Ce/Panadol.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Jota&Ce/Sal Andrews.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Laica/Natuvia.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/M&M's.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Milky Way.jpg" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Pedigree.jpg" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Pro.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Skittles-Logo.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Snickers Logo 2.jpg" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Twix.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Whiskas.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Lucema/Wrigleys Extra.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Cheetos.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/chokis.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/crackets.png" alt=""></div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/DeTodito.png" alt=""></div>
                </div>

                <div class="row" id="imageRow">
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Doritos.png" alt="">
                    </div>
                     <div class="circle">
                        <img src="/Estilos/Pepsico/Fritos.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Gamesa.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/HoneyMonster.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Lays.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Munchies.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Pearl Milling.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/PopCorners.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Quaker.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Ruffles.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Smartfood.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Tortrix.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Tostitos.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Pepsico/Twix.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Air Wick.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Brasso.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Durex.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Enfamil.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Finish.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Harpic.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Lysol.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Mortein.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Nugget.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Sustagen.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Vanish.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Veet.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reckitt/Woolite.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reya/Aluminé.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reya/Bricapar.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reya/Don Chef.PNG" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reya/Empalux.png" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reya/Green.jpg" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Reya/LOWELL.jpg" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Zepol/Manzatin.JPG" alt="">
                    </div>
                    <div class="circle">
                        <img src="/Estilos/Zepol/Zepol.jpg" alt="">
                    </div>   
                </div>    
            </div>
        </div>
      </section>
      <section>
      <!--Mapa de cobertura de la empresa-->
      <div class="map-container">
        <br />
        <h1>Nuestra cobertura</h1>
        <img
          alt="Mapa de cobertura con marcadores de ubicación"
          height="600"
          src="/Estilos/images/mapa.png"
          width="800"
        />
        <div class="marker" style="top:40%; left: 45%">
          <div class="tooltip-text">Costa Rica, Alajuela</div>
        </div>
        <div class="marker" style="top:40%; left: 52%">
        <div class="tooltip-text">Costa Rica, Heredia</div>
        </div>
        <div class="marker" style="top:48%; left: 59%">
        <div class="tooltip-text">Costa Rica, Cartago</div>
        </div>
        <div class="marker" style="top:55%; left: 57%">
        <div class="tooltip-text">Costa Rica, San José</div>
        </div>
        <div class="marker" style="top:65%; left: 62%">
        <div class="tooltip-text">Costa Rica, Puntarenas</div>
        </div>
      </div>
      </section>

      <article>
      <div class="info-container">
    <h1>Información</h1>
    <p>Estamos ubicados en Alajuela, Heredia, Cartago, San Jose y Puntarenas.</p>
    </div>
      </article>
      <br><br><br><br>
      <!--Contacto de la empresa-->
      <footer class="footer">
        <div class="container">
          <div class="Logo">
            <img
              alt="Logo de Coarsa pequeño"
              src="/Estilos/images/Logo Coarsa pequño PNG.png"
              width="100"
              height="100"
            />
          </div>
          <div class="divider"></div>
          <div class="content">
            <h1>Contáctenos</h1>
            <p>
              <span> Teléfono: </span>
              +506 2447-1959
            </p>
            <p>
              <span> Correo electrónico: </span>
              servicioalcliente@coarsacr.com
            </p>
            <p>
              <span> Dirección: </span>
              <span class="address">
                100 metros oeste de la gasolinera Molina en San Juan de San
                Ramón, Alajuela.
              </span>
            </p>
            <p>
              <span> Horario de atención: </span>
              De lunes a viernes de 7 am a 5 pm.
            </p>
            <div class="social-icons">
              <a class="whatsapp" href="https://wa.me/87071162">
                <i class="fab fa-whatsapp">
                  <img src="/Estilos/images/brand-whatsapp.png" />
                </i>
              </a>
              <a class="linkedin" href="http://linkedin.com/company/coarsacr">
                <i class="fab fa-linkedin">
                  <img src="/Estilos/images/brand-linkedin.png" />
                </i>
              </a>
              <a
                class="instagram"
                href="https://www.instagram.com/coarsacr?igsh=MzhpYmZ5czNjam85"
              >
                <i class="fab fa-instagram">
                  <img src="/Estilos/images/brand-instagram.png" />
                </i>
              </a>
              <a
                class="facebook"
                href="https://www.facebook.com/coarsacr?mibextid=LQQJ4d"
              >
                <i class="fab fa-facebook">
                  <img src="/Estilos/images/brand-facebook.png" />
                </i>
              </a>
              <a
                class="google-maps"
                href="https://maps.app.goo.gl/7CQW6fjEwuvkbAmj6"
              >
                <i class="fas fa-map-marker-alt">
                  <img src="/Estilos/images/brand-google-maps.png" />
                </i>
              </a>
            </div>
          </div>
        </div>
      </footer>
    </main>

















    <script src="/Estilos/script.js"></script>
    <script src="/Estilos/hamburguer.js"></script>
    <script> 
 document.querySelector('.prev-btn').addEventListener('click', function() {
  const timeline = document.querySelector('.timeline');
  timeline.scrollBy({ left: -300, behavior: 'smooth' }); // Mover hacia la izquierda
});

document.querySelector('.next-btn').addEventListener('click', function() {
  const timeline = document.querySelector('.timeline');
  timeline.scrollBy({ left: 300, behavior: 'smooth' }); // Mover hacia la derecha
});

    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="/Estilos/cambio_de_imagen.js"></script>
  </body>
</html>
