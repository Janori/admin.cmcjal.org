@extends('layouts.template')

@section('content')
  <!--======= CONTENT =========-->

              <div class="content fix-nav-space">



                  <!--======= SUB BANNER =========-->

                  <section class="sub-banner" data-stellar-background-ratio="0.5">

                      <div class="overlay">

                          <div class="container">

                              <h3>Contactános</h3>

                              <p>Mantente cerca</p>

                              <!--======= Breadcrumbs =========-->



                          </div>

                      </div>

                  </section>



                  <!--======= CONATCT =========-->

                  <div class="contact">

                      <div class="container">

                          <div class="row">

                              <div class="col-md-8">

                                  <h4>Dejanos tus comentarios</h4>



                                  <!--======= CONTACT FORM =========-->

                                  <div class="contact-form">







                                      <!--======= Success Msg =========-->

                                      <!--======= FORM  =========-->

                                      <div id="contact_message" class="success-msg"> <i class="fa fa-paper-plane-o"></i>Gracias, Tu mensaje ha sido enviado</div>

                                      <form role="form" action="{{ url('contacto/enviar') }}" id="contact_form" class="contact-form" method="post" onsubmit="return false;">
                                          {{ csrf_field() }}
                                          <ul class="row">

                                              <li class="col-sm-6">

                                                  <label>

                                                      nombre completo*

                                                      <input type="text" class="form-control" name="name" id="name" placeholder="">

                                                  </label>

                                              </li>

                                              <li class="col-sm-6">

                                                  <label>

                                                      E-mail *

                                                      <input type="text" class="form-control" name="email" id="email" placeholder="">

                                                  </label>

                                              </li>

                                              <li class="col-sm-6">

                                                  <label>

                                                      Telefono *

                                                      <input type="text" class="form-control" name="company" id="company" placeholder="">

                                                  </label>

                                              </li>

                                              <li class="col-sm-6">

                                                  <label>

                                                      Area

                                                      <input type="text" class="form-control" name="website" id="website" placeholder="">

                                                  </label>

                                              </li>

                                              <li class="col-sm-12">

                                                  <label>

                                                      MEnsaje

                                                      <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>

                                                  </label>

                                              </li>

                                              <li class="col-sm-12">

                                                  <button type="submit" value="submit" class="btn" id="btn_submit" onClick="proceed();">Enviar</button>

                                              </li>

                                          </ul>

                                      </form>



                                  </div>

                              </div>





                              <div class="col-md-4">

                                  <h4>Nuestros datos de contacto</h4>

                                  <!-- Timing -->

                                  <div class="timing">

                                      <p>Sierra nevada 910</p>

                                      <p>Centro Universitario de Ciencias de la Salud</p>

                                      <p>Independencia Oriente</p>

                                      <p>Guadalajara, JAL, México</p>

                                      <p>CP:44340</p>

                                      <p>Teléfono : (33) 36-41-87-81, (33) 36-80-55-94</p>

                                      <p>Movíl : (33) 39-46-71-76</p>

                                      <a href="mailto:contacto@cmcjal.org" target="_top">Enviar mail</a>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>





                  <!--======= GOOGLE MAP =========-->

                  <div id="map" class="g_map"></div>



                  <!--======= Contact Info =========-->

                  <section class="contact-info">

                      <div class="container">



                          <!--Address-->

                          <ul class="row">

                              <li class="col-md-3">

                                  <i class="ion-ios-location-outline"></i>

                                  <h5>Dirección</h5>

                                  <p> Sierra Nevada 910

                                      Independencia Oriente

                                      44340 Guadalajara, Jal.

                                  </p>

                              </li>



                              <!-- Hot line -->

                              <li class="col-md-3">

                                  <i class="ion-iphone"></i>

                                  <h5>Telefono</h5>

                                  <p>(33) 36-41-87-91</p>

                              </li>



                              <!--Email Contact-->

                              <li class="col-md-3">

                                  <i class="ion-ios-email-outline"></i>

                                  <h5>E-Mail</h5>

                                  <p>contacto@cmcjal.org</p>

                              </li>



                              <!--Website-->

                              <li class="col-md-3">

                                  <i class="ion-earth"></i>

                                  <h5>Sitio web</h5>

                                  <p>www.cmcjal.org</p>

                              </li>

                          </ul>

                      </div>

                  </section>

              </div>
@endsection

@section('scripts')
<script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=false'></script>
<script type="text/javascript">

/*==========  Map  ==========*/

var map;

function initialize_map() {

if ($('#map').length) {

    var myLatLng = new google.maps.LatLng(20.688226, -103.332865);

	var mapOptions = {

		zoom: 17,

		center: myLatLng,

		scrollwheel: false,

		panControl: false,

		zoomControl: true,

		scaleControl: false,

		mapTypeControl: false,

		streetViewControl: false

	};

	map = new google.maps.Map(document.getElementById('map'), mapOptions);

	var marker = new google.maps.Marker({

		position: myLatLng,

		map: map,

		tittle: 'Envato',

		icon: '{{ asset('assets/images/map-locator.png') }}'

	});

} else {

	return false;

}

}

google.maps.event.addDomListener(window, 'load', initialize_map);

        </script>
@endsection
