 
<h1> Central d'achats</h1>
<h2> Commandes clients</h2>
<table  border="1">

    <tr>
        <td height='60' align="center" bgcolor=" #b3b3ff">numero de commande </td>
        <td height='60'align="center"bgcolor=" #b3b3ff" >nemero de client</td>
        <td height='60'align="center"bgcolor=" #b3b3ff">date de comande</td>
        <td height='60'align="center"bgcolor=" #b3b3ff">designation article </td>
        <td height='60'align="center" bgcolor=" #b3b3ff">quantite </td>
        <td height='60'align="center"bgcolor=" #b3b3ff">prix unitaire </td>
        <td height='60'align="center"bgcolor=" #b3b3ff">date de livraison</td>
        <td height='60' align="center"bgcolor=" #b3b3ff">Adresse client </td>
        
    </tr>
<?php

$data = array();
try {
    $file_handle = fopen("commande.txt", "rb");
    if (! $file_handle) {
        throw new Exception("Could not open the file!");
    }


    while (!feof($file_handle) ) {
        //récupération des données du ficher des commandes ligne par ligne
        $line_of_text = fgets($file_handle);
        //separation des donnees
        $parts = explode('|', $line_of_text);
        //affichage sous form du tableau
        echo "<tr><td height='30'>$parts[0]</td><td>$parts[1]</td><td height='30'>$parts[2]</td><td>$parts[3]</td><td height='30'>$parts[4]</td><td>$parts[5]</td><td height='30'>$parts[6]</td><td>$parts[7]</td></tr>";
        //archivage des donnees dans les fichiers pour chaque client
        if ($parts[1]==" CLI1001 "){
            //Remplissage du variable par les donnees
            $content = file_exists("pscde01_CLI1001.txt") ? file_get_contents("pscde01_CLI1001.txt") : "";
            $content .= $line_of_text . "\n";
            //ajout des donnees au fichier 
            file_put_contents("pscde01_CLI1001.txt", $content);
        }else if($parts[1]==" CLI1004 "){
            //Remplissage du variable par les donnees
            $content = file_exists("psccl01_CLI1004.txt") ? file_get_contents("psccl01_CLI1004.txt") : "";
            $content .= $line_of_text . "\n";
            //ajout des donnees au fichier 
            file_put_contents("psccl01_CLI1004.txt", $content);
        }
    }
    fclose($file_handle);
}
catch (Exception $e) {
    echo "Error (File: ".$e->getFile().", line ".
          $e->getLine()."): ".$e->getMessage();
}

?>
</table>