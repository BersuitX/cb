<?php



class PHPUnit_Util_XML
{
    
    public static function prepareString($Ve5tcsso230g)
    {
        return preg_replace(
            '/[\\x00-\\x08\\x0b\\x0c\\x0e-\\x1f\\x7f]/',
            '',
            htmlspecialchars(
                PHPUnit_Util_String::convertToUtf8($Ve5tcsso230g),
                ENT_QUOTES,
                'UTF-8'
            )
        );
    }

    
    public static function loadFile($Va3qqb0vgkhy, $Vciopigkxyzy = false, $V2licwry0lpc = false, $V2xeprdxa0ou = false)
    {
        $Vgjwsh2fk4gc = error_reporting(0);
        $Vpbbnofmevow  = file_get_contents($Va3qqb0vgkhy);
        error_reporting($Vgjwsh2fk4gc);

        if ($Vpbbnofmevow === false) {
            throw new PHPUnit_Framework_Exception(
                sprintf(
                    'Could not read "%s".',
                    $Va3qqb0vgkhy
                )
            );
        }

        return self::load($Vpbbnofmevow, $Vciopigkxyzy, $Va3qqb0vgkhy, $V2licwry0lpc, $V2xeprdxa0ou);
    }

    
    public static function load($Vs4nw03sqcam, $Vciopigkxyzy = false, $Va3qqb0vgkhy = '', $V2licwry0lpc = false, $V2xeprdxa0ou = false)
    {
        if ($Vs4nw03sqcam instanceof DOMDocument) {
            return $Vs4nw03sqcam;
        }

        if (!is_string($Vs4nw03sqcam)) {
            throw new PHPUnit_Framework_Exception('Could not load XML from ' . gettype($Vs4nw03sqcam));
        }

        if ($Vs4nw03sqcam === '') {
            throw new PHPUnit_Framework_Exception('Could not load XML from empty string');
        }

        
        if ($V2licwry0lpc) {
            $Vx1elf5qpa13 = getcwd();
            @chdir(dirname($Va3qqb0vgkhy));
        }

        $Vn3u2xbvygpr                     = new DOMDocument;
        $Vn3u2xbvygpr->preserveWhiteSpace = false;

        $Vqvtiwviqlat  = libxml_use_internal_errors(true);
        $Vbl4yrmdan1y   = '';
        $Vgjwsh2fk4gc = error_reporting(0);

        if ('' !== $Va3qqb0vgkhy) {
            
            $Vn3u2xbvygpr->documentURI = $Va3qqb0vgkhy;
        }

        if ($Vciopigkxyzy) {
            $Vqic1clmv1vq = $Vn3u2xbvygpr->loadHTML($Vs4nw03sqcam);
        } else {
            $Vqic1clmv1vq = $Vn3u2xbvygpr->loadXML($Vs4nw03sqcam);
        }

        if (!$Vciopigkxyzy && $V2licwry0lpc) {
            $Vn3u2xbvygpr->xinclude();
        }

        foreach (libxml_get_errors() as $Vpsm42ro4mkq) {
            $Vbl4yrmdan1y .= "\n" . $Vpsm42ro4mkq->message;
        }

        libxml_use_internal_errors($Vqvtiwviqlat);
        error_reporting($Vgjwsh2fk4gc);

        if ($V2licwry0lpc) {
            @chdir($Vx1elf5qpa13);
        }

        if ($Vqic1clmv1vq === false || ($V2xeprdxa0ou && $Vbl4yrmdan1y !== '')) {
            if ($Va3qqb0vgkhy !== '') {
                throw new PHPUnit_Framework_Exception(
                    sprintf(
                        'Could not load "%s".%s',
                        $Va3qqb0vgkhy,
                        $Vbl4yrmdan1y != '' ? "\n" . $Vbl4yrmdan1y : ''
                    )
                );
            } else {
                if ($Vbl4yrmdan1y === '') {
                    $Vbl4yrmdan1y = 'Could not load XML for unknown reason';
                }
                throw new PHPUnit_Framework_Exception($Vbl4yrmdan1y);
            }
        }

        return $Vn3u2xbvygpr;
    }

    
    public static function nodeToText(DOMNode $Vpbrymo1kvdk)
    {
        if ($Vpbrymo1kvdk->childNodes->length == 1) {
            return $Vpbrymo1kvdk->textContent;
        }

        $Vv0hyvhlkjqr = '';

        foreach ($Vpbrymo1kvdk->childNodes as $Vqibe0aypwro) {
            $Vv0hyvhlkjqr .= $Vpbrymo1kvdk->ownerDocument->saveXML($Vqibe0aypwro);
        }

        return $Vv0hyvhlkjqr;
    }

    
    public static function removeCharacterDataNodes(DOMNode $Vpbrymo1kvdk)
    {
        if ($Vpbrymo1kvdk->hasChildNodes()) {
            for ($Vxja1abp34yq = $Vpbrymo1kvdk->childNodes->length - 1; $Vxja1abp34yq >= 0; $Vxja1abp34yq--) {
                if (($Vypmkgldf3eu = $Vpbrymo1kvdk->childNodes->item($Vxja1abp34yq)) instanceof DOMCharacterData) {
                    $Vpbrymo1kvdk->removeChild($Vypmkgldf3eu);
                }
            }
        }
    }

    
    public static function xmlToVariable(DOMElement $Vbzemolr5akx)
    {
        $Vxjof1iqtr44 = null;

        switch ($Vbzemolr5akx->tagName) {
            case 'array':
                $Vxjof1iqtr44 = array();

                foreach ($Vbzemolr5akx->childNodes as $Vk1qaere5coc) {
                    if (!$Vk1qaere5coc instanceof DOMElement || $Vk1qaere5coc->tagName !== 'element') {
                        continue;
                    }
                    $Vxja1abp34yqtem = $Vk1qaere5coc->childNodes->item(0);

                    if ($Vxja1abp34yqtem instanceof DOMText) {
                        $Vxja1abp34yqtem = $Vk1qaere5coc->childNodes->item(1);
                    }

                    $Vcptarsq5qe4 = self::xmlToVariable($Vxja1abp34yqtem);

                    if ($Vk1qaere5coc->hasAttribute('key')) {
                        $Vxjof1iqtr44[(string) $Vk1qaere5coc->getAttribute('key')] = $Vcptarsq5qe4;
                    } else {
                        $Vxjof1iqtr44[] = $Vcptarsq5qe4;
                    }
                }
                break;

            case 'object':
                $Vh0iae5cev4i = $Vbzemolr5akx->getAttribute('class');

                if ($Vbzemolr5akx->hasChildNodes()) {
                    $Vj23lbel2xn0       = $Vbzemolr5akx->childNodes->item(1)->childNodes;
                    $Vlccxd3z4qp1 = array();

                    foreach ($Vj23lbel2xn0 as $Vlf5kwra10uk) {
                        if ($Vlf5kwra10uk instanceof DOMElement) {
                            $Vlccxd3z4qp1[] = self::xmlToVariable($Vlf5kwra10uk);
                        }
                    }

                    $Vqmu1sajhgfn    = new ReflectionClass($Vh0iae5cev4i);
                    $Vxjof1iqtr44 = $Vqmu1sajhgfn->newInstanceArgs($Vlccxd3z4qp1);
                } else {
                    $Vxjof1iqtr44 = new $Vh0iae5cev4i;
                }
                break;

            case 'boolean':
                $Vxjof1iqtr44 = $Vbzemolr5akx->textContent == 'true' ? true : false;
                break;

            case 'integer':
            case 'double':
            case 'string':
                $Vxjof1iqtr44 = $Vbzemolr5akx->textContent;

                settype($Vxjof1iqtr44, $Vbzemolr5akx->tagName);
                break;
        }

        return $Vxjof1iqtr44;
    }

    
    public static function assertValidKeys(array $Vfrjid4vr3ci, array $Vpxwijbmbzgs)
    {
        $Vahstjppnc4l = array();

        
        
        foreach ($Vpxwijbmbzgs as $Vlpbz5aloxqt => $Vesnpsejyhuw) {
            is_int($Vlpbz5aloxqt) ? $Vahstjppnc4l[$Vesnpsejyhuw] = null : $Vahstjppnc4l[$Vlpbz5aloxqt] = $Vesnpsejyhuw;
        }

        $Vpxwijbmbzgs = array_keys($Vahstjppnc4l);

        
        foreach ($Vfrjid4vr3ci as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            if (!in_array($Vlpbz5aloxqt, $Vpxwijbmbzgs)) {
                $Vmtyys2puso5[] = $Vlpbz5aloxqt;
            }
        }

        if (!empty($Vmtyys2puso5)) {
            throw new PHPUnit_Framework_Exception(
                'Unknown key(s): ' . implode(', ', $Vmtyys2puso5)
            );
        }

        
        foreach ($Vahstjppnc4l as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            if (!isset($Vfrjid4vr3ci[$Vlpbz5aloxqt])) {
                $Vfrjid4vr3ci[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
            }
        }

        return $Vfrjid4vr3ci;
    }

    
    public static function convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn = true)
    {
        $V1hhloxwgmev = trim(preg_replace("/\s+/", ' ', $V1hhloxwgmev));

        
        while (preg_match('/\[[^\]]+"[^"]+\s[^"]+"\]/', $V1hhloxwgmev)) {
            $V1hhloxwgmev = preg_replace(
                '/(\[[^\]]+"[^"]+)\s([^"]+"\])/',
                '$1__SPACE__$2',
                $V1hhloxwgmev
            );
        }

        if (strstr($V1hhloxwgmev, ' ')) {
            $Vbzemolr5akxs = explode(' ', $V1hhloxwgmev);
        } else {
            $Vbzemolr5akxs = array($V1hhloxwgmev);
        }

        $Vkho32sb3vdk = array();

        foreach (array_reverse($Vbzemolr5akxs) as $Vbzemolr5akx) {
            $Vbzemolr5akx = str_replace('__SPACE__', ' ', $Vbzemolr5akx);

            
            if ($Vbzemolr5akx == '>') {
                $Vkho32sb3vdk = array('child' => $Vkho32sb3vdk['descendant']);
                continue;
            }

            
            if ($Vbzemolr5akx == '+') {
                $Vkho32sb3vdk = array('adjacent-sibling' => $Vkho32sb3vdk['descendant']);
                continue;
            }

            $Vl2ijnnhdtam = array();

            
            preg_match("/^([^\.#\[]*)/", $Vbzemolr5akx, $Vx2ddjgrkssz);

            if (!empty($Vx2ddjgrkssz[1])) {
                $Vl2ijnnhdtam['tag'] = $Vx2ddjgrkssz[1];
            }

            
            
            preg_match_all(
                "/(\[[^\]]*\]*|#[^\.#\[]*|\.[^\.#\[]*)/",
                $Vbzemolr5akx,
                $Virbphhh55ue
            );

            if (!empty($Virbphhh55ue[1])) {
                $Vqmu1sajhgfnes = array();
                $Vxpadut5e1ka   = array();

                foreach ($Virbphhh55ue[1] as $Vwetg4hewdr4) {
                    
                    if (substr($Vwetg4hewdr4, 0, 1) == '#') {
                        $Vl2ijnnhdtam['id'] = substr($Vwetg4hewdr4, 1);
                    } 
                    elseif (substr($Vwetg4hewdr4, 0, 1) == '.') {
                        $Vqmu1sajhgfnes[] = substr($Vwetg4hewdr4, 1);
                    } 
                    elseif (substr($Vwetg4hewdr4, 0, 1) == '[' &&
                             substr($Vwetg4hewdr4, -1, 1) == ']') {
                        $Vxw4jdz2m4w0 = substr($Vwetg4hewdr4, 1, strlen($Vwetg4hewdr4) - 2);
                        $Vxw4jdz2m4w0 = str_replace('"', '', $Vxw4jdz2m4w0);

                        
                        if (strstr($Vxw4jdz2m4w0, '~=')) {
                            list($Vlpbz5aloxqt, $Vcptarsq5qe4) = explode('~=', $Vxw4jdz2m4w0);
                            $Vcptarsq5qe4             = "regexp:/.*\b$Vcptarsq5qe4\b.*/";
                        } 
                        elseif (strstr($Vxw4jdz2m4w0, '*=')) {
                            list($Vlpbz5aloxqt, $Vcptarsq5qe4) = explode('*=', $Vxw4jdz2m4w0);
                            $Vcptarsq5qe4             = "regexp:/.*$Vcptarsq5qe4.*/";
                        } 
                        else {
                            list($Vlpbz5aloxqt, $Vcptarsq5qe4) = explode('=', $Vxw4jdz2m4w0);
                        }

                        $Vxpadut5e1ka[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                    }
                }

                if (!empty($Vqmu1sajhgfnes)) {
                    $Vl2ijnnhdtam['class'] = implode(' ', $Vqmu1sajhgfnes);
                }

                if (!empty($Vxpadut5e1ka)) {
                    $Vl2ijnnhdtam['attributes'] = $Vxpadut5e1ka;
                }
            }

            
            if (is_string($Vjdkyvjsoqdn)) {
                $Vl2ijnnhdtam['content'] = $Vjdkyvjsoqdn;
            }

            
            if (!empty($Vkho32sb3vdk['descendant'])) {
                $Vl2ijnnhdtam['descendant'] = $Vkho32sb3vdk['descendant'];
            } elseif (!empty($Vkho32sb3vdk['child'])) {
                $Vl2ijnnhdtam['child'] = $Vkho32sb3vdk['child'];
            } elseif (!empty($Vkho32sb3vdk['adjacent-sibling'])) {
                $Vl2ijnnhdtam['adjacent-sibling'] = $Vkho32sb3vdk['adjacent-sibling'];
                unset($Vl2ijnnhdtam['content']);
            }

            $Vkho32sb3vdk = array('descendant' => $Vl2ijnnhdtam);
        }

        return $Vl2ijnnhdtam;
    }

    
    public static function cssSelect($V1hhloxwgmev, $Vjdkyvjsoqdn, $Vs4nw03sqcam, $Vciopigkxyzy = true)
    {
        $Vwetg4hewdr4er = self::convertSelectToTag($V1hhloxwgmev, $Vjdkyvjsoqdn);
        $Veu4emafikgi     = self::load($Vs4nw03sqcam, $Vciopigkxyzy);
        $Vl2ijnnhdtams    = self::findNodes($Veu4emafikgi, $Vwetg4hewdr4er, $Vciopigkxyzy);

        return $Vl2ijnnhdtams;
    }

    
    public static function findNodes(DOMDocument $Veu4emafikgi, array $V4a4guv4okog, $Vciopigkxyzy = true)
    {
        $Vesnpsejyhuwid = array(
          'id', 'class', 'tag', 'content', 'attributes', 'parent',
          'child', 'ancestor', 'descendant', 'children', 'adjacent-sibling'
        );

        $Vt1r0syzbccp = array();
        $V4a4guv4okog  = self::assertValidKeys($V4a4guv4okog, $Vesnpsejyhuwid);

        
        if ($V4a4guv4okog['id']) {
            $V4a4guv4okog['attributes']['id'] = $V4a4guv4okog['id'];
        }

        if ($V4a4guv4okog['class']) {
            $V4a4guv4okog['attributes']['class'] = $V4a4guv4okog['class'];
        }

        $Vpbrymo1kvdks = array();

        
        if ($V4a4guv4okog['tag']) {
            if ($Vciopigkxyzy) {
                $Vbzemolr5akxs = self::getElementsByCaseInsensitiveTagName(
                    $Veu4emafikgi,
                    $V4a4guv4okog['tag']
                );
            } else {
                $Vbzemolr5akxs = $Veu4emafikgi->getElementsByTagName($V4a4guv4okog['tag']);
            }

            foreach ($Vbzemolr5akxs as $Vbzemolr5akx) {
                $Vpbrymo1kvdks[] = $Vbzemolr5akx;
            }

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        } 
        else {
            $Vl2ijnnhdtams = array(
              'a', 'abbr', 'acronym', 'address', 'area', 'b', 'base', 'bdo',
              'big', 'blockquote', 'body', 'br', 'button', 'caption', 'cite',
              'code', 'col', 'colgroup', 'dd', 'del', 'div', 'dfn', 'dl',
              'dt', 'em', 'fieldset', 'form', 'frame', 'frameset', 'h1', 'h2',
              'h3', 'h4', 'h5', 'h6', 'head', 'hr', 'html', 'i', 'iframe',
              'img', 'input', 'ins', 'kbd', 'label', 'legend', 'li', 'link',
              'map', 'meta', 'noframes', 'noscript', 'object', 'ol', 'optgroup',
              'option', 'p', 'param', 'pre', 'q', 'samp', 'script', 'select',
              'small', 'span', 'strong', 'style', 'sub', 'sup', 'table',
              'tbody', 'td', 'textarea', 'tfoot', 'th', 'thead', 'title',
              'tr', 'tt', 'ul', 'var',
              
              'article', 'aside', 'audio', 'bdi', 'canvas', 'command',
              'datalist', 'details', 'dialog', 'embed', 'figure', 'figcaption',
              'footer', 'header', 'hgroup', 'keygen', 'mark', 'meter', 'nav',
              'output', 'progress', 'ruby', 'rt', 'rp', 'track', 'section',
              'source', 'summary', 'time', 'video', 'wbr'
            );

            foreach ($Vl2ijnnhdtams as $Vl2ijnnhdtam) {
                if ($Vciopigkxyzy) {
                    $Vbzemolr5akxs = self::getElementsByCaseInsensitiveTagName(
                        $Veu4emafikgi,
                        $Vl2ijnnhdtam
                    );
                } else {
                    $Vbzemolr5akxs = $Veu4emafikgi->getElementsByTagName($Vl2ijnnhdtam);
                }

                foreach ($Vbzemolr5akxs as $Vbzemolr5akx) {
                    $Vpbrymo1kvdks[] = $Vbzemolr5akx;
                }
            }

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['attributes']) {
            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                $Vxja1abp34yqnvalid = false;

                foreach ($V4a4guv4okog['attributes'] as $Vgpjmw221p0b => $Vcptarsq5qe4) {
                    
                    if (preg_match('/^regexp\s*:\s*(.*)/i', $Vcptarsq5qe4, $Virbphhh55ue)) {
                        if (!preg_match($Virbphhh55ue[1], $Vpbrymo1kvdk->getAttribute($Vgpjmw221p0b))) {
                            $Vxja1abp34yqnvalid = true;
                        }
                    } 
                    elseif ($Vgpjmw221p0b == 'class') {
                        
                        $V2omnkjru3o5 = explode(
                            ' ',
                            preg_replace("/\s+/", ' ', $Vcptarsq5qe4)
                        );

                        $V5zkbm3ydmkg = explode(
                            ' ',
                            preg_replace("/\s+/", ' ', $Vpbrymo1kvdk->getAttribute($Vgpjmw221p0b))
                        );

                        
                        foreach ($V2omnkjru3o5 as $Vfpibob52hhw) {
                            if (!in_array($Vfpibob52hhw, $V5zkbm3ydmkg)) {
                                $Vxja1abp34yqnvalid = true;
                            }
                        }
                    } 
                    else {
                        if ($Vpbrymo1kvdk->getAttribute($Vgpjmw221p0b) != $Vcptarsq5qe4) {
                            $Vxja1abp34yqnvalid = true;
                        }
                    }
                }

                
                if (!$Vxja1abp34yqnvalid) {
                    $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                }
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['content'] !== null) {
            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                $Vxja1abp34yqnvalid = false;

                
                if (preg_match('/^regexp\s*:\s*(.*)/i', $V4a4guv4okog['content'], $Virbphhh55ue)) {
                    if (!preg_match($Virbphhh55ue[1], self::getNodeText($Vpbrymo1kvdk))) {
                        $Vxja1abp34yqnvalid = true;
                    }
                } 
                elseif ($V4a4guv4okog['content'] === '') {
                    if (self::getNodeText($Vpbrymo1kvdk) !== '') {
                        $Vxja1abp34yqnvalid = true;
                    }
                } 
                elseif (strstr(self::getNodeText($Vpbrymo1kvdk), $V4a4guv4okog['content']) === false) {
                    $Vxja1abp34yqnvalid = true;
                }

                if (!$Vxja1abp34yqnvalid) {
                    $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                }
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['parent']) {
            $Vmv3duohdtkf = self::findNodes($Veu4emafikgi, $V4a4guv4okog['parent'], $Vciopigkxyzy);
            $V0vwooehqivi  = isset($Vmv3duohdtkf[0]) ? $Vmv3duohdtkf[0] : null;

            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                if ($V0vwooehqivi !== $Vpbrymo1kvdk->parentNode) {
                    continue;
                }

                $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['child']) {
            $Vqibe0aypwros = self::findNodes($Veu4emafikgi, $V4a4guv4okog['child'], $Vciopigkxyzy);
            $Vqibe0aypwros = !empty($Vqibe0aypwros) ? $Vqibe0aypwros : array();

            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                foreach ($Vpbrymo1kvdk->childNodes as $Vypmkgldf3eu) {
                    foreach ($Vqibe0aypwros as $Vqibe0aypwro) {
                        if ($Vqibe0aypwro === $Vypmkgldf3eu) {
                            $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                        }
                    }
                }
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['adjacent-sibling']) {
            $Vsa4emukzzux = self::findNodes($Veu4emafikgi, $V4a4guv4okog['adjacent-sibling'], $Vciopigkxyzy);
            $Vsa4emukzzux = !empty($Vsa4emukzzux) ? $Vsa4emukzzux : array();

            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                $V1d2ukxkvsm0 = $Vpbrymo1kvdk;

                while ($V1d2ukxkvsm0 = $V1d2ukxkvsm0->nextSibling) {
                    if ($V1d2ukxkvsm0->nodeType !== XML_ELEMENT_NODE) {
                        continue;
                    }

                    foreach ($Vsa4emukzzux as $Vibybtnt3ytm) {
                        if ($V1d2ukxkvsm0 === $Vibybtnt3ytm) {
                            $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                            break;
                        }
                    }

                    break;
                }
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['ancestor']) {
            $V02y5eye0iux = self::findNodes($Veu4emafikgi, $V4a4guv4okog['ancestor'], $Vciopigkxyzy);
            $Valt1h0eialm  = isset($V02y5eye0iux[0]) ? $V02y5eye0iux[0] : null;

            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                $Vz4c1zo3dvrb = $Vpbrymo1kvdk->parentNode;

                while ($Vz4c1zo3dvrb && $Vz4c1zo3dvrb->nodeType != XML_HTML_DOCUMENT_NODE) {
                    if ($Vz4c1zo3dvrb === $Valt1h0eialm) {
                        $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                    }

                    $Vz4c1zo3dvrb = $Vz4c1zo3dvrb->parentNode;
                }
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['descendant']) {
            $V3ezantoa22m = self::findNodes($Veu4emafikgi, $V4a4guv4okog['descendant'], $Vciopigkxyzy);
            $V3ezantoa22m = !empty($V3ezantoa22m) ? $V3ezantoa22m : array();

            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                foreach (self::getDescendants($Vpbrymo1kvdk) as $Vdcvrzh0lolm) {
                    foreach ($V3ezantoa22m as $Vdcvrzh0lolmNode) {
                        if ($Vdcvrzh0lolmNode === $Vdcvrzh0lolm) {
                            $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                        }
                    }
                }
            }

            $Vpbrymo1kvdks    = $Vt1r0syzbccp;
            $Vt1r0syzbccp = array();

            if (empty($Vpbrymo1kvdks)) {
                return false;
            }
        }

        
        if ($V4a4guv4okog['children']) {
            $VesnpsejyhuwidChild   = array('count', 'greater_than', 'less_than', 'only');
            $Vypmkgldf3euOptions = self::assertValidKeys(
                $V4a4guv4okog['children'],
                $VesnpsejyhuwidChild
            );

            foreach ($Vpbrymo1kvdks as $Vpbrymo1kvdk) {
                $Vqibe0aypwros = $Vpbrymo1kvdk->childNodes;

                foreach ($Vqibe0aypwros as $Vqibe0aypwro) {
                    if ($Vqibe0aypwro->nodeType !== XML_CDATA_SECTION_NODE &&
                        $Vqibe0aypwro->nodeType !== XML_TEXT_NODE) {
                        $Vypmkgldf3euren[] = $Vqibe0aypwro;
                    }
                }

                
                if (!empty($Vypmkgldf3euren)) {
                    
                    if ($Vypmkgldf3euOptions['count'] !== null) {
                        if (count($Vypmkgldf3euren) !== $Vypmkgldf3euOptions['count']) {
                            break;
                        }
                    } 
                    elseif ($Vypmkgldf3euOptions['less_than']    !== null &&
                            $Vypmkgldf3euOptions['greater_than'] !== null) {
                        if (count($Vypmkgldf3euren) >= $Vypmkgldf3euOptions['less_than'] ||
                            count($Vypmkgldf3euren) <= $Vypmkgldf3euOptions['greater_than']) {
                            break;
                        }
                    } 
                    elseif ($Vypmkgldf3euOptions['less_than'] !== null) {
                        if (count($Vypmkgldf3euren) >= $Vypmkgldf3euOptions['less_than']) {
                            break;
                        }
                    } 
                    elseif ($Vypmkgldf3euOptions['greater_than'] !== null) {
                        if (count($Vypmkgldf3euren) <= $Vypmkgldf3euOptions['greater_than']) {
                            break;
                        }
                    }

                    
                    if ($Vypmkgldf3euOptions['only']) {
                        $Vs4pd2020r5h = self::findNodes(
                            $Veu4emafikgi,
                            $Vypmkgldf3euOptions['only'],
                            $Vciopigkxyzy
                        );

                        
                        foreach ($Vypmkgldf3euren as $Vypmkgldf3eu) {
                            $Vwetg4hewdr4ed = false;

                            foreach ($Vs4pd2020r5h as $Vr5ubscduzpf) {
                                if ($Vr5ubscduzpf === $Vypmkgldf3eu) {
                                    $Vwetg4hewdr4ed = true;
                                }
                            }

                            if (!$Vwetg4hewdr4ed) {
                                break 2;
                            }
                        }
                    }

                    $Vt1r0syzbccp[] = $Vpbrymo1kvdk;
                }
            }

            $Vpbrymo1kvdks = $Vt1r0syzbccp;

            if (empty($Vpbrymo1kvdks)) {
                return;
            }
        }

        
        return !empty($Vpbrymo1kvdks) ? $Vpbrymo1kvdks : array();
    }

    
    protected static function getDescendants(DOMNode $Vpbrymo1kvdk)
    {
        $Vjmucjjcrpoa = array();
        $Vqibe0aypwros  = $Vpbrymo1kvdk->childNodes ? $Vpbrymo1kvdk->childNodes : array();

        foreach ($Vqibe0aypwros as $Vypmkgldf3eu) {
            if ($Vypmkgldf3eu->nodeType === XML_CDATA_SECTION_NODE ||
                $Vypmkgldf3eu->nodeType === XML_TEXT_NODE) {
                continue;
            }

            $Vypmkgldf3euren    = self::getDescendants($Vypmkgldf3eu);
            $Vjmucjjcrpoa = array_merge($Vjmucjjcrpoa, $Vypmkgldf3euren, array($Vypmkgldf3eu));
        }

        return isset($Vjmucjjcrpoa) ? $Vjmucjjcrpoa : array();
    }

    
    protected static function getElementsByCaseInsensitiveTagName(DOMDocument $Veu4emafikgi, $Vl2ijnnhdtam)
    {
        $Vbzemolr5akxs = $Veu4emafikgi->getElementsByTagName(strtolower($Vl2ijnnhdtam));

        if ($Vbzemolr5akxs->length == 0) {
            $Vbzemolr5akxs = $Veu4emafikgi->getElementsByTagName(strtoupper($Vl2ijnnhdtam));
        }

        return $Vbzemolr5akxs;
    }

    
    protected static function getNodeText(DOMNode $Vpbrymo1kvdk)
    {
        if (!$Vpbrymo1kvdk->childNodes instanceof DOMNodeList) {
            return '';
        }

        $Vv0hyvhlkjqr = '';

        foreach ($Vpbrymo1kvdk->childNodes as $Vqibe0aypwro) {
            if ($Vqibe0aypwro->nodeType === XML_TEXT_NODE ||
                $Vqibe0aypwro->nodeType === XML_CDATA_SECTION_NODE) {
                $Vv0hyvhlkjqr .= trim($Vqibe0aypwro->data) . ' ';
            } else {
                $Vv0hyvhlkjqr .= self::getNodeText($Vqibe0aypwro);
            }
        }

        return str_replace('  ', ' ', $Vv0hyvhlkjqr);
    }
}
