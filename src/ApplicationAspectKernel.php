<?php
// app/ApplicationAspectKernel.php

namespace App;

use App\MonitorAspect;
use Go\Core\AspectKernel;
use Go\Core\AspectContainer;


/**
 * Application Aspect Kernel
 */
class ApplicationAspectKernel extends AspectKernel
{

    /**
     * Configure an AspectContainer with advisors, aspects and pointcuts
     *
     * @param AspectContainer $container
     *
     * @return void
     */
    protected function configureAop(AspectContainer $container)
    {
        $container->registerAspect(new MonitorAspect());
    }
}