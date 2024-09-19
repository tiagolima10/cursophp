<!doctype html>
<html lang="pt-br">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diárias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>

  <body>
    <div class="container">
        <h1>Lista de Diárias</h1>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">Data</th>
                <th scope="col">Tempo de atendimento</th>
                <th scope="col">Diarista</th>
                <th scope="col">Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($diarias as $diaria) : ?>
                    <tr>
                        <th><?= $diaria->data ?></th>
                        <td><?= $diaria->tempo ?> horas</td>
                        <td><?= $diaria->diarista->nome ?></td>
                        <td><?= $diaria->cliente->nomeCompleto?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>