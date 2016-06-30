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

  
 

<div>
    <form method="post" action="proizvodi.php" enctype="multipart/form-data">

  
  <?php
    $varijabla="SELECT * FROM  proizvod";
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
           $ispis.='<img height="20" width="20" src="cijena.png "> ';
            $ispis.=$row[1];
             $ispis.="kn";
            $ispis.="</td>";
                 $ispis.="<td>";
            $ispis.='<img height="300" width="300" src="data:image;base64,'.$row[3].' "> ';       
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