<?php
class InflectorsController extends AppController {
	
	public $uses = null;
	
	public $components = array('RequestHandler');
	
	private $reflectExceptions = array(
		'_cache',
		'reset',
		'rules',
		'variable',
	);
	
	public function show() {
		$results = array();
		$string = false;
		if ($this->request->is('post')) {
			$string = $this->request->data['string'];
		} elseif (isset($this->request->params['string'])) {
			$string = $this->request->params['string'];
		}

		$string = urldecode($string);
		
		if ($string) {
			$r = new ReflectionClass('Inflector');
			foreach ($r->getMethods() as $method) {
				if (in_array($method->name, $this->reflectExceptions)) {
					continue;
				}
				$methodName = $method->name;
				$results[$method->name] = Inflector::$methodName($string);
			}
		}
		$this->set(compact('string', 'results'));
	}
}
