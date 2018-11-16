<?php



class CountTest extends PHPUnit_Framework_TestCase
{
    public function testCount()
    {
        $Vdcc0xa005mw = new PHPUnit_Framework_Constraint_Count(3);
        $this->assertTrue($Vdcc0xa005mw->evaluate(array(1, 2, 3), '', true));

        $Vdcc0xa005mw = new PHPUnit_Framework_Constraint_Count(0);
        $this->assertTrue($Vdcc0xa005mw->evaluate(array(), '', true));

        $Vdcc0xa005mw = new PHPUnit_Framework_Constraint_Count(2);
        $Vqe4l03vglqs              = new TestIterator(array(1, 2));
        $this->assertTrue($Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true));
    }

    public function testCountDoesNotChangeIteratorKey()
    {
        $Vdcc0xa005mw = new PHPUnit_Framework_Constraint_Count(2);

        
        $Vqe4l03vglqs = new TestIterator(array(1, 2));

        $Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true);
        $this->assertEquals(1, $Vqe4l03vglqs->current());

        $Vqe4l03vglqs->next();
        $Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true);
        $this->assertEquals(2, $Vqe4l03vglqs->current());

        $Vqe4l03vglqs->next();
        $Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true);
        $this->assertFalse($Vqe4l03vglqs->valid());

        
        $Vqe4l03vglqs = new TestIterator2(array(1, 2));

        $Vdcc0xa005mw = new PHPUnit_Framework_Constraint_Count(2);
        $Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true);
        $this->assertEquals(1, $Vqe4l03vglqs->current());

        $Vqe4l03vglqs->next();
        $Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true);
        $this->assertEquals(2, $Vqe4l03vglqs->current());

        $Vqe4l03vglqs->next();
        $Vdcc0xa005mw->evaluate($Vqe4l03vglqs, '', true);
        $this->assertFalse($Vqe4l03vglqs->valid());
    }
}
