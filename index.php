<?php 

//print_r( $_POST );
//die('fin.');



	try {
		$bdd = new
		PDO('mysql:host=localhost;dbname=annuaire;charset=utf8', 'root', 'ENZMAT');
	}
	catch (Exception $e){
		die('Erreur : ' . $e->getMessage());
	}
	//création d'une classe utilisateur
	class User {
		private $id;
		private $Nom;
		private $Prenom;
		private $BirthDate;
		private $Adresse;
		private $Phone;
		private $Entreprise;
		//constructor de l'utilisateur
		function __construct($id, $Nom, $Prenom, $BirthDate, $Adresse, $Phone, $Entreprise){
			$this->id = $id;
			$this->Nom = $Nom;
			$this->Prenom = $Prenom;
			$this->BirthDate = $BirthDate;
			$this->Adresse = $Adresse;
			$this->Phone = $Phone;
			$this->Entreprise = $Entreprise;
		}
		//accesseurs//
		//id
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		//Nom
		public function getLastName(){
			return $this->Nom;
		}
		public function setLastName($Nom){
			$this->Nom = $Nom;
		}
		//Prénom
		public function getFirstName(){
			return $this->Prenom;
		}
		public function setFirstName($Prenom){
			$this->Prenom = $Prenom;
		}
		//BirthDate
		public function getBirthDate(){
			return $this->BirthDate;
		}
		public function setBirthDate($BirthDate){
			$this->BirthDate = $BirthDate;
		}
		//Adresse
		public function getAdress(){
			return $this->Adresse;
		}
		public function setAdress($Adresse){
			$this->Adresse = $Adresse;
		}
		//Phone
		public function getPhone(){
			return $this->Phone;
		}
		public function setPhone($Phone){
			$this->Phone = $Phone;
		}
		//Entreprise
		public function getEntreprise(){
			return $this->Entreprise;
		}
		public function setEntreprise($Entreprise){
			$this->Entreprise = $Entreprise;
		}

	}

	$User = new User($_POST['id'], $_POST['Nom'], $_POST['Prenom'], $_POST['BirthDate'], $_POST['Adresse'], $_POST['Phone'], $_POST['Entreprise']); 


	$req = $bdd->prepare('INSERT INTO contacts ( id, Nom, Prenom, BirthDate, Adresse, Phone, Entreprise) VALUES( :id, :Nom, :Prenom, :BirthDate, :Adresse, :Phone, :Entreprise)');

	$data = array(
			'id' => $User->getId(),
			'Nom' => $User->getLastName(),
			'Prenom' => $User->getFirstName(),
			'BirthDate' => $User->getBirthDate(),
			'Adresse' => $User->getAdress(),
			'Phone' => $User->getPhone(),
			'Entreprise' =>$User->getEntreprise(),
	);


	$req->execute($data);

	//création d'une classe group
	class group {
		private $id;
		private $groupName;
		private $newNameGroup;
		
		//constructor du groupe
		function __construct($id, $groupName, $newNameGroup){
			$this->id = $id;
			$this->groupName = $groupName;
			$this->newNameGroup = $newNameGroup;

		}
	 	//accesseurs
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}
		public function getGroupName(){
			return $this->groupName;
		}
		public function setGroupName($groupName){
			$this->groupName = $groupName;
		}
		public function getNewNameGroup(){
			return $this->newNameGroup;
		}
		public function setNewNameGroup($newNameGroup){
			$this->newNameGroup = $newNameGroup;
		}
		
	}
	
	$group = new group($_POST['id'], $_POST['groupName'], $_POST['newNameGroup']);
	//var_dump($_POST['groupName']);

	$req = $bdd->prepare('INSERT INTO groupType ( id, groupName, newNameGroup ) VALUES( :id, :groupName, :newNameGroup )');

	$data = array(
			'id' => $group->getId(),
			'groupName' => $group->getGroupName(),
			'newNameGroup' => $group->getNewNameGroup(),
			
	);


	$req->execute($data);

	header('Location: viewUser.php');

	//echo $req->errorInfo()[2];

	//return [$User];
	
?>