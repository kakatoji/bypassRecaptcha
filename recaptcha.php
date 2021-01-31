<?php
function captcha($googleKey,$pageUrl,$apikey){
$kirim= file_get_contents("http://2captcha.com/in.php?key=".$apiKey."&method=userrecaptcha&googlekey=".$googleKey."&pageurl=".$pageUrl);
$first = array($kirim);
$result= explode('OK|',$first[0]);
$hello = $result[1];
$ambil="http://2captcha.com/res.php?key=".$apiKey."&action=get&id=".$hello;
while(true){
sleep(10);
$getting = file_get_contents($ambil);
$second = array($getting);
if($getting=="CAPCHA_NOT_READY"){
continue;
}elseif($getting=="ERROR_WRONG_CAPTCHA_ID"){
echo"{$yellow2}Saldo 2captcha habis {$red2}......\n";
break;
}else{
$secondresult = explode('OK|',$second[0]);
$hasil=$secondresult[1];
echo "{$green2}Sukses Verif Captcha\n";
break;
 }
}
return $hasil;
}
