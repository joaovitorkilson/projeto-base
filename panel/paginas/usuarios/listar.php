<?php
$tabela = 'users';
require_once "../../../connect.php";

// $id_empresa = $_POST['id_empresa'];

// $query = $pdo->query("SELECT * FROM $tabela where empresa = '$id_empresa' order by id desc");
$query = $pdo->query("SELECT * FROM $tabela order by id desc");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if ($total_reg > 0) {
    echo <<<HTML
<small>
	<table class="table table-hover" id="tabela">
	<thead> 
	<tr> 
	<th>Nome</th>	
	<th class="esc">Telefone</th>	
	<th class="esc">Email</th>	
	<th class="esc">Nível</th>	
	<th class="esc">Foto</th>	
	<th>Ações</th>
	</tr> 
	</thead> 
	<tbody>	
HTML;

    for ($i = 0; $i < $total_reg; $i++) {
        $id = $res[$i]['id'];
        $nome = $res[$i]['name'];
        $telefone = $res[$i]['cell_number'];
        $email = $res[$i]['email'];
        $cpf = '02227316640';
        $nivel = $res[$i]['level'];
        $ativo = $res[$i]['active'];
        $data = $res[$i]['date'];
        $endereco = $res[$i]['address'];
        $senha = $res[$i]['pass'];
        $foto = $res[$i]['picture'];


        $dataFormated = implode('/', array_reverse(explode("-", $data)));

        if($ativo == 1){
            $icone = 'fa-check-square';
            $titulo_link = 'Desativar Usuario';
            $acao = 'Não';
            $classe_ativo = '';
        }else{
            $icone = 'fa-square-o';
            $titulo_link = 'Ativar Usuario';
            $acao = 'Sim';
            $classe_ativo = '#c4c4c4';
        }

        if ($nivel == "Administrador") {
            $senha = '**********';
        }
        

        echo <<<HTML
    <tr style="color: {$classe_ativo}">
        <td>{$nome}</td>
        <td class="esc">{$telefone}</td>
        <td class="esc">{$email}</td>
        <td class="esc">{$nivel}</td>
        <td class="esc"><img src="./images/perfil/{$foto}" width="25px"></td>
        <td>
        <big>
            <a href="#" onclick="editar('{$id}','{$nome}','{$email}','{$telefone}','{$endereco}','{$nivel}')" title="Editar Dados"><i class="fa fa-edit text-primary"></i></a>
        </big>

        <li class="dropdown head-dpdn2" style="display: inline-block;">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><big><i class="fa fa-trash-o text-danger"></i></big></a>

		<ul class="dropdown-menu" style="margin-left:-230px;">
		<li>
		<div class="notification_desc2">
		<p>Confirmar Exclusão? <a href="#" onclick="excluir('{$id}')"><span class="text-danger">Sim</span></a></p>
		</div>
		</li>										
		</ul>
</li>


<big><a href="#" onclick="mostrar('{$nome}','{$email}','{$telefone}','{$endereco}','{$ativo}','{$dataFormated}', '{$senha}', '{$nivel}', '{$foto}')" title="Mostrar Dados"><i class="fa fa-info-circle text-primary"></i></a></big>


<big><a href="#" onclick="ativar('{$id}', '{$acao}')" title="{$titulo_link}"><i class="fa {$icone} text-success"></i></a></big>

        </td>
    </tr>
HTML;
    }
}


echo <<<HTML
    </tbody>
    <small>
        <div align="center" id="mensagem-excluir">
            
        </div>
    </small>
    </table>
HTML;

?>

<script>
    
let table = new DataTable('#tabela', {
    language: {
        url : "js/traducao.json"
    },
    ordering: false,
    stateSave: true
});

</script>

<script>
    function editar(id, nome, email, telefone, endereco, nivel) {
        $('#mensagem').text('');
        $('#titulo_inserir').text('Editar Registro');

        $('#id').val(id);
        $('#nome').val(nome);
        $('#email').val(email);
        $('#telefone').val(telefone);
        $('#endereco').val(endereco);
        $('#nivel').val(nivel).change();

        $('#modalForm').modal('show');
    }

    function mostrar(nome, email, telefone, endereco, ativo, data, senha, nivel, foto) {
        $('#titulo_dados').text(nome);
        $('#email_dados').text(email);
        $('#telefone_dados').text(telefone);
        $('#endereco_dados').text(endereco);
        $('#ativo_dados').text(ativo);
        $('#data_cad_dados').text(data);
        $('#senha_dados').text(senha);
        $('#nivel_dados').text(nivel);
        $('#foto_dados').text(foto);

        $('#modalDados').modal('show');
    }


    function limparCampos() {
        $('#id').val('');
        $('#nome').val('');
        $('#email').val('');
        $('#telefone').val('');
        $('#endereco').val('');
    }
</script>