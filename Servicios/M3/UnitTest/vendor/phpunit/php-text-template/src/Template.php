<?php



class Text_Template
{
    
    protected $Vlqygqxkgo25 = '';

    
    protected $Vuok5wdh2kbi = '{';

    
    protected $Vowfe2trslmo = '}';

    
    protected $Vmyhfq3hu0xr = array();

    
    public function __construct($Vpu3xl4uhgg5 = '', $Vuok5wdh2kbi = '{', $Vowfe2trslmo = '}')
    {
        $this->setFile($Vpu3xl4uhgg5);
        $this->openDelimiter  = $Vuok5wdh2kbi;
        $this->closeDelimiter = $Vowfe2trslmo;
    }

    
    public function setFile($Vpu3xl4uhgg5)
    {
        $Vlj150hbts3z = $Vpu3xl4uhgg5 . '.dist';

        if (file_exists($Vpu3xl4uhgg5)) {
            $this->template = file_get_contents($Vpu3xl4uhgg5);
        }

        else if (file_exists($Vlj150hbts3z)) {
            $this->template = file_get_contents($Vlj150hbts3z);
        }

        else {
            throw new InvalidArgumentException(
              'Template file could not be loaded.'
            );
        }
    }

    
    public function setVar(array $Vmyhfq3hu0xr, $V3d30rx5l1aa = TRUE)
    {
        if (!$V3d30rx5l1aa || empty($this->values)) {
            $this->values = $Vmyhfq3hu0xr;
        } else {
            $this->values = array_merge($this->values, $Vmyhfq3hu0xr);
        }
    }

    
    public function render()
    {
        $Vbtcg1ckvort = array();

        foreach ($this->values as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $Vbtcg1ckvort[] = $this->openDelimiter . $Vlpbz5aloxqt . $this->closeDelimiter;
        }

        return str_replace($Vbtcg1ckvort, $this->values, $this->template);
    }

    
    public function renderTo($Vec3c2fwpbib)
    {
        $V1j0von4poqi = @fopen($Vec3c2fwpbib, 'wt');

        if ($V1j0von4poqi) {
            fwrite($V1j0von4poqi, $this->render());
            fclose($V1j0von4poqi);
        } else {
            $Vpsm42ro4mkq = error_get_last();

            throw new RuntimeException(
              sprintf(
                'Could not write to %s: %s',
                $Vec3c2fwpbib,
                substr(
                  $Vpsm42ro4mkq['message'],
                  strpos($Vpsm42ro4mkq['message'], ':') + 2
                )
              )
            );
        }
    }
}

