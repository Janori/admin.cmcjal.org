@extends('layouts.template')

@section('content')
<!--======= BANNER =========-->
  <div class="dep-detail-page blog single-post">
      <div class="container">
          <div class="row">
              <div class="col-sm-9">

                  <!--======= Images =========-->
                  <div class="img-single">

                      <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 840px; height: 370px; overflow: hidden; visibility: hidden;">
                           Loading Screen -->
                          <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                              <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                              <div style="position:absolute;display:block;background:url('{{ asset('assets/img/loading.gif')}}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                          </div>

                          <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 840px; height: 370px; overflow: hidden;">
                              <div data-p="112.50" style="display: none;">
                                  <a href="#"><img data-u="image" src="{{ asset('assets/img/01.jpg') }}" /></a>
                                  <div data-u="caption" data-t="0" style="position: absolute; top: 338px; left: 0px; width: 350px; height: 30px; background-color: rgb(0, 0, 0); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">Sesión Ordinaria Noviembre</div>
                              </div>



                              <!--
                              <div data-b="0" data-p="112.50" style="display: none;">
                                  <a href="images/s&c/locales/crusoaki.JPG" target="_blank"><img data-u="image" src="img/cursotaller aki.jpg" /></a>
                                  <div data-u="caption" data-t="7" style="position: absolute; top: -50px; left: 30px; width: 350px; height: 30px; background-color: rgba(235,81,0,0.5); font-size: 20px; color: #ffffff; line-height: 30px; text-align: center;">play in and play out</div>
                              </div>-->




                          </div>
                          <!-- Bullet Navigator -->
                          <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
                              <div data-u="prototype" style="width:12px;height:12px;"></div>
                          </div>
                          <!-- Arrow Navigator -->
                          <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
                          <span data-u="arrowright" class="jssora02r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
                      </div>


                  </div>
              </div>

              <!--======= SIDE BAR =========
              <div class="col-sm-3">
                  <div class="side-bar">
                      <!--======= CALL US =========
                      <a href="registro.html"<div class="add-call">
                                      <img class="img-responsive" src="images/add-img.png" alt="">
                                      <div class="call">
                                          <p>Registrate para gozar de estos y muchos mas beneficios</p>
                                      </div>
                                  </div></a>
                  </div>
              </div>
              <!-- Side bar end -->
          </div>
      </div>
  </div>

<!--======= CONTENT =========-->
<div class="content">
  <!--======= WHY CHOOSE US =========-->
  <div id="why-choose">
    <div class="container">
      <div class="row">

        <!--Tittle-->
        <div class="tittle tittle-2">
          <h3>Mensaje del presidente</h3>
          <hr>
                      <p><b>"</b>“ El avance que en los últimos años ha mostrado el Colegio de Medicina Crítica de Jalisco A.C., es el resultado del trabajo cotidiano, comprometido y eficaz de todos y cada uno de los médicos intensivistas del estado de Jalisco y aún incluso de otros estados del país, que se han identificado con este esfuerzo por lograr la excelencia en la medicina crítica, generando una identidad propia, basada en el desarrollo profesional y académico, pero sobre todo como ejemplo de inclusión y unidad. El fruto de estos esfuerzos nos ha merecido el reconocimiento y respeto de nuestros pares en el país y otras latitudes, destacando entre otras cosas, el orden de nuestra estructura organizacional, que no ha sido tarea sencilla de lograr, pero que actualmente es sólida, y nos permite tener un marco sobre el cual podamos generar las estrategias y vínculos necesarios para desarrollar nuestros objetivos planteados a corto, mediano y largo plazo.

Los elementos de evidencia científica en la Medicina y en especial en la Medicina Crítica no son definitivos, más aún cada día vivimos la emergencia de nuevos paradigmas en los procesos de atención, diagnóstico y prevención de las entidades que aquejan a los pacientes ingresados a las unidades de cuidados intensivos, lo cual se transforma en un reto para todos nosotros.

Los integrantes de la Mesa Directiva estaremos atentos y comprometidos en cumplir cada objetivo planteado, además de mantener un diálogo permanente donde todas las propuestas son bienvenidas y puedan ser evaluadas. Solo me resta agradecer todo su apoyo, e invitarlos a sumarse a este proyecto del cual ustedes son la escencia. “




<b>"</b></p>
          <br>
          <p><b>Dr. Julio César Mijangos Méndez</b></p>
          <p>Presidente Colegio de Medicina Crítica de Jalisco A.C.

