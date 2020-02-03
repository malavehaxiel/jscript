<?php 

namespace MalaveHaxiel\JScript;


class ScriptBuilder extends Alert {

	protected $string;

	public function __construct()
	{

	}

	public function alert($msj)
	{
		return new Alert($msj);
	}

	public function script($script)
	{
		$this->setString($script);

		return $this;
	}

	protected function getReference($selects)
    {
    	return "$('".$selects."')";
    }

    public function getString()
    {
    	return $this->string;
    }

    protected function setString($string)
    {
    	$this->string = $string;
    }

    protected function resolveCallback($closure, $callback)
    {
    	return $closure == true ? 'function(){'.$callback.'}' : $callback;
    }

	public function selectpicker()
    {
        $this->script($this->getReference('.selectpicker').'.selectpicker();');

        return $this;
    }

    public function datepicker()
    {
        $this->script($this->getReference('.datepicker').'.datepicker();');

        return $this;
    }

    public function submit($form_id)
    {
        $this->script($this->getReference($form_id).".submit();");

        return $this;
    }

    public function on($selects, $callback = null, $event = null, $closure = false)
    {
    	$callback = $this->resolveCallback($closure, $callback);

    	$this->script($this->getReference($selects).'.on("'.$event.'", '.$callback.');');

    	return $this;
    }

    public function change($selects, $callback = null, $closure = false)
    {
    	$this->on($selects, $callback, 'change', $closure);

    	return $this;
    }

    public function click($selects, $callback = null, $closure = false)
    {
    	$this->on($selects, $callback, 'click', $closure);

    	return $this;
    }

    public function focus($selects, $callback = null, $closure = false)
    {
    	$this->on($selects, $callback, 'focus', $closure);

    	return $this;
    }

    public function datatable($selects, $paginate = true, $info = true, $searching = true, $lengthMenu = array(8,12))
    {
        $paginate = $paginate == true ? 'true' : 'false';
        $info = $info == true ? 'true' : 'false';
        $searching = $searching == true ? 'true' : 'false';

        $this->script('data_table = '.$this->getReference($selects).'.DataTable({
            "language":{
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No existe registros asociados a la busqueda",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": "No existe registro disponible",
                "infoFiltered": "(filtrado de _MAX_ registros en total)",
                "search":"Buscar:",
                "paginate": {
                    "first":      "Primero",
                    "last":       "Último",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                }
            },
            "lengthMenu": ['.implode(',',$lengthMenu).'],
            responsive: true,
            paginate: '.$paginate.',
            searching: '.$searching.',
            info: '.$info.'
            });
        ');

        return $this;
    }

    public function getScript()
    {
    	print_r($this->getString());
    }

    public function get()
    {
    	print_r('<script>'.$this->getString().'</script>');
    }
    
}
