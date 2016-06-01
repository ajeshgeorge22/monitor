<?php

class Monitor extends CI_Controller {



        public function index($page = 'index')
        {
        	 $this->load->helper('form');
             $this->load->library('form_validation');
             $this->load->model('login_model');
             $this->load->model('host_model');
             $this->load->model('gethost_model');
             $this->load->model('getservice_model');
             $this->load->library('session');
             $this->load->helper('html');
             $this->load->helper('url');

             //$this->load->database();
               $data['title'] = ucfirst($page);
               $data['error'] = "";


               $this->form_validation->set_rules("username", "username", "trim|required");
               $this->form_validation->set_rules("password", "password", "trim|required"); 

                if ($this->form_validation->run() === FALSE)
                 {
                 // Capitalize the first letter
                  $this->load->helper('url');
                  $this->load->view('monitor/'.$page, $data);
                  $this->load->view('templates/footer', $data);
                  //
                 }
                 else
                 {
                   
                    $result = $this->login_model->validate();
                    if(! $result)
                    {

                    $data['error']="username and password does not match";
                    $this->load->view('monitor/index',$data); 
                    }
                    else
                    {
                       if($this->session->userdata['level']==2)
                       {
                         $this->home();
                        //header("location:home"); 
                        }
                        elseif($this->session->userdata['level']==1)
                        {
                            $this->adminhome();
                            //header("location:adminhome"); 
                        }    

                    }           



                 }
              
        }  

        public function home()
        {
             
             $this->load->helper('form');
             $this->load->library('form_validation');
             $this->load->model('login_model');
             $this->load->model('host_model');
             $this->load->model('gethost_model');
             $this->load->model('getservice_model');
             $this->load->library('session');
             $this->load->helper('html');
             $this->load->helper('url');
            $list = $this->host_model->gethost();
            $stat["list"]=$list;
            $host_status = $this->gethost_model->gethoststat();
            $stat["host_status"]= $host_status;
            $services=$this->getservice_model->getservice();
            //var_dump($services);
            $stat["services"]=$services;



            $this->load->view('monitor/home',$stat);
        }

        public function adminhome()
        {
            
             $this->load->helper('form');
             $this->load->library('form_validation');
             $this->load->model('login_model');
             $this->load->model('host_model');
             $this->load->model('gethost_model');
             $this->load->model('getuser_model');
             $this->load->library('session');
             $this->load->helper('html');
             $this->load->helper('url');

            $list = $this->host_model->gethost();
            $stat["list"]=$list;
            $host_status = $this->gethost_model->gethoststat();
            $stat["host_status"]= $host_status;
            $users=$this->getuser_model->getuser();
            $stat["users"]=$users;
             
             $this->load->view('monitor/adminhome',$stat);

        }

      public function contact()
        {
            $this->load->helper('html');
             $this->load->helper('url');
            $this->load->view('monitor/contact');
            if($this->input->post('submit'))
            {
                $sub=$this->input->post('subject');
                $des=$this->input->post('description');
                

            }

        }

        public function edit()
        {

             $this->load->helper('form');
             $this->load->library('form_validation');
             $this->load->model('login_model');
             $this->load->model('host_model');
             $this->load->model('gethost_model');
             $this->load->model('getuser_model');
             $this->load->library('session');
             $this->load->helper('html');
             $this->load->helper('url');
             $this->load->model('insert_model');

            $set="";
            $users=$this->getuser_model->getuser();
            $stat["users"]=$users;
            $stat["err"]=$set;
             $list = $this->host_model->gethost();
            $stat["list"]=$list;
            $host_status = $this->gethost_model->gethoststat();
            $stat["host_status"]= $host_status;

            $this->load->view('monitor/edit',$stat);

            if($this->input->post('submit'))
            {
                $set=$this->insert_model->insert();
                $stat["err"]=$set;
                $this->load->view('monitor/edit',$stat);

            }
        }


        

        public function logout()
        {
            $this->load->helper('form');
             $this->load->library('form_validation');
             $this->load->model('login_model');
             $this->load->model('host_model');
             $this->load->model('gethost_model');
             $this->load->model('getservice_model');
             $this->load->library('session');
             $this->load->helper('html');
             $this->load->helper('url');

             $data = array(
                    'userid' => $this->session->userdata['userid'],
                    'username' => $this->session->userdata['username'],
                    'level' => $this->session->userdata['level'],
                    'validated' => true
                    );
             
             $this->session->unset_userdata($data);
             $this->session->sess_destroy();
             //$this->index();

             header("location:index"); 
        }


            
     
}
