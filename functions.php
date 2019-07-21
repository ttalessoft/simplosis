<?php 

use \Hcode\Model\User;

function post($key)
{
	return str_replace("'", "", $_POST[$key]);
}
function get($key)
{
	return str_replace("'", "", $_GET[$key]);
}

function formatPrice(float $vlprice){

	return number_format($vlprice, 2, ",", ".");
}

// Remove acentos das palavras
function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

// Pega o nome do usuário da sessão atual
function getUserName(){
    
	$user = User::getFromSession();
	return $user->getdesperson();

}

function getUserMail(){

	$user = User::getFromSession();
	return $user->getdesemail();
}

function limpaCPF_CNPJ($valor){
	$valor = trim($valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace(",", "", $valor);
	$valor = str_replace("-", "", $valor);
	$valor = str_replace("/", "", $valor);
 	return $valor;
}

function limpaRG_IE($valor){
	$valor = trim($valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace("_", "", $valor);
	return $valor;
}

function limpaCEP($valor){
	$valor = trim($valor);
	$valor = str_replace(".", "", $valor);
	$valor = str_replace("-", "", $valor);
	return $valor;
}

function converterData($data, $formato){
	return date($formato, strtotime($data));
}

function retornoSigla($sigla){
	switch ($sigla) {
		case 'f':
			return 'Física';
			break;
		case 'j':
			return 'Jurídica';
			break;
		case 'c':
			return 'Cliente';
			break;
		case 'F':
			return 'Fornecedor';
			break;
	}
}