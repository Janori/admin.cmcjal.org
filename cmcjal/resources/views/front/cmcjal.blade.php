@extends('layouts.template')

@section('content')
  <div class="content fix-nav-space">





                  <!--======= FOUNDER =========-->

                  <section id="founder">

                      <div class="container">

                          <div class="row">



                              <!--Tittle-->

                              <div class="col-lg-4 padding-r-80">

                                  <div class="tittle">

                                      <h2>Mesa Directiva</h2>

                                  </div>

                                  Secretario de Actas y Acuerdos: </br>Dr. Marlene Ruíz García</br>

                                  Seretario de Organización: </br>	Dr. Roberto C. Miranda Ackerman</br>

                                  Secretario de Conflictos: </br>	Dr. Sergio Monjaras Juárez</br>

                                  Secretario Académico: </br>	Dr. José Arnulfo López Pulgarin</br>

                                  Secretario de Eventos: </br>	Dra. Iris Xóchitl Ortíz Macias</br>

                                  Secretario de Relaciones Públicas: </br>	Dr. Carlos Raúl Sáenz Figueroa </br>

                                  Vocales: </br>

                                  	Dra. Carolina Magaña Macias</br>

                                  	Dra. Elsa Lorena Herrera</br>

                                  	Dr. Juan Jose Becerra Lara



                              </div>



                              <!--======= founder sliders =========-->

                              <div class="col-lg-8">

                                  <div class="founder-slide">



                                      <!-- Slider 1 -->

                                      <div class="slide">

                                          <img class="img-responsive" src="{{ asset('assets/images/founder-1.jpg') }}" alt="">

                                          <h4>Dr. Julio César Mijangos Méndez</h4>

                                          <p>Presidente</p>

                                      </div>



                                      <!-- Slider 2 -->

                                      <div class="slide">

                                          <img class="img-responsive" src="{{ asset('assets/images/founder-2.jpg') }}" alt="">

                                          <h4>Dr. Simon Leobardo Mercado Rivas</h4>

                                          <p>Vice-presidente</p>

                                      </div>



                                      <!-- Slider 3 -->

                                      <div class="slide">

                                          <img class="img-responsive" src="{{ asset('assets/images/founder-3.jpg') }}" alt="">

                                          <h4>Pedro Ramírez Barba</h4>

                                          <p>Secretario</p>

                                      </div>



                                      <!-- Slider 4 -->

                                      <div class="slide">

                                          <img class="img-responsive" src="{{ asset('assets/images/founder-2.jpg') }}" alt="">

                                          <h4>Ricardo Campos Cerda</h4>

                                          <p>Tesorero</p>

                                      </div>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </section>



                  <section class="doctor-team">

                      <div class="container">

                          <!--======= TITTLE =========-->

                          <div class="tittle">

                              <h2>Ex-Presidentes</h2>

                          </div>

                      </div>



                      <!--======= CONTAINER FUILD =========-->

                      <!--======= DOCTOR LIST =========-->

                      <div class="doctor-list">

                          <div class="container">



                              <!-- Soctor List Slider -->

                              <div class="doct-list-style">

                                  <div class="item"> <a href="#pop-open" class="link popup-vedio video-btn"><img class="img-responsive" src="{{ asset('assets/images/doc-img-1.jpg') }}" alt=""></a> </div>

                                  <div class="item"><a href="#pop-open-1" class="link popup-vedio video-btn"> <img class="img-responsive" src="{{ asset('assets/images/doc-img-2.jpg') }}" alt=""></a> </div>

                                  <div class="item"> <a href="#pop-open-2" class="link popup-vedio video-btn"><img class="img-responsive" src="{{ asset('assets/images/doc-img-3.jpg') }}" alt=""></a> </div>

                                  <div class="item"> <a href="#pop-open-3" class="link popup-vedio video-btn"><img class="img-responsive" src="{{ asset('assets/images/doc-img-4.jpg') }}" alt=""></a> </div>

                                  <div class="item"> <a href="#pop-open-4" class="link popup-vedio video-btn"><img class="img-responsive" src="{{ asset('assets/images/doc-img-5.jpg') }}" alt=""></a> </div>

                                  <div class="item"> <a href="#pop-open-5" class="link popup-vedio video-btn"><img class="img-responsive" src="{{ asset('assets/images/doc-img-6.jpg') }}" alt=""></a> </div>

                              </div>

                          </div>

                      </div>

                  </section>



                  <!--======= POPUP DOCTOR 0 =========-->

                  <div id="pop-open" class="zoom-anim-dialog mfp-hide pop-open-style">

                      <div class="pop_up">

                          <!-- Doctor Image -->

                          <div class="col-sm-6 no-padding"> <img class="img-responsive" src="{{ asset('assets/images/popup0.jpg') }}" alt=""> </div>

                          <div class="col-md-6 no-padding">

                              <div class="doctor-in">

                                  <h4>DR. FEDRICO CORONA JIMENEZ</h4>

                                  <span>PERIODO 2004-2005</span>

                                  <!-- Personal Info -->

                                  <div class="personal-info">

                                      <ul>

                                          <li class="col-sm-4"><strong>Education </strong></li>

                                          <li class="col-sm-8"> MD, OB/GYN </li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Experience </strong></li>

                                          <li class="col-sm-8">2 years</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Office </strong></li>

                                          <li class="col-sm-8">Office 12b, Hall A</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Work days </strong></li>

                                          <li class="col-sm-8">Monday, Friday, Sunday</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Email </strong></li>

                                          <li class="col-sm-8">janebutler@medikalclinic.com</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Trainning </strong></li>

                                          <li class="col-sm-8">

                                              Nam liber tempor cum soluta nobis eleif end option congue nihil impedo mingid quod mazim placerat facer <br>

                                              <br>

                                              Nulla vitae elit libero, a pharetra augue uris

                                              id Integer posuere erat

                                          </li>

                                      </ul>



                                      <!-- Social Icon -->

                                      <ul class="margin-t-20">

                                          <li class="col-sm-4"><strong class="t-10">Social info </strong></li>

                                          <li class="col-sm-8">

                                              <!-- Social Icons -->

                                              <ul class="social_icons">

                                                  <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>

                                                  <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>

                                                  <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>

                                                  <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>

                                                  <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>

                                              </ul>

                                          </li>

                                      </ul>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>



                  <!--======= POPUP DOCTOR 1 =========-->

                  <div id="pop-open-1" class="zoom-anim-dialog mfp-hide pop-open-style">

                      <div class="pop_up">

                          <!-- Doctor Image -->

                          <div class="col-sm-6 no-padding"> <img class="img-responsive" src="{{ asset('assets/images/popup1.jpg') }}" alt=""> </div>

                          <div class="col-md-6 no-padding">

                              <div class="doctor-in">

                                  <h4>DR. MIGUEL ANGEL SANCHEZ VERDUZCO</h4>

                                  <span>PERIODO 2006-2007</span>

                                  <!-- Personal Info -->

                                  <div class="personal-info">

                                      <ul>

                                          <li class="col-sm-4"><strong>Education </strong></li>

                                          <li class="col-sm-8"> MD, OB/GYN </li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Experience </strong></li>

                                          <li class="col-sm-8">2 years</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Office </strong></li>

                                          <li class="col-sm-8">Office 12b, Hall A</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Work days </strong></li>

                                          <li class="col-sm-8">Monday, Friday, Sunday</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Email </strong></li>

                                          <li class="col-sm-8">janebutler@medikalclinic.com</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Trainning </strong></li>

                                          <li class="col-sm-8">

                                              Nam liber tempor cum soluta nobis eleif end option congue nihil impedo mingid quod mazim placerat facer <br>

                                              <br>

                                              Nulla vitae elit libero, a pharetra augue uris

                                              id Integer posuere erat

                                          </li>

                                      </ul>



                                      <!-- Social Icon -->

                                      <ul class="margin-t-20">

                                          <li class="col-sm-4"><strong class="t-10">Social info </strong></li>

                                          <li class="col-sm-8">

                                              <!-- Social Icons -->

                                              <ul class="social_icons">

                                                  <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>

                                                  <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>

                                                  <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>

                                                  <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>

                                                  <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>

                                              </ul>

                                          </li>

                                      </ul>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>

                  <!--======= POPUP DOCTOR 2 =========-->

                  <div id="pop-open-2" class="zoom-anim-dialog mfp-hide pop-open-style">

                      <div class="pop_up">

                          <!-- Doctor Image -->

                          <div class="col-sm-6 no-padding"> <img class="img-responsive" src="{{ asset('assets/images/popup2.jpg') }}" alt=""> </div>

                          <div class="col-md-6 no-padding">

                              <div class="doctor-in">

                                  <h4>DR. SEGIO HUMBERTO LOPEZ ESTUPIÑAN</h4>

                                  <span>PERIODO 2008-2009</span>

                                  <!-- Personal Info -->

                                  <div class="personal-info">

                                      <ul>

                                          <li class="col-sm-4"><strong>Education </strong></li>

                                          <li class="col-sm-8"> MD, OB/GYN </li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Experience </strong></li>

                                          <li class="col-sm-8">2 years</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Office </strong></li>

                                          <li class="col-sm-8">Office 12b, Hall A</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Work days </strong></li>

                                          <li class="col-sm-8">Monday, Friday, Sunday</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Email </strong></li>

                                          <li class="col-sm-8">janebutler@medikalclinic.com</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Trainning </strong></li>

                                          <li class="col-sm-8">

                                              Nam liber tempor cum soluta nobis eleif end option congue nihil impedo mingid quod mazim placerat facer <br>

                                              <br>

                                              Nulla vitae elit libero, a pharetra augue uris

                                              id Integer posuere erat

                                          </li>

                                      </ul>



                                      <!-- Social Icon -->

                                      <ul class="margin-t-20">

                                          <li class="col-sm-4"><strong class="t-10">Social info </strong></li>

                                          <li class="col-sm-8">

                                              <!-- Social Icons -->

                                              <ul class="social_icons">

                                                  <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>

                                                  <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>

                                                  <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>

                                                  <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>

                                                  <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>

                                              </ul>

                                          </li>

                                      </ul>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>

                  <!--======= POPUP DOCTOR 3 =========-->

                  <div id="pop-open-3" class="zoom-anim-dialog mfp-hide pop-open-style">

                      <div class="pop_up">

                          <!-- Doctor Image -->

                          <div class="col-sm-6 no-padding"> <img class="img-responsive" src="{{ asset('assets/images/popup3.jpg') }}" alt=""> </div>

                          <div class="col-md-6 no-padding">

                              <div class="doctor-in">

                                  <h4>DR. CARLOS ALBERTO GUTIERREZ MARTINEZ</h4>

                                  <span>PERIODO 2010-2011</span>

                                  <!-- Personal Info -->

                                  <div class="personal-info">

                                      <ul>

                                          <li class="col-sm-4"><strong>Education </strong></li>

                                          <li class="col-sm-8"> MD, OB/GYN </li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Experience </strong></li>

                                          <li class="col-sm-8">2 years</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Office </strong></li>

                                          <li class="col-sm-8">Office 12b, Hall A</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Work days </strong></li>

                                          <li class="col-sm-8">Monday, Friday, Sunday</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Email </strong></li>

                                          <li class="col-sm-8">janebutler@medikalclinic.com</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Trainning </strong></li>

                                          <li class="col-sm-8">

                                              Nam liber tempor cum soluta nobis eleif end option congue nihil impedo mingid quod mazim placerat facer <br>

                                              <br>

                                              Nulla vitae elit libero, a pharetra augue uris

                                              id Integer posuere erat

                                          </li>

                                      </ul>



                                      <!-- Social Icon -->

                                      <ul class="margin-t-20">

                                          <li class="col-sm-4"><strong class="t-10">Social info </strong></li>

                                          <li class="col-sm-8">

                                              <!-- Social Icons -->

                                              <ul class="social_icons">

                                                  <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>

                                                  <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>

                                                  <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>

                                                  <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>

                                                  <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>

                                              </ul>

                                          </li>

                                      </ul>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>

                  <!--======= POPUP DOCTOR 4 =========-->

                  <div id="pop-open-4" class="zoom-anim-dialog mfp-hide pop-open-style">

                      <div class="pop_up">

                          <!-- Doctor Image -->

                          <div class="col-sm-6 no-padding"> <img class="img-responsive" src="{{ asset('assets/images/popup4.jpg') }}" alt=""> </div>

                          <div class="col-md-6 no-padding">

                              <div class="doctor-in">

                                  <h4>DR. JORGE RODRIGUEZ HINOJOSA</h4>

                                  <span>PERIODO 2012-2013</span>

                                  <!-- Personal Info -->

                                  <div class="personal-info">

                                      <ul>

                                          <li class="col-sm-4"><strong>Education </strong></li>

                                          <li class="col-sm-8"> MD, OB/GYN </li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Experience </strong></li>

                                          <li class="col-sm-8">2 years</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Office </strong></li>

                                          <li class="col-sm-8">Office 12b, Hall A</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Work days </strong></li>

                                          <li class="col-sm-8">Monday, Friday, Sunday</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Email </strong></li>

                                          <li class="col-sm-8">janebutler@medikalclinic.com</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Trainning </strong></li>

                                          <li class="col-sm-8">

                                              Nam liber tempor cum soluta nobis eleif end option congue nihil impedo mingid quod mazim placerat facer <br>

                                              <br>

                                              Nulla vitae elit libero, a pharetra augue uris

                                              id Integer posuere erat

                                          </li>

                                      </ul>



                                      <!-- Social Icon -->

                                      <ul class="margin-t-20">

                                          <li class="col-sm-4"><strong class="t-10">Social info </strong></li>

                                          <li class="col-sm-8">

                                              <!-- Social Icons -->

                                              <ul class="social_icons">

                                                  <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>

                                                  <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>

                                                  <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>

                                                  <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>

                                                  <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>

                                              </ul>

                                          </li>

                                      </ul>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>

                  <!--======= POPUP DOCTOR 5 =========-->

                  <div id="pop-open-5" class="zoom-anim-dialog mfp-hide pop-open-style">

                      <div class="pop_up">

                          <!-- Doctor Image -->

                          <div class="col-sm-6 no-padding"> <img class="img-responsive" src="{{ asset('assets/images/popup5.jpg') }}" alt=""> </div>

                          <div class="col-md-6 no-padding">

                              <div class="doctor-in">

                                  <h4>DR. CARLOS RAUL SAENZ FIGUEROA</h4>

                                  <span>PERIODO 2014-2015</span>

                                  <!-- Personal Info -->

                                  <div class="personal-info">

                                      <ul>

                                          <li class="col-sm-4"><strong>Education </strong></li>

                                          <li class="col-sm-8"> MD, OB/GYN </li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Experience </strong></li>

                                          <li class="col-sm-8">2 years</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Office </strong></li>

                                          <li class="col-sm-8">Office 12b, Hall A</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Work days </strong></li>

                                          <li class="col-sm-8">Monday, Friday, Sunday</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Email </strong></li>

                                          <li class="col-sm-8">janebutler@medikalclinic.com</li>

                                      </ul>

                                      <ul>

                                          <li class="col-sm-4"><strong>Trainning </strong></li>

                                          <li class="col-sm-8">

                                              Nam liber tempor cum soluta nobis eleif end option congue nihil impedo mingid quod mazim placerat facer <br>

                                              <br>

                                              Nulla vitae elit libero, a pharetra augue uris

                                              id Integer posuere erat

                                          </li>

                                      </ul>



                                      <!-- Social Icon -->

                                      <ul class="margin-t-20">

                                          <li class="col-sm-4"><strong class="t-10">Social info </strong></li>

                                          <li class="col-sm-8">

                                              <!-- Social Icons -->

                                              <ul class="social_icons">

                                                  <li class="facebook"><a href="#."><i class="fa fa-facebook"></i> </a></li>

                                                  <li class="twitter"><a href="#."><i class="fa fa-twitter"></i> </a></li>

                                                  <li class="linkedin"><a href="#."><i class="fa fa-linkedin"></i> </a></li>

                                                  <li class="googleplus"><a href="#."><i class="fa fa-google-plus"></i> </a></li>

                                                  <li class="skype"><a href="#."><i class="fa fa-skype"></i> </a></li>

                                              </ul>

                                          </li>

                                      </ul>

                                  </div>

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

                              </div>

                              <div class="testi">

                                  <div class="testi-slide">

                                      <div class="item">

                                          <h3>Misión</h3>

                                          <p>Somos una asociación civil con sentido social que agrupa a los Médicos Intensivistas de Jalisco, con el propósito de alcanzar la excelencia en la atención integral de los pacientes críticos.</p>

                                      </div>

                                      <div class="item">

                                          <h3>Visión</h3>

                                          <p>Ser una organización líder que sea reconocida a Nivel Nacional por sus vínculos sociales, calidad académica, Que proporcione respaldo moral, académico y personal a sus integrantes.</p>

                                      </div>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </section>

                  <!--======= ABOUT US =========-->

                  <div class="about-us">



                      <!--======= TIME LINE SECTION =========-->

                      <div class="time-line-sec">

                          <div class="container">

                              <div class="row">



                                  <!-- Text Section -->

                                  <div class="col-md-8">

                                      <h2>

                                          Conoce nuestra historia de <span>Compromiso</span> con los demas

                                      </h2>



                                      <!-- Timeline Start -->

                                      <ul class="time-line">



                                          <!-- 2009 -->

                                          <li class="row">

                                              <div class="col-xs-3 text-right">

                                                  <h3>2009</h3>

                                              </div>

                                              <div class="col-xs-9">

                                                  <h6>Nam liber tempor cum soluta nobis eleifend option</h6>

                                                  <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum sequitur mutationem consuetudium lectorum. </p>

                                              </div>

                                          </li>



                                          <!-- 2012 -->

                                          <li class="row">

                                              <div class="col-xs-3 text-right">

                                                  <h3>2012</h3>

                                              </div>

                                              <div class="col-xs-9">

                                                  <h6>Duis autem vel eum iriure dolor </h6>

                                                  <p>Eodem modo typi, qui nunc nobis videntur parum clariqui sequitur. </p>

                                              </div>

                                          </li>



                                          <!-- 2014 -->

                                          <li class="row">

                                              <div class="col-xs-3 text-right">

                                                  <h3>2014</h3>

                                              </div>

                                              <div class="col-xs-9">

                                                  <h6>Lobortis nisl ut aliquip </h6>

                                                  <p>Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius qui sequitur mutationem consuetudium lectorum. quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip.</p>

                                              </div>

                                          </li>



                                          <!-- 2015 -->

                                          <li class="row">

                                              <div class="col-xs-3 text-right">

                                                  <h3>2015</h3>

                                              </div>

                                              <div class="col-xs-9">

                                                  <h6>Velenit augue duis dolore </h6>

                                                  <p>Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Eodem modo typi  qui nunc nobis videntur parum clari, fiant sollemnes in futurum.qui sequitur mutationem consuetudium lectorum. </p>

                                              </div>

                                          </li>

                                      </ul>

                                  </div>

                              </div>

                          </div>

                      </div>

                  </div>

@endsection
