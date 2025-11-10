<!DOCTYPE html>
<html>
<head>
    <title>Propiedades - Atlantis</title>
</head>
<body>
    <h1>Listado de Propiedades</h1>
    <ul>
        @foreach ($properties as $property)
            <li>
                <a href="{{ route('properties.show', $property) }}">
                    {{ $property->title }} - ${{ number_format($property->price, 2) }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
