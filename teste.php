<?php 

$a = 10;

define('BOT_TOKEN', '1276806237:AAGC5oeEI3tGJ9YDsSVzdt6OMVHDF-sYVNg');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');


function enviamensagem($chat_id,$nome){

$token = "1276806237:AAGC5oeEI3tGJ9YDsSVzdt6OMVHDF-sYVNg";

$user_id = $chat_id;

$msg = "
@$nome Realizando consulta 🔎 ... isso pode demorar de 1 a 6 Minutos, Enquanto isso pegue esse cafe ☕️ e espere para dar outro comando, assim que a consulta for finalizada.
";

$request_parans = [

   'chat_id' => $user_id,
   'type' => 'mention',
   'text' => $msg

];

$request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_parans);
file_get_contents($request_url);

}

function divulga($chat_id,$nome){


$rand = rand(0,3);

if ($rand == 3) {

        $token = "1096624517:AAEGwMrXLM3gj0wVKtOCBTAI6NopEnd1W-0";

        $user_id = $chat_id;

        $msg = "
        @$nome Realizando consulta 🔎 ...
        ";

        $request_parans = [

           'chat_id' => $user_id,
           'text' => $msg

        ];

        $request_url = 'https://api.telegram.org/bot' . $token . '/sendMessage?' . http_build_query($request_parans);
        file_get_contents($request_url);
    }


}


function processMessage($message,$chat_type) {
  
  if ($chat_type == "private") {
    return "saia do meu pv criolo";
    exit();
  }

  $verificaBOT = $message['from']['is_bot'];

  if ($verificaBOT == true) {
    return "Saia daki bot de preto";
    exit();
  }

  // processa a mensagem recebida
  $message_id = $message['message_id'];
  $chat_id = $message['chat']['id'];
  $nome = $message['from']['username'];
  if (isset($message['text'])) {

    
    $text = $message['text'];//texto recebido na mensagem

    $separar = explode(" ", $text);
    $comando = $separar[0];
    $comando2 = $separar[1];
    $comando3 = $separar[2];
    $comando4 = $separar[3];
    $comando5 = $separar[4];
    $comando6 = $separar[5];
    $comando7 = $separar[6];

    if (empty($comando2)) {
    	$comando2 = false;
    }

    elseif (empty($comando3)) {
    	$comando3 = false;
    }
   
    elseif (empty($comando4)) {
      $comando4 = false;
    }

    elseif (empty($comando5)) {
      $comando5 = false;
    }

      elseif (empty($comando6)) {
      $comando6 = false;
    }

     elseif (empty($comando7)) {
      $comando7 = false;
    }


    if (strpos($comando, "/comandos") === 0) {
		//envia a mensagem ao usuário
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => 'Olá, '. $message['from']['first_name'].
		'! Este são os meus comandos:

[ADMIN]

/hregistro user_name (Registra o usuario e seta 5 dashs)

/hsetdash user_name 100 (Seta 100 dashs para o usuario)

[INFO]

/hsaldodash (Consultar Saldos)
/hcomprardash (Compras de Dash)
/hinfo (Informações do BOT)
/hsuporte (Suporte do BOT)

[CADSUS]

/hcpf (Consutar CPF)
/hcns (Consultar CNS)
/hnome (Consultar Nome)

[DETRAN]

/hcnh (Consultar CNH por CPF)
/hplaca (Consutar Placa de Veículo)

[VIVO]

/hvivo (DESABILITADO)',));
    } else if ($comando === "/hcpf") {
      
     // enviamensagem($chat_id,$nome); 

      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('cpf', $comando, $comando2,$nome)));

     } else if ($comando === "/hnome") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('nome', $comando, $comando2, $nome,$comando3, $comando4, $comando5, $comando6,$comando7)));

    } else if ($comando === "/hcns") {
      
      //enviamensagem($chat_id,$nome);

      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('cns', $comando, $comando2,$nome, $comando3,$comando4)));

    } else if ($comando === "/hplaca") {
      
      //enviamensagem($chat_id,$nome);

      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('placa', $comando, $comando2,$nome, $comando3,$comando4)));

    } else if ($comando === "/hcnh") {
      
      //enviamensagem($chat_id,$nome);

      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('cnh', $comando, $comando2,$nome, $comando3,$comando4)));

    } else if ($comando === "/hregras") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('regras', $comando, $comando2,$nome, $comando3,$comando4)));


    } else if ($comando === "/hsaldodash") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('creditos', $comando, $comando2,$nome)));
    } else if ($comando === "/hcomprardash") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('comprardash', $comando, $comando2,$nome)));
    } else if ($comando === "/covid19") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('covid19', $comando, $comando2,$nome)));
    } else if ($comando === "/hinfo") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('hinfo', $comando, $comando2,$nome)));
     } else if ($comando === "/hregistro") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('hregistro', $comando, $comando2,$nome)));
     } else if ($comando === "/hsetdash") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('hsetdash', $comando, $comando2,$nome, $comando3)));
    } else if ($comando === "/cotacao") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('cotacao', $comando, $comando2,$nome, $comando3)));
     } else if ($comando === "/hsuporte") {
      sendMessage("sendMessage", array('chat_id' => $chat_id, "text" => getResult('hsuporte', $comando, $comando2, $nome)));
    } 
  } 
}

