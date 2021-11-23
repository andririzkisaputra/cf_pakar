<?php
/**
 *
 */
class Dashboard_model extends CI_Model
{

  public function get_by($where, $select, $tabel) {
    $this->db->select($select);
    return $this->db->get_where($tabel, $where)->result();
  }

  public function get_by_row($where, $select, $tabel) {
    $this->db->select($select);
    return $this->db->get_where($tabel, $where)->row();
  }

  public function get_keahlian($where) {
    $this->db->select('rule.*, keahlian.keahlian');
		$this->db->from('rule');
		$this->db->join('keahlian', 'keahlian.keahlian_id = rule.keahlian_id');
		for ($i=0; $i < count($where); $i++) {
			$this->db->or_where('rule.minat_bakat_id', $where[$i]);
		}
		$this->db->group_by('rule.keahlian_id');
		return $this->db->get()->result();
  }

  public function cf($minat, $keahlian, $keyakinan_user) {
    $this->db->select('rule.*, keahlian.keahlian');
		$this->db->from('rule');
		$this->db->join('keahlian', 'keahlian.keahlian_id = rule.keahlian_id');
		for ($i=0; $i < count($minat); $i++) {
			$this->db->or_where('rule.minat_bakat_id', $minat[$i]);
		}

    $list_minat_bakat = $this->db->get()->result();
    $keyakinan_pakar  = [];
    $keahlian_id      = [];
    $key              = 0;
    foreach ($minat as $key_1 => $value_1) {
      $var_minat = $this->db->select('minat_bakat.minat_bakat, minat_bakat.deskripsi')->from('minat_bakat')->where(['minat_bakat_id' => $value_1])->get()->row();
      $nama_minat[$key_1] = ($var_minat) ? $var_minat->minat_bakat : null;
      $deskripsi[$key_1]  = ($var_minat) ? $var_minat->deskripsi : null;
      foreach ($list_minat_bakat as $key_2 => $value_2) {
        if ($value_1 == $value_2->minat_bakat_id) {
          $keyakinan_pakar[$key_1][$key] = $value_2->nilai;
          $keahlian_id[$key_1][$key]     = $value_2->keahlian_id;
          $key++;
        }
      }
      $key = 0;
    }
    foreach ($minat as $key_1 => $value_1) {
      foreach ($keahlian_id[$key_1] as $key_2 => $value_2) {
        $index                  = array_search($keahlian_id[$key_1][$key_2], $keahlian);
        $kaidah[$key_1][$key_2] = $keyakinan_pakar[$key_1][$key_2]*$keyakinan_user[$index];
        if ($key_2 > 0) {
          $combine = $combine+$kaidah[$key_1][$key_2]*(1-$combine);
        }else {
          $combine = $kaidah[$key_1][$key_2];
        }
      }
      $hasil_identifikasi[$key_1] = number_format($combine*100,2);
      $combine = '';
    }
    $return = array(
      'hasil_identifikasi' => $hasil_identifikasi,
      'hasil_minat'        => $nama_minat,
      'deskripsi'          => $deskripsi
    );
    return $return;

  }

  public function auth($where, $tabel) {
    return $this->db->get_where($tabel, $where)->row();
  }

  public function user_insert($data, $tabel) {
    return $this->db->insert($tabel, $data);
  }
}

?>
