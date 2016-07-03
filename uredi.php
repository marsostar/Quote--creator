<?php

include_once './baza.class.php';
 session_start();
  $baza = new Baza();
  
  $id=$_GET['id'];
  $stranica=$_GET['stranica'];
   $tablica=$_GET['tablica'];
  
   if($tablica=="korisnik"||$tablica=="proizvod"){
   $upit = "select* from $tablica where id= $id ";
   $data=$baza->updateDB($upit);
   
    $upit2 = "delete from $tablica where id= $id ";
   $baza->updateDB($upit2);
   
   
    while($row = $data->fetch_array()) {
        if($tablica=="korisnik"){
        echo '<form name="form" id="form" method="post" action="korisnici.php?stranica='.$stranica.'" enctype="multipart/form-data"> 
     <img src="yellow-user-icon-md.png" style=" padding-left: 30px;width:150px;height:150px;" alt="korisnik" ><br>
  
       <input type="text" class="submit2" value="'.$row[1].'" name="ime" size="20"  >
       <br>
        
       <input type="text" name="prezime" value="'.$row[2].'" class="submit2" size="20"  >
    <br>
          
       <input type="text" name="oib" value="'.$row[3].'" class="submit2" size="20"  ><br>
   <input type="email" name="email" value="'.$row[4].'" class="submit2" />  <br>
    <input type="text" name="drzava" value="'.$row[5].'" class="submit2" size="20"  >  <br>
    
    <input type ="submit" class="submit" value="Potvrdi">
    </form>';
       
        }
          else if($tablica=="proizvod"){
               echo '<form name="form" id="form" method="post" action="uredi.php?stranica='.$stranica.'" enctype="multipart/form-data"> 
     <img src="product.png" style=" padding-left: 30px;width:150px;height:150px;" alt="proizvod" ><br>
  
       <input type="text" class="submit2" value="'.$row[2].'" name="naziv" size="20"  >
       <br>
        
       <input type="text" name="cijena" value="'.$row[1].'" class="submit2" size="20"  >
    <br>
  
    
    <input type ="submit" class="submit" value="Potvrdi">
    </form>';
      
       
   }
   else if($tablica=="ponuda"){
      
   }
  
        
    }
   }
   ?>
