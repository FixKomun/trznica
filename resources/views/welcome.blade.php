<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <title>WebTrznica</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
        <script>
          (function(){
            window.Laravel = {
              csrfToken: '{{ csrf_token() }}'
            };
          })();
        </script>
      
    </head>
   <body>
     <div id="app">
       @if (Auth::check())
         <App :user="{{ Auth::user() }}"></App>
       @else
       <App :user="false"></App>
       @endif       
     </div>
   </body>
<script src="{{ mix('js/app.js') }}"></script>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Niramit:wght@200;300;400;700&display=swap');
  </style> 
</html>
