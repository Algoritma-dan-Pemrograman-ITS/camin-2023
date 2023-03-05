<?php

class Mahasiswa_model {
    private $mhs = [
        [
            "nama" => "luthfiyyah",
            "nrp" => "5025201090",
            "angkatan" => "2020"
        ],
        [
            "nama" => "naufal",
            "nrp" => "5025201070",
            "angkatan" => "2020"
        ],
        [
            "nama" => "bagas",
            "nrp" => "5025201120",
            "angkatan" => "2020"
        ]
    ];
    
    public function getAllMahasiswa()
    {
        return $this->mhs;
    }
}