<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>fibonacci</title>
</head>
<body>

    <h1>fibonacciho postupnost</h1>

    <form method="POST" action="/example/result">
        @csrf
        <input type="number" name="n" min="1" required>
        <button type="submit">generuj</button>
    </form>

</body>
</html>