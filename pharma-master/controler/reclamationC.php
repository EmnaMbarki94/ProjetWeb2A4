<?PHP
	
	require '../config.php';

	 // reclamationC.php
class reclamationC{

		function ajouterReclamation($reclamation){
			 $sql="INSERT INTO reclamation
			 VALUES (NULL, :nom, :email, :msg)";
			 $db = new config();
             $conn=$db->getConnexion();
			 try{
			 	$query = $conn->prepare($sql);
			 	$query->execute([
				'nom' => $reclamation->getName(),
				'email' => $reclamation->getEmail(),
		 		'msg' => $reclamation->getMessage(),
			]);			
			}
			catch (Exception $e){
			echo 'Erreur: '.$e->getMessage();
			}
		}
		
		function afficherReclamation(){
			$sql="SELECT * FROM reclamation";
			$conn = new config();
            $db=$conn->getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
			
		}


        function supprimerReclamation($idd){
			$sql="DELETE FROM reclamation WHERE id= :id";
			$conn = new config();
            $db=$conn->getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$idd);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function modifierReclamation($reclamation){
			try {
				$conn = new config();
				$db = $conn->getConnexion();
				$query = $db->prepare(
					"UPDATE reclamation SET 
						name = :name,
						email = :email,
						message = :message
						WHERE id = :id"
				);
		
				// Debugging: Output the SQL query
				echo $query->queryString;
		
				$query->execute([
					'id' => $reclamation->getID(), // Assuming you have a method like getId() in your Reclamation class
					'name' => $reclamation->getName(),
					'email' => $reclamation->getEmail(),
					'message' => $reclamation->getMessage()
				]);
		
				// Check the number of affected rows to see if the update was successful
				echo $query->rowCount() . " records updated successfully <br>";
			} catch (PDOException $e) {
				echo 'Error: ' . $e->getMessage(); // Output or log the error message
			}
		}
		
		function recupererReclamation($idd){
			$sql = "SELECT * FROM reclamation WHERE id = :id";
			$conn = new config();
			$db = $conn->getConnexion();
			try {
				$query = $db->prepare($sql);
				$query->bindParam(':id', $idd);
				$query->execute();
		
				$reclamation = $query->fetch(PDO::FETCH_ASSOC);
				return $reclamation;
			} catch (PDOException $e) {
				die('Error: ' . $e->getMessage());
			}
		}
		

	}

?>