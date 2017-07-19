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

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname); //EDU : BAAAAAD
	// Check connection
	if ($conn->connect_error) { //EDU : GOOOOOOD
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "INSERT INTO Activite (done, objectif, code, temps, sousObjectif, description)
	VALUES ('$done', '$Objectif', '$Code', '$Temps', '$SousObjectif', '$Description')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();


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
