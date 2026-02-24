<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>profilovy formular</title>
</head>
<body>
    <form method="POST" action="/profile/result">
        @csrf
        <input type="text" name="name" placeholder="Meno" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="number" name="age" placeholder="Vek" required><br>
        <select name="role" required>
            @foreach ($roles as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
            @endforeach
        </select><br>
        @foreach ($skills as $skill)
            <input type="checkbox" name="skills[]" value="{{ $skill }}"> {{ $skill }}<br>
        @endforeach
        <button type="submit">odoslat</button>
    </form>
</body>
</html>