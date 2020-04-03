<?php

// exercice 1 ;

function coupeavecdelimiteur(String $delimiteur, String $string): array  
{  
  $arr = [];  
  while(strlen($string) > 0)  
  {  
    $pos = strpos($string, $delimiteur);  
    if($pos)  
    {  
      $arr[] = trim(substr($string, 0, $pos));  
      $string = ltrim(substr($string, $pos), $delimiteur);  
    } else {  
      $arr[] = trim($string);  
      $string = '';  
    }  
  }  
  return $arr;  
}
$string = "exercice 1 LPII G1 ben lhoucine brahim ainane youssef ";
$delimiteur = " ";
$array = coupeavecdelimiteur( $delimiteur ,$string);

echo "<br>Test de fonction : coupeavecdelimiteu(delimiteur ,string) , <br><b>String:</b> ".$string."<br><br>";
echo "<b>Result:</b><br>";
echo "<pre>";
print_r($array);
echo "</pre>";

?>

<html>
<body>
<!-- exercice 3 -->
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<label for="Jour">choisir une date  ? :</label><br/>
                    <select name="Jour" id="Jour" />
                       <?php

                                for ( $i =1 ;$i<=31 ;$i++ ) {
                                         echo '<option value ='."$i".'>';
                                         echo $i;
                                        echo '</option>';
                                }
                                
                        ?>
                    </select>
                    <select name="MOIS" id="MOIS" />
                    <?php

                                for ( $i =1 ;$i<=12 ;$i++ ) {
                                    echo '<option value ='."$i".'>';
                                         echo $i;
                                         echo '</option>';
                                }
                    ?>
                    </select>
                        <select name="ANNEE" id="ANNEE" />
                        <?php

                            for ( $i =1900 ;$i<=2020 ;$i++ ) {
                                echo '<option value ='."$i".'>';
                              echo $i;
                              echo '</option>';
                            }
                        ?>
                    </select>
                <p><input type="submit" value="Envoyer"></p>
               

            </form>
            <?php 
function bissextile($annee) {
	if( (is_int($annee/4) && !is_int($annee/100)) || is_int($annee/400)) {
		// Année bissextile
		// vous remplacez le retour par ce que vou voulez
		return TRUE;
	} else {
		// Année NON bissextile
		// vous remplacez le retour par ce que vou voulez
		return FALSE;
	}
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){ /* Si je pousse sur le bouton 'submit' alors on continue... */  
   
    $jour = ($_POST['Jour']);
    $mois = ($_POST['MOIS']);
    $annee = ($_POST['ANNEE']);

    if($jour==29 && $mois==2){   

    if(bissextile($annee)) {
		echo '<strong>'  .'  Date valide </strong><br>';
	} else {
		echo $annee . ' :Date non valide annee Non bissextile<br>';
	} 

}else echo '<strong>'  .'  Date valide </strong><br>';
}
?>
 </body>
 <html>
  

  