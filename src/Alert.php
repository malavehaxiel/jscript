<?php

namespace MalaveHaxiel\JScript;

class Alert {

	/**
	 * Esta variable almacena el mensaje del alert
	 *
	 * @var strint $alert
	 */
	protected $alert;

	/**
	 * Instancia un nuevo objeto de tipo Alert
	 *
	 * @param string $alert
	 * @return void
	 */
	public function __construct($alert = null)
	{
		$this->alert = $alert;
	}

	/**
	 * Modifica el valor de la propiedad alert
	 *
	 * @param string $alert
	 * @return void
	 */
	public function setAlert($alert)
	{
		$this->alert = $alert;
	}

	/**
	 * Devuelve el mensaje almacenado en la clase
	 *
	 * @return string
	 */
	public function getAlert()
	{
		return $this->alert;
	}

	/**
	 * Lanza un alert en el navegador con el mensaje almacenada en la variable alert
	 *
	 * @return void 
	 */
	public function execute()
	{
		echo '<script>alert("'.$this->getAlert().'")</script>';
	}
}