<?php
	
	class Usuario
		{
			public string $nombre;
			public string $mail;
			public string $tipoUsuario;
			public string $password;

			function __construct(string $nombre, string $mail, string $tipoUsuario, $password)
				{
					$this->nombre = $nombre;
					$this->mail = $mail;
					$this->tipoUsuario = $tipoUsuario;
					$this->password = $password;
				}


			public static function verUsuario()
				{	

					if(isset($_POST['nombre']) && isset($_POST['mail']) && isset($_POST['tipoUsuario']) && isset($_POST['password']))
						{
							return new Usuario($_POST['nombre'], $_POST['tipoUsuario'], $_POST['mail'], $_POST['password']);
						}

					else
						{
							return new Usuario("", "", "", "");
						}
					}
		}

	class Alumno extends Usuario
		{

		}

	class Profesor extends Usuario
		{
								
		}

	class Directivo extends Usuario
		{
						
		}

?>