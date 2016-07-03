<?php
//suvisan
include_once './baza.class.php';
// session_start();

  $baza = new Baza();
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $stranica=1;
    // $stranica je zadnja;
    $ime= $_POST['ime'];
    $prezime = $_POST['prezime'];
    $oib= $_POST['oib'];
     $email= $_POST['email'];
       $drzava= $_POST['drzava'];
      if(!empty($ime)  && !empty($prezime)&& !empty($oib)  && !empty($email) && !empty($drzava) ){
                
          
                    $varijabla2 = "INSERT INTO korisnik VALUES (default,   '$ime', '$prezime','$oib','$email','$drzava')";
         $baza->updateDB($varijabla2);        
      }
       }


?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="stil.css"/>
    <meta charset="UTF-8">

         <link rel="stylesheet" type="text/css" href="stil.css"/>
         <script>
             function div_show() {
 var x = document.getElementById('form');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}
           function div_show2() {
 var x = document.getElementById('form2');
    if (x.style.visibility === 'hidden') {
        x.style.visibility = 'visible';
    } else {
        x.style.visibility = 'hidden';
    }
}


             </script>
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> 
</head>
<body>
<div class = "header">
  Quote Creator<br>
     
<?php include 'nav.php';?> 
</div>
<div class="dodaj">
    <button class="submit" style=" margin: 30px;" onclick="div_show()">Dodaj korisnika <i class="fa fa-plus"></i></button>
 <form name="form" id="form" method="post" action="korisnici.php?stranica=1" enctype="multipart/form-data"> 
     <img src='yellow-user-icon-md.png' style=" padding-left: 30px;width:150px;height:150px;" alt='korisnik' ><br>
  
       <input type="text" class="submit2" value="Ime" name="ime" size="20"  >
       <br>
        
       <input type="text" name="prezime" value="Prezime" class="submit2" size="20"  >
    <br>
          
       <input type="text" name="oib" value="OIB" class="submit2" size="20"  ><br>
   <input type="email" name="email" value="email" class="submit2" />  <br>
    <input type="text" name="drzava" value="Drzava" class="submit2" size="20"  >  <br>
    
    <input type ="submit" class="submit" value="Potvrdi">
    </form>
    
</div>
<div class="probaj">


  
  <?php

     if ($_SERVER["REQUEST_METHOD"] === 'GET') {
$stranica=$_GET['stranica'];
//prvih 4
 $of=($stranica-1)*12;
$varijabla="select * from korisnik limit 12 offset $of";
     }
     else{
       $varijabla="select * from korisnik limit 12 ";  
     }
  
  
    $data = $baza->selectDB($varijabla);
 $ispis = "<table id='table_users' class='custom_table'><thead></thead>";
        $ispis.="<tbody>";

        while($row = $data->fetch_array()) {
          for($i = 0; $i < count($data); $i++) {
            $ispis.="<tr>";
                $ispis.="<td>";
             
               $ispis.="<a href='ud.php?id=".$row[0]."'><img height='160' width='160' src='kor.png '><a/> ";
              $ispis.="</td>";
                $ispis.="<td>";
            $ispis.=$row[1];
             $ispis.="  ";
          
            $ispis.=$row[2];
            $ispis.="</td>";
               $ispis.="<td>";
              $ispis.="OIB: "; 
            $ispis.=$row[3];
            $ispis.="</td>";
              $ispis.="<td>";
       
            $ispis.=$row[4];
            $ispis.="</td>";
               $ispis.="<td >";
            $ispis.=$row[5];
            $ispis.="</td>";
                   $ispis.="<td >";
            $ispis.="<a href=\"obrisi.php?id=".$row[0]."&tablica=korisnik&stranica=".$stranica."\"><img src='x.png' alt='obrisi' style='width:15px;height:15px;'></a>";
            $ispis.="Obriši";
             $ispis.="<a href=\"uredi.php?id=".$row[0]."&tablica=korisnik&stranica=".$stranica."\"><img src='edit.png' alt='obrisfri' style='padding-left:25px;width:22px;height:22px;'></a>";
         $ispis.="Uredi";
            $ispis.="</td>";
             $ispis.="</tr>";
          }
        }
        $ispis.="</tbody></table>";
          print $ispis;
       
          ?>
    <div class>
    <ul class="pagination">
        <?php
          $upit="select count(id) from korisnik";
 $data = $baza->selectDB($upit);
 $row=$data->fetch_array();
 $broj=$row[0];
 $broj_stranica=ceil($broj/12);
 
 $veca=$stranica+1;
 $manja=$stranica-1;
 $prva =1;
 $zadnja=$broj_stranica;
 
 $i=1;
 echo "<li><a href=\"korisnici.php?stranica=1\">PRVA</a></li>";
 if($stranica==$broj_stranica){echo "<li><a href=\"korisnici.php?stranica=".$stranica."\"> &#10097;</a></li>";}
 else{echo "<li><a href=\"korisnici.php?stranica=".$veca."\"> &#10097;</a></li>";}
        while($i<=$broj_stranica){
            echo "<li><a href=\"korisnici.php?stranica=".$i."\">$i</a></li>";
           //  echo "<li><a href=\"korisnici.php?stranica=".$i."\>$i</a></li>";
            $i++;
        }
         if($stranica==1){echo "<li><a href=\"korisnici.php?stranica=1\"> &#10096;</a></li>";}
 else{echo "<li><a href=\"korisnici.php?stranica=".$manja."\"> &#10096;</a></li>";}
  echo "<li><a href=\"korisnici.php?stranica=".$broj_stranica."\">ZADNJA</a></li>";
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