<?php

    namespace Prophecy\Exception\Doubler;

    class MethodNotExtendableException extends DoubleException
    {
        private $Vc1exo5hbki5;

        private $Vh0iae5cev4i;

        
        public function __construct($Vbl4yrmdan1y, $Vh0iae5cev4i, $Vc1exo5hbki5)
        {
            parent::__construct($Vbl4yrmdan1y);

            $this->methodName = $Vc1exo5hbki5;
            $this->className = $Vh0iae5cev4i;
        }


        
        public function getMethodName()
        {
            return $this->methodName;
        }

        
        public function getClassName()
        {
            return $this->className;
        }

    }
