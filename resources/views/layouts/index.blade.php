<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Estilos de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    @yield('js')
    <!-- Font-Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

    <!--CDN de iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>@yield('title') - SI Producto&Marca</title>
</head>

<body>
<div class="sidebar">
    <a  href="#"><i class="fa fa-home fa-fw" aria-hidden="true"></i> &nbsp;Inicio</a>
    <a href="/"><i class= "fas fa-glass-whiskey" aria-hidden="true"></i>&nbsp;Bebidas</a>

</div>
<style>
    body{
        background-color: #FFFFFF;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1600 800'%3E%3Cg stroke='%23000' stroke-width='66.7' stroke-opacity='0.05' %3E%3Ccircle fill='%23FFFFFF' cx='0' cy='0' r='1800'/%3E%3Ccircle fill='%23fef4f4' cx='0' cy='0' r='1700'/%3E%3Ccircle fill='%23fee9e9' cx='0' cy='0' r='1600'/%3E%3Ccircle fill='%23fddfde' cx='0' cy='0' r='1500'/%3E%3Ccircle fill='%23fbd4d4' cx='0' cy='0' r='1400'/%3E%3Ccircle fill='%23f9c9c9' cx='0' cy='0' r='1300'/%3E%3Ccircle fill='%23f8bfbe' cx='0' cy='0' r='1200'/%3E%3Ccircle fill='%23f5b4b4' cx='0' cy='0' r='1100'/%3E%3Ccircle fill='%23f3a9aa' cx='0' cy='0' r='1000'/%3E%3Ccircle fill='%23f09ea0' cx='0' cy='0' r='900'/%3E%3Ccircle fill='%23ed9496' cx='0' cy='0' r='800'/%3E%3Ccircle fill='%23ea898c' cx='0' cy='0' r='700'/%3E%3Ccircle fill='%23e67e82' cx='0' cy='0' r='600'/%3E%3Ccircle fill='%23e37278' cx='0' cy='0' r='500'/%3E%3Ccircle fill='%23df676f' cx='0' cy='0' r='400'/%3E%3Ccircle fill='%23db5b65' cx='0' cy='0' r='300'/%3E%3Ccircle fill='%23d74f5c' cx='0' cy='0' r='200'/%3E%3Ccircle fill='%23D24153' cx='0' cy='0' r='100'/%3E%3C/g%3E%3C/svg%3E");
        background-attachment: fixed;
        background-size: cover;
    }
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color:#fffbf3;
        overflow-x: hidden;
        padding-top: 18px;
    }
    /* Style sidebar links */
    .sidebar a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        font-size: 35px;
        color: gray;
        display: block;
    }
    /* Style links on mouse-over */
    .sidebar a:hover {
        color: #CD5C5C;
    }
    /* Style the main content */
    .main {
        margin-left: 160px; /* Same as the width of the sidenav */
        padding: 0px 10px;
    }
    /* Add media queries for small screens (when the height of the screen is less than 450px, add a smaller padding and font-size) */
    @media screen and (max-height: 450px) {
        .sidebar {padding-top: 15px;}
        .sidebar a {font-size: 18px;}
    }
</style>



<div class="container">
    @yield('content')
</div>
</body>
</html>
