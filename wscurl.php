<?php
ini_set("display_erros",1);

$fp = fsockopen("http://201.155.210.233/procesoad_nombre.asp", 80, $errno, $errstr, 30);
if (!$fp)
{
echo 'Could not open connection.';
}
else
{
$xmlpacket ='<?xml version="1.0" encoding="UTF-8"?><Contrato><Name>Velazquez Flores Edgar Alberto</Name></Contrato>';

$contentlength = strlen($xmlpacket);

$out = "POST /script_name.php HTTP/1.0\r\n";
$out .= "Host: www.example.com\r\n";
$out .= "Connection: Keep-Alive\r\n";
$out .= "Content-type: application/x-www-form-urlencoded\r\n";
$out .= "Content-length: $contentlength\r\n\r\n";
$out .= "XML=$xmlpacket";

fwrite($fp, $out);
while (!feof($fp))
{
$theOutput .= fgets($fp, 128);
}
fclose($fp);

// $theOutput is the response returned from the remote script
}
?>