<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>prise de rendez vous</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
     <div id="app">
         <div class="container">
             <div class="row">
                 <div class="col-md-4">
                     <menu-component></menu-component>
                 </div>
                 <div class="col-md-8">
                     <router-view></router-view>
                 </div>
             </div>
         </div>
        <div>
            <footer-component></footer-component>
        </div>
     </div>
      <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
