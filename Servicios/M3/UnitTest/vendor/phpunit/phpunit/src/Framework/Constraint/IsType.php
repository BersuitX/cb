<?php



class PHPUnit_Framework_Constraint_IsType extends PHPUnit_Framework_Constraint
{
    const TYPE_ARRAY    = 'array';
    const TYPE_BOOL     = 'bool';
    const TYPE_FLOAT    = 'float';
    const TYPE_INT      = 'int';
    const TYPE_NULL     = 'null';
    const TYPE_NUMERIC  = 'numeric';
    const TYPE_OBJECT   = 'object';
    const TYPE_RESOURCE = 'resource';
    const TYPE_STRING   = 'string';
    const TYPE_SCALAR   = 'scalar';
    const TYPE_CALLABLE = 'callable';

    
    protected $Vdj2jsltudrf = array(
        'array'    => true,
        'boolean'  => true,
        'bool'     => true,
        'double'   => true,
        'float'    => true,
        'integer'  => true,
        'int'      => true,
        'null'     => true,
        'numeric'  => true,
        'object'   => true,
        'real'     => true,
        'resource' => true,
        'string'   => true,
        'scalar'   => true,
        'callable' => true
    );

    
    protected $V31qrja1w0r2;

    
    public function __construct($V31qrja1w0r2)
    {
        parent::__construct();

        if (!isset($this->types[$V31qrja1w0r2])) {
            throw new PHPUnit_Framework_Exception(
                sprintf(
                    'Type specified for PHPUnit_Framework_Constraint_IsType <%s> ' .
                    'is not a valid type.',
                    $V31qrja1w0r2
                )
            );
        }

        $this->type = $V31qrja1w0r2;
    }

    
    protected function matches($Vddxcctrvo5d)
    {
        switch ($this->type) {
            case 'numeric':
                return is_numeric($Vddxcctrvo5d);

            case 'integer':
            case 'int':
                return is_integer($Vddxcctrvo5d);

            case 'double':
            case 'float':
            case 'real':
                return is_float($Vddxcctrvo5d);

            case 'string':
                return is_string($Vddxcctrvo5d);

            case 'boolean':
            case 'bool':
                return is_bool($Vddxcctrvo5d);

            case 'null':
                return is_null($Vddxcctrvo5d);

            case 'array':
                return is_array($Vddxcctrvo5d);

            case 'object':
                return is_object($Vddxcctrvo5d);

            case 'resource':
                return is_resource($Vddxcctrvo5d) || is_string(@get_resource_type($Vddxcctrvo5d));

            case 'scalar':
                return is_scalar($Vddxcctrvo5d);

            case 'callable':
                return is_callable($Vddxcctrvo5d);
        }
    }

    
    public function toString()
    {
        return sprintf(
            'is of type "%s"',
            $this->type
        );
    }
}
