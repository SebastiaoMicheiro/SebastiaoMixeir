<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>
<body>
    <div class="base"> 
        <div class="formulario">
            <div class="titulo">
                <h2>login</h2>
                <h4>sistema de Recursos humanos</h4>
            </div>
            <form action="{{ route('login',)}}" method="post" enctype="">
            @csrf
            <div class=" form-group">
                <label for="">Email</label>
                <input type="email" class=" form-control" name="email"> 
            </div>
            <div class=" form-group">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
                <button type="submit">Entrar</button>
                
            </div>
            
            
        </div>
        
    </div>
</body>
</html>