

<?php
		try{
			// On se connecte à MySQL
			$bdd = new PDO('mysql:host=localhost;dbname=geo_quizz_bd;charset=utf8', 'root', 'root');
		}catch(Exception $e){
			// En cas d'erreur, on affiche un message et on arrête tout
			die('Erreur : ');
		}

		// Si tout va bien, on peut continuer
		if(empty($_POST['pseudo']) || empty($_POST['mdp'])){
?>	
		<div>			
			<form action="connexion2.php" method="post">
				pseudo : <input type="text" name="pseudo" required><br />
				Mot de mdpe : <input type="password" name="mdp" required><br />
				<input type="submit" value="Connexion">
			</form>
		</div>								
<?php
		}else{
				$pseudo = $_POST['pseudo'];
				$mdp = $_POST['mdp'];
				
				$reponse = $bdd->query("SELECT * FROM utilisateur WHERE pseudo='$pseudo' AND  mdp='$mdp' ");
				$reponse->execute(array('pseudo' => $_POST['pseudo'],'mdp' => sha1($_POST['mdp'])));
				$resultat = $reponse->fetch();
				
				if (!$resultat) {
					header('Location:http://localhost/pwapp/vue/connexion.html');

					echo '<div class="error-pseudo">Vos identifiants sont incorrects !</div>';
				}else{
					session_start(); 
					echo $_POST['pseudo'];
					$_SESSION['pseudo'] = $_POST['pseudo']; 
					$_SESSION['mdp'] = $_POST['mdp']; 
			
					header('Location:http://localhost/pwapp/vue/menu.html');
				
					exit(); 
				}
		}
?>