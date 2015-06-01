<title>Profil de <?php echo (strtoupper($profil->getPrenom()));?></title>
      <h1>Profil de <?php echo (strtoupper($profil->getPrenom()));?></h1>
			<hr />
           
		<table border="1">
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>Section</th>
				<th>Annee</th>
				<th>Couleur de cheveux</th>
				<th>Couleur des yeux</th>
				<th>Taille</th>
			</tr>
   	 	<tr>
				<td><?php echo $profil->getNom();?></td>
   	 		<td><?php echo $profil->getPrenom();?></td>
   	 		<td><?php echo $profil->getEmail();?></td>
				<td><?php echo $profil->getSection();?></td>
				<td><?php echo $profil->getAnnee();?></td>
				<td><?php echo $profil->getCouleurCheveux();?></td>
				<td><?php echo $profil->getCouleurYeux();?></td>
				<td><?php echo $profil->getTaille();?></td>
			</tr>
   	</table>