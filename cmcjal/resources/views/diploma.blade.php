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
  body {
    font-family: helvetica !important;
    font-size: 10pt;
    width: 100%;
    height: 100%;

  }
  .overlay {
    z-index: -1;
    margin: 0 auto;
  }

  #content .user {
    position: absolute;
    top: 52%;
    left: 40%;
    font-size: 35px;
  }

  #content .event {
    position: absolute;
    top: 62%;
    left: 15%;
    font-size: 35px;
    font-style: italic;
  }
  </style>
  <body>
      <div class="overlay">
        <img src="http://cmcjal.org/assets/images/constancia-CMCJAL.jpg" alt="" width="1160" height="775" >
      </div>
      <div id="content">
        <p class="user">{{ $user->name . ' ' . $user->lastname }}</p>
        <p class="event">"{{ $event->title }}"</p>
      </div>
  </body>
</html>
