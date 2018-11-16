<?php
class ClassThatImplementsSerializable implements Serializable
{
    public function serialize()
    {
        return get_object_vars($this);
    }

    public function unserialize($Vhlldxcpbwq2)
    {
        foreach (unserialize($Vhlldxcpbwq2) as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $this->{$Vlpbz5aloxqt} = $Vcptarsq5qe4;
        }
    }
}
