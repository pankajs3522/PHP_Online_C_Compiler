<?php
$myfile=fopen("task1.cpp","w");
$txt=$_POST['code'];
//echo $txt;
fwrite($myfile,$txt);
ob_start();
//This will execute the code 
exec("gcc task1.cpp" . " 2>&1", $out);
$res=ob_get_contents();
ob_end_clean();
if(count($out)==0)
{
//If no errors found ecxecute a.out
$t=shell_exec('./a.out');
echo $t;
}
else
{
//else Show errors
var_dump($out);
}
?>
