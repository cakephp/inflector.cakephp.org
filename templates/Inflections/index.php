<?php
/**
 * @var \App\View\AppView $this
 * @var array<string, string> $results
 * @var string $string
 */

use Cake\Core\Configure;

$this->assign('title', 'Inflector');
?>

<section class="py-10 md:py-14 text-center">
    <div class="mb-8">
        <p class="text-sm font-semibold uppercase tracking-wide text-cake">CakePHP <?= h(Configure::version()) ?></p>
        <h1 class="mt-2 text-4xl font-bold text-base-100">Inflector</h1>
    </div>

    <?= $this->Form->create(null, [
        'class' => 'mb-10 flex flex-col justify-center gap-3 sm:flex-row',
    ]) ?>
        <?= $this->Form->text('string', [
            'aria-label' => __('String'),
            'class' => 'min-h-12 flex-1 rounded-md border border-slate-300 bg-white px-4 text-lg text-slate-900 shadow-sm outline-none transition focus:border-cake focus:ring-2 focus:ring-cake/20',
            'placeholder' => __('article_tag'),
            'value' => $string,
        ]) ?>
        <?= $this->Form->button(__('Inflect me'), [
            'class' => 'min-h-12 rounded-md bg-cake px-5 text-base font-semibold text-white shadow-sm transition hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-cake/30',
        ]) ?>
    <?= $this->Form->end() ?>

    <?php if ($results) : ?>
        <div class="overflow-hidden rounded-md border border-slate-200 bg-white shadow-sm">
            <table id="inflections" class="min-w-full divide-y divide-slate-200 text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-4 py-3 font-semibold"><?= __('Method') ?></th>
                        <th class="w-12 px-2 py-3 font-semibold"></th>
                        <th class="px-4 py-3 font-semibold"><?= __('Result') ?></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-slate-800">
                    <?php foreach ($results as $method => $result) : ?>
                        <tr class="hover:bg-slate-50">
                            <td class="whitespace-nowrap px-4 py-3 font-mono text-sm text-slate-700"><?= h($method) ?></td>
                            <td class="px-2 py-3 text-slate-300">=&gt;</td>
                            <td class="px-4 py-3 font-mono text-sm text-slate-950"><?= h($result) ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    <?php endif ?>
</section>
