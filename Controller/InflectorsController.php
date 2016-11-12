<?php
App::uses('AppController', 'Controller');
App::uses('Inflector', 'Utility');

class InflectorsController extends AppController {

	public $uses = null;

	public $components = array('RequestHandler');

	protected $_reflectExceptions = array(
		'_cache',
		'reset',
		'rules',
		'variable',
	);

	/**
	 * InflectorsController::show()
	 *
	 * @return void
	 */
	public function show() {
		$results = array();
		$string = false;
		if ($this->request->is('post')) {
			$string = filter_var($this->request->data['string'], FILTER_SANITIZE_STRING);
			return $this->redirect('/' . $string);
		} elseif (isset($this->request->params['string'])) {
			$string = $this->request->params['string'];
		}

		$string = urldecode($string);

		if ($string) {
			$r = new ReflectionClass('Inflector');
			foreach ($r->getMethods() as $method) {
				if (in_array($method->name, $this->_reflectExceptions)) {
					continue;
				}
				$methodName = $method->name;
				$results[$method->name] = Inflector::$methodName($string);
			}
		}
		$this->set(compact('string', 'results'));
	}

}
