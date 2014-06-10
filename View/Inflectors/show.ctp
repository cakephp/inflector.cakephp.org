<?php
echo $this->Form->create(null, array('method' => 'get', 'url' => '/'));
echo $this->Form->input('string', array('label' => false, 'value' => $string));
echo $this->Form->end('Inflect me baby!');

if (isset($results) && $results) {
	echo $this->element('results');
}

echo $this->Html->para(null, sprintf(
	'<small>%s %s</small>',
	__('Running on CakePHP'),
	Configure::version()
));
