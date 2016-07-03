<?php
//suvisan
include_once './baza.class.php';
// session_start();
  $baza = new Baza();
  


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stil.css"/>
    <meta charset="UTF-8">
    <style type="text/css">
  

    </style>
         <link rel="stylesheet" type="text/css" href="stil.css"/>
</head>
<body>

 <div class = "header">
  Quote Creator<br>
     
<?php include 'nav.php';?> 
</div>
  
 

<div class =probaj>
  

  
  <?php
      if ($_SERVER["REQUEST_METHOD"] === 'GET') {
$stranica=$_GET['stranica'];
//prvih 4
 $of=($stranica-1)*12;
$varijabla="select * from ponuda limit 3 offset $of";
     }
     else{
       $varijabla="select * from ponuda limit 3 ";  
     }
         $data = $baza->selectDB($varijabla);
 $ispis = "<table id='table_users' class='custom_table'><thead></thead>";
        $ispis.="<tbody>";
        while($row = $data->fetch_array()) {
//kako isprintati sve proizvode iz jedne ponude
            
            $ispis.="<tr>";
         
                $ispis.="<td>";
            $ispis.=$row[2];
            $ispis.="</td>";
               $ispis.="<td>";
           
            
            $ispis.=$row[3];
            $ispis.="</td>";
                $ispis.="<td>";
            $ispis.=$row[4];
            $ispis.="</td>";
               $ispis.="<td>";
           
            $ispis.=$row[5];
            $ispis.="</td>"; 
          
             $ispis.="</tr>";
         
           
            }
          
        
        $ispis.="</tbody></table>";
          print $ispis;
      
          ?>
   <div class>
    <ul class="pagination">
        <?php
          $upit="select count(id) from ponuda";
 $data = $baza->selectDB($upit);
 $row=$data->fetch_array();
 $broj=$row[0];
 $broj_stranica=ceil($broj/3);
 
 $veca=$stranica+1;
 $manja=$stranica-1;
 $prva =1;
 $zadnja=$broj_stranica;
 
 $i=1;
 echo "<li><a href=\"ponuda.php?stranica=1\">PRVA</a></li>";
 if($stranica==$broj_stranica){echo "<li><a href=\"ponuda.php?stranica=".$stranica."\"> &#10097;</a></li>";}
 else{echo "<li><a href=\"ponuda.php?stranica=".$veca."\"> &#10097;</a></li>";}
        while($i<=$broj_stranica){
            echo "<li><a href=\"ponuda.php?stranica=".$i."\">$i</a></li>";
           //  echo "<li><a href=\"korisnici.php?stranica=".$i."\>$i</a></li>";
            $i++;
        }
         if($stranica==1){echo "<li><a href=\"ponuda.php?stranica=1\"> &#10096;</a></li>";}
 else{echo "<li><a href=\"ponuda.php?stranica=".$manja."\"> &#10096;</a></li>";}
  echo "<li><a href=\"ponuda.php?stranica=".$broj_stranica."\">ZADNJA</a></li>";
        ?>
 
  
</ul>
        </div>
    </div>
      <footer>
  Copyright © 2016 Marta Šostarec <br> All rights reserved  Site by Marta Šostarec<br>
 Made for Acceleratio <img src='Acceleratio.png' alt='Acceleratio' style='padding-left:25px;width:120px;height:100px;'>
 Contact: martamsostarec@gmail.com
</footer>
</body>
</html>