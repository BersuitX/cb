<?php
namespace Psr\Http\Message;


interface UriInterface
{
    
    public function getScheme();

    
    public function getAuthority();

    
    public function getUserInfo();

    
    public function getHost();

    
    public function getPort();

    
    public function getPath();

    
    public function getQuery();

    
    public function getFragment();

    
    public function withScheme($Vrr3hq23ezmd);

    
    public function withUserInfo($V5mtbw3sgabz, $Vsze0k4cneni = null);

    
    public function withHost($Votmxko4hrhx);

    
    public function withPort($Vtdpfzm0vmqb);

    
    public function withPath($V2bpoh5hagzp);

    
    public function withQuery($Vfbt3who3l5d);

    
    public function withFragment($Vzmx43dmvjzn);

    
    public function __toString();
}
