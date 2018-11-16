<?php


use SebastianBergmann\Environment\Console;


class PHPUnit_TextUI_ResultPrinter extends PHPUnit_Util_Printer implements PHPUnit_Framework_TestListener
{
    const EVENT_TEST_START      = 0;
    const EVENT_TEST_END        = 1;
    const EVENT_TESTSUITE_START = 2;
    const EVENT_TESTSUITE_END   = 3;

    const COLOR_NEVER   = 'never';
    const COLOR_AUTO    = 'auto';
    const COLOR_ALWAYS  = 'always';
    const COLOR_DEFAULT = self::COLOR_NEVER;

    
    private static $Vv53ckif415r = array(
      'bold'       => 1,
      'fg-black'   => 30,
      'fg-red'     => 31,
      'fg-green'   => 32,
      'fg-yellow'  => 33,
      'fg-blue'    => 34,
      'fg-magenta' => 35,
      'fg-cyan'    => 36,
      'fg-white'   => 37,
      'bg-black'   => 40,
      'bg-red'     => 41,
      'bg-green'   => 42,
      'bg-yellow'  => 43,
      'bg-blue'    => 44,
      'bg-magenta' => 45,
      'bg-cyan'    => 46,
      'bg-white'   => 47
    );

    
    protected $V5rxr1ma1hx1 = 0;

    
    protected $V1t0fcrpww4i;

    
    protected $Vm1zj2flnzfo = false;

    
    protected $Vxp05be3um3h = 0;

    
    protected $Vpufahej1ssm = -1;

    
    protected $Vpufahej1ssmRun = 0;

    
    protected $Vpufahej1ssmWidth;

    
    protected $V2oedabekkrb = false;

    
    protected $V5k3j14z4bay = false;

    
    protected $Vxtrrqe3s3bm = false;

    
    private $V10wbti4dkqy;

    
    public function __construct($Ve0j5uj4lgwz = null, $Vxtrrqe3s3bm = false, $V2oedabekkrb = self::COLOR_DEFAULT, $V5k3j14z4bay = false, $V10wbti4dkqy = 80)
    {
        parent::__construct($Ve0j5uj4lgwz);

        if (!is_bool($Vxtrrqe3s3bm)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        $Vbxmfihif1av = array(self::COLOR_NEVER, self::COLOR_AUTO, self::COLOR_ALWAYS);

        if (!in_array($V2oedabekkrb, $Vbxmfihif1av)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                3,
                vsprintf('value from "%s", "%s" or "%s"', $Vbxmfihif1av)
            );
        }

        if (!is_bool($V5k3j14z4bay)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(4, 'boolean');
        }

        if (!is_int($V10wbti4dkqy) && $V10wbti4dkqy != 'max') {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(5, 'integer or "max"');
        }

        $Vou4032qfkxu            = new Console;
        $Vx5bbob5wkxb = $Vou4032qfkxu->getNumberOfColumns();

        if ($V10wbti4dkqy == 'max' || $V10wbti4dkqy > $Vx5bbob5wkxb) {
            $V10wbti4dkqy = $Vx5bbob5wkxb;
        }

        $this->numberOfColumns = $V10wbti4dkqy;
        $this->verbose         = $Vxtrrqe3s3bm;
        $this->debug           = $V5k3j14z4bay;

        if ($V2oedabekkrb === self::COLOR_AUTO && $Vou4032qfkxu->hasColorSupport()) {
            $this->colors = true;
        } else {
            $this->colors = (self::COLOR_ALWAYS === $V2oedabekkrb);
        }
    }

    
    public function printResult(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->printHeader();

        $this->printErrors($Vv0hyvhlkjqr);
        $Vbv00yhyab03 = $Vv0hyvhlkjqr->errorCount() > 0;

        if ($Vbv00yhyab03 && $Vv0hyvhlkjqr->failureCount() > 0) {
            $this->write("\n--\n\n");
        }

        $Vbv00yhyab03 = $Vbv00yhyab03 || $Vv0hyvhlkjqr->failureCount() > 0;
        $this->printFailures($Vv0hyvhlkjqr);

        if ($this->verbose) {
            if ($Vbv00yhyab03 && $Vv0hyvhlkjqr->riskyCount() > 0) {
                $this->write("\n--\n\n");
            }

            $Vbv00yhyab03 = $Vbv00yhyab03 ||
                              $Vv0hyvhlkjqr->riskyCount() > 0;

            $this->printRisky($Vv0hyvhlkjqr);

            if ($Vbv00yhyab03 && $Vv0hyvhlkjqr->notImplementedCount() > 0) {
                $this->write("\n--\n\n");
            }

            $Vbv00yhyab03 = $Vbv00yhyab03 ||
                              $Vv0hyvhlkjqr->notImplementedCount() > 0;

            $this->printIncompletes($Vv0hyvhlkjqr);

            if ($Vbv00yhyab03 && $Vv0hyvhlkjqr->skippedCount() > 0) {
                $this->write("\n--\n\n");
            }

            $this->printSkipped($Vv0hyvhlkjqr);
        }

        $this->printFooter($Vv0hyvhlkjqr);
    }

    
    protected function printDefects(array $Vmgdhkjyq3fb, $V31qrja1w0r2)
    {
        $Vdbkece3gnp5 = count($Vmgdhkjyq3fb);

        if ($Vdbkece3gnp5 == 0) {
            return;
        }

        $this->write(
            sprintf(
                "There %s %d %s%s:\n",
                ($Vdbkece3gnp5 == 1) ? 'was' : 'were',
                $Vdbkece3gnp5,
                $V31qrja1w0r2,
                ($Vdbkece3gnp5 == 1) ? '' : 's'
            )
        );

        $Vxja1abp34yq = 1;

        foreach ($Vmgdhkjyq3fb as $Vf2mlvorf4lo) {
            $this->printDefect($Vf2mlvorf4lo, $Vxja1abp34yq++);
        }
    }

    
    protected function printDefect(PHPUnit_Framework_TestFailure $Vf2mlvorf4lo, $Vdbkece3gnp5)
    {
        $this->printDefectHeader($Vf2mlvorf4lo, $Vdbkece3gnp5);
        $this->printDefectTrace($Vf2mlvorf4lo);
    }

    
    protected function printDefectHeader(PHPUnit_Framework_TestFailure $Vf2mlvorf4lo, $Vdbkece3gnp5)
    {
        $this->write(
            sprintf(
                "\n%d) %s\n",
                $Vdbkece3gnp5,
                $Vf2mlvorf4lo->getTestName()
            )
        );
    }

    
    protected function printDefectTrace(PHPUnit_Framework_TestFailure $Vf2mlvorf4lo)
    {
        $Vpt32vvhspnv = $Vf2mlvorf4lo->thrownException();
        $this->write((string) $Vpt32vvhspnv);

        while ($Vpt32vvhspnv = $Vpt32vvhspnv->getPrevious()) {
            $this->write("\nCaused by\n" . $Vpt32vvhspnv);
        }
    }

    
    protected function printErrors(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->printDefects($Vv0hyvhlkjqr->errors(), 'error');
    }

    
    protected function printFailures(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->printDefects($Vv0hyvhlkjqr->failures(), 'failure');
    }

    
    protected function printIncompletes(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->printDefects($Vv0hyvhlkjqr->notImplemented(), 'incomplete test');
    }

    
    protected function printRisky(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->printDefects($Vv0hyvhlkjqr->risky(), 'risky test');
    }

    
    protected function printSkipped(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        $this->printDefects($Vv0hyvhlkjqr->skipped(), 'skipped test');
    }

