<!DOCTYPE html>
<html lang="en">
    <title>Relatório</title>
    <head> </head>
    <body>
        <h1> Relatório de Usuários</h1>

        <table>
            <thead>
                <tr>
                    <th style="width : 170px">NOME</th>
                    <th style="width : 220px">EMAIL</th>
                    <th style="width : 150px">TELEFONE</th>
                    <th style="width : 100px">CPF</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($usuarios as $dados)
                <tr>
                    <td>{{ $dados->name }}</td>
                    <td>{{ $dados->email }}</td>
                    <td>{{ $dados->telefone }}</td>
                    <td>{{ $dados->cpf }}</td>
            @endforeach
            </tbody>
        </table>
    </body>
</html>
