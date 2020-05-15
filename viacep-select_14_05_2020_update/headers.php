
<?php 


function getAdrdress(){
 
if(isset($_POST['cep'])){
$cep = $_POST['cep'];
$cep =filterCep($cep);

if( isCep($cep)){
    $address = getAdrdressViacep($cep);
    if(property_exists($address,'erro')){
        $address = addressEmpy();
        $address->cep = 'cep invalido';
    }
}else{
    $address = addressEmpy();
    $address->cep = 'cep invalido';
}
}else{
    $address = addressEmpy();
}

return $address;}

function addressEmpy(){
    return  (object)[
        'cep'=>'',
        'logradouro'=>'',
        'bairro'=>'',
        'localidade'=>'',
        'uf'=>''
    
    ];
}



function filterCep(String $cep):String{
    return  preg_replace('/[^0-9]/','',$cep);
    }

    function isCep(String $cep):bool{

        return preg_match('/^[0-9]{5}-?[0-9]{3}$/',$cep);
    }

    function getAdrdressViacep(String $cep):Object{


        $url = "https://www.cepaberto.com/api/v3/cep?cep={$cep}";
        $opts = array(
    'http'=>array(
        'method' => 'GET',
        'header' => 'Authorization: Token token=e398347b8f0efd15e6326c04dea35fbd'
    )
    
    );
        $context = stream_context_create($opts);
        $teste = json_decode(file_get_contents($url,false,$context));
    
    


      
        $address = (object)[
            'cep'=>$teste->cep,
            'logradouro'=>$teste->logradouro,
            'bairro'=>$teste->bairro,
            'localidade'=>$teste->cidade->nome,
            'uf'=>$teste->estado->sigla
        
        ];
        return $address;
        }
        
        
    




?>








