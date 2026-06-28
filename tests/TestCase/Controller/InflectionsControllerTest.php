<?php
declare(strict_types=1);

namespace App\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestTrait;
use Cake\TestSuite\TestCase;

class InflectionsControllerTest extends TestCase
{
    use IntegrationTestTrait;

    public function testIndexRendersForm(): void
    {
        $this->get('/');

        $this->assertResponseOk();
        $this->assertResponseContains('Inflector');
        $this->assertResponseContains('Inflect me');
    }

    public function testIndexRendersInflections(): void
    {
        $this->get('/article_tag');

        $this->assertResponseOk();
        $this->assertResponseContains('pluralize');
        $this->assertResponseContains('article_tags');
        $this->assertResponseContains('camelize');
        $this->assertResponseContains('ArticleTag');
    }

    public function testPostRedirectsToInflectionUrl(): void
    {
        $this->enableCsrfToken();

        $this->post('/', ['string' => 'people']);

        $this->assertRedirect('/people');
    }
}
