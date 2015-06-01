<title>Liste de vos match></title>
<h1>Liste de vos match</h1>

<table border = "1">
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
  		<th>section</th>
		<th>annee</th>
		<th>couleurCheveux</th>	
		<th>couleurYeux</th>
		<th>taille</th>
  <?php
	foreach ($etudiants as $tuple)
	{ 	
		echo "<tr>"
				."<td>".$tuple['nom']."</td>"
				."<td>".$tuple['prenom']."</td>"
				."<td>".$tuple['section']."</td>"	
				."<td>".$tuple['annee']."</td>"
				."<td>".$tuple['couleurCheveux']."</td>"
				."<td>".$tuple['couleurYeux']."</td>"			
				."<td>".$tuple['taille']."</td>"
			."</tr>";
	}
		echo "</table><br/>";
	?>