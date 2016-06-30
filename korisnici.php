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
  <img src="drop.png" alt="logo" height="70" width="50">
     
<?php include 'nav.php';?> 
</div>

  <input type="image" src="men.png" alt="submit" width="48" height="48">
 

<div>
    <form method="post" action="korisnici.php" enctype="multipart/form-data">

  
  <?php
    $varijabla="SELECT * FROM  korisnik";
    $data = $baza->selectDB($varijabla);
 $ispis = "<table id='table_users' class='custom_table'><thead></thead>";
        $ispis.="<tbody>";

        while($row = $data->fetch_array()) {
          for($i = 0; $i < count($data); $i++) {
            $ispis.="<tr>";
                $ispis.="<td bgcolor=yellow>";
             
               $ispis.="<a href='ud.php?id=".$row[0]."'><img height='100' width='100' src='kor.png '><a/> ";
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
               $ispis.="<td bgcolor=yellow  >";
            $ispis.=$row[5];
            $ispis.="</td>";
          
             $ispis.="</tr>";
          }
        }
        $ispis.="</tbody></table>";
          print $ispis;
      
          ?>
</form>
    </div>
</body>
</html>