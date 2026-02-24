<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>vysledok profilu</title>
</head>
<body>
    <p>meno: {{ $data['name'] }}</p>
    <p>email: {{ $data['email'] }}</p>
    <p>vek: {{ $data['age'] }}</p>
    <p>rola: {{ $additional_data['roleLabel'] }}</p>
    <p>plnoletost: {{ $additional_data['isAdult'] }}</p>
    <p>zrucnost ({{ $additional_data['skillsCount'] }}):</p>
    @if ($additional_data['skillsCount'] === 0)
        <p>ziadne zrucnosti neboli zadane.</p>
    @else
        <ul>
            @foreach ($data['skills'] as $skill)
                <li>{{ $skill }}</li>
            @endforeach
        </ul>
    @endif
    <a href="/profile/create">spat</a>
</body>
</html>