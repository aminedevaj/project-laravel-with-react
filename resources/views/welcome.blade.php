<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome to Laundry
Taghazout')</title>
    <link rel="icon" type="image/png" href="{{ asset('Image 2 (3).png') }}">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body class="bg-brand-black">

    @include('components.navbar')
     @include('components.whatpp')



    <main class="content">
        
    @include('components.section1')
    @include('components.section2')
    @include('components.section3')
    @include('components.section4') 
    @include('components.section5')
    @include('components.contact')


     
    </main>

    @include('components.footer')

    
    

</body>
</html>