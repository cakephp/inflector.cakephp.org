<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Http\Response;
use Cake\Utility\Inflector;
use ReflectionClass;
use ReflectionMethod;

class InflectionsController extends AppController
{
    /**
     * @var array<string>
     */
    protected array $reflectExceptions = [
        'reset',
        'rules',
        'delimit',
        'slug',
    ];

    /**
     * Show inflector results for a submitted or routed string.
     *
     * @param string|null $string String from the route.
     * @return \Cake\Http\Response|null
     */
    public function index(?string $string = null): ?Response
    {
        $results = [];

        if ($this->request->is('post')) {
            $string = trim(strip_tags((string)$this->request->getData('string')));

            if ($string === '') {
                return $this->redirect('/');
            }

            return $this->redirect(['action' => 'index', $string]);
        }

        $string = $string !== null ? urldecode($string) : '';

        if ($string !== '') {
            $reflection = new ReflectionClass(Inflector::class);

            foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
                if (!$this->isReflectableInflectorMethod($method)) {
                    continue;
                }

                $methodName = $method->getName();
                $results[$methodName] = Inflector::$methodName($string);
            }
        }

        $this->set(compact('string', 'results'));

        return null;
    }

    /**
     * Check whether an Inflector method can be called with a single string argument.
     *
     * @param \ReflectionMethod $method Method to inspect.
     * @return bool
     */
    protected function isReflectableInflectorMethod(ReflectionMethod $method): bool
    {
        return $method->isStatic()
            && $method->getNumberOfRequiredParameters() <= 1
            && !in_array($method->getName(), $this->reflectExceptions, true);
    }
}
