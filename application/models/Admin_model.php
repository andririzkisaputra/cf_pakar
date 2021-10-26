<?php
class Admin_model extends CI_Model {

  public function set_data($data, $tabel) {
    $result = $this->db->insert($tabel, $data);
    return $result;
  }

  public function set_batch($data, $tabel) {
    $result = $this->db->insert_batch($tabel, $data);
    return $result;
  }

  public function get_all($tabel){
    return $this->db->count_all($tabel);
  }

  public function count_all_join($tabel){
    $this->db->group_by('kode_rule');
    return $this->db->count_all($tabel);
  }

  public function get_by($data, $tabel){
    return $this->db->get_where($tabel, $data)->result();
  }

  public function get_all_where_rule($tabel, $select){
    $this->db->select($select);
    return $this->db->get($tabel)->result();
  }

  public function get_by_rule($data, $tabel){
    $this->db->select($tabel);
    $result = $this->db->get_where($tabel, $data)->row()->$tabel;
    return $result;
  }

  public function del_data($data, $tabel){
    return $this->db->delete($tabel, $data);
  }

  public function update_by($data, $where, $tabel){
    $this->db->where($where);
    return $this->db->update($tabel, $data);
  }

  public function count_filter($data, $search, $tabel){
    $this->db->like($data, $search);
    return $this->db->get($tabel)->num_rows();
  }

  public function count_filter_join($data, $search, $tabel){
    $this->db->like($data, $search);
    $this->db->group_by('kode_rule');
    return $this->db->get($tabel)->num_rows();
  }

  public function get_data_tabel($where_like, $limit, $start, $order_by, $tabel) {
    $this->db->like($where_like);
    $this->db->order_by($order_by, 'DESC');
    $this->db->limit($limit, $start);
    return $this->db->get($tabel)->result();
  }

  public function get_join_tabel($where_like, $limit, $start, $order_by, $tabel) {
    $this->db->like($where_like);
    $this->db->order_by($order_by, 'DESC');
    $this->db->group_by('kode_rule');
    $this->db->limit($limit, $start);
    $this->db->select('rule.*, keahlian.keahlian, minat_bakat.minat_bakat');
    $this->db->from('rule');
    $this->db->join('keahlian', 'keahlian.keahlian_id = rule.keahlian_id');
    $this->db->join('minat_bakat', 'minat_bakat.minat_bakat_id = rule.minat_bakat_id');
    return $this->db->get()->result();
  }

  public function get_data($select, $tabel) {
    $this->db->select($select);
    return $this->db->get($tabel)->result();
  }

  public function auth($where, $tabel) {
    return $this->db->get_where($tabel, $where)->row();
  }

}
?>
