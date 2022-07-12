<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Users</title>
</head>
<body>
    <header>
        <div class="container d-flex align-items-center justify-content-between px-4">
            <h2>Test Zanichelli</h2>
            <a href="/">Torna alla home</a>
        </div>
    </header>

    <main>
        <div class="container py-5">
            <h1>Lista degli utenti</h1>
            <table class="table table-striped mt-3">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cognome</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
    
                <tbody>
                @foreach ($users as $user)
                <tr">
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->nome }}</td>
                    <td>{{ $user->cognome }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @endforeach
                </tbody>
    
            </table>
        </div>
    </main>
</body>
</html>