<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Utilisateur</title>
</head>
<body>
    <h1>Créer un Utilisateur</h1>
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        @include('users.form')
    </form>
    <a href="{{ route('users.index') }}">Retour à la liste</a>
</body>
</html>