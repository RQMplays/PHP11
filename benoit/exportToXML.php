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
        header('Content-Description: File Transfer');
        header('Content-Type: text/xml');
        header('Content-Disposition: attachment; filename="downloaded.xml"');
        print_r($string);
