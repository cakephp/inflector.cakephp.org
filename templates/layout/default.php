<?php
/**
 * @var \App\View\AppView $this
 */

$title = $this->fetch('title') ?: 'Inflector';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= h($title) ?> | CakePHP</title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="min-h-screen bg-slate-100 text-slate-900 antialiased">
    <nav class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-4 py-4 sm:px-6">
            <a class="text-xl font-bold no-underline" href="<?= $this->Url->build('/') ?>">
                <span class="text-base-100">CakePHP</span><span class="text-cake"> Inflector</span>
            </a>
            <div class="flex items-center gap-4 text-sm font-medium [&_a]:underline [&_a]:text-link">
                <?= $this->Html->link('Docs', 'https://book.cakephp.org/5/', ['target' => '_blank', 'rel' => 'noopener']) ?>
                <?= $this->Html->link('API', 'https://api.cakephp.org/5.0/', ['target' => '_blank', 'rel' => 'noopener']) ?>
            </div>
        </div>
    </nav>

    <main class="mx-auto max-w-5xl px-4 sm:px-6">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </main>
</body>
</html>
