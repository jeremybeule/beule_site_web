<h2>Ajout d'une image</h2>
<hr />

<form method="post" action="./controlValidAddImage.php" enctype="multipart/form-data">
     <label for="image">Image (JPG, PNG) :</label>
     <input type="file" name="image" id="image" /><br />
	 <input type="hidden" name="MAX_FILE_SIZE" value="1048576000000" /><br />
     <input type="submit" name="submit" value="Envoyer" />  
</form>