<?php
  $Programme = $_POST['Programme'];
  $LanguageModule = $_POST['LanguageModule'];
  $GroupeModule = $_POST['GroupeModule'];
  $ObjectifModule = $_POST['ObjectifModule'];
  $Prerequis = $_POST['Prerequis'];
  $Materiel = $_POST['Materiel'];
  $Sequence = $_POST['Sequence'];
  $ObjectifSequence = $_POST['ObjectifSequence'];
  $CodeSequence = $_POST['CodeSequence'];
  $done = $_POST['done'];
  $Objectif = $_POST['Objectif'];
  $Code = $_POST['Code'];
  $Temps = $_POST['Temps'];
  $SousObjectif = $_POST['SousObjectif'];
  $Description = $_POST['Description'];

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

	$sql = "INSERT INTO Activite (done, objectif, code, temps, sousObjectif, description)
	VALUES ('$done', '$Objectif', '$Code', '$Temps', '$SousObjectif', '$Description')";

	try {
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$conn->beginTransaction();
		$conn->exec($sql);
		$conn->commit();

	}

	catch (Exception $e) {
		$conn->rollBack();
		echo "L'Entré à échoué: " . $e->getMessage() . "<br/>";
	}
	$conn = null;


  $string = "<?xml version='1.0' encoding='UTF-8'?>
<Programme formation='$Programme'>
  <Module language='$LanguageModule' group='$GroupeModule'>
    <Objectif>$ObjectifModule</Objectif>
    <Prerequis>$Prerequis</Prerequis>
    <Materiel>$Materiel</Materiel>
    <Sequence evaluation='$Sequence'>
      <Objectif>$ObjectifSequence</Objectif>
      <Code>$CodeSequence</Code>
      <Activite done='$done'>
        <Objectif>$Objectif</Objectif>
        <Code>$Code</Code>
        <Temps>$Temps</Temps>
        <SousObjectif>$SousObjectif</SousObjectif>
        <Description>$Description</Description>
      </Activite>
    </Sequence>
  </Module>
</Programme>";

				print("<pre>");
        print_r(htmlentities($string));
				print("</pre>");
