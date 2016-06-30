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
    <form method="post" action="ponuda.php" enctype="multipart/form-data">

  
  <?php
    $varijabla="SELECT * FROM  ponuda group by `broj ponude`";
    $data = $baza->selectDB($varijabla);
 $ispis = "<table id='table_users' class='custom_table'><thead></thead>";
        $ispis.="<tbody>";
$row = $data->fetch_array();
$i=1;
$bi=1;
        while($row = $data->fetch_array()) {
//kako isprintati sve proizvode iz jedne ponude
            if($i==$bi){
            $ispis.="<tr>";
            $ispis.=$i;
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
          
             //$ispis.="</tr>";
            }
            else{
              
            $ispis.=$row[3];
            $ispis.="</td>";
                $ispis.="<td>";
            $ispis.=$row[4];
            $ispis.="</td>";
               $ispis.="<td>";
           
            $ispis.=$row[5];
            $ispis.="</td>";    
            }
          }
        
        $ispis.="</tbody></table>";
          print $ispis;
      
          ?>
</form>
    </div>
</body>
</html>