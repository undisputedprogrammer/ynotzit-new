<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <h4>Message from {{$data['name']}}</h4>
    <h4>Contact</h4>
    <p>Email: {{$data['email']}}</p>
    <p>Country: {{$data['country']}}</p>
    <p>Phone: {{$data['phone']}}</p>
    <p>Company: {{$data['company']}}</p>
    {{-- <p>Company: {{$data['company']}}</p> --}}
    <h4>Message</h4>
    <p>{{$data['message']}}</p>
    {{-- <h4>Services required :</h4>
    @foreach ($data['services'] as $service)
        <p>{{$service}}</p>
    @endforeach --}}
    <a class="  mt-8 mx-auto text-center  text-blue-600 font-inter_medium" href="www.ynotzitsolutions.com">Visit site</a><br>

</body>
</html>
