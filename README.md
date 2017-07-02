# PHP11 : Relier un formulaire PHP à une Base de Données

Vous vous souvenez de PHP01? 
Après la lecture d'un DTD, vous avez réalisé un formulaire PHP permettant de créer une activité et de l'exporter en XML.
Mais maintenant, l'affaire se corse. Non seulement Erwann a besoin de l'exporter en XML, mais il aimerait également pouvoir stocker le tout au sein d'une base de données. 

Rappel du DTD : 
```
<!ELEMENT root (Programme*) >
<!ELEMENT Programme (Module*) >
<!ATTLIST Programme formation CDATA #IMPLIED>
<!ELEMENT Module (Objectif, PreRequis, Materiel, Sequence*)>
<!ATTLIST Module language CDATA "">
<!ATTLIST Module group CDATA "">
<!ELEMENT Sequence (Objectif, Code, Activite*)>
<!ATTLIST Sequence evaluation CDATA "">
<!ELEMENT Activite (Objectif, Code, Temps?, SousObjectif?, Description?)>
<!ATTLIST Activite done (true|false) "false">
<!ELEMENT Objectif (#PCDATA)>
<!ELEMENT Description (#PCDATA)>
<!ELEMENT PreRequis (#PCDATA) >
<!ELEMENT Materiel (#PCDATA) >
<!ELEMENT SousObjectif (#PCDATA) >
<!ELEMENT Temps (#PCDATA) >
<!ELEMENT Code (#PCDATA) >
```

## Exercice N°1
### Conception de la BDD (90min)
Avant de commencer à développer, il vous faut d'abord réaliser l'UML de la base de données à concevoir. 
Regardez ce qu'est de l'UML et essayez de modéliser la base de données pour le programme, module sequences et activités

### Debrief du besoin (15min)
Par table,  concertez vous afin de savoir si vous avez compris la même chose. 
Et regardez si vous avez réalisé la même modélisation.

### Réalisation du besoin (30min)
Par le biais de phpmyadmin créez une base de données ainsi que les tables comme vous avez pu les modeliser au sein de l'UML.

### Développement

A partir des fichiers PHP ci-joint. Ou de ceux que vous avez fait au sein de PHP01, adaptez votre formulaire pour permettre la saisie d'une activité. 
Un bouton de validation sera présent et enverra les données à une autre page **exportToDB.php**. A vous de choisir les bonnes méthodeis à utiliser.

La page exportToDB.php devra afficher l'activité qui a été créée ou des messages adaptées le cas échéant.

