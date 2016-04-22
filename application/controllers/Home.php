<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    function __construct(){

        parent::__construct();
        $this->load->database();
        $this->load->model('Model_home');
        $this->load->helper('url');
      }

    //Home principal 
    public function index()
    {
        $this->load->view('app/login');
    }

    //#Panel de registro de usuario.
    public function UserRe(){
      $this->load->view("app/header");
      $this->load->view("app/userRe");
      $this->load->view("app/footer");
     }

     public function panel($panel=0)
     {
        if ($this->SessionAuth()) {

          switch ($panel) {
            case 1:
                  $data = $this->Model_home->ready($_SESSION['ID']);
                  if ($data) {
                    $data['perfil'] = $this -> Model_home -> mach($_SESSION['ID']);
                    $this->Model_home->ready($_SESSION['ID']);
                    $data['nombre']=$_SESSION['NOMBRE'];
                    $this->load->view('app/header');
                    $this->load->view('app/user-ready',$data);
                    $this->load->view('app/footer');
                  }else{
                    $data['nombre']=$_SESSION['NOMBRE'];
                    $this->load->view('app/header');
                    $this->load->view('app/buscar',$data);
                    $this->load->view('app/footer');
                  }
                 break;
            case 2:
                    $data = $this->Model_home->ready2($_SESSION['ID'],date('Y-m-d'));
                    if ($data) {
                        if($data[0]->status==false){
                        $data['nombre']=$_SESSION['NOMBRE'];
                        $this->load->view('app/header');
                        $this->load->view('app/fam-confirm',$data);
                        $this->load->view('app/footer');    
                        }else{
                        $data['perfil'] = $this->Model_home->alumno($data[0]->id_user);
                        $data['nombre']=$_SESSION['NOMBRE'];
                        $this->load->view('app/header');
                        $this->load->view('app/fam-ready',$data);
                        $this->load->view('app/footer');   
                    }
                      
                    }else{
                    $data['nombre']=$_SESSION['NOMBRE'];
                    $this->load->view('app/header');
                    $this->load->view('app/fam',$data);
                    $this->load->view('app/footer');    
                    }
                    
                 break;
             
             default:
                  $this->load->view('app/login');
                 break;
          }
        }else 
        {
         redirect('');
        }
       
     }

     public  function buscar(){
        $this->load->view('app/header');
        $this->load->view('app/buscar');
        $this->load->view('app/footer');
     }

    public function userInsert(){
        $status = array("STATUS"=>"Error al guardar");
        var_dump($_POST);
        if($this->Model_home->inUser($_POST,1,"user")){
            $status = array("STATUS"=>"Guardado correctamente");
        }
        echo json_encode ($status) ; 
    }

    public function famInsert(){
      $this->Model_home->inFam($_POST,2,"familia");
     redirect('');
    }

    public function newEvent(){
        $this->Model_home->event($_POST);
    }


    public function prueba()
    {
    var_dump($_SESSION);
       $user=$this->Model_home->user('1234567890');
       var_dump($user);
       echo $user[0]->number;
       $user=$this->Model_home->perfil($user[0]->id);  
       var_dump($user);
        
    }

    public function auth(){
        $userName =  $_POST['userName'];
        $userPassword =  $_POST['userPassword'];
        $user=$this->Model_home->user($userName);
        if($userName==$user[0]->number && $userPassword==$user[0]->password){
            $nivel = $user[0]->level;
            switch ($nivel) {
                case 1:
                    $user=$this->Model_home->perfil($user[0]->id);  
                    break;
                
                case 2:
                   $user=$this->Model_home->perfil2($user[0]->id);  
                    break;
            }
            
            $this->SESSION($user[0],$nivel);
            redirect('home/panel/'.$nivel);
          }
        else{
         redirect('');
        }
    }

    private function SESSION($DATE = null,$level = null){
      if ($DATE) {
        # code...
        session_start();
        $_SESSION["AUTENTIFICACION"] =true;
        $_SESSION["NOMBRE"]         =$DATE->name.' '.$DATE->last_name;
        $_SESSION["ORIGEN"]         =$DATE->place;
        $_SESSION["ID"]             =$DATE->id;
        $_SESSION["ACCESS"]         =$level;
      }
    }

    public function test(){
       session_start();
       var_dump($_SESSION);
    }

    public function logout($message='')
    {
      session_start();
      session_destroy();
      redirect(''.$message);
    }

    public function SessionAuth()
    {
       session_start();
       if (!$_SESSION["AUTENTIFICACION"]) {
        return false;
       }
       return true;
    }

 public function getEvent()
  {
    $event=$this->Model_home->getEvent();
    $json = json_encode($event);
    echo $json;
  } 

  public function confirm($idevent='')
  {
    if ($this->SessionAuth()) {
        $this->Model_home->setEvent($idevent, $_SESSION['ID']);
     echo "si se se generaron los cambios";
     }
    redirect('home/panel/1');
  }



   public function famRe(){
    $this->load->view("app/header");
    $this->load->view("app/famRe");
    $this->load->view("app/footer");
  }

   public  function invitacion(){
    session_start();
    $date = date('Y-m-d');
    $hora =  $_POST['hora'];
    $famID = $_SESSION['ID'];
    $this->Model_home->invitacion($date,$hora,$famID);
    redirect('home/panel/2');
   }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */