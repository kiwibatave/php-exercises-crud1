<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="style.css">

    <title>CRUD</title>
  </head>
  <body>
    <!--Exo 1 : afficher tous les clients  -->
    <?php
      include ("connect.php");
       $anwser = $bdd->query('SELECT * FROM clients');
       $anwser1 = $anwser->fetchALL();
      foreach ($anwser1 as $value) {
    ?>
      <h3>Exo1</h3>
      <p>Nom du client : <?=$value->lastName?></p>
      <p>Prénom du client : <?=$value->firstName?></p><hr>
    <?php
      }
    ?>
    <!--Exo 2 : afficher tous les types de spectacbles possibles  -->
    <?php
     $anwser = $bdd->query('SELECT * FROM showTypes');
     $anwser1 = $anwser->fetchALL();
     foreach ($anwser1 as $value) {
    ?>
      <h3>Exo 2</h3>
      <p>Type de show : <?=$value->type?></p><hr>
    <?php
      }
    ?>
    <!--Exo 3 : afficher les 20 premiers clients  -->
    <?php
     $anwser = $bdd->query('SELECT * FROM clients WHERE id BETWEEN 1 AND 20');
     $anwser1 = $anwser->fetchALL();
     foreach ($anwser1 as $value) {
    ?>
     <h3>Exo 3</h3>
     <p>Nom du client : <?=$value->lastName?></p>
     <p>Prénom du client : <?=$value->firstName?></p><hr>
    <?php
     }
    ?>
    <!--Exo 4 : afficher seulement les clients encartés  -->
    <?php
     $anwser = $bdd->query('SELECT * FROM clients JOIN cards ON clients.cardNumber = cards.cardNumber JOIN cardTypes ON cards.cardTypesId = cardTypes.id WHERE cardTypes.id= 1');
     $anwser1 = $anwser->fetchALL();
     foreach ($anwser1 as $value) {
    ?>
     <h3>Exo 4</h3>
     <p>Nom du client : <?=$value->lastName?></p>
     <p>Prénom du client : <?=$value->firstName?></p><hr>
    <?php
     }
    ?>
    <!--Exo 5 : afficher les clients dont le nom de famille commence par M  -->
    <?php
     $anwser = $bdd->query('SELECT * FROM clients WHERE lastName LIKE "M%" ORDER BY lastName');
     $anwser1 = $anwser->fetchALL();
     foreach ($anwser1 as $value) {
    ?>
     <h3>Exo 5</h3>
     <p>Nom du client : <?=$value->lastName?></p>
     <p>Prénom du client : <?=$value->firstName?></p><hr>
    <?php
     }
    ?>
    <!--Exo 6 : afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : *Spectacle* par *artiste*, le *date* à *heure*. -->
    <?php
     $anwser = $bdd->query('SELECT * FROM shows ORDER BY title');
     $anwser1 = $anwser->fetchALL();
     foreach ($anwser1 as $value) {
    ?>
     <h3>Exo 6</h3>
     <p>Nom du spectacle : <?=$value->title?></p>
     <p>Nom de l'artiste : <?=$value->performer?></p>
     <p>Durée du show : <?=$value->duration?></p>
     <p>Heure de début : <?=$value->startTime?></p><hr>
    <?php
     }
    ?>
    <!--Exo 7 :  Afficher tous les clients comme ceci :
    Nom : *Nom de famille du client* Prénom : *Prénom du client*
    Date de naissance : *Date de naissance du client*
    Carte de fidélité : *Oui (Si le client en possède une) ou Non (s'il n'en possède pas)*
    Numéro de carte : *Numéro de la carte fidélité du client s'il en possède une.* -->
    <?php
     $anwser = $bdd->query('SELECT lastName, firstName, birthDate, card, cardNumber, CASE WHEN card = "1" THEN "oui" ELSE "non" END AS card FROM clients');
     $anwser1 = $anwser->fetchALL();
     foreach ($anwser1 as $value) {
    ?>
     <h3>Exo 7</h3>
     <p>Nom du client : <?=$value->lastName?></p>
     <p>Prénom du client : <?=$value->firstName?></p>
     <p>Date de naissance : <?=$value->birthDate?></p>
     <p>Carte de fidélité: <?=$value->card?></p>
     <p>Numéro de carte : <?=$value->cardNumber?></p><hr>
    <?php
     }
    ?>
  </body>
</html>
