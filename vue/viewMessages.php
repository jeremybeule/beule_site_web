<title>Messages></title>
<h1>Messages</h1>

<table>
	<tr>
		<th>Pseudo</th>
		<th>Message</th>	
  
  <?php
	foreach ($messages as $tuple)
	{ 	
		echo "<tr>"
				."<td>".$tuple['nomM']."</td>"
				."<td>".$tuple['messageM']."</td>"	
			."</tr>";
	}
		echo "</table><br/>";
	?>