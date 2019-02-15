<?php
class Md_notif extends CI_Model{

    public function cek_kontrak(){
    $l = $this->doc_exp->notif();
        foreach ($l as $key) {
        $total_notif = $key->notif;
    }
        return $total_notif;
    }
}