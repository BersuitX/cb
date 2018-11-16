<?php


namespace SebastianBergmann\Comparator;

use DOMDocument;
use DOMNode;


class DOMNodeComparator extends ObjectComparator
{
    
    public function accepts($Vwcb1oykhumm, $Vs4nw03sqcam)
    {
        return $Vwcb1oykhumm instanceof DOMNode && $Vs4nw03sqcam instanceof DOMNode;
    }

    
    public function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vxo5kvys4l4m = 0.0, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false, array &$Vwmzchdebcks = array())
    {
        $Vwcb1oykhummAsString = $this->nodeToText($Vwcb1oykhumm, true, $V2tcbx0tpkh3);
        $Vs4nw03sqcamAsString   = $this->nodeToText($Vs4nw03sqcam, true, $V2tcbx0tpkh3);

        if ($Vwcb1oykhummAsString !== $Vs4nw03sqcamAsString) {
            if ($Vwcb1oykhumm instanceof DOMDocument) {
                $V31qrja1w0r2 = 'documents';
            } else {
                $V31qrja1w0r2 = 'nodes';
            }

            throw new ComparisonFailure(
                $Vwcb1oykhumm,
                $Vs4nw03sqcam,
                $Vwcb1oykhummAsString,
                $Vs4nw03sqcamAsString,
                false,
                sprintf("Failed asserting that two DOM %s are equal.\n", $V31qrja1w0r2)
            );
        }
    }

    
    private function nodeToText(DOMNode $Vpbrymo1kvdk, $Vgxxhufhstfx, $V2tcbx0tpkh3)
    {
        if ($Vgxxhufhstfx) {
            $Vn3u2xbvygpr = new DOMDocument;
            $Vn3u2xbvygpr->loadXML($Vpbrymo1kvdk->C14N());

            $Vpbrymo1kvdk = $Vn3u2xbvygpr;
        }

        if ($Vpbrymo1kvdk instanceof DOMDocument) {
            $Vn3u2xbvygpr = $Vpbrymo1kvdk;
        } else {
            $Vn3u2xbvygpr = $Vpbrymo1kvdk->ownerDocument;
        }

        $Vn3u2xbvygpr->formatOutput = true;
        $Vn3u2xbvygpr->normalizeDocument();

        if ($Vpbrymo1kvdk instanceof DOMDocument) {
            $Vlakcyq2pqgp = $Vpbrymo1kvdk->saveXML();
        } else {
            $Vlakcyq2pqgp = $Vn3u2xbvygpr->saveXML($Vpbrymo1kvdk);
        }

        if ($V2tcbx0tpkh3) {
            $Vlakcyq2pqgp = strtolower($Vlakcyq2pqgp);
        }

        return $Vlakcyq2pqgp;
    }
}
