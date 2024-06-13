<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Ciao Amministratore</h1>
    <p>
        <div>Hai ricevuto un nuovo messaggio!</div>
        <div>Nome {{ $lead->firstname }}</div>
        <div>Cognome {{ $lead->lastname }}</div>
        <div>Email {{ $lead->email }}</div>
        <div>Messaggio {{ $lead->content}}</div>
    </p>
</body>
</html>