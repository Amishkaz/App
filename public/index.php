<?php include "api/functions.php";
if ($_SESSION['login'] == null){
    header("Location: ". "sign_in.html" );
}else if ((strcmp($_SESSION['login']['username'], 'ABC') == 0)){
    header("Location: ". "dashboard.php" );
}

?>
<!--Hi-->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Home</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">

      <script src="script.js"></script>


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .nav-link:hover{
        background-color: rgba(13, 110, 253, 0.6);
      }

    </style>

    
    <!-- Custom styles for this template -->
    <link href="res/css/sidebars.css" rel="stylesheet">
  </head>
  <body class="bg-dark text-white">

  <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="bootstrap" viewBox="0 0 118 94">
      <title>Bootstrap</title>
      <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
    </symbol>
    <symbol id="home" viewBox="0 0 16 16">
      <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z"/>
    </symbol>
    <symbol id="speedometer2" viewBox="0 0 16 16">
      <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
      <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
    </symbol>
    <symbol id="table" viewBox="0 0 16 16">
      <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z"/>
    </symbol>
    <symbol id="people-circle" viewBox="0 0 16 16">
      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
    </symbol>
    <symbol id="grid" viewBox="0 0 16 16">
      <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
    </symbol>
    <symbol id="collection" viewBox="0 0 16 16">
      <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
    </symbol>
    <symbol id="calendar3" viewBox="0 0 16 16">
      <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
      <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
    </symbol>
    <symbol id="chat-quote-fill" viewBox="0 0 16 16">
      <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM7.194 6.766a1.688 1.688 0 0 0-.227-.272 1.467 1.467 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 5.734 6C4.776 6 4 6.746 4 7.667c0 .92.776 1.666 1.734 1.666.343 0 .662-.095.931-.26-.137.389-.39.804-.81 1.22a.405.405 0 0 0 .011.59c.173.16.447.155.614-.01 1.334-1.329 1.37-2.758.941-3.706a2.461 2.461 0 0 0-.227-.4zM11 9.073c-.136.389-.39.804-.81 1.22a.405.405 0 0 0 .012.59c.172.16.446.155.613-.01 1.334-1.329 1.37-2.758.942-3.706a2.466 2.466 0 0 0-.228-.4 1.686 1.686 0 0 0-.227-.273 1.466 1.466 0 0 0-.469-.324l-.008-.004A1.785 1.785 0 0 0 10.07 6c-.957 0-1.734.746-1.734 1.667 0 .92.777 1.666 1.734 1.666.343 0 .662-.095.931-.26z"/>
    </symbol>
    <symbol id="cpu-fill" viewBox="0 0 16 16">
      <path d="M6.5 6a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
      <path d="M5.5.5a.5.5 0 0 0-1 0V2A2.5 2.5 0 0 0 2 4.5H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2v1H.5a.5.5 0 0 0 0 1H2A2.5 2.5 0 0 0 4.5 14v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14h1v1.5a.5.5 0 0 0 1 0V14a2.5 2.5 0 0 0 2.5-2.5h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14v-1h1.5a.5.5 0 0 0 0-1H14A2.5 2.5 0 0 0 11.5 2V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5a.5.5 0 0 0-1 0V2h-1V.5zm1 4.5h3A1.5 1.5 0 0 1 11 6.5v3A1.5 1.5 0 0 1 9.5 11h-3A1.5 1.5 0 0 1 5 9.5v-3A1.5 1.5 0 0 1 6.5 5z"/>
    </symbol>
    <symbol id="gear-fill" viewBox="0 0 16 16">
      <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
    </symbol>
    <symbol id="speedometer" viewBox="0 0 16 16">
      <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
      <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
    </symbol>
    <symbol id="toggles2" viewBox="0 0 16 16">
      <path d="M9.465 10H12a2 2 0 1 1 0 4H9.465c.34-.588.535-1.271.535-2 0-.729-.195-1.412-.535-2z"/>
      <path d="M6 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm0 1a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm.535-10a3.975 3.975 0 0 1-.409-1H4a1 1 0 0 1 0-2h2.126c.091-.355.23-.69.41-1H4a2 2 0 1 0 0 4h2.535z"/>
      <path d="M14 4a4 4 0 1 1-8 0 4 4 0 0 1 8 0z"/>
    </symbol>
    <symbol id="tools" viewBox="0 0 16 16">
      <path d="M1 0L0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/>
    </symbol>
    <symbol id="chevron-right" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
    </symbol>
    <symbol id="geo-fill" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
    </symbol>
  </svg>

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-4 col-sm-12 p-3">
        <a href="/public" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <img class="bi me-2" width="40" height="32" src="logo.png" />
          <span class="fs-4">Parking slot manager</span>
        </a>
        <hr>

        <ul class="nav nav-pills flex-column mb-auto sections">
          <li>
            <a href="#" class="nav-link text-white active">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
              Dashboard
            </a>
          </li>

          <li>
            <a href="#" class="nav-link text-white">
                <i class="fa fa-history me-2"></i>
              Parking history
            </a>
          </li>

          <li>
            <a href="#" class="nav-link text-white">
              <i class="fa fa-car me-2"></i>
              Vehicles
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
              Profile
            </a>
          </li>
          <li>
            <a href="#" class="nav-link text-white">
              <i class="fa fa-bell me-2"></i>
              Notifications
            </a>
          </li>
          <li>
            <a href="logout.php" class="nav-link text-white">
              <i class="fa fa-power-off me-2"></i>
              Logout
            </a>
          </li>

        </ul>
      </div>
      <div class="col-lg-9 col-md-8 col-sm-12 p-3 text-dark" style="background-color: rgb(244,244,244)">

        <div class="section-container">
          <h2 class="section-container-title">Dashboard</h2>
          <hr/>

        </div>
        <div class="section-container">
          <h2 class="section-container-title">PH</h2>
          <hr/>

          <table class="table table-hover align-middle">
            <thead class="fw-bold">
            <tr>
              <td>From</td>
              <td class="d-none d-lg-table-cell">To</td>
              <td>Slot</td>
              <td>Vehicle</td>
              <td class="d-none d-lg-table-cell">Company</td>
              <td></td>
            </tr>
            </thead>
            <tbody id="history-table">
            </tbody>
          </table>

        </div>
        <div class="section-container">
            <h2 class="section-container-title">Veh</h2>
            <hr/>
            <table class="table table-hover align-middle">
                <thead class="fw-bold">
                <tr>
                    <td>Number</td>
                    <td class="d-none d-lg-table-cell">Type</td>
                    <td>Employee</td>
                    <td class="d-none d-lg-table-cell">Company</td>
                    <td></td>
                </tr>
                </thead>
                <tbody id="vehicle-table">

                </tbody>
            </table>

            <button onclick="add_vehicle()" class="btn btn-outline-success float-end"><i class="fa fa-plus"></i></button>

        </div>
        <div class="section-container">
            <h2 class="section-container-title">Pr</h2>
            <hr/>
            <div class="select-option-pane">
                <div class="list-group list-group-horizontal p-1" style="font-size: 24px">
                    <a href="#" id="v" class="list-group-item list-group-item-action p-2 active" aria-current="true">
                        <i class="fa fa-info-circle"></i>&nbsp;Your details
                    </a>
                    <a href="#" id="e" class="list-group-item list-group-item-action p-2">
                        <i class="fa fa-pencil"></i>&nbsp;Update details
                    </a>
                    <a href="#" id="u" class="list-group-item list-group-item-action p-2">
                        <i class="fa fa-key"></i>&nbsp;Update password
                    </a>
                </div>
            </div>
            <div class="details-pane px-5">

                <div class="py-3"></div>

                <div id="view-details">
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Username:</label></div>
                        <div class="col-sm-9"><input id="v_username" class="form-control" type="text" value="<?php echo $_SESSION['login']['username']?>" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Full name:</label></div>
                        <div class="col-sm-9"><input id="v_full_name" class="form-control" type="text" value="<?php echo $_SESSION['login']['full_name'] ?>" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>


                    <div class="mb-3 row d-none">
                        <div class="col-sm-3"><label>NIC:</label></div>
                        <div class="col-sm-9"><input id="v_nic" class="form-control" type="text" value="12345678V" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Company:</label></div>
                        <div class="col-sm-9"><input id="v_company" class="form-control" type="text" value="<?php echo $_SESSION['login']['company'] ?>" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Email:</label></div>
                        <div class="col-sm-9"><input id="v_email" class="form-control" type="email" value="<?php echo $_SESSION['login']['email'] ?>" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>



                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Phone:</label></div>
                        <div class="col-sm-9"><input id="v_phone" class="form-control" type="tel" value="<?php echo $_SESSION['login']['phone'] ?>" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                </div>

                <div id="edit-details" style="display: none">
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Username:</label></div>
                        <div class="col-sm-9"><input disabled readonly id="e_username" class="form-control" type="text" value="<?php echo $_SESSION['login']['username'] ?>"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Full name:</label></div>
                        <div class="col-sm-9"><input id="e_full_name" class="form-control" type="text" value="<?php echo $_SESSION['login']['full_name'] ?>"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>


                    <div class="mb-3 row d-none">
                        <div class="col-sm-3"><label>NIC:</label></div>
                        <div class="col-sm-9"><input id="e_nic" class="form-control" type="text" value="12345678V" disabled></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Company:</label></div>
                        <div class="col-sm-9"><input id="e_company" class="form-control" type="text" value="<?php echo $_SESSION['login']['company'] ?>"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Email:</label></div>
                        <div class="col-sm-9"><input id="e_email" class="form-control" type="email" value="<?php echo $_SESSION['login']['email'] ?>"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Phone:</label></div>
                        <div class="col-sm-9"><input id="e_phone" class="form-control" type="tel" value="<?php echo $_SESSION['login']['phone'] ?>"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <button onclick="save_data()" class="btn btn-info float-end"><i class="fa fa-floppy-disk"></i> &nbsp;Save</button>
                        </div>
                    </div>


                </div>

                <div id="update-password" style="display: none">
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Old password:</label></div>
                        <div class="col-sm-9"><input id="c_pwd" class="form-control" type="password"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>New password:</label></div>
                        <div class="col-sm-9"><input id="n_pwd" class="form-control" type="password"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-3"><label>Confirm new password:</label></div>
                        <div class="col-sm-9"><input id="n_pwd_c" class="form-control" type="password"></div>
                        <div class="py-2"></div>
                        <hr>
                    </div>
                    <div class="mb-3 row">
                        <div class="col">
                            <button onclick="update_password()" class="btn btn-info float-end"><i class="fa fa-floppy-disk"></i> &nbsp;Update</button>
                        </div>
                    </div>

                </div>

            </div>

            <script>
                let list_ids = ['v', 'e', 'u'];
                let details_ids = ['view-details', 'edit-details', 'update-password'];

                for (let i = 0; i < list_ids.length; i++) {
                    let list_id = list_ids[i];
                    let details_id = details_ids[i];

                    let item = document.getElementById(list_id);
                    let details = document.getElementById(details_id);

                    item.onclick = function () {

                        //Deselect all
                        for (let j = 0; j < list_ids.length; j++) {
                            let list_id = list_ids[j];
                            let details_id = details_ids[j];

                            let item = document.getElementById(list_id);
                            let details = document.getElementById(details_id);
                            item.classList.remove("active");
                            details.style.display = "none";
                        }

                        item.classList.add("active");
                        details.style.display = "block";
                    }

                }

                function update_password() {
                    let op = "<?php echo $_SESSION['login']['password'] ?>";
                    let old = document.getElementById("c_pwd").value;
                    let new_ = document.getElementById("n_pwd").value;
                    let new_c = document.getElementById("n_pwd_c").value;

                    if (new_ !== new_c){
                        alert("Passwords should match!");
                        return;
                    }
                    if (old !== op){
                        alert("Invalid current password!");
                        return;
                    }

                    if (new_.length < 3){
                        alert("Invalid password length!");
                        return;
                    }

                    let data = {
                        password: new_
                    }

                    handle_post_request("update", "employee", data, "id=<?php echo $_SESSION['login']['id'] ?>", function () {
                        window.location.reload();
                    });

                }

                function save_data() {
                    let full_name = document.getElementById("e_full_name").value;
                    let company = document.getElementById("e_company").value;
                    let email = document.getElementById("e_email").value;
                    let phone = document.getElementById("e_phone").value;


                    let data = {
                        phone: phone,
                        email,
                        company,
                        full_name: full_name,
                    }

                    handle_post_request("update", "employee", data, "id=<?php echo $_SESSION['login']['id'] ?>", function () {
                        window.location.reload();
                    });
                }

            </script>

          </div>
        <div class="section-container">
          <h2 class="section-container-title">Al</h2>
          <hr/>
            <table class="table table-hover align-middle">
                <thead class="fw-bold">
                <tr>
                    <td>Time</td>
                    <td>To</td>
                    <td class="d-none d-lg-table-cell">Message</td>
                    <td></td>
                </tr>
                </thead>
                <tbody id="alert-table">

                </tbody>
            </table>

        </div>
        <div class="section-container"></div>




      </div>
    </div>
  </div>

  <script src="res/js/sidebars.js"></script>

  <div class="dialogs text-black">
      <div id="information_dialog" class="modal " tabindex="-1" style="z-index: 2000">
          <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title fw-bold">Information</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Okay</button>
                  </div>
              </div>
          </div>
      </div>
      <div id="confirmation_dialog" class="modal " tabindex="-1" style="z-index: 2001">
      <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title fw-bold">Confirm</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-outline-success">Okay</button>
          </div>
        </div>
      </div>
    </div>
      <div id="alert_dialog" class="modal " tabindex="-1" style="z-index: 2002">
          <div class="modal-dialog  modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title fw-bold">Alert</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <p>Modal body text goes here.</p>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Okay</button>
                  </div>
              </div>
          </div>
