<?PHP
	class reclamation{
		private ?int $id=null;
		private ?string $name=null;
		private ?string $email=null;
        private ?string $message=null;	
		
		function __construct($id=null,$name, $email,$message)
        {
			$this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->message = $message;
		}
		
		function getID(){
			return $this->id;
		}
		function getName(){
			return $this->name;
		}
		function getEmail(){
			return $this->email;
		}
		
        function getMessage(){
			return $this->message;
		}
       
		
		function setName($name): void{
			$this->name=$name;
		}
		function setEmail($email): void{
			$this->email=$email;
		}
		
        function setMessage($message): void{
			$this->message=$message;
		}
       
	}

?>