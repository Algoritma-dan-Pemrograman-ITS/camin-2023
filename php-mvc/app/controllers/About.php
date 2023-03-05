<?php

class About extends Controller {
    public function index($nama="luthfi", $pekerjaan="mahasiswa")
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'about';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page(){
        $this->view('about/page');
    }
}