function sendMessage($method, $parameters) {
  $options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode($parameters),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);


$context  = stream_context_create( $options );
file_get_contents(API_URL.$method, false, $context );
}

/*Com o webhook setado, não precisamos mais obter as mensagens através do método getUpdates.Em vez disso, 
* como o este arquivo será chamado automaticamente quando o bot receber uma mensagem, utilizamos "php://input"
* para obter o conteúdo da última mensagem enviada ao bot. 
*/
$update_response = file_get_contents("php://input");

$update = json_decode($update_response, true);

$chat_type = $update['message']['chat']['type'];

if (isset($update["message"])) {
	processMessage($update["message"],$chat_type);
}


function validaCPF($cpf) {
 
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf{$c} * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf{$c} != $d) {
            return false;
        }
    }
    return true;
}

function _ghostbin($url, $post = false, $usecookie = false) {
    $ch = curl_init(); 
    if($post) { 
        curl_setopt($ch, CURLOPT_POST ,1); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post); 
    } 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36');
    if($usecookie){ 
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt'); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');     
    }
    $result=curl_exec ($ch);
    return curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    return $result; 
}

function _tirarcreditos($nome){

       	$saldo = _versaldo($nome);
		$final = $saldo -1; 

        $conn = new PDO('mysql:host=mysql873.umbler.com:41890;dbname=dollyguidao', 'bitcomedolly', 'junin2020');
        $stmt = $conn->prepare("UPDATE `telegram` SET `creditos`=:CREDITOS WHERE nome=(:USUARIO)");

        // EXECURA O COMANDO UPDATE PARA SER MODIFICADO A TABELA
        $stmt->bindParam(":USUARIO", $nome);
        $stmt->bindParam(":CREDITOS", $final);
        $stmt->execute();

        echo "$saldo"; 

}

function _registro($nome,$comando2){

  if ($nome == "iGordiN7") {
  	
        $conn = new PDO('mysql:host=mysql873.umbler.com:41890;dbname=dollyguidao', 'bitcomedolly', 'junin2020');
        $stmt = $conn->prepare("INSERT INTO `telegram`(`nome`, `creditos`) VALUES (:NOME, '5')");

        // EXECURA O COMANDO UPDATE PARA SER MODIFICADO A TABELA
        $stmt->bindParam(":NOME", $comando2);
        $stmt->execute();

      return "Ok @$nome, usuario cadastrado com sucesso no banco de dados";

  }

  else{
  	return "Olá, @$nome! Você não estar disponível para usar este comando! Caso tente usar de novo será banido.";
  }  


}

function _setarsaldo($nome,$comando2,$comando3){

   if ($nome == "iGordiN7") {
   	
   	$conn = new PDO('mysql:host=mysql873.umbler.com:41890;dbname=dollyguidao', 'bitcomedolly', 'junin2020');
    $stmt = $conn->prepare("UPDATE `telegram` SET `creditos`=:CREDITOS WHERE nome=(:NOME)");

    $stmt->bindParam(":NOME", $comando2);
    $stmt->bindParam(":CREDITOS", $comando3);
    $stmt->execute();

    return "Ok @$nome, Você setou $comando3 dashs para o usuario @$comando2";
   
   }

   else{
   	return "Olá, @$nome! Você não estar disponível para usar este comando! Caso tente usar de novo será banido.";
   }



}


