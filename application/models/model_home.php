<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_home extends CI_Model {

  public function user($user='')
 {
    $this->db->from('session');
    $this->db->where('number', $user);
    $query = $this->db->get(); 
    return $query->result();
 }

   public function perfil($id='')
 {
    $this->db->from('user');
    $this->db->where('id_session', $id);
    $query = $this->db->get(); 
    return $query->result();
 }

 public function perfil2($id='')
 {
    $this->db->from('family');
    $this->db->where('id_session', $id);
    $query = $this->db->get(); 
    return $query->result();
 }

  public function inUser($p, $nivel, $ref){
    $user = [
            'level' => $nivel,
            'ref' => $ref,
            'number' => $p['number'],
            'password' => $p['password']
        ];

     $this->db->insert('session', $user);
     $id_session = $this->db->insert_id();

    $data = array(
        'matricula' =>$p['matricula'],
        'name' => $p['name'],
        'place' => $p['place'],
        'about' => $p['res'],
        'img_selfie' => $p['img'],
        'into' => $p['ingreso'],
        'lengua' => $p['lengua'],
        'id_session' =>  $id_session
     );
 
   $this->db->insert('user', $data);
   }

    public function inFam($p, $nivel, $ref){
        $user = [
                'level' => $nivel,
                'ref' => $ref,
                'number' => $p['number'],
                'password' => $p['password']
            ];

         $this->db->insert('session', $user);
         $id_session = $this->db->insert_id();

        $data = array(
            'name' => $p['name'],
            'last_name' => $p['last_name'],
            'edad' => $p['edad'],
            'cant_fam' => $p['cant_fam'],
            'address' => $p['address'],
            'img_comp' => "",
            'img_selfie' =>"",
            'lon' => "",
            'lat' => "",
            'id_session' =>  $id_session
         );
     
       $this->db->insert('family', $data);
       }

    public function event(){
        $event = [
                'hour' => $p['hour'],
                'day' => $p['day'],
                'cant' => $p['cant'],
                'id_family' => $p['id_family']
            ];
        $this->db->insert('family', $data);
    }

    public function getEvent(){
    $date =  date('Y-m-d');
    $query = $this->db->query("SELECT
                                tokens.id as id_principal,
                                tokens.hour,
                                tokens.dia,
                                tokens.cant,
                                tokens.status,
                                tokens.id_family,
                                family.name,
                                family.last_name,
                                family.edad,
                                session.level,
                                session.ref,
                                session.number,
                                session.password,
                                family.cant_fam,
                                family.address,
                                family.img_comp,
                                family.img_selfie
                                FROM
                                tokens
                                LEFT JOIN family ON tokens.id_family = family.id
                                LEFT JOIN session ON family.id_session = session.id
                                WHERE
                                tokens.dia = '$date' AND
                                tokens.status = 'false'
                                LIMIT 1");
    return $query->result(); 
    }


    public function setEvent($id,$user){
        $data = array(
        'status' => 'true',
        'id_user' => $user
        );

        $this->db->where('id', $id);
        $this->db->update('tokens', $data);
    }

    public function ready($id){
     $query = $this->db->where('id_user', $id)
                ->get('tokens');
      return $query->result();
    }
    
    public function alumno($id){
     $this->db->where('id', $id);
     $query = $this->db->get('user');
      return $query->result();
    }

     public function ready2($id,$date){
     $this->db->where('dia', $date);
     $query = $this->db->get('tokens');
      return $query->result();
    }

    public function invitacion($date,$hora,$id){
        $data =[
                'hour'=>$hora,
                'dia' =>$date,
                'cant'=>1,
                'status'=>'false',
                'id_family'=>$id,
                'id_user'=>'0'
        ];
         $this->db->insert('tokens', $data);
    }

    public function mach($iduser){
     $this->db->where('id_user', $iduser);
     $query = $this->db->get('tokens');
     foreach ($query->result() as $key ) {
         $num=  $key->id_family;
     }
     $query = $this->db->query("SELECT
            family.id,
            family.name,
            family.last_name,
            family.address,
            session.number,
            tokens.dia,
            tokens.`hour`
            FROM
            family
            INNER JOIN session ON family.id_session = session.id
            LEFT JOIN tokens ON tokens.id_family = family.id
            WHERE
            tokens.id_family = '$num'
                        ");
     
      return $query->result();


    }

}


/* End of file model_home.php */
/* Location: ./application/models/model_home.php */