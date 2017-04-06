<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Asistencia - {{ $user->name . ' ' . $user->lastname }} a {{ $event->title }}</title>
  </head>
  <style media="screen">
  @page {
    margin-top:0cm;
    margin-bottom:0;
    margin-left:0;
    margin-right:0;
    padding: 0;
  }

  @font-face {
    font-family: cocomat;
    src: url('{{ public_path() . 'fonts/Cocomat-Light.ttf'}}');
  }

  body {
    font-family: helvetica !important;
    font-size: 10pt;
    width: 100%;
    height: 100%;
    /*font-family: cocomat;*/
  }
  .overlay {
    z-index: -1;
    margin: 0 auto;
  }

  #content .user {
    position: absolute;
    top: 52%;
    left: 20%;
    font-size: 35px;
    width: 750px;
    text-align: center;
  }

  #content .event {
    position: absolute;
    top: 62%;
    left: 15%;
    font-size: 30px;
    width: 850px;
    text-align: center;
    font-style: italic;
  }

  #content .info {
      position: absolute;
      top: 70%;
      left: 15%;
      /*background: red;*/
      font-size: 35px;
      width: 850px;
      text-align: left;
      font-size: 20px;
  }

  #content .info span {
      font-style: italic;
  }
  </style>
  <body>
      <div class="overlay">
        <img src="http://cmcjal.org/assets/images/constancia-CMCJAL.jpg" alt="" width="1160" height="775" >
      </div>
      <div id="content">
        <p class="user">Dr. {{ $user->name . ' ' . $user->lastname }}</p>
        <p class="event">"{{ $event->title }}"</p>
        <p class="info">Impartida por: <span>{{ $event->speaker}}</span> el día <span>{{ date('d-m-Y', strtotime($event->start)) }}</span> en <span>{{ $event->place }}</span></p>
      </div>
  </body>
</html>
