<?php

namespace Kotoblog\tests\Controller\Api;

use Guzzle\Http\Client;
use Kotoblog\tests\CommonPageObject;

class ArticleControllerTest extends \PHPUnit_Framework_TestCase
{
    public function testListAction()
    {
        $page = new CommonPageObject('/articles');

        $this->assertTrue($page->isBodyIsJson());
        $this->assertTrue($page->hasHeaderValue('Content-Type', 'application/json'));
        $this->assertEquals(200, $page->getStatusCode());
    }

    public function testViewAction()
    {
        $page = new CommonPageObject('/articles/work-with-doctrine-annotation-reader');

        $this->assertTrue($page->isBodyIsJson());
        $this->assertTrue($page->hasHeaderValue('Content-Type', 'application/json'));
        $this->assertEquals(200, $page->getStatusCode());
    }

    public function testNewAction()
    {
        $page = new CommonPageObject('/articles', 'POST');

        $this->assertTrue($page->isBodyIsJson());
        $this->assertTrue($page->hasHeader('Location'));
        $this->assertTrue($page->hasHeaderValue('Content-Type', 'application/json'));
        $this->assertEquals(201, $page->getStatusCode());
    }
}
