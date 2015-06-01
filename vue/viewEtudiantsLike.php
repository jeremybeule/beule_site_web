<h1>Liste des étudiants de polytech</h1>

<table>
	<tr>
		<th>Nom</th>
		<th>Prénom</th>
  		<th>section</th>
		<th>annee</th>
		<th>couleurCheveux</th>	
		<th>couleurYeux</th>
		<th>taille</th>
		<th>Like</th>
  <?php
	foreach ($etudiants as $tuple)
	{ 	
		echo "<tr>"
				."<td>".htmlspecialchars($tuple['nom'])."</td>"
				."<td>".htmlspecialchars($tuple['prenom'])."</td>"
				."<td>".htmlspecialchars($tuple['section'])."</td>"	
				."<td>".htmlspecialchars($tuple['annee'])."</td>"
				."<td>".htmlspecialchars($tuple['couleurCheveux'])."</td>"
				."<td>".htmlspecialchars($tuple['couleurYeux'])."</td>"			
				."<td>".htmlspecialchars($tuple['taille'])."</td>"
				."<td>"."<button type= \"button\" " . "onclick=\"location.href='./controlLike.php?id=" 
				. $tuple['id']. "'\"><img src='../Images/boutonlike.jpg'  alt='Image Like cet personne'/>
        		</button>"."</td>"
			."</tr>";
	}
		echo "</table><br/>";
	?>