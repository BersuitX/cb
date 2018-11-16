<?php defined('BASEPATH') OR exit('No direct script access allowed');


class MY_Model extends CI_Model
{
    
    protected $Vvxvzr1l1scx = NULL;
    
    protected $Vxp51xowz0ay;
    
    public $Vhyg2tjvah5t = NULL;
    
    public $V3dcgwpfqrkl = 'id';
    
    public $Vhyg2tjvah5t_fields = array();
    
    public $Vs2eszoszsje = array();
    
    public $Vobjb1r2ecqi = array();
    private $Vzk42s54fqbx = NULL;
    
    protected $Vga1x5mfbjyz = TRUE;
    protected $Vga1x5mfbjyz_format = 'Y-m-d H:i:s';
    protected $Vhd4xsgnbgc4;
    protected $V3hduyw5mwk1;
    protected $Vqkf0jyrkdcp;
    
    protected $Vawy2lbbcl2c = FALSE;
    
    private $Vzwzjnylkb4g = array();
    public $V2f4igqlradp = array();
    public $Vyic2z2ugbsz = array();
    public $Vyic2z2ugbsz_pivot = array();
    public $Vjbcbhn5fv3v = TRUE;
    private $Vmf4y55hwqlh = array();
    
    
    public $Vi0pq5r51gnz = 'file';
    public $Vvfcp5on4izk = 'mm';
    protected $V5v5nn2rabbx = array();
    public $Vm3vs3vdz5jf = FALSE;
    
    public $Vm2ihevcwpgr;
    public $V4hofglhnqja;
    public $Viekavdf4ta2;
    public $Vzfyxbhmmrhc;
    public $Vt3bpe51qqnz;
    
    private $Vior5tylygnz = TRUE;
    private $Veuzrnmduwwb = array();
    
