@extends('layouts.template')

@section('content')
    {{-- {!! setlocale(LC_ALL, 'es_ES.UTF-8') !!} --}}
  <!--======= CONTENT =========-->

              <div class="content fix-nav-space">



                  <!--======= SUB BANNER =========-->

                  <section class="sub-banner" data-stellar-background-ratio="0.5">

                      <div class="overlay">

                          <div class="container">

                              <h3>{{ $title }}</h3>

                              <p>{{ $subtitle }}</p>



                              <!--======= Breadcrumbs =========-->

                              <ol class="breadcrumb">

                                  <li><a href="#">Sesiones y congresos</a></li>

                                  <li class="active">{{ ucfirst($title) }}</li>

                              </ol>

                          </div>

                      </div>

                  </section>



                  <!--======= Blog =========-->

                  <section class="blog blog-pages">
                      <div class="container">
                          <!--======= Blog POST =========-->
                          <ul>
                              @foreach($news as $i => $item)
                                  @if($i % 2 == 0)
                              <!-- Blog Post 1 -->
                              <li class="row">
                                  <!-- Post Image -->
                                  <div class="col-md-7 text-center">
                                      <a target="_blank" href="{{ $item->link }}">
                                          <div class="post-img">
                                              <img class="img-responsive" src="{{ asset('/cmcjal/storage/pictures/news/'. (isset($item->image) ? $item->image : 'default.png')) }}" alt="">
                                          </div>
                                      </a>
                                  </div>
                                  <!-- Post Text Sec -->
                                  <div class="col-md-5">
                                      <div class="text-section text-center">
                                          <a target="_blank" href="http://www.esicm.org/events/annual-congress">{{ $item->title }}</a> <span>Posteado por <strong>CMCJAL </strong> el <strong>{{ strftime('%A %d de %B del %G', strtotime($item->created_at)) }}</strong></span>
                                          <hr>
                                          <p>{!! trim($item->body) !!}</p>
                                          <a target="_blank" href="{{ $item->link }}" class="btn btn-1">Leer Más</a>
                                      </div>
                                  </div>
                              </li>
                            <!--======= Blog POST =========-->
                        @else
                          <!-- Blog Post 1 -->
                          <li class="row">
                              <!-- Post Text Sec -->
                              <div class="col-md-5">
                                  <div class="text-section text-center">
                                      <a target="_blank" href="{{ $item->link }}">{{ $item->title }}</a>  <span>Posteado por <strong>CMCJAL </strong> el <strong>{{ strftime('%A %d de %B del %G', strtotime($item->created_at)) }}</strong></span>
                                      <hr>
                                      <p>{!! trim($item->body) !!}</p>
                                      <a target="_blank" href="{{ $item->link }}" class="btn btn-1">Leer Más</a>
                                  </div>
                              </div>
                              <!-- Post Image -->
                              <div class="col-md-7 text-center">
                                  <a target="_blank" href="https://cme.jefferson.edu/content/IHS2016">
                                      <div class="post-img">
                                           <img class="img-responsive" src="{{ asset('/cmcjal/storage/pictures/news/'. (isset($item->image) ? $item->image : 'default.png')) }}" alt="">
                                      </div>
                                </a>
                            </div>
                        </li>
                    @endif
                        @endforeach
              </ul>

          </div>

    </section>
@endsection
