<?php
$numbe = $_GET['firstname'];
$company = file_get_contents("http://m.kuaidi100.com/autonumber/auto?num=".$numbe);

preg_match_all('/"(.*?)"/',$company,$match);
$company = $match[1][1];
$company = file_get_contents("http://m.kuaidi100.com/query?type=".$company."&postid=".$numbe."&id=1&valicode=");
$c= json_decode($company); 
$array = object_array($c);
//var_dump($array);
echo "你的快递运送情况"."<br>";
for ($i=0; $i <count($array['data']) ; $i++) { 
	echo $array['data'][$i]["context"]."<br>";
}
/*preg_match_all('/"(.*?)"/',$company,$match);
/*for ($i=20; $i <count($match[1]) ; $i=$i+8) { 
	echo $match[1][$i]."=====".$match[1][$i+4]."=====".$match[1][$i+8]."\n";
}*/
function object_array($array)
{
   if(is_object($array))
   {
    $array = (array)$array;
   }
   if(is_array($array))
   {
    foreach($array as $key=>$value)
    {
     $array[$key] = object_array($value);
    }
   }
   return $array;
}
?>