<?php

namespace Kotoblog\Controller;

use Silex\Application;
use Silex\ControllerCollection;
use Silex\ControllerProviderInterface;

abstract class BaseController implements ControllerProviderInterface
{
    abstract protected function addRoutes(ControllerCollection $controllers);

    /**
     * Returns routes to connect to the given application.
     *
     * @param Application $app An Application instance
     *
     * @return ControllerCollection A ControllerCollection instance
     */
    public function connect(Application $app)
    {
        $controllers = $app['controllers_factory'];

        $this->addRoutes($controllers);

        return $controllers;
    }
}
