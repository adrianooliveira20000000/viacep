<?php 

$address = (object)[
	'cep' => '',
	'logradouro' => '',
	'bairro' => '',
	'localidade' => '',
	'uf' => ''
];
 if (isset($_POST['cep'])) {
 	
 $cep = $_POST['cep'];

 $cep = preg_replace('/[^0-9]/','',$cep);
 

 $url = "https://viacep.com.br/ws/{$cep}/json/";

 $address = json_decode(file_get_contents($url));


}
