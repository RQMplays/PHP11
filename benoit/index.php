<!DOCTYPE html>
<html>
  <head>
  <title>Creation d'une Activité</title>
  <meta charset="UTF-8">
  <link href="main.css" rel="stylesheet">
  </head>
  <body>
		<?php
		include 'config.php';

		try {
			// Create connection
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		}
		// Check Error
		catch (PDOException $e) {
			print "Erreur de connexion : " . $e->getMessage() . "<br/>";
	    die();
		}

		$sql = "SELECT idActivite, objectif, code, temps, sousObjectif, description, done, Sequence_idSequence FROM Activite";

		try {
			$conn->beginTransaction();
			$data = $conn->prepare($sql);
			$data->execute();
			$conn->commit();
		}

		catch (Exception $e) {
			$conn->rollBack();
			echo "L'Entré à échoué: " . $e->getMessage() . "<br/>";
		}




		$result = $data->fetchAll(PDO::FETCH_ASSOC);
		print("<pre>");
		print_r($result);
		print("</pre>");

		$conn = null;
		$data = null;
		$result = null;

		?>

    <h1>Création de Cours<br> Code Académie</h1>
    <form action="exportToDB.php" method="post">
      <p>Activité déja faite? : <input type="radio" name="done" value="false" checked> Non
      <input type="radio" name="done" value="true"> Oui</p>
      <p>Objectif de l'Activité : <input type="text" name="Objectif"></p>
      <p>Code de l'Activité : <input type="text" name="Code"></p>
      <p>Temps de l'Activité : <input type="text" name="Temps"></p>
      <p>Sous Objectif de l'Activité : <input type="text" name="SousObjectif"></p>
      <p>Description de l'Activité : <textarea  rows="20" name="Description"></textarea></p>
      <p><input type="submit" value="TELECHARGER en XML"></p>
    </form>
  </body>
</html>
