@extends('layouts.template')

@section('content')
  <!--======= CONTENT =========-->

              <div class="content fix-nav-space">

                  <!--======= RECENT CASES =========-->

                  <section class="gallery-pages">

                      <div class="portfolio-wrapper">

                          <div class="container">



                              <!--======= FILTERS =========-->

                              <ul class="filter">

                                  <li><a class="active" href="#." data-filter="*">Mostrar Todo</a></li>

                                  <li><a href="#" data-filter=".dental">Sesiones</a></li>

                                  <li><a href="#" data-filter=".cardiology">Congresos</a></li>

                                  <li><a href="#" data-filter=".disabled">Cuidado intensivo</a></li>

                                  <li><a href="#" data-filter=".ophthalmology">Servicio</a></li>

                                  <li><a href="#" data-filter=".emergency">Estudios</a></li>

                              </ul>

                          </div>

                          <div class="container popup-gallery">



                              <!--======= GALLERY ROW =========-->

                              <ul class="items gallery-item row">



                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-4 item cardiology ophthalmology">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/gallery/Reconocimientos expedientes/01.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/gallery/Reconocimientos expedientes/01.jpg') }}" class="item-in">

                                                  <h5>Reconocimiento a expresidentes</h5>

                                                  <hr>

                                                  <p>

                                                      Entrega del reconocimiento a los expresidentes.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>





                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-4 item disabled emergency">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/img-2.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/img-2.jpg') }}" class="item-in">

                                                  <h5>Image Title Here</h5>

                                                  <hr>

                                                  <p>

                                                      Aspernatur aut odit aut fugit, sed quia

                                                      consequuntur magni dolores.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>



                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-4 item cardiology disabled ">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/img-3.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/img-3.jpg') }}" class="item-in">

                                                  <h5>Image Title Here</h5>

                                                  <hr>

                                                  <p>

                                                      Aspernatur aut odit aut fugit, sed quia

                                                      consequuntur magni dolores.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>



                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-8 item cardiology disabled ">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/img-4.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/img-4.jpg') }}" class="item-in pa-5">

                                                  <h5>Image Title Here</h5>

                                                  <hr>

                                                  <p>

                                                      Aspernatur aut odit aut fugit, sed quia

                                                      consequuntur magni dolores.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>



                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-4 item dental cardiology disabled ophthalmology">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/img-5.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/img-5.jpg') }}" class="item-in pa-40">

                                                  <h5>Image Title Here</h5>

                                                  <hr>

                                                  <p>

                                                      Aspernatur aut odit aut fugit, sed quia

                                                      consequuntur magni dolores.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>



                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-4 item disabled emergency">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/img-2.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/img-2.jpg') }}" class="item-in">

                                                  <h5>Image Title Here</h5>

                                                  <hr>

                                                  <p>

                                                      Aspernatur aut odit aut fugit, sed quia

                                                      consequuntur magni dolores.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>



                                  <!--======= GALLERY IMG 1 =========-->

                                  <li class="col-sm-4 item  cardiology emergency ">

                                      <section>

                                          <img class="img-responsive" src="{{ asset('assets/images/img-3.jpg') }}" alt="">

                                          <div class="item-over">

                                              <a href="{{ asset('assets/images/img-3.jpg') }}" class="item-in">

                                                  <h5>Image Title Here</h5>

                                                  <hr>

                                                  <p>

                                                      Aspernatur aut odit aut fugit, sed quia

                                                      consequuntur magni dolores.

                                                  </p>

                                              </a>

                                          </div>

                                      </section>

                                  </li>

                              </ul>

                          </div>

                      </div>

                  </section>

              </div>


@endsection
