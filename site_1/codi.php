
    
                <?php      
                
      

 $l = array
    (
    array("php", 10),
    array("javascript", 9),
    array("java", 8),
    array("python", 7),
    array("c", 6),
    array("sql", 5)
    );
     $l2 = array
    (
    array("php", 8),
    array("javascript", 10),
    array("java", 6),
    array("python", 1),
    array("c", 7),
    array("sql", 1)
    );

print "Array 1 <br><br><br><br>";
for($i = 0;$i < 6; $i++){
$re = $i + 1;
$value = $l[$i][1];
    print"linha".$re."&nbsp &nbsp"; 
    print "linguagem &nbsp &nbsp".$l[$i][0]."&nbsp &nbsp;&nbsp&nbsp".$l[$i][1]." &nbsp &nbsp valor".$value."<br>";
    
    
   }
   print "<br>";print "<br>"; print "<br>"; print "<br>"; print "<br>";
   print "Array 2 <br><br><br><br>";
for($i = 0;$i < 6; $i++){
$re = $i + 1;
$value = $l2[$i][1];
    print"linha".$re."&nbsp &nbsp"; 
    print "linguagem &nbsp &nbsp".$l2[$i][0]."&nbsp &nbsp;&nbsp&nbsp".$l2[$i][1]." &nbsp &nbsp valor".$value."<br>";
    
    
   } 
     print "<br><br><br><br><br>";
     
       /* function valor() {
   global $l ,$l2;
   if($l2[0][1] > $l[0][1]){
   $subiu = $l2[0][1] - $l[0][1];
   print "subiu&nbsp";
   }
   if($l2[0][1] < $l[0][1]){
   $desceu = $l[0][1] - $l2[0][1];
 print "desceu&nbsp" . $desceu;
 }}*/
 
 print "Array 3 mostrando como ira ficar <br><br><br><br>";
for($i = 0;$i < 6;$i++){
    
$re = $i + 1;
 $anterior = $l2[$i][1];
print "linha".$re."&nbsp&nbsp";
    print "linguagem &nbsp &nbsp".$l2[$i][0]."&nbsp &nbsp;&nbsp&nbsp valor novo".$l2[$i][1]." &nbsp &nbsp valor anterior".$l[$i][1];
    
   if($l2[$i][1] > $l[$i][1]){
   $subiu = $l2[$i][1] - $l[$i][1];
   if($subiu == 1){
   print "&nbsp&nbsp subiu   &nbsp" . $subiu . "&nbsp posição<br>";
   }
   else{
   print "&nbsp&nbsp subiu   &nbsp" . $subiu . "&nbsp posiçoes<br>";
   }}
   if($l2[$i][1] < $l[$i][1]){
   $desceu = $l[$i][1] - $l2[$i][1];
    if($desceu == 1){
   print "&nbsp&nbsp desceu   &nbsp" . $desceu . "&nbsp posição<br>";
  }
  else{ 
 print "&nbsp&nbsp desceu &nbsp" . $desceu . "&nbspposiçoes <br>";
 }
}
}
     print "<br><br><br><br><br>";
          print "Array 3 pegando os dados do array 2 <br>";
           print "<br><br><br><br><br>";
for($i = 0;$i < 6; $i++){
 $l3[$i][0] = $l2[$i][0];
 $l3[$i][1] = $l2[$i][1];
 print "linguagem &nbsp &nbsp". $l3[$i][0] . "&nbsp valor &nbsp" .  $l3[$i][1] . "<br>" ;
}
    
    
    
    
 print "<br><br><br><br><br>";
 print "Array 3 com os novos valores <br>";
     print "<br><br><br><br><br>";
for($i = 0;$i < 6; $i++){
    $re = $i + 1;
 $l3[$i][0];
 $l3[$i][1];
 print "linha &nbsp". $re ." linguagem novo array&nbsp &nbsp &nbsp". $l3[$i][0] . "&nbsp valor &nbsp" .  $l3[$i][1] . "<br>" ;


}




















ksort($l3);
print"<pre>";
print"test 1<br>";
print_r ($l3);
print"</pre>";









$test = array_column($l3, '1', '0');
arsort($test);

  print"test2";
print"<pre>";
foreach($test as $linha => $coluna){
    $nov = $test;
print($linha ."=> ".$coluna."<br>");
} print"</pre>";

print"<pre>";
print_r ($nov);
print"</pre>";





    ?>
