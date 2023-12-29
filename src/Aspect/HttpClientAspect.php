<?php

declare(strict_types = 1);

namespace Aop\Aspect;

use Go\Aop\Aspect;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\Before;
use Logging\LoggingFactory;

/**
 * Monitor aspect
 */
class HttpClientAspect implements Aspect
{
    const KEY_TO_FIND = 'headers';

    private $logger;

    public function __construct() {
        $this->logger = LoggingFactory::getLogger(self::class);
    }
    /**
     * @param MethodInvocation $invocation Invocation
     * @Before("@execution(Aop\Annotation\HttpClientAnnotation)")
     */
    public function beforeMethodExecution(MethodInvocation $invocation)
    {
        $methodName = $invocation->getMethod()->getName();
        echo "Calling Before Interceptor for method: $$methodName\n";

        $keyValue = $this->resolve($invocation);
        $invocation->setArguments(array_values($keyValue));
    }

    private function resolve(MethodInvocation $invocation) : array {
        $keyValue = $this->getParameterValueMap($invocation);
        return $this->findParameterKeyChangeValue($keyValue);

    }
    private function getParameterValueMap(MethodInvocation $invocation) : array {
        $parameterName = $invocation->getMethod()->getParameters();
        $parameterNameOnlyValues = array_column($parameterName, 'name');
        $value = $invocation->getArguments();

        return array_combine($parameterNameOnlyValues, $value);
    }

    private function findParameterKeyChangeValue(array $parametersKeyValue) : array {
        $copyParametersKeyValue = $parametersKeyValue;
        if (array_key_exists(self::KEY_TO_FIND, $copyParametersKeyValue)) {
            $copyParametersKeyValue[self::KEY_TO_FIND] = "modified-value";
            $this->logger->info("old={}");
        }
        return $copyParametersKeyValue;
    }

}