<?php

declare(strict_types=1);

namespace Danslo\ProtectedInterceptors\Interception\Code\Generator;

trait GetClassMethodsTrait
{
    private $ignores = [
        \Magento\Customer\Model\ResourceModel\CustomerRepository::class => ['addFilterGroupToCollection']
    ];

    /**
     * Returns list of methods for class generator.
     *
     * Included protected method in our filter.
     *
     * @return array
     * @throws \ReflectionException
     */
    protected function _getClassMethods()
    {
        $methods = [$this->_getDefaultConstructorDefinition()];
        $reflectionClass = new \ReflectionClass($this->getSourceClassName());
        $methodFilter = \ReflectionMethod::IS_PUBLIC;

        // Working around a circular dependency issue for this specific class.
        if (strpos($this->getSourceClassName(), '\Magento\Store\Model\ResourceModel') !== 0) {
            $methodFilter |= \ReflectionMethod::IS_PROTECTED;
        }

        $interceptedMethods = $reflectionClass->getMethods($methodFilter);
        foreach ($interceptedMethods as $method) {
            if ($this->isInterceptedMethod($method) && !$this->isIgnoredMethod($method)) {
                $methods[] = $this->_getMethodInfo($method);
            }
        }
        return $methods;
    }

    /**
     * Retrieve method info
     *
     * @param \ReflectionMethod $method
     * @return array
     */
    protected function _getMethodInfo(\ReflectionMethod $method)
    {
        $methodInfo = parent::_getMethodInfo($method);
        $methodInfo['visibility'] = $method->isProtected() ? 'protected' : 'public';
        return $methodInfo;
    }

    private function isIgnoredMethod(\ReflectionMethod $method): bool
    {
        if (!isset($this->ignores[$method->getDeclaringClass()->getName()])) {
            return false;
        }

        return in_array($method->getName(), $this->ignores[$method->getDeclaringClass()->getName()], true);
    }
}
