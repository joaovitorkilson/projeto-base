<?php

$pag = 'usuarios';
?>
<a type="button" class="btn btn-primary">
    <span class="fa fa-plus">
    </span>
    Usuário
</a>

<div class="bs-example widget-shadow" style="padding: 15px" id="listar">
    <table class="table" id="tabela">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>
</div>

<script>
let table = new DataTable('#tabela');
</script>