2016 - 2017</p>
        </div>
      </div>
    </div>
  </div>
  <!--======= TESTIMONILAS =========-->
<section id="prople-says">
<div class="overlay">
  <div class="container">

    <!--======= TITTLE =========-->
    <div class="tittle tittle-2 ">
      <h3>Redes sociales</h3>
    </div>
    <!--<div class="qou"> <i class="fa fa-quote-left"></i> <i class="fa fa-quote-right"></i> </div>-->
    <div class="testi">
    <!--Text Section-->
    <ul class="row">
      <li class="col-md-6">
        <h4>Twitter</h4>
        <p>
        <div class="twitter-feed">
          <a class="twitter-timeline" data-chrome="nofooter noborders" href="https://twitter.com/MedCrit_Jal" data-widget-id="648732761256099840">
          </a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
            </script>
            </div>
        </p>
      </li>
      <li class="col-md-6">
        <h4>Facebook</h4>
        <div class="fb-page" data-href="https://www.facebook.com/Colegio-de-Medicina-Critica-de-Jalisco-AC-114043575295415/" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="false" data-show-posts="true" data-tabs="timeline,events,messages"></div>
      </li>
    </ul>

    </div>
  </div>
</div>
</section>
<!--======= Contact Info =========-->
<section class="contact-info">
<div class="container">

  <!--Address-->
  <ul class="row">
    <li class="col-md-2">
      <a target="_blank" href="http://cmmcritica.org.mx/"><img src="{{ asset('assets/images/afiliados/cmmcritica.png') }}" class="img-responsive"></a>
    </li>

    <!--Hot line-->
    <li class="col-md-2">
      <a target="_blank" href="http://www.commec.org.mx/"><img src="{{ asset('assets/images/afiliados/commec.png') }}" class="img-responsive"></a>
    </li>

    <!--Email Contact-->
    <li class="col-md-2">
      <a target="_blank" href="http://www.fepimcti.org/"><img src="{{ asset('assets/images/afiliados/fepimcti.png') }}" class="img-responsive"></a>
    </li>

    <!--Website-->
    <li class="col-md-2">
      <a target="_blank" href="http://sgg.jalisco.gob.mx/acerca/areas-de-la-secretaria/direccion-profesiones"><img src="{{ asset('assets/images/afiliados/jaliscogob.png')}}" class="img-responsive"></a>
    </li>
    <li class="col-md-2">
      <a target="_blank" href="http://www.neurocriticalcare.org/"><img src="{{ asset('assets/images/afiliados/neurocriticalcare.png')}}" class="img-responsive"></a>
    </li>

    <!--Website-->
    <li class="col-md-2">
      <a target="_blank" href="http://www.sccm.org/"><img src="{{ asset('assets/images/afiliados/sccm.png') }}" class="img-responsive"></a>
    </li>

  </ul>
</div>
</section>
</div>

@endsection

@section('scripts')
  {{ Html::script(asset('assets/js/jssor.slider.mini.js')) }}
  <!-- use jssor.slider.debug.js instead for debug -->
  <script>
      jQuery(document).ready(function ($) {

          var jssor_1_SlideshowTransitions = [
            {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
            {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
          ];

          var jssor_1_options = {
            $AutoPlay: true,
            $SlideshowOptions: {
              $Class: $JssorSlideshowRunner$,
              $Transitions: jssor_1_SlideshowTransitions,
              $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
              $Class: $JssorArrowNavigator$
            },
            $BulletNavigatorOptions: {
              $Class: $JssorBulletNavigator$
            },
            $ThumbnailNavigatorOptions: {
              $Class: $JssorThumbnailNavigator$,
              $Cols: 1,
              $Align: 0,
              $NoDrag: true
            }
          };

          var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

          //responsive code begin
          //you can remove responsive code if you don't want the slider scales while window resizing
          function ScaleSlider() {
              var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
              if (refSize) {
                  refSize = Math.min(refSize, 840);
                  jssor_1_slider.$ScaleWidth(refSize);
              }
              else {
                  window.setTimeout(ScaleSlider, 30);
              }
          }
          ScaleSlider();
          $(window).bind("load", ScaleSlider);
          $(window).bind("resize", ScaleSlider);
          $(window).bind("orientationchange", ScaleSlider);
          //responsive code end
      });
  </script>
@endsection
