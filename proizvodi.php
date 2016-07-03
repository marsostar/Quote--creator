<?php
//suvisan
include_once './baza.class.php';
// session_start();
  $baza = new Baza();
   if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $naziv= $_POST['naziv'];
    $cijena = $_POST['cijena'];
    
      if(!empty($naziv)  && !empty($cijena)){
                if(getimagesize($_FILES['slika']['tmp_name']) == FALSE)
                {
                    echo "Odaberite sliku";
                }
                else
                {
                    $slika= addslashes($_FILES['slika']['tmp_name']);
                    //$name= addslashes($_FILES['image']['name']);
                    $slika= file_get_contents($slika);
                    $slika= base64_encode($slika);
                    $varijabla2 = "INSERT INTO proizvod VALUES (default,   '$cijena', '$naziv','$slika')";
         $baza->updateDB($varijabla2);        
       }
      
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


             </script>
            <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> 
</head>
<body>
<div class = "header">
  Quote Creator<br>
     
<?php include 'nav.php';?> 
</div>
<div class="dodaj">
    <button class="submit" style=" margin: 30px;" onclick="div_show()">Dodaj proizvod <i class="fa fa-plus"></i></button>
 <form name="form" id="form" method="post" action="proizvodi.php" enctype="multipart/form-data"> 
     <img src='product.png' style=" padding-left: 30px;width:150px;height:150px;" alt='proizvod' ><br>
  
       <input type="text" class="submit2" value="Naziv" name="naziv" size="20"  >
       <br>
        
       <input type="text" name="cijena" value="Cijena" class="submit2" size="20"  >
    <br>
     Dodaj sliku
       <input type="file"  name="slika" id="slika">
    
    <input type ="submit" class="submit" value="Potvrdi">
    </form>
</div>

  
 

<div class="probaj">


  
  <?php
 
    if ($_SERVER["REQUEST_METHOD"] === 'GET') {
$stranica=$_GET['stranica'];
//prvih 4
 $of=($stranica-1)*12;
$varijabla="select * from proizvod limit 12 offset $of";
     }
     else{
       $varijabla="select * from proizvod limit 12 ";  
     }
        $data = $baza->selectDB($varijabla);
 $ispis = "<table id='table_users' class='custom_table'><thead></thead>";
        $ispis.="<tbody>";
        while($row = $data->fetch_array()) {
          for($i = 0; $i < count($data); $i++) {
            $ispis.="<tr>";
                $ispis.="<td>";
            $ispis.=$row[2];
            $ispis.="</td>";
               $ispis.="<td>";
           $ispis.='<img height="50" width="50" src="cijena.png "> ';
            $ispis.=$row[1];
             $ispis.="kn";
            $ispis.="</td>";
                 $ispis.="<td>";
            $ispis.='<img height="200" width="200" src="data:image;base64,'.$row[3].' "> ';       
            $ispis.="</td>";
           $ispis.="<td >";
            $ispis.="<a href=\"obrisi.php?id=".$row[0]."&tablica=proizvod&stranica=".$stranica."\"><img src='x.png' alt='obrisi' style='width:15px;height:15px;'></a>";
            $ispis.="Obriši";
            $ispis.="<a href=\"uredi.php?id=".$row[0]."&tablica=proizvod&stranica=".$stranica."\"><img src='edit.png' alt='obrisfri' style='padding-left:25px;width:22px;height:22px;'></a>";
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
          $upit="select count(id) from proizvod";
 $data = $baza->selectDB($upit);
 $row=$data->fetch_array();
 $broj=$row[0];
 $broj_stranica=ceil($broj/12);
 
 $veca=$stranica+1;
 $manja=$stranica-1;
 $prva =1;
 $zadnja=$broj_stranica;
 
 $i=1;
 echo "<li><a href=\"proizvodi.php?stranica=1\">PRVA</a></li>";
 if($stranica==$broj_stranica){echo '<li><a href="proizvodi.php?stranica='.$stranica.'"> &#10097;</a></li>';}
 else{echo "<li><a href=\"proizvodi.php?stranica=".$veca."\"> &#10097;</a></li>";}
        while($i<=$broj_stranica){
            echo "<li><a href=\"proizvodi.php?stranica=".$i."\">$i</a></li>";
           //  echo "<li><a href=\"korisnici.php?stranica=".$i."\>$i</a></li>";
            $i++;
        }
         if($stranica==1){echo "<li><a href='proizvodi.php?stranica=1'> &#10096;</a></li>";}
 else{echo "<li><a href=\"proizvodi.php?stranica=".$manja."\"> &#10096;</a></li>";}
  echo "<li><a href=\"proizvodi.php?stranica=".$broj_stranica."\">ZADNJA</a></li>";
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