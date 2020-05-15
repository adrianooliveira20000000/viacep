



<?php
  


    $select = $_POST['cars']??0;

    if($select == 'postmon'){

        include('postmon.php');

        $address = getAdrdress();

    }

    elseif($select == 'viacep'){

        include('viacep.php');

        $address = getAdrdress();

    }


    elseif($select == 'headers'){

        include('headers.php');

        $address = getAdrdress();

    }
    else{

 include('viacep.php');

        $address = getAdrdress();

    }



   
    





?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumindo API</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action="" method="post">


    <select  name="cars">
  <option value="viacep">selecione</option>
  <option value="viacep">viacep</option>
  <option value="postmon">postmon</option>
  <option value="headers">headers</option>
  
</select>
 

        <p>Digite o CEP para encontrar o endereço.</p>
        <input type="text" placeholder="Digite um cep..." name="cep" value = "<?php
        echo $address->cep;
        ?>">
        <input type="submit" id="cars">
        <input type="text" placeholder="rua" name="rua" value = "<?php
        echo $address->logradouro;
        ?>">
        <input type="text" placeholder="bairro" name="bairro"value = "<?php
        echo $address->bairro;
        ?>">
        <input type="text" placeholder="cidade" name="cidade"value = "<?php
        echo $address->localidade;
        ?>">
        <input type="text" placeholder="estado" name="estado"value = "<?php
        echo $address->uf;
        ?>">
    </form>
</body>
</html>