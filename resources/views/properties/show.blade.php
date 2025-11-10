<!DOCTYPE html>
<html>
<head>
    <title>{{ $property->title }} - Atlantis</title>
</head>
<body>
    <h1>{{ $property->title }}</h1>
    <p>{{ $property->description }}</p>
    <p>Precio: ${{ number_format($property->price, 2) }}</p>
    <p>Ubicación: {{ $property->city }}, {{ $property->state }}</p>
</body>
</html>
