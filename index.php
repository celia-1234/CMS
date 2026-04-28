<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant:ital,wght@0,300..700;1,300..700&family=Gruppo&family=Italiana&family=Nixie+One&family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="./css/externo.css" />
    <link rel="stylesheet" href="./css/customForm.css" />
    <link rel="stylesheet" href="./css/style.css" />
    
    <?php
      if(($_SERVER['REQUEST_METHOD'] == 'POST')){
    ?>
    <style>
      /* Variables que pueden ser definidas por el cliente */
      :root{
        --colorPrincipal: <?= $_POST['color-principal']?>;
        --colorSecundario: <?= $_POST['color-contraste']?>;
        --colorFondo: <?= ($_POST['modo-fondo'] == 'claro') ? $_POST['color-fondo'] : '#414553'?>;

        --colorTextos: <?= ($_POST['modo-fondo'] == 'claro') ? 'black' : 'white'?>;

        --fuenteBody2: <?php
            echo (isset($_POST['fuente-parrafos']))
              ? match($_POST['fuente-parrafos']){
                  "poiret" => '"Poiret One", sans-serif',
                  "times" => '"Times New Roman, Times, serif"',
                  "verdana" => 'Verdana, Geneva, Tahoma, sans-serif',
                  "gruppo" => '"Gruppo", sans-serif'
                }
              : '"Poiret One", sans-serif' ?>;
      }

      /* Colores de textos */
      h1, h1, h3, h3, p, a, nav a, table *{
        color: var(--colorTextos);
      }

    </style>

    <script src="./js/btnTop.js" type="text/javascript" defer></script>

    <?php
    }
      // *********** SUBIDA DE ARCHIVO PARA LOGO Y FAVICON ***************
    if (!empty($_FILES['logo_sitio']) && $_FILES['logo_sitio']['error'] === 0){
      $nombre_img = $_FILES['logo_sitio']['name'];
      $ruta_temp = $_FILES['logo_sitio']['tmp_name'];
      $ruta_img = "./media/".$nombre_img;
      move_uploaded_file($ruta_temp, $ruta_img);
    }

    // else if (empty($_FILES['logo_sitio'])){
    else {
      $ruta_img = "./media/archivo_no_encontrado.png";
    }
      
      // *********** CONFIGURACIÓN DE LA PESTAÑA DEL NAVEGADOR: FAVICON Y TITLE ***************
    ?>
    <title>
    <?php 
      if (isset($_POST['nombre_sitio'])){

        if (!empty($_POST['nombre_sitio'])){
          echo $_POST['nombre_sitio'];
        }

        else{
          echo "Mi sitio web";
        }
      }

      else{
        echo "Configura tu sitio web";
      }
      
    ?>
    </title>

    <?php

  if(($_SERVER['REQUEST_METHOD'] == 'POST')){
  ?>
    <link rel="icon" type="image/x-icon" href="<?= $ruta_img ?>">
  <?php
    } else{
      // Defino la imagen por defecto que se usará como favicon, antes de que se envíe el formulario
  ?>
    <link rel="icon" type="image/x-icon" href="./media/img_configuracion.png">
  <?php
    }
  ?>
  </head>
  <body>

  <?php

    if(($_SERVER['REQUEST_METHOD'] == 'POST')){

  ?>

    <header>
      <img class="logo" src="<?= $ruta_img ?>" alt="Logo">
      <nav>
        <a class="loc" href="#">Inicio</a>
        <a href="#">Galería</a>
        <a href="#contacto">Contacto</a>
        <a href="#">Área privada</a>
      </nav>
    </header>

    <main>
      <button id="btnTop" title="Volver arriba">↑</button>

      <section class="hero">
        <?php 
        // Código para debug de lo que envía el formulario
        /*foreach($_POST as $campo => $valor){
           echo $campo." => ".$valor."<br>";
        }
         foreach($_FILES['logo_sitio'] as $campo => $valor){
           echo $campo." => ".$valor."<br>";
        }*/
        ?>

        <img src="<?= $_FILES['logo_sitio'] ? $ruta_img : ""; ?>" alt="Logo del sitio web" />
        <div class="cartel">
          <h1><?= (isset($_POST['nombre_sitio']) && !empty($_POST['nombre_sitio'])) ? $_POST['nombre_sitio'] : "Mi sitio web" ?></h1>
          <p>
            <?= (isset($_POST['descripcion']) && !empty($_POST['descripcion'])) ? $_POST['descripcion'] : "Descripción del sitio web" ?>
          </p>
      <?php
        if(isset($_POST['seccion_ga'])){
      ?>
          <a href="#recientes" class="btn-cta seccion_ga">Últimas adquisiciones</a>
      <?php } ?>

        </div>
      </section>

      <?php
        if(isset($_POST['seccion_qu'])){
      ?>
      <h2>Para quién está pensada esta galería</h2>
      <section class="quien">
        <div class="panel propietarios">
          <div>
            <h3>Propietarios</h3>
            <p>Rentabiliza tu colección y dales vida a tus obras</p>
            <hr />
            <p>Este espacio es para ti si:</p>

            <div class="caso_uso">
              <h4>Eres coleccionista</h4>
              <p>
                quieres que tu patrimonio genere rentabilidad en lugar de estar
                almacenado
              </p>
            </div>

            <div class="caso_uso">
              <h4>Eres artista emergente</h4>
              <p>
                quieres que tu patrimonio genere rentabilidad en lugar de estar
                almacenado
              </p>
            </div>

            <div class="caso_uso">
              <h4>Eres una institución</h4>
              <p>buscas optimizar fondos artísticos en desuso</p>
            </div>

            <div class="caso_uso">
              <h4>Eres heredero</h4>
              <p>
                tienes obras sin ubicación específica y buscas una gestión
                profesional y lucrativa
              </p>
            </div>
          </div>
          <a class="btn-cta" href="#">Quiero poner mis obras en valor</a>
        </div>

        <div class="panel clientes">
          <div>
            <h3>Arrendatarios</h3>
            <p>Accede al arte original sin las barreras de la propiedad.</p>
            <hr />
            <p>El alquiler es la solución para:</p>
            <div class="caso_uso">
              <h4>Salas de congresos</h4>
              <p>
                elige esas obras que darán un estilo sofisticado y acorde a cada
                evento
              </p>
            </div>
            <div class="caso_uso">
              <h4>Negocios de hostelería</h4>
              <p>
                gracias a estas obras de arte crearás un espacio único y
                diferente para cada ocasión
              </p>
            </div>
            <div class="caso_uso">
              <h4>Entornos de trabajo</h4>
              <p>
                oficinas y salas de reuniones que proyectan dinamismo y
                vanguardia
              </p>
            </div>
            <div class="caso_uso">
              <h4>Academias de arte</h4>
              <p>
                estas obras ayudarán a acercar las diferentes corrientes
                artísticas a los alumnos
              </p>
            </div>
          </div>
          <a class="btn-cta" href="#">Quiero explorar el catálogo</a>
        </div>
      </section>

      
      <?php 
        }

        if(isset($_POST['seccion_ma'])){
      ?>
      <h2>Manifiesto</h2>
      <section class="manifiesto">
        <div class="maniPunto">
          <div><p>01</p></div>
          <div>
            <h3>No decoramos, transformamos</h3>
            <p>
              Buscamos obras que desafíen, no que simplemente encajen.
              <span>Si una pieza no altera el espacio</span>, no pertenece a
              nuestra selección.
            </p>
          </div>
        </div>

        <div class="maniPunto">
          <div><p>02</p></div>
          <div>
            <h3>Dinamismo real</h3>
            <p>
              <span>La galería estática ha muerto</span>. Somos un movimiento
              híbrido: presencia física con agilidad digital. El arte debe fluir
              a la velocidad del coleccionista actual.
            </p>
          </div>
        </div>

        <div class="maniPunto">
          <div><p>03</p></div>
          <div>
            <h3>Filtro radical</h3>
            <p>
              Ignoramos las modas pasajeras. Solo apostamos por artistas con una
              voz sólida y una técnica impecable.
              <span>Calidad sobre tendencia</span>, siempre.
            </p>
          </div>
        </div>

        <div class="maniPunto">
          <div><p>04</p></div>
          <div>
            <h3>Transparencia</h3>
            <p>
              Somos el puente directo entre el creador y el coleccionista. Sin
              intermediarios innecesarios, sin opacidad. El mercado del arte
              debe ser honesto.
            </p>
          </div>
        </div>

        <div class="maniPunto">
          <div><p>05</p></div>
          <div>
            <h3>Vanguardia en marcha</h3>
            <p>
              El nombre es nuestra herencia; la innovación es nuestra práctica.
              Cabalgamos <span>hacia la siguiente evolución</span> del mercado
              del arte.
            </p>
          </div>
        </div>
      </section>

      <?php 
        }

        if(isset($_POST['seccion_fu'])){
      ?>      
      <h2>Cómo funciona</h2>
      <section class="funcionamiento">
        <div class="descripcion">
          <img src="./media/galeria.png" alt="Galería de obras pictóricas" />

          <div class="info">
            <p>
              Disponemos de un catálogo de obras cuidadosamente elegidas por su
              impacto visual y calidad artística, pero está en constante cambio.
            </p>
            <p>Cada obra estará disponible solo por un tiempo limitado: nuestra colección rota constantemente para garantizar la
              exclusividad.</p>
            <p>Si una pieza te apasiona, decídete
              pronto.</p>

            <table>
              <thead>
                <tr>
                  <th>Plan</th>
                  <th>Tiempo</th>
                  <th>Ideal para</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Flechazo</td>
                  <td>3 días</td>
                  <td>
                    Eventos, cenas especiales o producciones audiovisuales.
                  </td>
                </tr>
                <tr>
                  <td>Romance</td>
                  <td>7 días</td>
                  <td>
                    Disfrutar del impacto de una obra de vanguardia en tu hogar.
                  </td>
                </tr>
                <tr>
                  <td>Obsesión</td>
                  <td>15 días</td>
                  <td>
                    Una inmersión total antes de que la obra parta hacia su
                    próximo destino.
                  </td>
                </tr>
                <tr>
                  <td>Personalizado</td>
                  <td colspan="2">
                    Si tienes un proyecto especial y necesitas más tiempo,
                    podemos hablarlo.
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <img src="./media/kandinski.jpg" alt="Lámina de Vasili Kandinski" />
        </div>
      </section>


      <?php 
        }

        if(isset($_POST['seccion_ga'])){
      ?>
      <span id="recientes"></span>

      <h2>Últimas adquisiciones</h2>
      <section class="galeria_reciente">

        <div class="gal_izq">

          <div class="obra">
            <span class="etiqueta new">Recién llegado</span>
            <img src="./media/dibujo-joyas.png" alt="Estudio 1" />
            <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>80 €</td>
                  <td>112 €</td>
                  <td>190 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Estudio 1"</h4>
              <p>Friedrich Altman</p>
              <a class="btn-cta" href="./html/estudio1.html">Ver obra</a>

              <label class="container">
                <input type="checkbox" checked="checked" />
                <svg
                  class="save-regular"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"
                  ></path>
                </svg>
                <svg
                  class="save-solid"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                  ></path>
                </svg>
              </label>

            </div>
          </div>

          <div class="obra">
            <span class="etiqueta new">Recién llegado</span>
            <img src="./media/cuadro2.png" alt="Inercia" />
            <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>80 €</td>
                  <td>112 €</td>
                  <td>190 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Inercia"</h4>
              <p>Mireia Blanes</p>
              <a class="btn-cta" href="#">Ver obra</a>

              <label class="container">
                <input type="checkbox" checked="checked" />
                <svg
                  class="save-regular"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"
                  ></path>
                </svg>
                <svg
                  class="save-solid"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                  ></path>
                </svg>
              </label>

            </div>
          </div>

          <div class="obra">
            <img src="./media/cuadro3.png" alt="Paisaje" />
                        <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>60 €</td>
                  <td>84 €</td>
                  <td>142,50 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Paisaje"</h4>
              <p>Alisson Thorne</p>
              <a class="btn-cta" href="#">Ver obra</a>

              <label class="container">
                <input type="checkbox" checked="checked" />
                <svg
                  class="save-regular"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"
                  ></path>
                </svg>
                <svg
                  class="save-solid"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                  ></path>
                </svg>
              </label>
              
            </div>
          </div>

          <div class="obra">
            <img src="./media/cuadro4.png" alt="Fragmento de un martes" />
                        <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>75 €</td>
                  <td>105 €</td>
                  <td>178,50 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Fragmento de un martes"</h4>
              <p>Elara Koviç</p>
              <a class="btn-cta" href="#">Ver obra</a>
            </div>
          </div>

          <div class="obra">
            <img src="./media/duchamp.jpg" alt="Dibujo triste" />
                        <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>105 €</td>
                  <td>147 €</td>
                  <td>250 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Dibujo triste"</h4>
              <p>Marcel Duchamp</p>
              <a class="btn-cta" href="#">Ver obra</a>
            </div>
          </div>
        </div>

        <div class="gal_cen">

          <div class="obra">
            <span class="etiqueta ult3">Últimos 3 días</span>
            <img src="./media/homunculus.png" alt="Homunculus Loxodontus" />
            <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>300 €</td>
                  <td>420 €</td>
                  <td>714 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Homunculus Loxodontus"</h4>
              <p>Margret van Breevoort</p>
              <a class="btn-cta" href="./html/homunculus.html">Ver obra</a>

              <label class="container">
                <input type="checkbox" checked="checked" />
                <svg
                  class="save-regular"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"
                  ></path>
                </svg>
                <svg
                  class="save-solid"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                  ></path>
                </svg>
              </label>
              
            </div>
          </div>
          
          <div class="obra">
            <span class="etiqueta prox">Próximamente</span>
            <img src="./media/indra.jpg" alt="Los sueños de Indra" />
            <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>95 €</td>
                  <td>133 €</td>
                  <td>226,50 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Los sueños de Indra"</h4>
              <p>Antonio García Villarán</p>
              <a class="btn-cta" href="#">Ver obra</a>

              <label class="container">
                <input type="checkbox" checked="checked" />
                <svg
                  class="save-regular"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"
                  ></path>
                </svg>
                <svg
                  class="save-solid"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                  ></path>
                </svg>
              </label>
              
            </div>
          </div>
        </div>

        <div class="gal_der">
          <div class="obra">
            <img src="./media/blanco_polifonico.jpg" alt="Blanco polifónico" />
                        <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>200 €</td>
                  <td>280 €</td>
                  <td>476 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Blanco polifónico"</h4>
              <p>Paul Klee</p>
              <a class="btn-cta" href="#">Ver obra</a>

              <label class="container">
                <input type="checkbox" checked="checked" />
                <svg
                  class="save-regular"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"
                  ></path>
                </svg>
                <svg
                  class="save-solid"
                  xmlns="http://www.w3.org/2000/svg"
                  height="1em"
                  viewBox="0 0 384 512"
                >
                  <path
                    d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"
                  ></path>
                </svg>
              </label>
              
            </div>
          </div>

          
          <div class="obra">
            <img src="./media/kandinski.jpg" alt="Composición, de Kandinski" />
            <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>225 €</td>
                  <td>315 €</td>
                  <td>535,50 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Composición"</h4>
              <p>Vasili Kandinski</p>
              <a class="btn-cta" href="#">Ver obra</a>
            </div>
          </div>

          <div class="obra">
            <span class="etiqueta prox">Próximamente</span>
            <img src="./media/rothko.jpg" alt="Estudio rojo" />
                        <div class="precio">
              <table>
                <tr>
                  <th>3 días</th>
                  <th>7 días</th>
                  <th>15 días</th>
                </tr>
                <tr>
                  <td>55 €</td>
                  <td>77 €</td>
                  <td>140 €</td>
                </tr>
              </table>
            </div>
            <div class="info_obra">
              <h4>"Estudio rojo"</h4>
              <p>Rothko</p>
              <a class="btn-cta" href="#">Ver obra</a>
            </div>
          </div>

        </div>
      </section>

      <?php 
      }
      ?>       
    </main>

    <footer>
      
      <div class="pie_izq">
        
        <img src="<?= $_FILES['logo_sitio'] ? $ruta_img : ""; ?>" alt="logo">
        <p><span><?php isset($_POST['nombre_sitio']) ? $_POST['nombre_sitio'] : "Mi sitio web" ?></span></p>
        <div class="politicas">
          <a href="#">Política de cookies</a>
          <a href="#">Política de privacidad</a>
        </div>
      </div>
      
      <div class="social">
          <i class="fa-brands fa-instagram"></i>
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-tiktok"></i>
          <i class="fa-brands fa-youtube"></i>
        </div>

      <div class="pie_der">
        <h4 id="contacto">Formulario de contacto</h4>
        <div>

          <form action="#" method="post">

              <div class="campo_texto doble_campo">
                <div class="campo_texto">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" id="nombre" />
                </div>

                <div class="campo_texto">
                <label for="email">Email</label>
                <input
                  type="email"
                  name="email"
                  id="email"
                  placeholder="miemail@correo.com"
                />
              </div>
              </div>

              <div class="campo_texto">
                <label for="comentario">Cuéntanos lo que quieras</label>
                <textarea id="comentario" name="comentario" rows="4" cols="35"></textarea>
              </div>

              <div class="campo_texto btn_enviar">
                <div>
                  <input
                    type="checkbox"
                    name="newsletter"
                    id="newsletter"
                  />Quiero recibir noticias por email
                  <br />
                  <input type="checkbox" name="privacidad" id="privacidad" />He
                  leído y acepto la Política de privacidad
                </div>
                <input type="submit" class="btn-cta" value="Enviar solicitud" />
              </div>
              
          </form>
        </div>
      </div>
      
    </footer>

    
    <?php 
    }

    else {
    ?>

<form action="#" class="customForm" method="POST" enctype="multipart/form-data">

    
    <div class="seccion_form">
        <h3>Elige el contenido de tu página</h3>

        <div class="campo campo_contenido">
          <label for="nombre_sitio">Nombre de la web</label>
          <input type="text" name="nombre_sitio" id="nombre_sitio" placeholder="Mi web">
        </div>

        <div class="campo campo_contenido campo_textarea">
          <label for="descripcion">Descripción</label>
          <textarea name="descripcion" id="descripcion" rows="4" placeholder="Un breve texto que defina la web: Nos dedicamos a... / Somos..."></textarea>
        </div>

        <div class="campo campo_contenido">
          <label for="logo_sitio">Logo</label>
          <input type="file" name="logo_sitio" id="logo_sitio" hidden>
          <label for="logo_sitio" class="custom-file">Seleccionar archivo</label>
          <span id="file-name">Ningún archivo seleccionado</span>
        </div>

        <script>
          const inputFile = document.getElementById("logo_sitio");
          const fileName = document.getElementById("file-name");

          inputFile.addEventListener("change", () => {
              fileName.textContent = inputFile.files.length > 0
              ? inputFile.files[0].name
              : "Ningún archivo seleccionado";
          });
        </script>

        <div class="campo campo_contenido">
          <label for="secciones">Secciones de la web</label>
            <div id="contenido">
              <input type="checkbox" name="seccion_qu" value="seccion_qu" id="secciones">Para quién está pensada</input><br>
              <input type="checkbox" name="seccion_ma" value="seccion_ma">Manifiesto</input><br>
              <input type="checkbox" name="seccion_fu" value="seccion_fu">Cómo funciona</input><br>
              <input type="checkbox" name="seccion_ga" value="seccion_ga">Últimas adquisiciones</input><br>
            </div>
        </div>
    </div>


    <div class="seccion_form">
        <h3>Elige el estilo de tu página</h3>

        <div class="campo">
          <label for="color-principal">Color principal</label>
          <input type="color" name="color-principal" id="color-principal" value="#003153">
        </div>

        <div class="campo">
          <label for="color-contraste">Color de contraste</label>
          <input type="color" name="color-contraste" id="color-contraste" value="#c5a059">
        </div>

        <div class="campo">
          <label for="color-fondo">Color de fondo</label>
          <input type="color" name="color-fondo" id="color-fondo" value="#f5f5f7">
        </div>

        <div class="campo campo_fuente">
          <label for="fuente-parrafos">Fuente de párrafos</label>
          <select name="fuente-parrafos" id="fuente-parrafos">
            <option value="poiret">Poiret One</option>
            <option value="times">Times New Roman</option>
            <option value="verdana">Verdana</option>
            <option value="gruppo">Gruppo</option>
          </select>
        </div>

        <div class="campo">
          <label for="modo-fondo">Modo de la página</label>
          <div><input type="radio" name="modo-fondo" id="modo-fondo" value="claro" checked>Claro</div>
          <div><input type="radio" name="modo-fondo" id="modo-fondo" value="oscuro">Oscuro</div>
        </div>
    </div>


        <div class="campo campo_submit">
          <input type="submit" name="enviar" value="Aplicar configuración">
        </div>

</form>



    <?php
    }
    ?>
  </body>
</html>
