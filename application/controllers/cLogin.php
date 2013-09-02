<?php

class cLogin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    function index()
    {
        $cekLogin = $this->session->userdata('kar_nama');
        if($cekLogin)
          //$this->load->view('index');
           redirect(site_url('cDocument'),'refresh');
        else
          $this->load->view('login');
    }

    function doLogin()
    {
        //echo "tes";
        $this->form_validation->set_rules('kar_nama','Kar_nama','required');
        $this->form_validation->set_rules('kar_pass', 'Kar_pass', 'required');

                    if($this->form_validation->run()==false)
                      {
                            //$this->session->set_flashdata('pesan','Nama atau password tidak boleh kosong');

                            $data['error'] = "Nama atau Password tidak boleh kosong";
                            $this->load->view('login', $data);
                      }
                      else
                      {
                            $this->load->model('mKaryawan', '', TRUE);
                            $user_nama = $this->input->post('kar_nama');
                            //$user_password = $this->input->post('kar_pass');
                            $user_password = md5($this->input->post('kar_pass'));
                            $hasil = $this->mKaryawan->ambilsatu($user_nama,$user_password);
                            //print_r($hasil);
                            if($hasil!=null)
                                {
                                    foreach ($hasil as $baris)
                                      {
                                        /*
                                                $this->session->set_userdata('user_nrp',$baris->USER_NRP);
                                                $this->session->set_userdata('user_status',$baris->USER_STATUS);
                                         */
                                        $this->session->set_userdata('kar_nik',$baris->kar_nik);
                                        $this->session->set_userdata('kar_nama',$baris->kar_nama);
                                        $this->session->set_userdata('unit_kerja',$baris->unit_id);
                                      }
                                        //$this->load->view('index');
                                      redirect(base_url(),'refresh');
                                }
                                else
                                {
                                    //$this->session->set_flashdata('pesan','username atau password anda salah');
                                    $data['error'] = "Nama atau Password tidak terdaftar di didatabase";
                                    $this->load->view('login', $data);
                                }
                        }

    }

    function doLogout()
    {
        $this->session->sess_destroy();
        redirect(base_url(),'refresh');
    }
}

?>
