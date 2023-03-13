<?php 

class Template
{

	protected $template;
	protected $vars = array();

	public function __construct($template_in)
	{
		$this->template = $template_in;
	}

	public function __get($key)
	{
		return $this->vars[$key];
	}

	public function __set($key, $value)
	{
		$this->vars[$key] = $value;
	}

	public function __toString()
	{
		extract($this->vars);
		chdir(dirname($this->template));
		ob_start();
		include(basename($this->template));
		return ob_get_clean();
	}

}