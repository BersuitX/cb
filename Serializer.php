<?php


namespace phpDocumentor\Reflection\DocBlock;

use phpDocumentor\Reflection\DocBlock;
use Webmozart\Assert\Assert;


class Serializer
{
    
    protected $V3h3hdkve4vr = ' ';

    
    protected $Vrdvd0lwwb1c = 0;

    
    protected $Veopxdwyivqt = true;

    
    protected $Vi3bnatwr2xh = null;

    
    protected $Veyrvonhfpqs = null;

    
    public function __construct($Vrdvd0lwwb1c = 0, $V3h3hdkve4vr = ' ', $Vrdvd0lwwb1cFirstLine = true, $Vi3bnatwr2xh = null, $Veyrvonhfpqs = null)
    {
        Assert::integer($Vrdvd0lwwb1c);
        Assert::string($V3h3hdkve4vr);
        Assert::boolean($Vrdvd0lwwb1cFirstLine);
        Assert::nullOrInteger($Vi3bnatwr2xh);
        Assert::nullOrIsInstanceOf($Veyrvonhfpqs, 'phpDocumentor\Reflection\DocBlock\Tags\Formatter');

        $this->indent = $Vrdvd0lwwb1c;
        $this->indentString = $V3h3hdkve4vr;
        $this->isFirstLineIndented = $Vrdvd0lwwb1cFirstLine;
        $this->lineLength = $Vi3bnatwr2xh;
        $this->tagFormatter = $Veyrvonhfpqs ?: new DocBlock\Tags\Formatter\PassthroughFormatter();
    }

    
    public function getDocComment(DocBlock $Vbr0pcbogll4)
    {
        $Vrdvd0lwwb1c = str_repeat($this->indentString, $this->indent);
        $Vejooo1dcsq5 = $this->isFirstLineIndented ? $Vrdvd0lwwb1c : '';
        
        $Vaheydnpcoat = $this->lineLength ? $this->lineLength - strlen($Vrdvd0lwwb1c) - 3 : null;

        $Vlakcyq2pqgp = $this->removeTrailingSpaces(
            $Vrdvd0lwwb1c,
            $this->addAsterisksForEachLine(
                $Vrdvd0lwwb1c,
                $this->getSummaryAndDescriptionTextBlock($Vbr0pcbogll4, $Vaheydnpcoat)
            )
        );

        $Va1khwntce20 = "{$Vejooo1dcsq5}/**\n{$Vrdvd0lwwb1c} * {$Vlakcyq2pqgp}\n{$Vrdvd0lwwb1c} *\n";
        $Va1khwntce20 = $this->addTagBlock($Vbr0pcbogll4, $Vaheydnpcoat, $Vrdvd0lwwb1c, $Va1khwntce20);
        $Va1khwntce20 .= $Vrdvd0lwwb1c . ' */';

        return $Va1khwntce20;
    }

    
    private function removeTrailingSpaces($Vrdvd0lwwb1c, $Vlakcyq2pqgp)
    {
        return str_replace("\n{$Vrdvd0lwwb1c} * \n", "\n{$Vrdvd0lwwb1c} *\n", $Vlakcyq2pqgp);
    }

    
    private function addAsterisksForEachLine($Vrdvd0lwwb1c, $Vlakcyq2pqgp)
    {
        return str_replace("\n", "\n{$Vrdvd0lwwb1c} * ", $Vlakcyq2pqgp);
    }

    
    private function getSummaryAndDescriptionTextBlock(DocBlock $Vbr0pcbogll4, $Vaheydnpcoat)
    {
        $Vlakcyq2pqgp = $Vbr0pcbogll4->getSummary() . ((string)$Vbr0pcbogll4->getDescription() ? "\n\n" . $Vbr0pcbogll4->getDescription()
                : '');
        if ($Vaheydnpcoat !== null) {
            $Vlakcyq2pqgp = wordwrap($Vlakcyq2pqgp, $Vaheydnpcoat);
            return $Vlakcyq2pqgp;
        }
        return $Vlakcyq2pqgp;
    }

    
    private function addTagBlock(DocBlock $Vbr0pcbogll4, $Vaheydnpcoat, $Vrdvd0lwwb1c, $Va1khwntce20)
    {
        foreach ($Vbr0pcbogll4->getTags() as $Vl2ijnnhdtam) {
            $Vl2ijnnhdtamText = $this->tagFormatter->format($Vl2ijnnhdtam);
            if ($Vaheydnpcoat !== null) {
                $Vl2ijnnhdtamText = wordwrap($Vl2ijnnhdtamText, $Vaheydnpcoat);
            }
            $Vl2ijnnhdtamText = str_replace("\n", "\n{$Vrdvd0lwwb1c} * ", $Vl2ijnnhdtamText);

            $Va1khwntce20 .= "{$Vrdvd0lwwb1c} * {$Vl2ijnnhdtamText}\n";
        }

        return $Va1khwntce20;
    }
}