</div>

  </div>

<!--  <button type="button" class="btn btn-primary" onclick="show_confirmation('Hi', '<p>Test</p>', function() {alert('kk')}, ['Can', 'Ok'])">
    Confirm
  </button>
  <button type="button" class="btn btn-primary" onclick="show_alert('Hi', '<p>Test2</p>', function() {alert('alk')}, 'Ok')">
    Alert
  </button>
  <button type="button" class="btn btn-primary" onclick="show_information('Hi', '<p>Test2</p>','<p>Test2</p>', function() {alert('alk')})">
    Info
  </button>-->

  <script>

    const sections = document.getElementsByClassName("sections")[0].getElementsByTagName("a");
    const sections_container = document.getElementsByClassName("section-container");
    const sections_title = document.getElementsByClassName("section-container-title");

    for (let i = 0; i < sections.length; i++) {
      let section = sections.item(i);
      let container = sections_container.item(i);
      let title = sections_title.item(i);

      section.onclick = function () {
        unselect_sections();
        section.classList.add("active");
        title.innerHTML = section.innerText;
        container.style.display = "block";

      }
    }

    function unselect_sections(){
      for (let i = 0; i < sections.length; i++) {
        let section = sections.item(i);
        let container = sections_container.item(i);

        section.classList.remove("active");
        container.style.display = "none";
      }
    }


    <?php $sid = $_SESSION['login']['id']; ?>
    const employees = <?php echo json_encode(get_all('employee'))?>;
    const vehicles = <?php echo json_encode(get_all_query_full("SELECT * FROM vehicle WHERE employee=$sid"))?>;
    const all_vehicles = <?php echo json_encode(get_all_query_full("SELECT * FROM vehicle"))?>;
    const parkings = <?php
        echo json_encode(get_all_query_full("SELECT parking.id as id, vehicle, slot, `from`, `to`, number, employee, type FROM parking left join vehicle v on v.id = parking.vehicle WHERE employee=$sid"))?>;
    const slots = <?php echo json_encode(get_all('slot'))?>;
    const alerts = <?php echo json_encode(get_all_query_full("SELECT * FROM alert WHERE `to`=$sid"))?>;

    const occupied_slots = [];

    function index() {
        for (let i = 0; i < employees.length; i++) {
            let employee = employees[i];
            employee['vehicles'] = [];

            for (let j = 0; j < vehicles.length; j++) {
                let vehicle = vehicles[j];
                if (vehicle['employee'] === employee['id']){
                    employee['vehicles'].push(vehicle);
                    vehicle['employee'] = employee;
                }
            }


        }
        for (let i = 0; i < slots.length; i++) {
            let slot = slots[i];
            for (let j = 0; j < vehicles.length; j++) {
                let vehicle = vehicles[j];
                if (vehicle['id'] === slot['reserved']){
                    slot['vehicle'] = vehicle;
                    vehicle['slot'] = slot;
                }
            }


        }
        for (let i = 0; i < alerts.length; i++) {
            let alert = alerts[i];
            for (let j = 0; j < employees.length; j++) {
                let employee = employees[j];
                if (employee['id'] === alert['to']){
                    alert['to'] = employee;
                    alert['employee'] = employee;
                }
            }


        }
        for (let i = 0; i < parkings.length; i++) {
            let parking = parkings[i];
            for (let j = 0; j < vehicles.length; j++) {
                let vehicle = vehicles[j];
                if (vehicle['id'] === parking['vehicle']){
                    parking['vehicle'] = vehicle;
                }
            }
            for (let j = 0; j < slots.length; j++) {
                let slot = slots[j];
                if (slot['id'] === parking['slot']){
                    parking['slot'] = slot;
                }
            }

            if (parking['to'] == null && !occupied_slots.includes(parking['slot'])){
                occupied_slots.push(parking['slot'])
            }
        }
    }

    function setup() {

        function setup_employee() {
            let tbody = document.getElementById("employee-table");

            for (let i = 0; i < employees.length; i++) {
                let employee = employees[i];
                let tr = document.createElement("tr");
                const index = i;

                tr.innerHTML = `
              <td>${employee['full_name']}</td>
              <td class="d-none d-lg-table-cell" >${employee['company']}</td>
              <td>${employee['phone']}</td>
              <td>
                <button onclick="view_employee(${index})" class="btn btn-outline-info"><i class="fa fa-info"></i></button>
                <button onclick="delete_employee(${index})" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
              </td>
                `;

                tbody.appendChild(tr);

            }

        }
        function setup_vehicle() {
            let tbody = document.getElementById("vehicle-table");

            for (let i = 0; i < vehicles.length; i++) {
                let vehicle = vehicles[i];
                let tr = document.createElement("tr");
                const index = i;

                tr.innerHTML = `
                    <td>${vehicle['number']}</td>
                    <td class="d-none d-lg-table-cell">${vehicle['type']}</td>
                    <td>${vehicle['employee']['full_name']}</td>
                    <td class="d-none d-lg-table-cell">${vehicle['employee']['company']}</td>
                  <td>
                    <button onclick="view_vehicle(${index})" class="btn btn-outline-info"><i class="fa fa-info"></i></button>
                    <button onclick="delete_vehicle(${index})" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                  </td>
                `;

                tbody.appendChild(tr);

            }

        }
        function setup_slots() {
            let tbody = document.getElementById("slot-table");

            for (let i = 0; i < slots.length; i++) {
                let slot = slots[i];
                let tr = document.createElement("tr");
                const index = i;

                let vehicle = "-", company = "-", status = occupied_slots.includes(slot) ? "Occupied" : "Available";

                if (slot['vehicle'] != null){
                    vehicle = slot['vehicle']['number'];
                    company = slot['vehicle']['employee']['company'];
                }


                tr.innerHTML = `
                  <td>${slot['name']}</td>
                  <td>${vehicle}</td>
                  <td class="d-none d-lg-table-cell">${company}</td>
                  <td >${status}</td>
                  <td>
                    <button onclick="view_slot(${index})" class="btn btn-outline-info"><i class="fa fa-info"></i></button>
                    <button onclick="delete_slot(${index})" class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                  </td>
                `;

                tbody.appendChild(tr);

            }

        }
        function setup_history() {
            let tbody = document.getElementById("history-table");

            for (let i = 0; i < parkings.length; i++) {
                let parking = parkings[i];
                let tr = document.createElement("tr");
                const index = i;

                let vehicle = "-", company = "-";

                if (parking['vehicle'] != null){
                    vehicle = parking['vehicle']['number'];
                    company = parking['vehicle']['employee']['company'];
                }


                tr.innerHTML = `
                  <td>${parking['from']}</td>
                  <td class="d-none d-lg-table-cell">${parking['to'] == null ? "-" : parking['to']}</td>
                  <td>${parking['slot']['name']}</td>
                  <td>${vehicle}</td>
                  <td class="d-none d-lg-table-cell">${company}</td>

                  <td>
                    <button onclick="view_history(${index})" class="btn btn-outline-info"><i class="fa fa-info"></i></button>
                  </td>
                `;

                tbody.appendChild(tr);

            }

        }
        function setup_alerts() {
            let tbody = document.getElementById("alert-table");

            for (let i = 0; i < alerts.length; i++) {
                let alert = alerts[i];
                let tr = document.createElement("tr");
                const index = i;

                let company = "-", employee = "Admin";

                if (alert['employee'] != null){
                    employee = alert['employee']['full_name'];
                    company = alert['employee']['company'];
                }

                tr.innerHTML = `
                    <td>${alert['time']}</td>
                    <td>${employee}</td>
                    <td class="d-none d-lg-table-cell">${alert['message']}</td>

                  <td>
                    <button onclick="view_alert(${index})" class="btn btn-outline-info"><i class="fa fa-info"></i></button>
                  </td>
                `;

                tbody.appendChild(tr);

            }

        }



        try {setup_employee();}catch (e) {}
        try {setup_vehicle();}catch (e) {}
        try {setup_slots();}catch (e) {}
        try {setup_alerts();}catch (e) {}
        try {setup_history();}catch (e) {}

    }

    unselect_sections();
    index();
    setup();

    function view_history(index) {
        let parking = parkings[index];

        let vehicle = "", company = "", status = "Free", employee = "";

        vehicle = parking['vehicle']['number'];
        employee = parking['vehicle']['employee']['full_name'];
        company = parking['vehicle']['employee']['company'];

        let duration = "";
        try {
            duration = Date.parse(parking['to']) - Date.parse(parking['from']);
            duration = duration/60000;

            if (!isNaN(duration)) {
                if (duration < 60){
                    duration = (Math.round(duration * 100) / 100).toFixed(2) + " minutes";
                }else {
                    duration = (Math.round((duration * 100) /60) / 100).toFixed(2) + " hours";
                }
            }

        }catch (e) {}

        let body = `
                  <div class="">


                      <div class="mb-3">
                          <label class="form-label">Vehicle number</label>
                          <input class="form-control" type="text" disabled value="${vehicle}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Employee name</label>
                          <input class="form-control" type="text" disabled value="${employee}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Company</label>
                          <input class="form-control" type="text" disabled value="${company}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Parking slot</label>
                          <input class="form-control" type="text" disabled value="${parking['slot']['name']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">From</label>
                          <input class="form-control" type="text" disabled value="${parking['from']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">To</label>
                          <input class="form-control" type="text" disabled value="${parking['to']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Duration</label>
                          <input class="form-control" type="text" disabled value="${duration}">
                      </div>


                  </div>

        `;

        show_alert("Parking information", body, function () {} );
    }

    function view_employee(index) {
        let employee = employees[index];

        let vehicles = employee['vehicles'];
        if (vehicles.length === 0){
            vehicles = "Employee does not have any vehicles!";
        }
        else {
            let v = vehicles;
            vehicles = "";
            for (let i = 0; i < v.length; i++) {
                let a = v[i];
                vehicles += `
                      <div class="mb-3">
                          <input class="form-control" type="text" disabled value="${a['number']}">
                      </div>`
            }
        }

        let body = `
                <div class="row">
                  <div class="col-lg-6 col-md-12">

                      <div class="mb-3">
                          <label class="form-label">Username</label>
                          <input class="form-control" type="text" disabled value="${employee['username']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Full name</label>
                          <input class="form-control" type="text" disabled value="${employee['full_name']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Email</label>
                          <input class="form-control" type="text" disabled value="${employee['email']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Phone</label>
                          <input class="form-control" type="text" disabled value="${employee['phone']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Company</label>
                          <input class="form-control" type="text" disabled value="${employee['company']}">
                      </div>

                  </div>
                  <div class="col-lg-6 col-md-12">
                      <h3>Vehicles</h3>
                      <hr/>
                      ${vehicles}
                  </div>


                </div>

        `;
        let footer = `
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Okay</button>`;

        show_information(employee['full_name'] + "'s information", body, footer, function () {} );
    }
    function delete_employee(index) {

    }
    function view_vehicle(index) {
        let vehicle = vehicles[index];

        let vehicles_ = vehicle['employee']['vehicles'];
        if (vehicles_.length === 0){
            vehicles_ = "Employee does not have any vehicles!";
        }
        else {
            let v = vehicles;
            vehicles_ = "";
            for (let i = 0; i < v.length; i++) {
                let a = v[i];
                vehicles_ += `
                      <div class="mb-3">
                          <input class="form-control" type="text" disabled value="${a['number']}">
                      </div>`
            }
        }

        let slot_name = "";
        if (vehicle['slot'] !== undefined){
            slot_name = vehicle['slot']['name'];
        }

        let body = `
                <div class="row">
                  <div class="col-lg-6 col-md-12">

                      <div class="mb-3">
                          <label class="form-label">Vehicle number</label>
                          <input class="form-control" type="text" disabled value="${vehicle['number']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Employee name</label>
                          <input class="form-control" type="text" disabled value="${vehicle['employee']['full_name']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Phone</label>
                          <input class="form-control" type="text" disabled value="${vehicle['employee']['phone']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Company</label>
                          <input class="form-control" type="text" disabled value="${vehicle['employee']['company']}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Slot</label>
                          <input class="form-control" type="text" disabled value="${slot_name}">
                      </div>

                  </div>
                  <div class="col-lg-6 col-md-12">
                      <h3>All Vehicles</h3>
                      <hr/>
                      ${vehicles_}
                  </div>


                </div>

        `;
        let footer = `
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Okay</button>`;

        show_information(vehicle['number'] + "'s information", body, footer, function () {} );
    }
    function delete_vehicle(index) {
        show_confirmation("Are you sure?", "Do you want to delete this vehicle?",
            function () {handle_request("delete", "vehicle", {}, `id=${index}`, function () {window.location.reload();});},
            ["Cancel", "Delete"]
        );
    }
    function view_slot(index) {
        let slot = slots[index];

        let vehicle = "", company = "", status = "Free", employee = "";

        if (slot['vehicle'] != null){
            vehicle = slot['vehicle']['number'];
            employee = slot['vehicle']['employee']['full_name'];
            company = slot['vehicle']['employee']['company'];
        }
        let body = `
                <div class="row">
                  <div class="col-lg-6 col-md-12">

                      <div class="mb-3">
                          <label class="form-label">Slot</label>
                          <input class="form-control" type="text" disabled value="${slot['name']}">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Vehicle number</label>
                          <input class="form-control" type="text" disabled value="${vehicle}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Employee name</label>
                          <input class="form-control" type="text" disabled value="${employee}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Company</label>
                          <input class="form-control" type="text" disabled value="${company}">
                      </div>


                  </div>
                  <div class="col-lg-6 col-md-12">
                    </div>


                </div>

        `;
        let footer = `
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Okay</button>`;

        show_information(slot['number'] + "'s information", body, footer, function () {} );
    }
    function delete_slot(index) {

    }

    function view_alert(index) {
        let alert = alerts[index];

        let company = "-", employee = "Admin";

        if (alert['employee'] != null){
            company = alert['employee']['company'];
            employee = alert['employee']['full_name'];
        }

        let body = `
                <div">
                  <div class="">

                      <div class="mb-3">
                          <label class="form-label">Employee name</label>
                          <input class="form-control" type="text" disabled value="${employee}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Company</label>
                          <input class="form-control" type="text" disabled value="${company}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Message</label>
                          <textarea class="form-control" type="text" disabled ">${alert['message']}</textarea>
                      </div>

                  </div>

                </div>

        `;


        show_alert("Alert", body, function () {} );
    }
    function delete_alert(index) {}

    function add_slot() {
        let body = `
                <div class="row">
                  <div class="col-lg-6 col-md-12">

                       <div id="as_error" style="background-color: #f8778a"></div>

                      <div class="mb-3">
                          <label class="form-label">Slot</label>
                          <input id="as_slot" class="form-control" type="text" value="">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Vehicle number</label>
                          <div class="input-group">
                              <input  id="as_vehicle" class="form-control" type="text" value="">
                              <button class="input-group-text btn btn-outline-dark" onclick="search_vehicle_number()" "><i class="fa fa-search"></i></button>
                            </div>

                      </div>

                      <div class="mb-3">
                          <label class="form-label">Employee name</label>
                          <input id="as_employee" class="form-control" type="text" disabled value="">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Company</label>
                          <input id="as_company" class="form-control" type="text" disabled value="">
                      </div>


                  </div>
                  <div class="col-lg-6 col-md-12" id="as_extra"></div>


                </div>

        `;
        let footer = `
                        <button onclick="add_new_slot()" type="button" class="btn btn-outline-success" >Add</button>
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>`;

        show_information("Add new slot", body, footer, function () {} );
    }

    function add_vehicle() {
        let body = `
                       <div id="av_error" style="background-color: #f8778a"></div>

                      <div class="mb-3">
                          <label class="form-label">Vehicle type</label>
                          <input id="av_type" class="form-control" type="text" value="">
                      </div>

                      <div class="mb-3">
                          <label class="form-label">Vehicle number</label>
                          <div class="input-group">
                              <input  id="av_vehicle" class="form-control" type="text" value="">
<!--                              <button class="input-group-text btn btn-outline-dark" onclick="search_vehicle_number()" "><i class="fa fa-search"></i></button>-->
                            </div>

                      </div>

        `;

        show_confirmation("Add new vehicle", body, add_new_vehicle, ["Cancel", "Okay"], false);
    }

    function search_vehicle_number() {
        let slot_i = document.getElementById("as_slot");
        let error = document.getElementById("as_error");
        let vehicle_i = document.getElementById("as_vehicle");
        let employee_i = document.getElementById("as_employee");
        let company_i = document.getElementById("as_company");

        let slot_name = slot_i.value;
        let number = vehicle_i.value.replaceAll(" ", "");
        if (slot_name.length < 1){
            error.innerHTML = "<p class='p-2'>Empty slot: Slot name can not be empty!</p>";
            return;
        }

        for (let i = 0; i < slots.length; i++) {
            let slot = slots[i];
            if (slot['name'] === slot_name){
                error.innerHTML = "<p class='p-2'>Duplicate slot: Slot name already exists!</p>";
                return;
            }
        }

        if (number.length < 1){
            error.innerHTML = "<p class='p-2'>Empty vehicle number: Vehicle number can not be empty!</p>";
            return;
        }

        for (let i = 0; i < vehicles.length; i++) {
            let vehicle = vehicles[i];
            if (vehicle['number'].replaceAll(" ", "") === number){
                error.innerHTML = "";
                employee_i.value = vehicle['employee']['full_name'];
                company_i.value = vehicle['employee']['company'];
                return;
            }
        }

        error.innerHTML = "<p class='p-2'>Invalid vehicle number: Vehicle number does not exist!</p>";




    }
    function add_new_slot() {
        let slot_i = document.getElementById("as_slot");
        let error = document.getElementById("as_error");
        let vehicle_i = document.getElementById("as_vehicle");
        let employee_i = document.getElementById("as_employee");
        let company_i = document.getElementById("as_company");

        let slot_name = slot_i.value;
        let number = vehicle_i.value.replaceAll(" ", "");
        if (slot_name.length < 1){
            error.innerHTML = "<p class='p-2'>Empty slot: Slot name can not be empty!</p>";
            return;
        }

        for (let i = 0; i < slots.length; i++) {
            let slot = slots[i];
            if (slot['name'] === slot_name){
                error.innerHTML = "<p class='p-2'>Duplicate slot: Slot name already exists!</p>";
                return;
            }
        }

        if (number.length < 1){
            error.innerHTML = "";
            handle_post_request("add", "slot", {name:slot_name}, "", function () {
                window.location.reload();
            })
            return;
        }

        for (let i = 0; i < vehicles.length; i++) {
            let vehicle = vehicles[i];
            if (vehicle['number'].replaceAll(" ", "") === number){
                error.innerHTML = "";
                employee_i.value = vehicle['employee']['full_name'];
                company_i.value = vehicle['employee']['company'];

                handle_post_request("add", "slot", {name:slot_name, reserved:vehicle['id']}, "", function () {
                    window.location.reload();
                })

                return;
            }
        }

        error.innerHTML = "<p class='p-2'>Invalid vehicle number: Vehicle number does not exist!</p>";


    }
    function add_new_vehicle() {
        let type_i = document.getElementById("av_type");
        let error = document.getElementById("av_error");
        let vehicle_i = document.getElementById("av_vehicle");

        error.innerHTML = "";

        let type = type_i.value;
        let number = vehicle_i.value.replaceAll(" ", "");
        if (type.length < 1){
            error.innerHTML = "<p class='p-2'>Empty vehicle type: Vehicle type can not be empty!</p>";
            return;
        }

        if (number.length < 6){
            error.innerHTML = "<p class='p-2'>Invalid vehicle number: Vehicle number should at least have 6 characters!</p>";
            return;
        }

        for (let i = 0; i < all_vehicles.length; i++) {
            let vehicle = all_vehicles[i];
            if (vehicle['number'].replaceAll(" ", "") === number){
                error.innerHTML = "<p class='p-2'>Invalid vehicle number: Vehicle number already exist!</p>";
                return;
            }
        }

        let data = {
            number: number,
            type,
            employee: <?php echo $sid?>
        }

        handle_post_request("add", "vehicle", data, "", function () {
            window.location.reload();
        });



    }


    function fetch_notifications() {
        setInterval(function () {
            fetch_data("api/notifications_user.php?id=<?php echo $sid?>", function (data) {

                if (data.length > alerts.length){
                    let alert = data[alerts.length];
                    let m = `
                        <table class="table table-hover table-bordered">
                        <tbody>
                        <tr>
                        <td>Time</td>
                        <td>${alert['time']}</td>
                        </tr>
                        <tr>
                        <td>Message</td>
                        <td>${alert['message']}</td>
                        </tr>
                        </tbody>
                        </table>
                    `;
                    alerts.push(alert);
                    show_alert("New alert!", m, function () {
                        window.location.reload();
                    });
                }

            });

        }, 3000);
    }

    fetch_notifications();

  </script>

  <script>

    function show_confirmation(title, body_html, on_confirm, labels = ["Cancel", "Okay"], hide = true) {

      let element = document.getElementById("confirmation_dialog");
      element.getElementsByClassName("modal-title")[0].innerHTML = title;
      element.getElementsByClassName("modal-body")[0].innerHTML = body_html;
      element.getElementsByClassName("modal-footer")[0].getElementsByClassName("btn-outline-danger")[0].innerHTML = labels[0];
      element.getElementsByClassName("modal-footer")[0].getElementsByClassName("btn-outline-success")[0].innerHTML = labels[1];

      let modal = new bootstrap.Modal(element, {});

      element.getElementsByClassName("modal-footer")[0].getElementsByClassName("btn-outline-success")[0]
              .onclick = function () {
        on_confirm();
        if (hide) modal.hide();
      };


      modal.show();
    }
    function show_alert(title, body_html, on_cancel, label = "Okay") {

      let element = document.getElementById("alert_dialog");
      element.getElementsByClassName("modal-title")[0].innerHTML = title;
      element.getElementsByClassName("modal-body")[0].innerHTML = body_html;
      element.getElementsByClassName("modal-footer")[0].getElementsByClassName("btn-outline-dark")[0].innerHTML = label;

      let modal = new bootstrap.Modal(element, {});

      element.getElementsByClassName("modal-footer")[0].getElementsByClassName("btn-outline-dark")[0]
              .onclick = function () {
        modal.hide();
      };

      element.addEventListener("hidden.bs.modal", function (e) {
        on_cancel();
      });


      modal.show();
    }
    function show_information(title, body_html, footer_html, on_cancel ) {

      let element = document.getElementById("information_dialog");
      element.getElementsByClassName("modal-title")[0].innerHTML = title;
      element.getElementsByClassName("modal-body")[0].innerHTML = body_html;
      element.getElementsByClassName("modal-footer")[0].innerHTML = footer_html;

      let modal = new bootstrap.Modal(element, {});

      element.addEventListener("hidden.bs.modal", function (e) {
        on_cancel();
      });




      modal.show();
    }


  </script>

  </body>
</html>
