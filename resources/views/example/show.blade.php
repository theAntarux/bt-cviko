<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>fibonacci</title>
</head>
<body>

    <h1>prvych {{ $n }} cisel fibonacciho postupnosti</h1>

    <ul>
        @foreach ($sequence as $index => $value)
            <li><strong>{{ $index + 1 }}.</strong> → {{ $value }}</li>
        @endforeach
    </ul>

    <p>
        <a href="/example/create">spat</a>  
    </p>

</body>
</html>