    protected function printHeader()
    {
        $this->write("\n\n" . PHP_Timer::resourceUsage() . "\n\n");
    }

    
    protected function printFooter(PHPUnit_Framework_TestResult $Vv0hyvhlkjqr)
    {
        if (count($Vv0hyvhlkjqr) === 0) {
            $this->writeWithColor(
                'fg-black, bg-yellow',
                'No tests executed!'
            );
        } elseif ($Vv0hyvhlkjqr->wasSuccessful() &&
                 $Vv0hyvhlkjqr->allHarmless() &&
                 $Vv0hyvhlkjqr->allCompletelyImplemented() &&
                 $Vv0hyvhlkjqr->noneSkipped()) {
            $this->writeWithColor(
                'fg-black, bg-green',
                sprintf(
                    'OK (%d test%s, %d assertion%s)',
                    count($Vv0hyvhlkjqr),
                    (count($Vv0hyvhlkjqr) == 1) ? '' : 's',
                    $this->numAssertions,
                    ($this->numAssertions == 1) ? '' : 's'
                )
            );
        } else {
            if ($Vv0hyvhlkjqr->wasSuccessful()) {
                $Vyyqs1bnedkd = 'fg-black, bg-yellow';

                if ($this->verbose) {
                    $this->write("\n");
                }

                $this->writeWithColor(
                    $Vyyqs1bnedkd,
                    'OK, but incomplete, skipped, or risky tests!'
                );
            } else {
                $Vyyqs1bnedkd = 'fg-white, bg-red';

                $this->write("\n");
                $this->writeWithColor($Vyyqs1bnedkd, 'FAILURES!');
            }

            $this->writeCountString(count($Vv0hyvhlkjqr), 'Tests', $Vyyqs1bnedkd, true);
            $this->writeCountString($this->numAssertions, 'Assertions', $Vyyqs1bnedkd, true);
            $this->writeCountString($Vv0hyvhlkjqr->errorCount(), 'Errors', $Vyyqs1bnedkd);
            $this->writeCountString($Vv0hyvhlkjqr->failureCount(), 'Failures', $Vyyqs1bnedkd);
            $this->writeCountString($Vv0hyvhlkjqr->skippedCount(), 'Skipped', $Vyyqs1bnedkd);
            $this->writeCountString($Vv0hyvhlkjqr->notImplementedCount(), 'Incomplete', $Vyyqs1bnedkd);
            $this->writeCountString($Vv0hyvhlkjqr->riskyCount(), 'Risky', $Vyyqs1bnedkd);
            $this->writeWithColor($Vyyqs1bnedkd, '.', true);
        }
    }

    
    public function printWaitPrompt()
    {
        $this->write("\n<RETURN> to continue\n");
    }

    
    public function addError(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeProgressWithColor('fg-red, bold', 'E');
        $this->lastTestFailed = true;
    }

    
    public function addFailure(PHPUnit_Framework_Test $Vpswbntjg3pr, PHPUnit_Framework_AssertionFailedError $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeProgressWithColor('bg-red, fg-white', 'F');
        $this->lastTestFailed = true;
    }

    
    public function addIncompleteTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'I');
        $this->lastTestFailed = true;
    }

    
    public function addRiskyTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeProgressWithColor('fg-yellow, bold', 'R');
        $this->lastTestFailed = true;
    }

    
    public function addSkippedTest(PHPUnit_Framework_Test $Vpswbntjg3pr, Exception $Vpt32vvhspnv, $Vlbwbnl10iav)
    {
        $this->writeProgressWithColor('fg-cyan, bold', 'S');
        $this->lastTestFailed = true;
    }

    
    public function startTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
        if ($this->numTests == -1) {
            $this->numTests      = count($Vrrxtoyyy15e);
            $this->numTestsWidth = strlen((string) $this->numTests);
            $this->maxColumn     = $this->numberOfColumns - strlen('  /  (XXX%)') - (2 * $this->numTestsWidth);
        }
    }

    
    public function endTestSuite(PHPUnit_Framework_TestSuite $Vrrxtoyyy15e)
    {
    }

    
    public function startTest(PHPUnit_Framework_Test $Vpswbntjg3pr)
    {
        if ($this->debug) {
            $this->write(
                sprintf(
                    "\nStarting test '%s'.\n",
                    PHPUnit_Util_Test::describe($Vpswbntjg3pr)
                )
            );
        }
    }

    
    public function endTest(PHPUnit_Framework_Test $Vpswbntjg3pr, $Vlbwbnl10iav)
    {
        if (!$this->lastTestFailed) {
            $this->writeProgress('.');
        }

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            $this->numAssertions += $Vpswbntjg3pr->getNumAssertions();
        } elseif ($Vpswbntjg3pr instanceof PHPUnit_Extensions_PhptTestCase) {
            $this->numAssertions++;
        }

        $this->lastTestFailed = false;

        if ($Vpswbntjg3pr instanceof PHPUnit_Framework_TestCase) {
            if (!$Vpswbntjg3pr->hasExpectationOnOutput()) {
                $this->write($Vpswbntjg3pr->getActualOutput());
            }
        }
    }

    
    protected function writeProgress($Vfltwxpjk01f)
    {
        $this->write($Vfltwxpjk01f);
        $this->column++;
        $this->numTestsRun++;

        if ($this->column == $this->maxColumn) {
            $this->write(
                sprintf(
                    ' %' . $this->numTestsWidth . 'd / %' .
                    $this->numTestsWidth . 'd (%3s%%)',
                    $this->numTestsRun,
                    $this->numTests,
                    floor(($this->numTestsRun / $this->numTests) * 100)
                )
            );

            $this->writeNewLine();
        }
    }

    protected function writeNewLine()
    {
        $this->column = 0;
        $this->write("\n");
    }

    
    protected function formatWithColor($Vyyqs1bnedkd, $Vd3322ljwbqh)
    {
        if (!$this->colors) {
            return $Vd3322ljwbqh;
        }

        $Vzd1ipif23ip   = array_map('trim', explode(',', $Vyyqs1bnedkd));
        $Vbkt5laoakgf   = explode("\n", $Vd3322ljwbqh);
        $Vtdkwthjlchl = max(array_map('strlen', $Vbkt5laoakgf));
        $Vakbl2gjmixc  = array();

        foreach ($Vzd1ipif23ip as $V5kll1klco0v) {
            $Vakbl2gjmixc[] = self::$Vv53ckif415r[$V5kll1klco0v];
        }

        $Vslnign1ze5t = sprintf("\x1b[%sm", implode(';', $Vakbl2gjmixc));

        $Vslnign1ze5tdLines = array();

        foreach ($Vbkt5laoakgf as $Vrwsmtja4f2j) {
            $Vslnign1ze5tdLines[] = $Vslnign1ze5t . str_pad($Vrwsmtja4f2j, $Vtdkwthjlchl) . "\x1b[0m";
        }

        return implode("\n", $Vslnign1ze5tdLines);
    }

    
    protected function writeWithColor($Vyyqs1bnedkd, $Vd3322ljwbqh, $Vgwzvrtn1rkq = true)
    {
        $this->write($this->formatWithColor($Vyyqs1bnedkd, $Vd3322ljwbqh));

        if ($Vgwzvrtn1rkq) {
            $this->write("\n");
        }
    }

    
    protected function writeProgressWithColor($Vyyqs1bnedkd, $Vd3322ljwbqh)
    {
        $Vd3322ljwbqh = $this->formatWithColor($Vyyqs1bnedkd, $Vd3322ljwbqh);
        $this->writeProgress($Vd3322ljwbqh);
    }

    
    private function writeCountString($Vdbkece3gnp5, $Vgpjmw221p0b, $Vyyqs1bnedkd, $Vygunvswq3b2 = false)
    {
        static $Vj04wpizdbj2 = true;

        if ($Vygunvswq3b2 || $Vdbkece3gnp5 > 0) {
            $this->writeWithColor(
                $Vyyqs1bnedkd,
                sprintf(
                    '%s%s: %d',
                    !$Vj04wpizdbj2 ? ', ' : '',
                    $Vgpjmw221p0b,
                    $Vdbkece3gnp5
                ),
                false
            );

            $Vj04wpizdbj2 = false;
        }
    }
}