    protected $Vqq0fnjnnhv5 = array();
    protected $Vz31egr2p5e5 = array();
    protected $V4fumdnij2a1 = array();
    protected $Vc22s0ykmmmz = array();
    protected $Vyz1xypkah5s = array();
    protected $V2vizaubj1js = array();
    protected $Vmdlsdmbyymr = array();
    protected $Vl2svecwxck1 = array();
    protected $V4jimjphdnsn = array();
    protected $Vytu0nl11bdq = array();
    protected $Vjicxzzn4n2r = array();
    protected $V4awnthvgj2y = 'object';
    protected $V4awnthvgj2y_dropdown = NULL;
    protected $Vcts1cnijnlk = '';
    private $Verzgjrj5r2d = 'without';
    private $Vvs0o4hkqyk3 = '*';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('inflector');
        $this->_set_connection();
        $this->_set_timestamps();
        $this->_fetch_table();
        $this->pagination_delimiters = (isset($this->pagination_delimiters)) ? $this->pagination_delimiters : array('<span>','</span>');
        $this->pagination_arrows = (isset($this->pagination_arrows)) ? $this->pagination_arrows : array('&lt;','&gt;');
        
    }
    public function _get_table_fields()
    {
        if(empty($this->table_fields))
        {
            $this->table_fields = $this->_database->list_fields($this->table);
        }
        return TRUE;
    }
    public function fillable_fields()
    {
        if(!isset($this->_can_be_filled))
        {
            $this->_get_table_fields();
            $Vhjb1p0jwye0 = array();
            foreach ($this->table_fields as $Vwji4rxkyw5j) {
                if (!in_array($Vwji4rxkyw5j, $this->protected)) {
                    $Vhjb1p0jwye0[] = $Vwji4rxkyw5j;
                }
            }
            if (!empty($this->fillable)) {
                $V3tgwhm43s22 = array();
                foreach ($this->fillable as $Vwji4rxkyw5j) {
                    if (in_array($Vwji4rxkyw5j, $Vhjb1p0jwye0)) {
                        $V3tgwhm43s22[] = $Vwji4rxkyw5j;
                    }
                }
                $this->_can_be_filled = $V3tgwhm43s22;
            } else {
                $this->_can_be_filled = $Vhjb1p0jwye0;
            }
        }
        return TRUE;
    }
    public function _prep_before_write($Vfeinw1hsfej)
    {
        $this->fillable_fields();
        
        $V3tgwhm43s22 = $this->_can_be_filled;
        
        $Vfeinw1hsfej_as_array = (is_object($Vfeinw1hsfej)) ? (array)$Vfeinw1hsfej : $Vfeinw1hsfej;
        $Vfson2ar5hri = array();
        $V0znmefamgh0 = $this->is_multidimensional($Vfeinw1hsfej);
        if($V0znmefamgh0===FALSE)
        {
            foreach ($Vfeinw1hsfej_as_array as $Vwji4rxkyw5j => $Vcnwqsowvhom)
            {
                if (in_array($Vwji4rxkyw5j, $V3tgwhm43s22)) {
                    $Vfson2ar5hri[$Vwji4rxkyw5j] = $Vcnwqsowvhom;
                }
            }
        }
        else
        {
            foreach($Vfeinw1hsfej_as_array as $V2xim30qek4u => $Vf3jo4nkd2sr)
            {
                foreach ($Vf3jo4nkd2sr as $Vwji4rxkyw5j => $Vcnwqsowvhom)
                {
                    if (in_array($Vwji4rxkyw5j, $V3tgwhm43s22)) {
                        $Vfson2ar5hri[$V2xim30qek4u][$Vwji4rxkyw5j] = $Vcnwqsowvhom;
                    }
                }
            }
        }
        return $Vfson2ar5hri;
    }
    
    public function _prep_after_write()
    {
        if($this->delete_cache_on_save===TRUE)
        {
            $this->delete_cache('*');
        }
        return TRUE;
    }
    public function _prep_before_read()
    {
    }
    public function _prep_after_read($Vfeinw1hsfej, $V0znmefamgh0 = TRUE)
    {
        
        $Vfeinw1hsfej = $this->join_temporary_results($Vfeinw1hsfej);
        $this->_database->reset_query();
        if(isset($this->return_as_dropdown) && $this->return_as_dropdown == 'dropdown')
        {
            foreach($Vfeinw1hsfej as $Vf3jo4nkd2sr)
            {
                $Vdtp3waavdbz[$Vf3jo4nkd2sr[$this->primary_key]] = $Vf3jo4nkd2sr[$this->_dropdown_field];
            }
            $Vfeinw1hsfej = $Vdtp3waavdbz;
            $this->return_as_dropdown = NULL;
        }
        elseif($this->return_as == 'object')
        {
            $Vfeinw1hsfej = json_decode(json_encode($Vfeinw1hsfej), FALSE);
        }
        if(isset($this->_select))
        {
            $this->_select = '*';
        }
        return $Vfeinw1hsfej;
    }
    
    public function from_form($Vywtwaykxaal = NULL,$Vb205vrrilo4 = NULL, $Veuzrnmduwwb = array())
    {
        $this->_get_table_fields();
        $this->load->library('form_validation');
        if(!isset($Vywtwaykxaal))
        {
            if(empty($Veuzrnmduwwb))
            {
                $Vywtwaykxaal = $this->rules['insert'];
            }
            else
            {
                $Vywtwaykxaal = $this->rules['update'];
            }
        }
        $this->form_validation->set_rules($Vywtwaykxaal);
        if($this->form_validation->run())
        {
            $this->fillable_fields();
            $this->validated = array();
            foreach($Vywtwaykxaal as $Vuq0dlpvhwju)
            {
                if(in_array($Vuq0dlpvhwju['field'],$this->_can_be_filled))
                {
                    $this->validated[$Vuq0dlpvhwju['field']] = $this->input->post($Vuq0dlpvhwju['field']);
                }
            }
            if(isset($Vb205vrrilo4) && is_array($Vb205vrrilo4) && !empty($Vb205vrrilo4))
            {
                foreach($Vb205vrrilo4 as $Vwji4rxkyw5j => $Vcnwqsowvhom)
                {
                    if(in_array($Vwji4rxkyw5j, $this->_can_be_filled))
                    {
                        $this->validated[$Vwji4rxkyw5j] = $Vcnwqsowvhom;
                    }
                }
            }
            if(!empty($Veuzrnmduwwb))
            {
                foreach ($Veuzrnmduwwb as $V2xim30qek4u => $Vwji4rxkyw5j) {
                    if (in_array($Vwji4rxkyw5j, $this->table_fields)) {
                        $this->row_fields_to_update[$Vwji4rxkyw5j] = $this->input->post($Vwji4rxkyw5j);
                    }
                    else if (in_array($V2xim30qek4u, $this->table_fields)){
                        $this->row_fields_to_update[$V2xim30qek4u] = $Vwji4rxkyw5j;
                    }
                    else {
                        continue;
                    }
                }
            }
            return $this;
        }
        else
        {
            $this->validated = FALSE;
            return $this;
        }
    }
    
    public function insert($Vfeinw1hsfej = NULL)
    {
        if(!isset($Vfeinw1hsfej) && $this->validated!=FALSE)
        {
            $Vfeinw1hsfej = $this->validated;
            $this->validated = FALSE;
        }
        elseif(!isset($Vfeinw1hsfej))
        {
            return FALSE;
        }
        $Vfeinw1hsfej = $this->_prep_before_write($Vfeinw1hsfej);
        
        $V0znmefamgh0 = $this->is_multidimensional($Vfeinw1hsfej);
        
        if($V0znmefamgh0 === FALSE)
        {
            if($this->timestamps !== FALSE)
            {
                $Vfeinw1hsfej[$this->_created_at_field] = $this->_the_timestamp();
            }
            $Vfeinw1hsfej = $this->trigger('before_create',$Vfeinw1hsfej);
            if($this->_database->insert($this->table, $Vfeinw1hsfej))
            {
                $this->_prep_after_write();
                $Vdrzyozqxvbr = $this->_database->insert_id();
                $Vb5hjbk2mbwk = $this->trigger('after_create',$Vdrzyozqxvbr);
                return $Vb5hjbk2mbwk;
            }
            return FALSE;
        }
        
        else
        {
            $Vb5hjbk2mbwk = array();
            foreach($Vfeinw1hsfej as $Vf3jo4nkd2sr)
            {
                if($this->timestamps !== FALSE)
                {
                    $Vf3jo4nkd2sr[$this->_created_at_field] = $this->_the_timestamp();
                }
                $Vf3jo4nkd2sr = $this->trigger('before_create',$Vf3jo4nkd2sr);
                if($this->_database->insert($this->table,$Vf3jo4nkd2sr))
                {
                    $Vb5hjbk2mbwk[] = $this->_database->insert_id();
                }
            }
            $this->_prep_after_write();
            $Vz31egr2p5e5 = array();
            foreach($Vb5hjbk2mbwk as $Vdrzyozqxvbr)
            {
                $Vz31egr2p5e5[] = $this->trigger('after_create', $Vdrzyozqxvbr);
            }
            return $Vz31egr2p5e5;
        }
        return FALSE;
    }
    
    public function is_multidimensional($V5adckfdzb1d)
    {
        if(is_array($V5adckfdzb1d))
        {
            foreach($V5adckfdzb1d as $V4sohn3vk0eg)
            {
                if(is_array($V4sohn3vk0eg))
                {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }
    
    public function update($Vfeinw1hsfej = NULL, $Vqzhycd4ykkn = NULL, $Vo3ncbt2kr35 = TRUE)
    {
        if(!isset($Vfeinw1hsfej) && $this->validated!=FALSE)
        {
            $Vfeinw1hsfej = $this->validated;
            $this->validated = FALSE;
        }
        elseif(!isset($Vfeinw1hsfej))
        {
            $this->_database->reset_query();
            return FALSE;
        }
        
        $Vfeinw1hsfej = $this->_prep_before_write($Vfeinw1hsfej);
        
        $V0znmefamgh0 = $this->is_multidimensional($Vfeinw1hsfej);
        
        if($V0znmefamgh0 === FALSE)
        {
            if($this->timestamps !== FALSE)
            {
                $Vfeinw1hsfej[$this->_updated_at_field] = $this->_the_timestamp();
            }
            $Vfeinw1hsfej = $this->trigger('before_update',$Vfeinw1hsfej);
            if($this->validated === FALSE && count($this->row_fields_to_update))
            {
                $this->where($this->row_fields_to_update);
                $this->row_fields_to_update = array();
            }
            if(isset($Vqzhycd4ykkn))
            {
                if (is_array($Vqzhycd4ykkn))
                {
                    $this->where($Vqzhycd4ykkn);
                } elseif (is_numeric($Vqzhycd4ykkn)) {
                    $this->_database->where($this->primary_key, $Vqzhycd4ykkn);
                } else {
                    $Vpa4dv3okctt = (is_object($Vfeinw1hsfej)) ? $Vfeinw1hsfej->{$Vqzhycd4ykkn} : $Vfeinw1hsfej[$Vqzhycd4ykkn];
                    $this->_database->where($Vqzhycd4ykkn, $Vpa4dv3okctt);
                }
            }
            if($Vo3ncbt2kr35)
            {
                if($this->_database->update($this->table, $Vfeinw1hsfej))
                {
                    $this->_prep_after_write();
                    $V1aypm0x33qi = $this->_database->affected_rows();
                    $Vb5hjbk2mbwk = $this->trigger('after_update',$V1aypm0x33qi);
                    return $Vb5hjbk2mbwk;
                }
            }
            else
            {
                if($this->_database->set($Vfeinw1hsfej, null, FALSE)->update($this->table))
                {
                    $this->_prep_after_write();
                    $V1aypm0x33qi = $this->_database->affected_rows();
                    $Vb5hjbk2mbwk = $this->trigger('after_update',$V1aypm0x33qi);
                    return $Vb5hjbk2mbwk;
                }
            }
            return FALSE;
        }
        
        else
        {
            $Vf3jo4nkd2srs = 0;
            foreach($Vfeinw1hsfej as $Vf3jo4nkd2sr)
            {
                if($this->timestamps !== FALSE)
                {
                    $Vf3jo4nkd2sr[$this->_updated_at_field] = $this->_the_timestamp();
                }
                $Vf3jo4nkd2sr = $this->trigger('before_update',$Vf3jo4nkd2sr);
                if(is_array($Vqzhycd4ykkn))
                {
                    $this->_database->where($Vqzhycd4ykkn[0], $Vqzhycd4ykkn[1]);
                }
                else
                {
                    $Vpa4dv3okctt = (is_object($Vf3jo4nkd2sr)) ? $Vf3jo4nkd2sr->{$Vqzhycd4ykkn} : $Vf3jo4nkd2sr[$Vqzhycd4ykkn];
                    $this->_database->where($Vqzhycd4ykkn, $Vpa4dv3okctt);
                }
                if($Vo3ncbt2kr35)
                {
                    if($this->_database->update($this->table,$Vf3jo4nkd2sr))
                    {
                        $Vf3jo4nkd2srs++;
                    }
                }
                else
                {
                    if($this->_database->set($Vf3jo4nkd2sr, null, FALSE)->update($this->table))
                    {
                        $Vf3jo4nkd2srs++;
                    }
                }
            }
            $V1aypm0x33qi = $Vf3jo4nkd2srs;
            $this->_prep_after_write();
            $Vb5hjbk2mbwk = $this->trigger('after_update',$V1aypm0x33qi);
            return $Vb5hjbk2mbwk;
        }
        return FALSE;
    }
    
    public function where($Vwji4rxkyw5j_or_array = NULL, $Vuejp31ckfw1 = NULL, $Vcnwqsowvhom = NULL, $Verczjtiomab = FALSE, $V10wbzay0i0e = FALSE, $Vm4z12b11g4j = FALSE)
    {
        if($this->soft_deletes===TRUE)
        {
            $Vmbvee5jzqcq = debug_backtrace(); #fix for lower PHP 5.4 version
            if($Vmbvee5jzqcq[1]['function']!='force_delete'){
                $this->_where_trashed();
            }
        }
        if(is_array($Vwji4rxkyw5j_or_array))
        {
            $V0znmefamgh0 = $this->is_multidimensional($Vwji4rxkyw5j_or_array);
            if($V0znmefamgh0 === TRUE)
            {
                foreach ($Vwji4rxkyw5j_or_array as $Vutq5hwyqsvw)
                {
                    $Vwji4rxkyw5j = $Vutq5hwyqsvw[0];
                    $Vuejp31ckfw1 = isset($Vutq5hwyqsvw[1]) ? $Vutq5hwyqsvw[1] : NULL;
                    $Vcnwqsowvhom = isset($Vutq5hwyqsvw[2]) ? $Vutq5hwyqsvw[2] : NULL;
                    $Verczjtiomab = (isset($Vutq5hwyqsvw[3])) ? TRUE : FALSE;
                    $V10wbzay0i0e = (isset($Vutq5hwyqsvw[4])) ? TRUE : FALSE;
                    $this->where($Vwji4rxkyw5j, $Vuejp31ckfw1, $Vcnwqsowvhom, $Verczjtiomab,$V10wbzay0i0e);
                }
                return $this;
            }
        }
        if($Verczjtiomab === TRUE)
        {
            $Vutq5hwyqsvw_or = 'or_where';
        }
        else
        {
            $Vutq5hwyqsvw_or = 'where';
        }
        if($V10wbzay0i0e === TRUE)
        {
            $Vcghg2bfi1c3 = '_not';
        }
        else
        {
            $Vcghg2bfi1c3 = '';
        }
        if($Vm4z12b11g4j === TRUE)
        {
            $this->_database->{$Vutq5hwyqsvw_or}($Vwji4rxkyw5j_or_array, NULL, FALSE);
        }
        elseif(is_numeric($Vwji4rxkyw5j_or_array))
        {
            $this->_database->{$Vutq5hwyqsvw_or}(array($this->table.'.'.$this->primary_key => $Vwji4rxkyw5j_or_array));
        }
        elseif(is_array($Vwji4rxkyw5j_or_array) && !isset($Vuejp31ckfw1))
        {
            $this->_database->where($Vwji4rxkyw5j_or_array);
        }
        elseif(!isset($Vcnwqsowvhom) && isset($Vwji4rxkyw5j_or_array) && isset($Vuejp31ckfw1) && !is_array($Vuejp31ckfw1))
        {
            $this->_database->{$Vutq5hwyqsvw_or}(array($this->table.'.'.$Vwji4rxkyw5j_or_array => $Vuejp31ckfw1));
        }
        elseif(!isset($Vcnwqsowvhom) && isset($Vwji4rxkyw5j_or_array) && isset($Vuejp31ckfw1) && is_array($Vuejp31ckfw1) && !is_array($Vwji4rxkyw5j_or_array))
        {
            
            
            $this->_database->{$Vutq5hwyqsvw_or.$Vcghg2bfi1c3.'_in'}($this->table.'.'.$Vwji4rxkyw5j_or_array, $Vuejp31ckfw1);
        }
        elseif(isset($Vwji4rxkyw5j_or_array) && isset($Vuejp31ckfw1) && isset($Vcnwqsowvhom))
        {
            if(strtolower($Vuejp31ckfw1) == 'like') {
                if($V10wbzay0i0e === TRUE)
                {
                    $Vjkxzsn4n4li = 'not_like';
                }
                else
                {
                    $Vjkxzsn4n4li = 'like';
                }
                if ($Verczjtiomab === TRUE)
                {
                    $Vjkxzsn4n4li = 'or_'.$Vjkxzsn4n4li;
                }
                $this->_database->{$Vjkxzsn4n4li}($Vwji4rxkyw5j_or_array, $Vcnwqsowvhom);
            }
            else
            {
                $this->_database->{$Vutq5hwyqsvw_or}($Vwji4rxkyw5j_or_array.' '.$Vuejp31ckfw1, $Vcnwqsowvhom);
            }
        }
        return $this;
    }
    
    public function limit($V2bur4u05u2g, $Vzawlyjaf5xg = 0)
    {
        $this->_database->limit($V2bur4u05u2g, $Vzawlyjaf5xg);
        return $this;
    }
    
    public function group_by($V4ue55qtdwdw)
    {
        $this->_database->group_by($V4ue55qtdwdw);
        return $this;
    }
    
    public function delete($Vutq5hwyqsvw = NULL)
    {
        if(!empty($this->before_delete) || !empty($this->before_soft_delete) || !empty($this->after_delete) || !empty($this->after_soft_delete) || ($this->soft_deletes === TRUE))
        {
            $Vhrhbztgvb1q = array();
            if(isset($Vutq5hwyqsvw))
            {
                $this->where($Vutq5hwyqsvw);
            }
            $Vfvggg0pmnws = $this->_database->get($this->table);
            foreach($Vfvggg0pmnws->result() as $Vf3jo4nkd2sr)
            {
                $Vhrhbztgvb1q[] = array($this->primary_key => $Vf3jo4nkd2sr->{$this->primary_key});
            }
            if(!empty($this->before_soft_delete))
            {
                foreach($Vhrhbztgvb1q as &$Vf3jo4nkd2sr)
                {
                    $Vf3jo4nkd2sr = $this->trigger('before_soft_delete',$Vf3jo4nkd2sr);
                }
            }
            if(!empty($this->before_delete))
            {
                foreach($Vhrhbztgvb1q as &$Vf3jo4nkd2sr)
                {
                    $Vf3jo4nkd2sr = $this->trigger('before_delete',$Vf3jo4nkd2sr);
                }
            }
        }
        if(isset($Vutq5hwyqsvw))
        {
            $this->where($Vutq5hwyqsvw);
        }
        $V1aypm0x33qi_rows = 0;
        if($this->soft_deletes === TRUE)
        {
            if(isset($Vhrhbztgvb1q)&& count($Vhrhbztgvb1q) > 0)
            {
                foreach($Vhrhbztgvb1q as &$Vf3jo4nkd2sr)
                {
                    
                    $Vf3jo4nkd2sr[$this->_deleted_at_field] = $this->_the_timestamp();
                }
                $V1aypm0x33qi_rows = $this->_database->update_batch($this->table, $Vhrhbztgvb1q, $this->primary_key);
                $Vhrhbztgvb1q['affected_rows'] = $V1aypm0x33qi_rows;
                $this->_prep_after_write();
                $this->trigger('after_soft_delete',$Vhrhbztgvb1q);
            }
            return $V1aypm0x33qi_rows;
        }
        else
        {
            if($this->_database->delete($this->table))
            {
                $V1aypm0x33qi_rows = $this->_database->affected_rows();
                if(!empty($this->after_delete))
                {
                    $Vhrhbztgvb1q['affected_rows'] = $V1aypm0x33qi_rows;
                    $Vhrhbztgvb1q = $this->trigger('after_delete',$Vhrhbztgvb1q);
                    $V1aypm0x33qi_rows = $Vhrhbztgvb1q;
                }
                $this->_prep_after_write();
                return $V1aypm0x33qi_rows;
            }
        }
        return FALSE;
    }
    
    public function force_delete($Vutq5hwyqsvw = NULL)
    {
        if(isset($Vutq5hwyqsvw))
        {
            $this->where($Vutq5hwyqsvw);
        }
        if($this->_database->delete($this->table))
        {
            $this->_prep_after_write();
            return $this->_database->affected_rows();
        }
        return FALSE;
    }
    
    public function restore($Vutq5hwyqsvw = NULL)
    {
        $this->with_trashed();
        if(isset($Vutq5hwyqsvw))
        {
            $this->where($Vutq5hwyqsvw);
        }
        if($V1aypm0x33qi_rows = $this->_database->update($this->table,array($this->_deleted_at_field=>NULL)))
        {
            $this->_prep_after_write();
            return $V1aypm0x33qi_rows;
        }
        return FALSE;
    }
    
    public function trashed($Vutq5hwyqsvw = NULL)
    {
        $this->only_trashed();
        if(isset($Vutq5hwyqsvw))
        {
            $this->where($Vutq5hwyqsvw);
        }
        $this->limit(1);
        $Vfvggg0pmnws = $this->_database->get($this->table);
        if($Vfvggg0pmnws->num_rows() == 1)
        {
            return TRUE;
        }
        return FALSE;
    }
    
    public function get($Vutq5hwyqsvw = NULL)
    {
        $Vfeinw1hsfej = $this->_get_from_cache();
        if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej !== FALSE)
        {
            $this->_database->reset_query();
            return $Vfeinw1hsfej;
        }
        else
        {
            $this->trigger('before_get');
            if($this->_select)
            {
                $this->_database->select($this->_select);
            }
            if(!empty($this->_requested))
            {
                foreach($this->_requested as $V54y4b1zcdz5)
                {
                    $this->_database->select($this->_relationships[$V54y4b1zcdz5['request']]['local_key']);
                }
            }
            if(isset($Vutq5hwyqsvw))
            {
                $this->where($Vutq5hwyqsvw);
            }
            $this->limit(1);
            $Vfvggg0pmnws = $this->_database->get($this->table);
            if ($Vfvggg0pmnws->num_rows() == 1)
            {
                $Vf3jo4nkd2sr = $Vfvggg0pmnws->row_array();
                $Vf3jo4nkd2sr = $this->trigger('after_get', $Vf3jo4nkd2sr);
                $Vf3jo4nkd2sr =  $this->_prep_after_read(array($Vf3jo4nkd2sr),FALSE);
                $Vf3jo4nkd2sr = $Vf3jo4nkd2sr[0];
                $this->_write_to_cache($Vf3jo4nkd2sr);
                return $Vf3jo4nkd2sr;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
    public function get_all($Vutq5hwyqsvw = NULL)
    {
        $Vfeinw1hsfej = $this->_get_from_cache();
        if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej !== FALSE)
        {
            $this->_database->reset_query();
            return $Vfeinw1hsfej;
        }
        else
        {
            $this->trigger('before_get');
            if(isset($Vutq5hwyqsvw))
            {
                $this->where($Vutq5hwyqsvw);
            }
            elseif($this->soft_deletes===TRUE)
            {
                $this->_where_trashed();
            }
            if(isset($this->_select))
            {
                $this->_database->select($this->_select);
            }
            if(!empty($this->_requested))
            {
                foreach($this->_requested as $V54y4b1zcdz5)
                {
                    $this->_database->select($this->_relationships[$V54y4b1zcdz5['request']]['local_key']);
                }
            }
            $Vfvggg0pmnws = $this->_database->get($this->table);
            if($Vfvggg0pmnws->num_rows() > 0)
            {
                $Vfeinw1hsfej = $Vfvggg0pmnws->result_array();
                $Vfeinw1hsfej = $this->trigger('after_get', $Vfeinw1hsfej);
                $Vfeinw1hsfej = $this->_prep_after_read($Vfeinw1hsfej,TRUE);
                $this->_write_to_cache($Vfeinw1hsfej);
                return $Vfeinw1hsfej;
            }
            else
            {
                return FALSE;
            }
        }
    }
    
    public function count_rows($Vutq5hwyqsvw = NULL)
    {
        if(isset($Vutq5hwyqsvw))
        {
            $this->where($Vutq5hwyqsvw);
        }
        $this->_database->from($this->table);
        $Vgswv4uy2maf = $this->_database->count_all_results();
        return $Vgswv4uy2maf;
    }
    
    
    public function with($Vntg4bz5sdqr,$Vg44epnxeiog = array())
    {
        $this->_set_relationships();
        if (array_key_exists($Vntg4bz5sdqr, $this->_relationships))
        {
            $this->_requested[$Vntg4bz5sdqr] = array('request'=>$Vntg4bz5sdqr);
            $Vgttvg0nr3nd = array();
            if(isset($Vg44epnxeiog))
            {
                foreach($Vg44epnxeiog as $Vujy5lo3guys)
                {
                    if(is_array($Vujy5lo3guys))
                    {
                        foreach($Vujy5lo3guys as $Vwyse0flpyxh => $Vxxtccqydhzn)
                        {
                            $Vgttvg0nr3nd[$Vwyse0flpyxh] = $Vxxtccqydhzn;
                        }
                    }
                    else
                    {
                        $V54y4b1zcdz5_operations = explode('|',$Vujy5lo3guys);
                        foreach($V54y4b1zcdz5_operations as $Vxjgzc4sdskb)
                        {
                            $V4sohn3vk0egs = explode(':', $Vxjgzc4sdskb, 2);
                            if (sizeof($V4sohn3vk0egs) == 2) {
                                $Vgttvg0nr3nd[$V4sohn3vk0egs[0]] = $V4sohn3vk0egs[1];
                            } else {
                                show_error('MY_Model: Parameters for with_*() method must be of the form: "...->with_*(\'where:...|fields:...\')"');
                            }
                        }
                    }
                }
            }
            $this->_requested[$Vntg4bz5sdqr]['parameters'] = $Vgttvg0nr3nd;
        }
        
        return $this;
    }
    
    protected function join_temporary_results($Vfeinw1hsfej)
    {
        $Vzbbrtpk0h1j = array();
        $Vgjg02gamma1 = array();
        
        foreach($this->_requested as $V54y4b1zcdz5_key => $Vntg4bz5sdqr)
        {
            $V34tbf3aqt1k = NULL;
            $Vjjpt1ycsp4y = $this->_relationships[$Vntg4bz5sdqr['request']];
            $this->load->model($Vjjpt1ycsp4y['foreign_model']);
            $Vld4gcmt2gd3 = $Vjjpt1ycsp4y['foreign_key'];
            $V05wfxj5xagd = $Vjjpt1ycsp4y['local_key'];
            $Vhzfvh35xq32 = $Vjjpt1ycsp4y['foreign_table'];
            $V4wtbblc1wn4 = $Vjjpt1ycsp4y['relation'];
            $Vjjpt1ycsp4y_key = $Vjjpt1ycsp4y['relation_key'];
            if($V4wtbblc1wn4=='has_many_pivot')
            {
                $V34tbf3aqt1k = $Vjjpt1ycsp4y['pivot_table'];
                $Vkoobrtcfyc2 = $Vjjpt1ycsp4y['pivot_local_key'];
                $Vgiwtee4ibuh = $Vjjpt1ycsp4y['pivot_foreign_key'];
                $Vsg0pq4zbpbf = $Vjjpt1ycsp4y['get_relate'];
            }
            if(array_key_exists('order_inside',$Vntg4bz5sdqr['parameters']))
            {
                
                $V4sohn3vk0egs = explode(',', $Vntg4bz5sdqr['parameters']['order_inside']);
                foreach($V4sohn3vk0egs as $V4sohn3vk0eg)
                {
                    $Vrw5vvd4vhzk = explode(' ',$V4sohn3vk0eg);
                    if(sizeof($Vrw5vvd4vhzk)==2)
                    {
                        $Vgjg02gamma1[] = array(trim($Vrw5vvd4vhzk[0]), trim($Vrw5vvd4vhzk[1]));
                    }
                    else
                    {
                        $Vgjg02gamma1[] = array(trim($Vrw5vvd4vhzk[0]), 'desc');
                    }
                }
            }
            $V05wfxj5xagd_values = array();
            foreach($Vfeinw1hsfej as $V2xim30qek4u => $V4sohn3vk0eg)
            {
                if(isset($V4sohn3vk0eg[$V05wfxj5xagd]) and !empty($V4sohn3vk0eg[$V05wfxj5xagd]))
                {
                    $Vdrzyozqxvbr = $V4sohn3vk0eg[$V05wfxj5xagd];
                    $V05wfxj5xagd_values[$V2xim30qek4u] = $Vdrzyozqxvbr;
                }
            }
            if(!$V05wfxj5xagd_values)
            {
                $Vfeinw1hsfej[$V2xim30qek4u][$Vjjpt1ycsp4y_key] = NULL;
                continue;
            }
            if(!isset($V34tbf3aqt1k))
            {
                $V4edhrynsbgk = $this->{$Vjjpt1ycsp4y['foreign_model']};
                $Vjsggk5v2fqw = array();
                $Vjsggk5v2fqw[] = '`'.$Vhzfvh35xq32.'`.`'.$Vld4gcmt2gd3.'`';
                if(!empty($Vntg4bz5sdqr['parameters']))
                {
                    if(array_key_exists('fields',$Vntg4bz5sdqr['parameters']))
                    {
                        if($Vntg4bz5sdqr['parameters']['fields'] == '*count*')
                        {
                            $Vdvpdvozqm05 = '*count*';
                            $V4edhrynsbgk = (isset($Vdvpdvozqm05)) ? $V4edhrynsbgk->fields($Vdvpdvozqm05) : $V4edhrynsbgk;
                            $V4edhrynsbgk = $V4edhrynsbgk->fields($Vld4gcmt2gd3);
                        }
                        else
                        {
                            $Vwji4rxkyw5js = explode(',', $Vntg4bz5sdqr['parameters']['fields']);
                            foreach ($Vwji4rxkyw5js as $Vwji4rxkyw5j)
                            {
                                $Vjsggk5v2fqw[] = (strpos($Vwji4rxkyw5j,'.')===FALSE) ? '`' . $Vhzfvh35xq32 . '`.`' . trim($Vwji4rxkyw5j) . '`' : trim($Vwji4rxkyw5j);
                            }
                            $Vdvpdvozqm05 = implode(',', $Vjsggk5v2fqw);
                            $V4edhrynsbgk = (isset($Vdvpdvozqm05)) ? $V4edhrynsbgk->fields($Vdvpdvozqm05) : $V4edhrynsbgk;
                        }
                    }
                    if(array_key_exists('fields',$Vntg4bz5sdqr['parameters']) && ($Vntg4bz5sdqr['parameters']['fields']=='*count*'))
                    {
                        $V4edhrynsbgk->group_by('`' . $Vhzfvh35xq32 . '`.`' . $Vld4gcmt2gd3 . '`');
                    }
                    if(array_key_exists('where',$Vntg4bz5sdqr['parameters']) || array_key_exists('non_exclusive_where',$Vntg4bz5sdqr['parameters']))
                    {
                        $Vsokwnahkpqd = array_key_exists('where', $Vntg4bz5sdqr['parameters']) ? 'where' : 'non_exclusive_where';
                    }
                    $V4edhrynsbgk = isset($Vsokwnahkpqd) ? $V4edhrynsbgk->where($Vntg4bz5sdqr['parameters'][$Vsokwnahkpqd],NULL,NULL,FALSE,FALSE,TRUE) : $V4edhrynsbgk;
                    if(isset($Vgjg02gamma1))
                    {
                        foreach($Vgjg02gamma1 as $Vzbbrtpk0h1j_inside)
                        {
                            $V4edhrynsbgk = $V4edhrynsbgk->order_by($Vzbbrtpk0h1j_inside[0],$Vzbbrtpk0h1j_inside[1]);
                        }
                    }
                    
                    if(array_key_exists('with',$Vntg4bz5sdqr['parameters']))
                    {
                        
                        if(is_array($Vntg4bz5sdqr['parameters']['with']) && isset($Vntg4bz5sdqr['parameters']['with'][0]))
                        {
                            foreach ($Vntg4bz5sdqr['parameters']['with'] as $V5s15mr42i41)
                            {
                                $V5s15mr42i41_relation = array_shift($V5s15mr42i41);
                                $V4edhrynsbgk->with($V5s15mr42i41_relation, array($V5s15mr42i41));
                            }
                        }
                        else 
                        {
                            $V5s15mr42i41_relation = array_shift($Vntg4bz5sdqr['parameters']['with']);
                            $V4edhrynsbgk->with($V5s15mr42i41_relation,array($Vntg4bz5sdqr['parameters']['with']));
                        }
                    }
                }
                $V4edhrynsbgk = $V4edhrynsbgk->where($Vld4gcmt2gd3, $V05wfxj5xagd_values)->get_all();
            }
            else
            {
                $this->_database->join($V34tbf3aqt1k, $Vhzfvh35xq32.'.'.$Vld4gcmt2gd3.' = '.$V34tbf3aqt1k.'.'.$Vgiwtee4ibuh, 'left');
                $this->_database->join($this->table, $V34tbf3aqt1k.'.'.$Vkoobrtcfyc2.' = '.$this->table.'.'.$V05wfxj5xagd,'left');
                $this->_database->select($Vhzfvh35xq32.'.'.$Vld4gcmt2gd3);
                $this->_database->select($V34tbf3aqt1k.'.'.$Vkoobrtcfyc2);
                if(!empty($Vntg4bz5sdqr['parameters']))
                {
                    if(array_key_exists('fields',$Vntg4bz5sdqr['parameters']))
                    {
                        if($Vntg4bz5sdqr['parameters']['fields'] == '*count*')
                        {
                            $this->_database->select('COUNT(`'.$Vhzfvh35xq32.'`*) as counted_rows, `' . $Vhzfvh35xq32 . '`.`' . $Vld4gcmt2gd3 . '`', FALSE);
                        }
                        else
                        {
                            $Vwji4rxkyw5js = explode(',', $Vntg4bz5sdqr['parameters']['fields']);
                            $Vjsggk5v2fqw = array();
                            foreach ($Vwji4rxkyw5js as $Vwji4rxkyw5j) {
                                $Vjsggk5v2fqw[] = (strpos($Vwji4rxkyw5j,'.')===FALSE) ? '`' . $Vhzfvh35xq32 . '`.`' . trim($Vwji4rxkyw5j) . '`' : trim($Vwji4rxkyw5j);
                            }
                            $Vdvpdvozqm05 = implode(',', $Vjsggk5v2fqw);
                            $this->_database->select($Vdvpdvozqm05);
                        }
                    }
                    if(array_key_exists('where',$Vntg4bz5sdqr['parameters']) || array_key_exists('non_exclusive_where',$Vntg4bz5sdqr['parameters']))
                    {
                        $Vsokwnahkpqd = array_key_exists('where',$Vntg4bz5sdqr['parameters']) ? 'where' : 'non_exclusive_where';
                        $this->_database->where($Vntg4bz5sdqr['parameters'][$Vsokwnahkpqd],NULL,NULL,FALSE,FALSE,TRUE);
                    }
                }
                $this->_database->where_in($V34tbf3aqt1k.'.'.$Vkoobrtcfyc2,$V05wfxj5xagd_values);
                if(!empty($Vgjg02gamma1))
                {
                    $Vrw5vvd4vhzk_inside_str = '';
                    foreach($Vgjg02gamma1 as $Vzbbrtpk0h1j_inside)
                    {
                        $Vrw5vvd4vhzk_inside_str .= (strpos($Vzbbrtpk0h1j_inside[0],',')=== false) ? '`'.$Vhzfvh35xq32.'`.`'.$Vzbbrtpk0h1j_inside[0].' '.$Vzbbrtpk0h1j_inside[1] : $Vzbbrtpk0h1j_inside[0].' '.$Vzbbrtpk0h1j_inside[1];
                        $Vrw5vvd4vhzk_inside_str .= ',';
                    }
                    $Vrw5vvd4vhzk_inside_str = rtrim($Vrw5vvd4vhzk_inside_str, ",");
                    $this->_database->order_by(rtrim($Vrw5vvd4vhzk_inside_str,","));
                }
                $V4edhrynsbgk = $this->_database->get($Vhzfvh35xq32)->result_array();
                $this->_database->reset_query();
            }
            if(isset($V4edhrynsbgk) && !empty($V4edhrynsbgk)) {
                $Vqipad40iqne = array();
                foreach ($V4edhrynsbgk as $Voetc43kt2cr) {
                    $Voetc43kt2cr_array = (array)$Voetc43kt2cr;
                    $Vqck0k025ogo = $Voetc43kt2cr_array[$Vld4gcmt2gd3];
                    if(isset($V34tbf3aqt1k))
                    {
                        $Vvmuck5s44y1 = $Voetc43kt2cr_array[$Vkoobrtcfyc2];
                        if(isset($Vsg0pq4zbpbf) and $Vsg0pq4zbpbf === TRUE)
                        {
                            $Vqipad40iqne[$Vvmuck5s44y1][$Vqck0k025ogo] = $this->{$Vjjpt1ycsp4y['foreign_model']}->where($V05wfxj5xagd, $Voetc43kt2cr[$V05wfxj5xagd])->get();
                        }
                        else
                        {
                            $Vqipad40iqne[$Vvmuck5s44y1][$Vqck0k025ogo] = $Voetc43kt2cr;
                        }
                    }
                    else
                    {
                        if ($V4wtbblc1wn4 == 'has_one') {
                            $Vqipad40iqne[$Vqck0k025ogo] = $Voetc43kt2cr;
                        } else {
                            $Vqipad40iqne[$Vqck0k025ogo][] = $Voetc43kt2cr;
                        }
                    }
                }
                $V4edhrynsbgk = $Vqipad40iqne;
                foreach($V05wfxj5xagd_values as $V2xim30qek4u => $Vcnwqsowvhom)
                {
                    if(array_key_exists($Vcnwqsowvhom,$V4edhrynsbgk))
                    {
                        $Vfeinw1hsfej[$V2xim30qek4u][$Vjjpt1ycsp4y_key] = $V4edhrynsbgk[$Vcnwqsowvhom];
                    }
                    else
                    {
                        if(array_key_exists('where',$Vntg4bz5sdqr['parameters']))
                        {
                            unset($Vfeinw1hsfej[$V2xim30qek4u]);
                        }
                    }
                }
            }
            else
            {
                $Vfeinw1hsfej[$V2xim30qek4u][$Vjjpt1ycsp4y_key] = NULL;
            }
            if(array_key_exists('order_by',$Vntg4bz5sdqr['parameters']))
            {
                $V4sohn3vk0egs = explode(',', $Vntg4bz5sdqr['parameters']['order_by']);
                if(sizeof($V4sohn3vk0egs)==2)
                {
                    $Vzbbrtpk0h1j[$Vjjpt1ycsp4y_key] = array(trim($V4sohn3vk0egs[0]), trim($V4sohn3vk0egs[1]));
                }
                else
                {
                    $Vzbbrtpk0h1j[$Vjjpt1ycsp4y_key] = array(trim($V4sohn3vk0egs[0]), 'desc');
                }
            }
            unset($this->_requested[$V54y4b1zcdz5_key]);
        }
        if(!empty($Vzbbrtpk0h1j))
        {
            foreach($Vzbbrtpk0h1j as $Vwji4rxkyw5j => $Vf3jo4nkd2sr)
            {
                list($V2xim30qek4u, $Vcnwqsowvhom) = $Vf3jo4nkd2sr;
                $Vfeinw1hsfej = $this->_build_sorter($Vfeinw1hsfej, $Vwji4rxkyw5j, $V2xim30qek4u, $Vcnwqsowvhom);
            }
        }
        return $Vfeinw1hsfej;
    }
    
    private function _has_one($Vntg4bz5sdqr)
    {
        $Vjjpt1ycsp4y = $this->_relationships[$Vntg4bz5sdqr];
        $this->_database->join($Vjjpt1ycsp4y['foreign_table'], $Vjjpt1ycsp4y['foreign_table'].'.'.$Vjjpt1ycsp4y['foreign_key'].' = '.$this->table.'.'.$Vjjpt1ycsp4y['local_key'], 'left');
        return TRUE;
    }
    
    private function _set_relationships()
    {
        if(empty($this->_relationships))
        {
            $V1flr55fnyyv = array('has_one','has_many','has_many_pivot');
            foreach($V1flr55fnyyv as $Vokwojfs0f4q)
            {
                if(isset($this->{$Vokwojfs0f4q}) && !empty($this->{$Vokwojfs0f4q}))
                {
                    foreach($this->{$Vokwojfs0f4q} as $V2xim30qek4u => $Vjjpt1ycsp4y)
                    {
                        if(!is_array($Vjjpt1ycsp4y))
                        {
                            $Vq4lbrwzvm53 = $Vjjpt1ycsp4y;
                            $Vq4lbrwzvm53_name = strtolower($Vq4lbrwzvm53);
                            $this->load->model($Vq4lbrwzvm53_name);
                            $Vhzfvh35xq32 = $this->{$Vq4lbrwzvm53_name}->table;
                            $Vld4gcmt2gd3 = $this->{$Vq4lbrwzvm53_name}->primary_key;
                            $V05wfxj5xagd = $this->primary_key;
                            $Vkoobrtcfyc2 = $this->table.'_'.$V05wfxj5xagd;
                            $Vgiwtee4ibuh = $Vhzfvh35xq32.'_'.$Vld4gcmt2gd3;
                            $Vsg0pq4zbpbf = FALSE;
                        }
                        else
                        {
                            if($this->_is_assoc($Vjjpt1ycsp4y))
                            {
                                $Vq4lbrwzvm53 = $Vjjpt1ycsp4y['foreign_model'];
                                if(array_key_exists('foreign_table',$Vjjpt1ycsp4y))
                                {
                                    $Vhzfvh35xq32 = $Vjjpt1ycsp4y['foreign_table'];
                                }
                                else
                                {
                                    $Vq4lbrwzvm53_name = strtolower($Vq4lbrwzvm53);
                                    $this->load->model($Vq4lbrwzvm53_name);
                                    $Vhzfvh35xq32 = $this->{$Vq4lbrwzvm53_name}->table;
                                }
                                $Vld4gcmt2gd3 = $Vjjpt1ycsp4y['foreign_key'];
                                $V05wfxj5xagd = $Vjjpt1ycsp4y['local_key'];
                                if($Vokwojfs0f4q=='has_many_pivot')
                                {
                                    $V34tbf3aqt1k = $Vjjpt1ycsp4y['pivot_table'];
                                    $Vkoobrtcfyc2 = (array_key_exists('pivot_local_key',$Vjjpt1ycsp4y)) ? $Vjjpt1ycsp4y['pivot_local_key'] : $this->table.'_'.$this->primary_key;
                                    $Vgiwtee4ibuh = (array_key_exists('pivot_foreign_key',$Vjjpt1ycsp4y)) ? $Vjjpt1ycsp4y['pivot_foreign_key'] : $Vhzfvh35xq32.'_'.$Vld4gcmt2gd3;
                                    $Vsg0pq4zbpbf = (array_key_exists('get_relate',$Vjjpt1ycsp4y) && ($Vjjpt1ycsp4y['get_relate']===TRUE)) ? TRUE : FALSE;
                                }
                            }
                            else
                            {
                                $Vq4lbrwzvm53 = $Vjjpt1ycsp4y[0];
                                $Vq4lbrwzvm53_name = strtolower($Vq4lbrwzvm53);
                                $this->load->model($Vq4lbrwzvm53_name);
                                $Vhzfvh35xq32 = $this->{$Vq4lbrwzvm53_name}->table;
                                $Vld4gcmt2gd3 = $Vjjpt1ycsp4y[1];
                                $V05wfxj5xagd = $Vjjpt1ycsp4y[2];
                                if($Vokwojfs0f4q=='has_many_pivot')
                                {
                                    $Vkoobrtcfyc2 = $this->table.'_'.$this->primary_key;
                                    $Vgiwtee4ibuh = $Vhzfvh35xq32.'_'.$Vld4gcmt2gd3;
                                    $Vsg0pq4zbpbf = (isset($Vjjpt1ycsp4y[3]) && ($Vjjpt1ycsp4y[3]===TRUE())) ? TRUE : FALSE;
                                }
                            }
                        }
                        if($Vokwojfs0f4q=='has_many_pivot' && !isset($V34tbf3aqt1k))
                        {
                            $Vhyg2tjvah5ts = array($this->table, $Vhzfvh35xq32);
                            sort($Vhyg2tjvah5ts);
                            $V34tbf3aqt1k = $Vhyg2tjvah5ts[0].'_'.$Vhyg2tjvah5ts[1];
                        }
                        $this->_relationships[$V2xim30qek4u] = array('relation' => $Vokwojfs0f4q, 'relation_key' => $V2xim30qek4u, 'foreign_model' => strtolower($Vq4lbrwzvm53), 'foreign_table' => $Vhzfvh35xq32, 'foreign_key' => $Vld4gcmt2gd3, 'local_key' => $V05wfxj5xagd);
                        if($Vokwojfs0f4q == 'has_many_pivot')
                        {
                            $this->_relationships[$V2xim30qek4u]['pivot_table'] = $V34tbf3aqt1k;
                            $this->_relationships[$V2xim30qek4u]['pivot_local_key'] = $Vkoobrtcfyc2;
                            $this->_relationships[$V2xim30qek4u]['pivot_foreign_key'] = $Vgiwtee4ibuh;
                            $this->_relationships[$V2xim30qek4u]['get_relate'] = $Vsg0pq4zbpbf;
                        }
                    }
                }
            }
        }
    }
    
    
    public function on($Vuvph2os2jsb = NULL)
    {
        if(isset($Vuvph2os2jsb))
        {
            $this->_database->close();
            $this->load->database($Vuvph2os2jsb);
            $this->_database = $this->db;
        }
        return $this;
    }
    
    public function reset_connection()
    {
        if(isset($Vuvph2os2jsb))
        {
            $this->_database->close();
            $this->_set_connection();
        }
        return $this;
    }
    
    public function trigger($Vlpartrmogje, $Vfeinw1hsfej = array(), $Vrn3wfld1o3f = TRUE)
    {
        if (isset($this->$Vlpartrmogje) && is_array($this->$Vlpartrmogje))
        {
            foreach ($this->$Vlpartrmogje as $V5dsbozs5xhq)
            {
                if (strpos($V5dsbozs5xhq, '('))
                {
                    preg_match('/([a-zA-Z0-9\_\-]+)(\(([a-zA-Z0-9\_\-\., ]+)\))?/', $V5dsbozs5xhq, $Vmbknpbfqa1s);
                    $V5dsbozs5xhq = $Vmbknpbfqa1s[1];
                    $this->callback_parameters = explode(',', $Vmbknpbfqa1s[3]);
                }
                $Vfeinw1hsfej = call_user_func_array(array($this, $V5dsbozs5xhq), array($Vfeinw1hsfej, $Vrn3wfld1o3f));
            }
        }
        return $Vfeinw1hsfej;
    }
    
    public function with_trashed()
    {
        $this->_trashed = 'with';
        return $this;
    }
    
    public function only_trashed()
    {
        $this->_trashed = 'only';
        return $this;
    }
    private function _where_trashed()
    {
        switch($this->_trashed)
        {
            case 'only' :
                $this->_database->where($this->_deleted_at_field.' IS NOT NULL', NULL, FALSE);
                break;
            case 'without' :
                $this->_database->where($this->_deleted_at_field.' IS NULL', NULL, FALSE);
                break;
            case 'with' :
                break;
        }
        $this->_trashed = 'without';
        return $this;
    }
    
    public function fields($Vwji4rxkyw5js = NULL)
    {
        if(isset($Vwji4rxkyw5js))
        {
            if($Vwji4rxkyw5js == '*count*')
            {
                $this->_select = '';
                $this->_database->select('COUNT(*) AS counted_rows',FALSE);
            }
            else
            {
                $this->_select = array();
                $Vwji4rxkyw5js = (!is_array($Vwji4rxkyw5js)) ? explode(',', $Vwji4rxkyw5js) : $Vwji4rxkyw5js;
                if (!empty($Vwji4rxkyw5js))
                {
                    foreach ($Vwji4rxkyw5js as &$Vwji4rxkyw5j)
                    {
                        $V1nhcxvempp0 = explode('.', $Vwji4rxkyw5j);
                        if (sizeof($V1nhcxvempp0) < 2)
                        {
                            $Vwji4rxkyw5j = $this->table . '.' . $Vwji4rxkyw5j;
                        }
                    }
                }
                $this->_select = $Vwji4rxkyw5js;
            }
        }
        else
        {
            $this->_select = NULL;
        }
        return $this;
    }
    
    public function order_by($V0wjfc2tvqc4, $Vrw5vvd4vhzk = 'ASC')
    {
        if(is_array($V0wjfc2tvqc4))
        {
            foreach ($V0wjfc2tvqc4 as $V2xim30qek4u=>$Vcnwqsowvhom)
            {
                $this->_database->order_by($V2xim30qek4u, $Vcnwqsowvhom);
            }
        }
        else
        {
            $this->_database->order_by($V0wjfc2tvqc4, $Vrw5vvd4vhzk);
        }
        return $this;
    }
    
    public function as_array()
    {
        $this->return_as = 'array';
        return $this;
    }
    
    public function as_object()
    {
        $this->return_as = 'object';
        return $this;
    }
    public function as_dropdown($Vwji4rxkyw5j = NULL)
    {
        if(!isset($Vwji4rxkyw5j))
        {
            show_error('MY_Model: You must set a field to be set as value for the key: ...->as_dropdown(\'field\')->...');
            exit;
        }
        $this->return_as_dropdown = 'dropdown';
        $this->_dropdown_field = $Vwji4rxkyw5j;
        $this->_select = array($this->primary_key, $Vwji4rxkyw5j);
        return $this;
    }
    protected function _get_from_cache($Vrhxos1xswke = NULL)
    {
        if(isset($Vrhxos1xswke) || (isset($this->_cache) && !empty($this->_cache)))
        {
            $this->load->driver('cache');
            $Vrhxos1xswke = isset($Vrhxos1xswke) ? $Vrhxos1xswke : $this->_cache['cache_name'];
            $Vfeinw1hsfej = $this->cache->{$this->cache_driver}->get($Vrhxos1xswke);
            return $Vfeinw1hsfej;
        }
    }
    protected function _write_to_cache($Vfeinw1hsfej, $Vrhxos1xswke = NULL)
    {
        if(isset($Vrhxos1xswke) || (isset($this->_cache) && !empty($this->_cache)))
        {
            $this->load->driver('cache');
            $Vrhxos1xswke = isset($Vrhxos1xswke) ? $Vrhxos1xswke : $this->_cache['cache_name'];
            $Vbx4wlmdf5pl = $this->_cache['seconds'];
            if(isset($Vrhxos1xswke) && isset($Vbx4wlmdf5pl))
            {
                $this->cache->{$this->cache_driver}->save($Vrhxos1xswke, $Vfeinw1hsfej, $Vbx4wlmdf5pl);
                $this->_reset_cache($Vrhxos1xswke);
                return TRUE;
            }
            return FALSE;
        }
    }
    public function set_cache($Vxgpowef4o2f, $Vbx4wlmdf5pl = 86400)
    {
        $Vapdd0fqkaxu = (strlen($this->cache_prefix)>0) ? $this->cache_prefix.'_' : '';
        $Vapdd0fqkaxu .= $this->table.'_';
        $this->_cache = array('cache_name' => $Vapdd0fqkaxu.$Vxgpowef4o2f,'seconds'=>$Vbx4wlmdf5pl);
        return $this;
    }
    private function _reset_cache($Vxgpowef4o2f)
    {
        if(isset($Vxgpowef4o2f))
        {
            $this->_cache = array();
        }
        return $this;
    }
    public function delete_cache($Vxgpowef4o2f = NULL)
    {
        $this->load->driver('cache');
        $Vapdd0fqkaxu = (strlen($this->cache_prefix)>0) ? $this->cache_prefix.'_' : '';
        if(isset($Vxgpowef4o2f) && (strpos($Vxgpowef4o2f,'*') === FALSE))
        {
            $this->cache->{$this->cache_driver}->delete($Vapdd0fqkaxu . $Vxgpowef4o2f);
        }
        else
        {
            $Vbovdsozavsv = $this->cache->file->cache_info();
            foreach($Vbovdsozavsv as $Vligofq0fb34)
            {
                if(array_key_exists('relative_path',$Vligofq0fb34))
                {
                    $Vcmaitbcbmmk = $Vligofq0fb34['relative_path'];
                    break;
                }
            }
            $Vogpkwekex2x = (isset($Vxgpowef4o2f)) ? $Vcmaitbcbmmk.$Vapdd0fqkaxu.$Vxgpowef4o2f : $Vcmaitbcbmmk.$this->cache_prefix.'_*';
            array_map('unlink', glob($Vogpkwekex2x));
        }
        return $this;
    }
    
    private function _set_timestamps()
    {
        if($this->timestamps !== FALSE)
        {
            $this->_created_at_field = (is_array($this->timestamps) && isset($this->timestamps[0])) ? $this->timestamps[0] : 'created_at';
            $this->_updated_at_field = (is_array($this->timestamps) && isset($this->timestamps[1])) ? $this->timestamps[1] : 'updated_at';
            $this->_deleted_at_field = (is_array($this->timestamps) && isset($this->timestamps[2])) ? $this->timestamps[2] : 'deleted_at';
        }
        return TRUE;
    }
    
    private function _the_timestamp()
    {
        if($this->timestamps_format=='timestamp')
        {
            return time();
        }
        else
        {
            return date($this->timestamps_format);
        }
    }
    
    private function _set_connection()
    {
        if(isset($this->_database_connection))
        {
            $this->_database = $this->load->database($this->_database_connection,TRUE);
        }
        else
        {
            $this->load->database();
            $this->_database =$this->db;
        }
        
        return $this;
    }
    
    public function paginate($Vf3jo4nkd2srs_per_page, $V0zmfldzhwtt = NULL, $V4vgrtxmvilo = 1)
    {
        $this->load->helper('url');
        $Vlszxw4pvps0 = $this->uri->total_segments();
        $Vh3jcs1a4n4s = $this->uri->segment_array();
        $Vmmu1rzhh3cw = $this->uri->segment($Vlszxw4pvps0);
        if(is_numeric($Vmmu1rzhh3cw))
        {
            $V4vgrtxmvilo = $Vmmu1rzhh3cw;
        }
        else
        {
            $V4vgrtxmvilo = $V4vgrtxmvilo;
            $Vh3jcs1a4n4s[] = $V4vgrtxmvilo;
            ++$Vlszxw4pvps0;
        }
        $Vm2ihevcwpgr = $V4vgrtxmvilo+1;
        $V4hofglhnqja = $V4vgrtxmvilo-1;
        if($V4vgrtxmvilo == 1)
        {
            $this->previous_page = $this->pagination_delimiters[0].$this->pagination_arrows[0].$this->pagination_delimiters[1];
        }
        else
        {
            $Vh3jcs1a4n4s[$Vlszxw4pvps0] = $V4hofglhnqja;
            $Vyxyiwbswies = implode('/',$Vh3jcs1a4n4s);
            $this->previous_page = $this->pagination_delimiters[0].anchor($Vyxyiwbswies,$this->pagination_arrows[0]).$this->pagination_delimiters[1];
        }
        $Vh3jcs1a4n4s[$Vlszxw4pvps0] = $Vm2ihevcwpgr;
        $Vyxyiwbswies = implode('/',$Vh3jcs1a4n4s);
        if(isset($V0zmfldzhwtt) && (ceil($V0zmfldzhwtt/$Vf3jo4nkd2srs_per_page) == $V4vgrtxmvilo))
        {
            $this->next_page = $this->pagination_delimiters[0].$this->pagination_arrows[1].$this->pagination_delimiters[1];
        }
        else
        {
            $this->next_page = $this->pagination_delimiters[0].anchor($Vyxyiwbswies, $this->pagination_arrows[1]).$this->pagination_delimiters[1];
        }
        $Vf3jo4nkd2srs_per_page = (is_numeric($Vf3jo4nkd2srs_per_page)) ? $Vf3jo4nkd2srs_per_page : 10;
        if(isset($V0zmfldzhwtt))
        {
            if($V0zmfldzhwtt!=0)
            {
                $Viln1y2hgc2b = ceil($V0zmfldzhwtt / $Vf3jo4nkd2srs_per_page);
                $Vxlsjlxhmfrq = $this->previous_page;
                for ($Vep0df0xosaw = 1; $Vep0df0xosaw <= $Viln1y2hgc2b; $Vep0df0xosaw++) {
                    unset($Vh3jcs1a4n4s[$Vlszxw4pvps0]);
                    $Vyxyiwbswies = implode('/', $Vh3jcs1a4n4s);
                    $Vxlsjlxhmfrq .= $this->pagination_delimiters[0];
                    $Vxlsjlxhmfrq .= (($V4vgrtxmvilo == $Vep0df0xosaw) ? anchor($Vyxyiwbswies, $Vep0df0xosaw) : anchor($Vyxyiwbswies . '/' . $Vep0df0xosaw, $Vep0df0xosaw));
                    $Vxlsjlxhmfrq .= $this->pagination_delimiters[1];
                }
                $Vxlsjlxhmfrq .= $this->next_page;
                $this->all_pages = $Vxlsjlxhmfrq;
            }
            else
            {
                $this->all_pages = $this->pagination_delimiters[0].$this->pagination_delimiters[1];
            }
        }
        if(isset($this->_cache) && !empty($this->_cache))
        {
            $this->load->driver('cache');
            $Vrhxos1xswke = $this->_cache['cache_name'].'_'.$V4vgrtxmvilo;
            $Vbx4wlmdf5pl = $this->_cache['seconds'];
            $Vfeinw1hsfej = $this->cache->{$this->cache_driver}->get($Vrhxos1xswke);
        }
        if(isset($Vfeinw1hsfej) && $Vfeinw1hsfej !== FALSE)
        {
            return $Vfeinw1hsfej;
        }
        else
        {
            $this->trigger('before_get');
            $this->where();
            $this->limit($Vf3jo4nkd2srs_per_page, (($V4vgrtxmvilo-1)*$Vf3jo4nkd2srs_per_page));
            $Vfeinw1hsfej = $this->get_all();
            if($Vfeinw1hsfej)
            {
                if(isset($Vrhxos1xswke) && isset($Vbx4wlmdf5pl))
                {
                    $this->cache->{$this->cache_driver}->save($Vrhxos1xswke, $Vfeinw1hsfej, $Vbx4wlmdf5pl);
                    $this->_reset_cache($Vrhxos1xswke);
                }
                return $Vfeinw1hsfej;
            }
            else
            {
                return FALSE;
            }
        }
    }
    public function set_pagination_delimiters($Vshur40xcqus)
    {
        if(is_array($Vshur40xcqus) && sizeof($Vshur40xcqus)==2)
        {
            $this->pagination_delimiters = $Vshur40xcqus;
        }
        return $this;
    }
    public function set_pagination_arrows($V4qdiccooqcg)
    {
        if(is_array($V4qdiccooqcg) && sizeof($V4qdiccooqcg)==2)
        {
            $this->pagination_arrows = $V4qdiccooqcg;
        }
        return $this;
    }
    
    private function _fetch_table()
    {
        if (!isset($this->table))
        {
            $this->table = $this->_get_table_name(get_class($this));
        }
        return TRUE;
    }
    private function _get_table_name($Vi4vafpzfaok)
    {
        $Vhyg2tjvah5t_name = plural(preg_replace('/(_m|_model|_mdl)?$/', '', strtolower($Vi4vafpzfaok)));
        return $Vhyg2tjvah5t_name;
    }
    public function __call($V5dsbozs5xhq, $Vg44epnxeiog)
    {
        if(substr($V5dsbozs5xhq,0,6) == 'where_')
        {
            $Vwi0cbq1cjat = substr($V5dsbozs5xhq,6);
            $this->where($Vwi0cbq1cjat, $Vg44epnxeiog);
            return $this;
        }
        if(($V5dsbozs5xhq!='with_trashed') && (substr($V5dsbozs5xhq,0,5) == 'with_'))
        {
            $Vjjpt1ycsp4y = substr($V5dsbozs5xhq,5);
            $this->with($Vjjpt1ycsp4y,$Vg44epnxeiog);
            return $this;
        }
        $Vqlmk4x000pr = get_parent_class($this);
        if ($Vqlmk4x000pr !== FALSE && !method_exists($Vqlmk4x000pr, $V5dsbozs5xhq) && !method_exists($this,$V5dsbozs5xhq))
        {
            echo 'No method with that name ('.$V5dsbozs5xhq.') in MY_Model or CI_Model.';
        }
    }
    private function _build_sorter($Vfeinw1hsfej, $Vwji4rxkyw5j, $Vzbbrtpk0h1j, $Vmy1o40xoj3i = 'DESC')
    {
        usort($Vfeinw1hsfej, function($Vqtrwdgbny00, $Vwkzrpaksezs) use ($Vwji4rxkyw5j, $Vzbbrtpk0h1j, $Vmy1o40xoj3i) {
            $V5adckfdzb1d_a = $this->object_to_array($Vqtrwdgbny00[$Vwji4rxkyw5j]);
            $V5adckfdzb1d_b = $this->object_to_array($Vwkzrpaksezs[$Vwji4rxkyw5j]);
            return strtoupper($Vmy1o40xoj3i) ==  "DESC" ? ((isset($V5adckfdzb1d_a[$Vzbbrtpk0h1j]) && isset($V5adckfdzb1d_b[$Vzbbrtpk0h1j])) ? ($V5adckfdzb1d_a[$Vzbbrtpk0h1j] < $V5adckfdzb1d_b[$Vzbbrtpk0h1j]) : -1) : ((isset($V5adckfdzb1d_a[$Vzbbrtpk0h1j]) && isset($V5adckfdzb1d_b[$Vzbbrtpk0h1j])) ? ($V5adckfdzb1d_a[$Vzbbrtpk0h1j] > $V5adckfdzb1d_b[$Vzbbrtpk0h1j]) : -1);
        });
        return $Vfeinw1hsfej;
    }
    public function object_to_array( $V1v3xsp031u0 )
    {
        if( !is_object( $V1v3xsp031u0 ) && !is_array( $V1v3xsp031u0 ) )
        {
            return $V1v3xsp031u0;
        }
        if( is_object( $V1v3xsp031u0 ) )
        {
            $V1v3xsp031u0 = get_object_vars( $V1v3xsp031u0 );
        }
        return array_map( array($this,'object_to_array'), $V1v3xsp031u0 );
    }
    
    private function _is_assoc(array $V5adckfdzb1d) {
        return (bool)count(array_filter(array_keys($V5adckfdzb1d), 'is_string'));
    }
    
    
}