<div class="row">
    <div class="columns large-12">&nbsp;</div>
</div>
<div class="row">
    <div class="columns large-12">
        <?php
        $this->assign('title', 'Inflector');
        ?>
        <?= $this->Form->create() ?>
        <?= $this->Form->control('string', ['label' => false, 'value' => $string]) ?>
        <?= $this->Form->button(__('Inflect me!')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>

<?php if ($results) : ?>
<div class="row">
    <div class="columns large-12">
        <table id="inflections">
            <thead>
                <tr>
                    <th colspan="2"><?= __('Method') ?></th>
                    <th><?= __('Result') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($results as $method => $result) : ?>
                    <tr>
                        <td><?= $method ?></td>
                        <td>=&gt;</td>
                        <td><?= h($result) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php endif ?>

<div class="row">
    <div class="columns large-12">
        <p>Running on CakePHP <?= \Cake\Core\Configure::version() ?></p>
    </div>
</div>
