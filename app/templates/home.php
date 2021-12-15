<?php ob_start() ?>
<main class="container">
  <div class="row">
    <div class="col col-sm-12 titulo text-center">
      <h2 class="display-4">Web Destinos</h2>
      <p class="lead">Compartimos el placer por viajar..</p>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="contP">
      <p>
        Conocer nuevos lugares, culturas, personas o lenguas, buscar inspiración, conocerse a si mismo, tener una buena historia que contar, etc. Hay muchos
        motivos para iniciar un viaje. En Web Destinos hallarás algunas sugerencias de dónde viajar y también encontrarás a más personas que hayan viajado
        y quieren compartir sus experiencias.
      </p>
    </div>
  </div>
  <div class="row h-100 justify-content-md-center align-items-center">
    <div class="anuncio"></div>
</div>
  <div class="Espana row">
    <div class="row">
      <h3>España</h3>
      <h4>¿Deseas conocer el país?</h4>
    </div>
      <a class="row homeLink" href="http://localhost/Proyecto/WebDestinos/web/index.php?ctl=grupos&grupo=Espana">
        <div clas="imgHome col col-sm-5 colmd-3">
        <img src="../Contenido/Espana/main.png" class="img-fluid" alt="...">
        </div>
        <div class="contenido col col-sm-7 col-md-5">
          
          <p>
            Uno de los destinos turísticos más famosos del mundo, y con razón. Ya sea por el paisaje, la gastronomía u ocio, España tiene una amplia gama de 
            lugares hermosos, especialidades culinarias y grandes servicios.
          </p>
        </div>
      </a>
  </div>

    <div class="Europa">
    <div class="row">
      <h3>Europa</h3>
      <h4>Un paso más allá</h4>
    </div>
      <a class="row homeLink" href="http://localhost/Proyecto/WebDestinos/web/index.php?ctl=grupos&grupo=Europa">
        <div clas="imgHome col col-sm-5 colmd-3">
          <img src="../Contenido/Europa/Europa.png" class="img-fluid" alt="...">
        </div>
        <div class="contenido col col-sm-7 col-md-5">
          <p>
          Europa es un continente que tiene infinidad de atractivos que merecen el viaje desde cualquier lado del mundo para poder visitar y disfrutar. Cada viajero tendrá sus propias razones para viajar a Europa.

          A algunos les atrae su historia, la multiplicidad de culturas en un mismo espacio, las bellezas naturales, la facilidad para el transporte, la amplia y variada oferta de alojamiento, la arquitectura, las playas, las compras. 
          </p>
        </div>
      </a>
    </div>

    <div class="Otros">
      <div class="row">
        <h3>Otros destinos</h3>
        <h4>Experiencias exóticas</h4>
      </div>
      <a class="row homeLink" href="http://localhost/Proyecto/WebDestinos/web/index.php?ctl=grupos&grupo=Otros">
        <div clas="imgHome col col-sm-5 colmd-3">
          <img src="../Contenido/Otros/main.jpg" class="img-fluid" alt="...">
        </div>
        <div class="contenido col col-sm-7 col-md-5">
            <p>
              Para aquellos que buscan más experiencias de las que brinda Europa o simplemente porque te apetece ir al extranjero aquí encontrarás varias sujerencias.
            </p>
        </div>
      </a>
    </div>
    
</main>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout2.php' ?>