function _curl($url, $post = false, $usecookie = false) {
    $ch = curl_init(); 
    if($post) { 
        curl_setopt($ch, CURLOPT_POST ,1); 
        curl_setopt ($ch, CURLOPT_POSTFIELDS, $post); 
    } 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_NOBODY, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.117 Safari/537.36');
    if($usecookie){ 
        curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd().'/cookie.txt'); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd().'/cookie.txt');     
    }
    $result=curl_exec ($ch);
    curl_close ($ch);
    return $result; 
}



function _versaldo($nome){

try{
    $conexao = new PDO('mysql:host=mysql873.umbler.com:41890;dbname=dollyguidao', 'bitcomedolly', 'junin2020');
    $conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    echo 'ERROR: ' . $e->getMessage();
  }


    $sql = "SELECT `id`, `nome`, `creditos` FROM `telegram` WHERE nome=(:LOGIN)";
    try{
        $resultado = $conexao->prepare($sql);
        $resultado->bindParam(":LOGIN", $nome);
        $resultado->execute();
        $contar = $resultado->rowCount();
        
        if($contar > 0 ){
            while($exibe = $resultado->fetch(PDO::FETCH_OBJ)){

         $creditos = $exibe->creditos;

         return $creditos;

  }//while
    }else{
        return false;
    }
                
    }catch(PDOException $erro){ echo $erro;}


}

