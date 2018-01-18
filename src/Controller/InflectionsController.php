<?php
namespace App\Controller;

use Cake\Utility\Inflector;
use ReflectionClass;
use ReflectionMethod;

class InflectionsController extends AppController {

    protected $reflectExceptions = [
        'reset',
        'rules',
        'delimit',
        'slug',
    ];

    public function index() {
        $results = [];

        if ($this->request->is('post')) {
            $string = filter_var(
                $this->request->getData('string'),
                FILTER_SANITIZE_STRING
            );

            return $this->redirect('/' . $string);
        }

        $string = urldecode($this->request->getParam('string'));

        if ($string) {
            $r = new ReflectionClass(Inflector::class);
            foreach ($r->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
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
