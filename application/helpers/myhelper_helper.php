<?php
//menu super admin
function nama_distributor($name, $table, $field, $pk, $selected) {
    $ci = get_instance();
    $ci->db->order_by($pk,'ASC');
    $cmb = "<select id=$name name='$name' class='form-control'>";
    $cmb .="<option value=''>--Pilih--</option>"; 
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .="<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$field ? " selected='selected'" : '';
        $cmb .=">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .="</select>";
    return $cmb;
}
function id_barang($name, $table, $field, $pk, $selected) {
    $ci = get_instance();
    $ci->db->order_by($pk,'ASC');
    $cmb = "<select id=$name name='$name' class='form-control'>";
    $cmb .="<option value=''>--Pilih--</option>"; 
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .="<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .=">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function barang_keluar($name, $table, $field, $pk, $selected) {
    $ci = get_instance();
    $ci->db->order_by($pk,'ASC');
    $cmb = "<select id=$name name='$name' class='form-control'>";
    $cmb .="<option value=''>--Pilih--</option>"; 
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .="<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .=">" . strtoupper($d->$field) . "</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function cek_login(){
    $ci = get_instance();
    if($ci->session->has_userdata('logged_in')==FALSE)
            redirect(site_url('auth'));
}