function getResult($doll, $title, $comando2=false,$nome,$comando3=false,$comando4=false,$comando5=false,$comando6=false,$comando7=false){

	if($doll=="cpf"){
		
		 $saldo = _versaldo($nome);

        if ($saldo >= 1) {
           
            $tirasaldo = _tirarcreditos($nome);
        
            $validacpf = validaCPF($comando2);

              if ($validacpf == true) {
                 
                 $consultacpf = _curl('https://api.bronxservices.net/consulta.php?cpf='.$comando2.'');

                $info = json_decode($consultacpf, true);

                $nome0 = $info["nome"];
                $cpf = $info["cpf"];
                $cns = $info["numeroCns"];
                $nomeMae = $info["nomeMae"];
                $nomePai = $info["nomePai"];
                $sexo = $info["sexoDescricao"];
                $rg = $info["rgNumero"];
                $rgDescricao = $info["rgOrgaoEmissorDescricao"];
                $dataRg = $info["rgDataEmissao"];
                $situacao = $info["situacao"];
               

                $dataNascimento = $info["dataNascimento"];
                $cidadeNascimento = $info["municipioNascimento"];
                $paisNacimento = $info["nacionalidade"];
                
                $cep = $info["enderecoCep"];
                $cidadeEstado = $info["enderecoMunicipio"];
                $bairro = $info["enderecoBairro"];
                $rua = $info["enderecoLogradouro"];
                $numero = $info["enderecoNumero"];


                $consulta = @"

╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱




###### DADOS PESSOAIS ######

CPF: $cpf
NOME: $nome0
DATA NASCIMENTO: $dataNascimento
CNS: $cns
NOME MAE: $nomeMae
NOME PAI: $nomePai
SEXO: $sexo
SITUAÇAO: $situacao

CIDADE NASCIMENTO: $cidadeNascimento
PAIS DE ORIGEM: $paisNasicmento

###### ENDEREÇO ######

CIDADE ATUAL: $cidadeEstado
CEP: $cep
BAIRRO: $bairro
RUA: $rua
NUMERO: $numero

###### RG ######

RG: $rg - $rgDescricao - $dataRg

----------------------------------
CONSULTA EFETUADA POR @HANNAH7BOT 
----------------------------------
GRUPO OFICIAL TELEGRAM: https://t.me/joinchat/NIy_ORk54bagHS_iXRbhXg



╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
                ";

                $ghost = _ghostbin("https://ghostbin.co/paste/new", 'lang=text&text='.$consulta.'&expire=-1&password=&title=', true);

$out = "@$nome Meus robos 🤖 encontraram o resultado de sua consulta CPF: [$comando2] - $ghost";
             
       }

             else{
              $out = "@$nome CPF Invalido!";
             }
         }


        else{
          $out = "@$nome Você não tem dashs suficientes, ou você não esta registrado no banco de dados";
        }

}



	
	elseif($doll=="nome"){
	    
      $saldo = _versaldo($nome);

// SE ESTIVER VAZIO

      if (empty($comando2) || empty($comando3)) {
        $certo = false;
      }

// SE NAO ESTIVER VAZIO

      else{
        $certo = true;
      }




   if ($certo == true) {

              if ($saldo >= 1) {
                 
                  $tirasaldo = _tirarcreditos($nome);


        // $consultaNome = _curl("https://api.bronxservices.net/consulta.php?nome=$comando2 $comando3 $comando4 $comando4 $comando5 $comando6 $comando7");

       //echo "$consultaNome";


                  if (strpos($consultaNome, 'Não foi encontrado nenhum registro em sua pesquisa.')) {
                    $out = "@$nome Não foi encontrado nenhum registro em sua pesquisa: $comando2 $comando3 $comando4 $comando5 $comando6";
                  }

                  elseif (strpos($consultaNome, 'Código de segurança inválido.')) {
                    $out = "@$nome - Código de segurança inválido. Refaça a consulta";
                  }

       else{
                 $infonome = json_decode($consultaNome, true);
                 $total = $infonome["total"];

                if ($total >= 10) {
                   $out = "@$nome FORAM ENCONTRADOS +$total PESSOAS - O MAXIMO DE PESSOAS QUE EU PEGO SÂO 5";
                 }



          else{


           $infonome = json_decode($consultaNome, true);
            
           $cns = $infonome["registro"][0]["numeroCns"];
           $nome0 = $infonome["registro"][0]["nome"];
           $nomeMae = $infonome["registro"][0]["nomeMae"];
           $nomePai = $infonome["registro"][0]["nomepai"];
           $sexo = $infonome["registro"][0]["sexo"];
           $dataNascimento = $infonome["registro"][0]["dataNascimento"];
           $paisNasicmento = $infonome["registro"][0]["paisNascimento"];
           $cidadeNascimento = $infonome["registro"][0]["municipioNascimento"];
           $situacao = $infonome["registro"][0]["situacao"];

         /*  $consulta = "
##################################
CONSULTA NOME HANNAH7 
##################################

<< DADOS PESSOAIS >>

CNS: $cns
NOME: $nome0
NOME MAE: $nomeMae
NOME PAI: $nomePai
SEXO: $sexo
SITUAÇâO: $situacao
DATA NASCIMENTO: $dataNascimento
PAIS NASCIMENTO: $paisNasicmento
CIDADE DA NASCIMENTO: $cidadeNascimento

##################################
CONSULTA EFETUADA POR @$nome
##################################

           ";
*/
//$ghost = _ghostbin("https://ghostbin.co/paste/new", 'lang=text&text='.$consulta.'&expire=-1&password=&title=', true);

           $out = "[ERROR 404] @$nome COMANDO DESABILITADO TEMPORARIAMENTE";
    } // ELSE 
 
 } // ELSE 2 
  
        } // IF DE DINHEIRO

        else{
          $out = "@$nome Você não tem dashs suficientes, ou você não esta registrado no banco de dados";
        }

} // IF DE NOME (VALIDO)!

  else{
  $out = "@$nome Nome para consulta invalido!";
}
	
  } // FINAL











elseif ($doll == "cns") {

   $saldo = _versaldo($nome);

   $vernumeros = strlen($comando2);

   if ($vernumeros == 15) {
     
  
             if ($saldo >= 1) {

                $consultacns = _curl("https://api.bronxservices.net/consulta.php?cns=$comando2");

                $tirasaldo = _tirarcreditos($nome);
             
                $infocns = json_decode($consultacns, true);

                  $nome0 = $infocns["nome"];
                  $cpf = $infocns["cpf"];
                  $cns = $infocns["numeroCns"];
                  $nomeMae = $infocns["nomeMae"];
                  $nomePai = $infocns["nomePai"];
                  $sexo = $infocns["sexoDescricao"];
                  $rg = $infocns["rgNumero"];
                  $rgDescricao = $infocns["rgOrgaoEmissorDescricao"];
                  $dataRg = $infocns["rgDataEmissao"];
                  $situacao = $infocns["situacao"];
                         

                  $dataNascimento = $infocns["dataNascimento"];
                  $cidadeNascimento = $infocns["municipioNascimento"];
                  $paisNacimento = $infocns["nacionalidade"];
                          
                  $cep = $infocns["enderecoCep"];
                  $cidadeEstado = $infocns["enderecoMunicipio"];
                  $bairro = $infocns["enderecoBairro"];
                  $rua = $infocns["enderecoLogradouro"];
                  $numero = $infocns["enderecoNumero"];

              $consulta = "
╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱



###### DADOS PESSOAIS ######

CPF: $cpf
NOME: $nome0
DATA NASCIMENTO: $dataNascimento
CNS: $cns
NOME MAE: $nomeMae
NOME PAI: $nomePai
SEXO: $sexo
SITUAÇAO: $situacao

CIDADE NASCIMENTO:   $cidadeNascimento

###### ENDEREÇO ######

CIDADE ATUAL:   $cidadeEstado
CEP:   $cep
BAIRRO:   $bairro
RUA:   $rua
NUMERO:   $numero

###### RG ######

RG: $rg - $rgDescricao - $dataRg

----------------------------------
CONSULTA EFETUADA POR @HANNAH7BOT 
----------------------------------
GRUPO OFICIAL TELEGRAM: https://t.me/joinchat/NIy_ORk54bagHS_iXRbhXg



╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱";
           
$ghost = _ghostbin("https://ghostbin.co/paste/new", 'lang=text&text='.$consulta.'&expire=-1&password=&title=', true);

$out = "@$nome Meus robos 🤖 encontraram o resultado de sua consula CNS: [$comando2] - $ghost";   


    }

          else{
            $out = "@$nome Você não tem dashs suficientes, ou você não esta registrado no banco de dados";
          }

}

   else{
    $out = "@$nome CNS INVALIDO!";
   }

}


elseif ($doll == "placa") {
  
  $saldo = _versaldo($nome);

  $vernumeros = strlen($comando2);

   if ($vernumeros == 7) {

        if ($saldo >= 1) {

            $placa = _curl("https://api.bronxservices.net/consulta.php?placa=$comando2");

            $tirasaldo = _tirarcreditos($nome);

            $info = json_decode($placa, true);

            $placaCarro = $info["PLACA"];
            $chassi = $info["CHASSI"];
            $renavam = $info["RENAVAM"];
            $categoria = $info["CATEGORIA"];
            $fabricacao = $info["FABRICACAO"];
            $modelo = $info["MODELO"];
            $marca = $info["MARCA"];
            $cor = $info["COR"];
            $emplacamento = $info["EMPLACAMENTO"];
            $ipva = $info["IPVA"];
            $licenciamento = $info["LICENCIAMENTO"];
            $roubo = $info["ROUBO"];
            $proprietario = $info["PROPRIETARIO"];
            $documento = $info["DOCUMENTO"];
            $tipoDocumento = $info["TIPODOCUMENTO"];

            $consulta = "
╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱



###### DADOS DO CARRO ######

PLACA: $placaCarro
CHASSI: $chassi
RENAVAM: $renavam
CATEGORIA: $categoria
FABRICACÂO: $fabricacao
MODELO: $modelo

###### INFORMAÇÔES ADICIONAIS ######

MARCA: $marca
COR: $cor
EMPLACAMENTO: $emplacamento
IPVA: $ipva
LICENCIAMENTO: $licenciamento
ROUBO: $roubo

###### PROPRIETARIO ######

PROPRIETARIO: $proprietario
DOCUMENTO: $documento
TIPO DE DOCUMENTO: $tipoDocumento

----------------------------------
CONSULTA EFETUADA POR @HANNAH7BOT 
----------------------------------
GRUPO OFICIAL TELEGRAM: https://t.me/joinchat/NIy_ORk54bagHS_iXRbhXg



╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱

      ";

$ghost = _ghostbin("https://ghostbin.co/paste/new", 'lang=text&text='.$consulta.'&expire=-1&password=&title=', true);

$out = "@$nome Meus robos 🤖 encontraram o resultado de sua consula PLACA: [$comando2] - $ghost";   

    }

    else{
      $out = "@$nome Você não tem dashs suficientes, ou você não esta registrado no banco de dados";
    }

  }

  else{
    $out = "@$nome PLACA DE CARRO INVALIDA!";
  }


}




elseif ($doll == "cnh") {
  
   $saldo = _versaldo($nome);

   $validacpf = validaCPF($comando2);

   if ($validacpf == true) {
  
            if ($saldo >= 1) {


             $consultaCNH = _curl("https://api.bronxservices.net/consulta.php?cnh=$comando2");

             $tirasaldo = _tirarcreditos($nome);

             if ($consultaCNH == "CPF NÃO HABILITADO!") {
               $out = "@$nome CPF NÃO HABILITADO!";
             }
    
             else{

             $info = json_decode($consultaCNH, true);

             $nome0 = $info["NOME"];
             $cpf = $info["CPF"];
             $mae = $info["MAE"];
             $naturalidade = $info["NATURALIDADE"];
             $nasicmento = $info["NASCIMENTO"];
             $rg = $info["RG"];
             $cnh = $info["CNH"];
             $categoria = $info["AB"];
             $ufcnh = $info["UFCNH"];
             $primeira_cnh = $info["PRIMEIRA_CNH"];
             $vencimento = $info["VENCIMENTO"];

             $consulta = "
╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱



###### INFORMAÇÔES DA CNH ######

NOME: $nome0
CPF: $cpf
MAE: $mae
NATURALIDADE: $naturalidade
NASCIMENTO: $nasicmento
RG: $rg
CNH: $cnh
CATEGORIA: $categoria
UFCNH: $ufcnh
PRIMEIRA CNH: $primeira_cnh
VENCIMENTO: $vencimento

----------------------------------
CONSULTA EFETUADA POR @HANNAH7BOT 
----------------------------------
GRUPO OFICIAL TELEGRAM: https://t.me/joinchat/NIy_ORk54bagHS_iXRbhXg



╭━━━╮╭━━━╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮╭╮╱╱╱╭━━━━╮╭━━━╮   ╭╮╱╭╮╭━━━╮╭━╮╱╭╮╭━╮╱╭╮╭━━━╮╭╮╱╭╮
┃╭━╮┃┃╭━╮┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃┃┃╱╱╱┃╭╮╭╮┃┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╰╮┃┃┃┃╰╮┃┃┃╭━╮┃┃┃╱┃┃
┃┃╱╰╯┃┃╱┃┃┃╭╮╰╯┃┃╰━━╮┃┃╱┃┃┃┃╱╱╱╰╯┃┃╰╯┃┃╱┃┃   ┃╰━╯┃┃┃╱┃┃┃╭╮╰╯┃┃╭╮╰╯┃┃┃╱┃┃┃╰━╯┃
┃┃╱╭╮┃┃╱┃┃┃┃╰╮┃┃╰━━╮┃┃┃╱┃┃┃┃╱╭╮╱╱┃┃╱╱┃╰━╯┃   ┃╭━╮┃┃╰━╯┃┃┃╰╮┃┃┃┃╰╮┃┃┃╰━╯┃┃╭━╮┃
┃╰━╯┃┃╰━╯┃┃┃╱┃┃┃┃╰━╯┃┃╰━╯┃┃╰━╯┃╱╱┃┃╱╱┃╭━╮┃   ┃┃╱┃┃┃╭━╮┃┃┃╱┃┃┃┃┃╱┃┃┃┃╭━╮┃┃┃╱┃┃
╰━━━╯╰━━━╯╰╯╱╰━╯╰━━━╯╰━━━╯╰━━━╯╱╱╰╯╱╱╰╯╱╰╯   ╰╯╱╰╯╰╯╱╰╯╰╯╱╰━╯╰╯╱╰━╯╰╯╱╰╯╰╯╱╰╯
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱   ╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱
";

$ghost = _ghostbin("https://ghostbin.co/paste/new", 'lang=text&text='.$consulta.'&expire=-1&password=&title=', true);

$out = "@$nome Meus robos 🤖 encontraram o resultado de sua consula CNH: [$comando2] - $ghost";   

 }

     }
 
    else{
      $out = "@$nome Você não tem dashs suficientes, ou você não esta registrado no banco de dados";
    }

   }

   else{
    $out = "@$nome Numero de CNH Invalida!";
   }

}




elseif ($doll == "hsuporte") {
    $out = @"
SUPORTE HANNAH7
____________________________

Contato para suporte: @GordinHannah7
____________________________
Obs: Só chame se ocorrer problemas com o BOT ou para depósitos!
Caso ao contrário levará ban e seus Dash serão zerado.";
}

	elseif($doll=="comprardash"){
		$out .= @"
LOJA DASH π
________________________

FORMAS DE PAGAMENTO:
SALDO MERCADOPAGO, DEPÓSITO LOTÉRICA.

SALDO MP:
EMAIL PRIVADO
________________________

CONTA PRA DEPÓSITO:
AGÊNCIA: 0000
CONTA: 628424-0
TITULAR: LUCAS HENRIQUE
________________________

COMO RECEBER OS DASH:?

APÓS TER FEITO O DEPÓSITO, ENVIE A FOTO DO COMPROVANTE PRO @GordinHannah7
________________________

VALORES DOS DASH:

10 R$ = 15 DASH
20 R$ = 25 DASH

________________________
Copyright © 2020 Hannah7 - Todos os direitos reservados";
	}

	elseif ($doll=="covid19") {
		
    $url = "https://news.google.com/covid19/map?hl=pt-BR&gl=BR&ceid=BR:pt-419";
    $contents = file_get_contents($url);

    $var1 = explode('<span>Brasil</span></div></th><td class="l3HOY">', $contents);
    $var2 = explode('</td>', $var1[1]);
    $casos = $var2[0];



	$out = @"
TABELA DE INFORMAÇÂO [COVID19] 

CASOS CONFIRMADOS:

$casos";
	
	}


	elseif($doll=="creditos"){

		       $saldo = _versaldo($nome);

         echo "$saldo";

          if ($saldo <= 0) {
            $out = "@$nome Seus dashs estão zerados";
          }


		      elseif ($saldo == false) {
            $out = "@$nome não esta cadastrado no banco de dados";
          }


				 else{
				$out = "@$nome Seus dash atuais $saldo";
				 }

}



   elseif ($doll == "hinfo") {
   	
	$out = @"
[INFO HANNAH7]
________________________

Nome: Hannah7
Versão: 1.5
Ano de criação: 2020
ID: 00000000
Dash: Infinito
Criador: @bitfoipreso
________________________

[SOBRE HANNAH7]

Quem é Hannah7 ? 

Hannah7 é um Bot de consultas movido a Dash.

O que é Dash ? 

Dash é o sangue da Hannah7, sem eles ela não tem vida.
Os Dash serve para você fazer consultas no Bot.
Cada consulta custa 1 Dash.

Meus Dash acabou, o que fazer ?

Para adquirir Dash, somente comprando ou ganhando nós sorteios!
Para comprar use o comando /hcomprardash
________________________
Copyright © 2020 Bot Hannah7 - Todos os direitos reservados";

  }

elseif ($doll == "hregistro") {
	
    $verRegistro = _versaldo($comando2);

    if ($verRegistro == false) {
      $out = _registro($nome,$comando2);
    }

    else{
    	$out = "@$comando2 ja esta cadastrado no banco de dados";
    }


}

elseif ($doll == "hsetdash") {
	$out = _setarsaldo($nome,$comando2,$comando3);

}

elseif ($doll == "regras") {
  $out = "
REGRAS DA HANNAH7
____________________________

1° Proibido fazer consultas de Nome ou CPF de Famosos
2° Proibido fazer consultas de CPF gerado!
3° Proibido fazer a mesma consulta em seguida! 
4° Proibido ficar respondendo o BOT.
____________________________
Caso quebra alguma dessas regras, seu cadastro será banido do Bot! E você vai fazer consulta na casa do crlz, além de levar um ban em todos os grupos que o bot estar!
____________________________";
}

elseif ($doll == "cotacao") {
  
  $url = "https://www.melhorcambio.com/dolar-hoje";
  $url2 = "https://www.infomoney.com.br/cotacoes/bitcoin-btc/";

  $contents = file_get_contents($url);
  $contents2 = file_get_contents($url2);

  $var1 = explode('<td width="150" class="tdvalor">', $contents);
  $var2 = explode('</td>', $var1[1]);
  $dolar = $var2[0];

  $bitcoin1 = explode('<div class="value">', $contents2);
  $bitcoin2 = explode('</p>', $bitcoin1[1]);
  $bitcoin = $bitcoin2[0];
  $bitcoin = str_replace('                                    <p>', '', $bitcoin);

  $data = date("Y/M h:i:s");

  $out = "
Aqui esta a cotação de dollar e bitcoin hoje @$nome 

Dolar Hoje: $dolar - $data 

Bitcoin Hoje - 1 Bitcoin: $bitcoin

";

}


	else{
		$out .= "Indefinido";
	}

	return $out;

}


 ?>
