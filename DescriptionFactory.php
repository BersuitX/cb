<?php


namespace phpDocumentor\Reflection\DocBlock;

use phpDocumentor\Reflection\Types\Context as TypeContext;


class DescriptionFactory
{
    
    private $Vi3ehu4kwpnc;

    
    public function __construct(TagFactory $Vi3ehu4kwpnc)
    {
        $this->tagFactory = $Vi3ehu4kwpnc;
    }

    
    public function create($Vpbbnofmevow, TypeContext $Vylnw34ljlp1 = null)
    {
        list($Vlakcyq2pqgp, $Vi1vla5oesiw) = $this->parse($this->lex($Vpbbnofmevow), $Vylnw34ljlp1);

        return new Description($Vlakcyq2pqgp, $Vi1vla5oesiw);
    }

    
    private function lex($Vpbbnofmevow)
    {
        $Vpbbnofmevow = $this->removeSuperfluousStartingWhitespace($Vpbbnofmevow);

        
        if (strpos($Vpbbnofmevow, '{@') === false) {
            return [$Vpbbnofmevow];
        }

        return preg_split(
            '/\{
                # "{@}" is not a valid inline tag. This ensures that we do not treat it as one, but treat it literally.
                (?!@\})
                # We want to capture the whole tag line, but without the inline tag delimiters.
                (\@
                    # Match everything up to the next delimiter.
                    [^{}]*
                    # Nested inline tag content should not be captured, or it will appear in the result separately.
                    (?:
                        # Match nested inline tags.
                        (?:
                            # Because we did not catch the tag delimiters earlier, we must be explicit with them here.
                            # Notice that this also matches "{}", as a way to later introduce it as an escape sequence.
                            \{(?1)?\}
                            |
                            # Make sure we match hanging "{".
                            \{
                        )
                        # Match content after the nested inline tag.
                        [^{}]*
                    )* # If there are more inline tags, match them as well. We use "*" since there may not be any
                       # nested inline tags.
                )
            \}/Sux',
            $Vpbbnofmevow,
            null,
            PREG_SPLIT_DELIM_CAPTURE
        );
    }

    
    private function parse($Vthon1suqmsr, TypeContext $Vylnw34ljlp1)
    {
        $Vdbkece3gnp5 = count($Vthon1suqmsr);
        $Vyig2jbnvzxl = 0;
        $Vi1vla5oesiw  = [];

        for ($Vxja1abp34yq = 1; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq += 2) {
            $Vi1vla5oesiw[] = $this->tagFactory->create($Vthon1suqmsr[$Vxja1abp34yq], $Vylnw34ljlp1);
            $Vthon1suqmsr[$Vxja1abp34yq] = '%' . ++$Vyig2jbnvzxl . '$Vomn1oia4yqy';
        }

        
        
        
        
        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vdbkece3gnp5; $Vxja1abp34yq += 2) {
            $Vthon1suqmsr[$Vxja1abp34yq] = str_replace(['{@}', '{}', '%'], ['@', '}', '%%'], $Vthon1suqmsr[$Vxja1abp34yq]);
        }

        return [implode('', $Vthon1suqmsr), $Vi1vla5oesiw];
    }

    
    private function removeSuperfluousStartingWhitespace($Vpbbnofmevow)
    {
        $Vbkt5laoakgf = explode("\n", $Vpbbnofmevow);

        
        
        if (count($Vbkt5laoakgf) <= 1) {
            return $Vpbbnofmevow;
        }

        
        $Vomn1oia4yqytartingSpaceCount = 9999999;
        for ($Vxja1abp34yq = 1; $Vxja1abp34yq < count($Vbkt5laoakgf); $Vxja1abp34yq++) {
            
            if (strlen(trim($Vbkt5laoakgf[$Vxja1abp34yq])) === 0) {
                continue;
            }

            
            
            $Vomn1oia4yqytartingSpaceCount = min($Vomn1oia4yqytartingSpaceCount, strlen($Vbkt5laoakgf[$Vxja1abp34yq]) - strlen(ltrim($Vbkt5laoakgf[$Vxja1abp34yq])));
        }

        
        if ($Vomn1oia4yqytartingSpaceCount > 0) {
            for ($Vxja1abp34yq = 1; $Vxja1abp34yq < count($Vbkt5laoakgf); $Vxja1abp34yq++) {
                $Vbkt5laoakgf[$Vxja1abp34yq] = substr($Vbkt5laoakgf[$Vxja1abp34yq], $Vomn1oia4yqytartingSpaceCount);
            }
        }

        return implode("\n", $Vbkt5laoakgf);
    }

}
