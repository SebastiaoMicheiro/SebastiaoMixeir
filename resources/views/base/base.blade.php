<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/master.css')}}">
</head>
<body>
    <div class="menu">
        <div class="logo">
            <h4>logotipo</h4>
        </div>
        <div class="users">
            <a href=""><i class="fa fa-user"></i></a>
            <a href=""><i class="fa fa-power-off"></i></a>
        </div>
    </div>
    <div class="corpo">
        <div class="menulateral">
            <ul>
                <li><a href="">Dashboard</a></li>  
                <li><a href="{{Route('usuario.index')}}">usuario</a></li>
                <li><a href="{{Route('funcionario')}}">funcionario</a></li>
                <li><a href="">Recrutamento</a></li>
                <li><a href="{{Route('ferias')}}">ferias</a></li>
                <li><a href="">salario</a></li>
                <li><a href="">Avaliçao</a></li>
                <li><a href="">faltas</a></li>
                <li><a href="">pagamento</a></li>
                <li><a href="">classificaçao</a></li>
            </ul>
        </div>

        <div class="conteudo">@yield('gestao') </div>
        
    </div>
    <div>
        <h1>rodape</h1>
    </div>
    <script src="{{asset('js/jquery.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script>
        $(function(){
            $('.alert').fadeOut(3000)
        })
    </script>

   </body>
</html>