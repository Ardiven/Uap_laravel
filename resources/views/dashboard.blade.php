<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Selamat Datang, {{ auth()->user()->name }}</h2>
    <form action="#" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
