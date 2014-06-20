<?php

namespace Kotoblog\Controller\Api;

use Silex\ControllerCollection;
use Kotoblog\Controller\BaseController;
use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Kotoblog\Entity\Article;

class ArticleController extends BaseController
{
    protected function addRoutes(ControllerCollection $controllers)
    {
        $controllers->get('', array($this, 'listAction'));
        $controllers->get('/{slug}', array($this, 'viewAction'));
        $controllers->post('', array($this, 'newAction'));
    }

    public function listAction(Request $request, Application $app)
    {
        $articles = $app['orm.em']->getRepository('Kotoblog\Entity\Article')->findAll();

        return new Response($app['serializer']->serialize($articles, 'json'), 200, ["Content-Type" => "application/json"]);
    }

    public function viewAction($slug, Request $request, Application $app)
    {
        $article = $app['orm.em']->getRepository('Kotoblog\Entity\Article')->findOneBySlug($slug);

        return new Response($app['serializer']->serialize($article, 'json'), 200, ["Content-Type" => "application/json"]);
    }

    public function newAction(Request $request, Application $app)
    {
        return $app->json(['action' => 'newAction'], 201, ['Location' => 'http://rest.local/articles/new-article-url']);
    }
}
