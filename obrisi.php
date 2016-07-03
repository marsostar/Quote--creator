<?php
include_once './baza.class.php';
 session_start();
  $baza = new Baza();
  
  $id=$_GET['id'];
  $stranica=$_GET['stranica'];
   $tablica=$_GET['tablica'];
  
   $upit = "delete from $tablica where id= $id ";
   $baza->updateDB($upit);
   if($tablica=="korisnik"){
       header("Location: korisnici.php?stranica=$stranica");
   }
   else if($tablica=="proizvod"){
       header("Location: proizvodi.php?stranica=$stranica");
   }
   else if($tablica=="ponuda"){
       header("Location:ponuda.php?stranica=$stranica");
   }
  
  
  ?>