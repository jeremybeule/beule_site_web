<h2>Inscription</h2>
<hr />

	<form name = "forminscrip" method="POST" action="./controlValidInscription.php" onSubmit="return verifMDP();">
		<fieldset>
		<h3>Veuillez remplir le formulaire d'inscription</h3>
			<label>Nom : </label><input type="text" name="nom" placeholder="Nom" required><br />
			<label>Prénom : </label><input type="text" name="prenom" placeholder="Prénom" required><br />
			<label>Email : </label><input type="email" name="email" placeholder="Email" required><br />
			<label>Mot de passe : </label><input type="password" name="mdp" required><br />
			<label>Confirmation du mot de passe : </label><input type="password" name="mdpc" required><br />

       		<label for="section">Section:</label>
       		<select name="section" id="section">
       		<option value="IG">IG</option>
           	<option value="STE">STE</option>
           	<option value="STIA">STIA</option>
           	<option value="MAT">MAT</option>
           	<option value="MI">MI</option>
           	<option value="MEA">MEA</option>
           	<option value="MSI">MSI</option>
           	<option value="EGC">EGC</option>
           	<option value="SE">SE</option>
            <option value="PEIP">SE</option>
       		</select>

   			<label>année : </label><input type="number" min="1" max="5" name="annee" required><br />

   			<label for="taille">Taille:</label>
       		<select name="taille" id="taille">
       		<option value="petit">petit</option>
           	<option value="moyen">moyen</option>
           	<option value="grand">grand</option>
       		</select>

   			<label for="couleurCheveux">Couleur des Cheveux:</label>
       		<select name="couleurCheveux" id="couleurCheveux">
       		<option value="brun">brun</option>
           	<option value="blond">blond</option>
           	<option value="chatain">chatain</option>
           	<option value="roux">roux</option>
       		</select>

   			<label for="CouleurYeux">Couleur des yeux:</label>
       		<select name="couleurYeux" id="couleurYeux">
           	<option value="bleu">bleu</option>
           	<option value="vert">vert</option>
           	<option value="marron">marron</option>
       		</select>

			<input type="submit" value="Envoyer">
		</fieldset>
	</form>
<?php

		