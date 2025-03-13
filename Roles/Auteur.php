<?php

namespace Roles;

class Auteur extends SuperAdmin{
    protected string $_nom;
    protected int $_id;

    public function __construct($nom,$id){
        parent::__construct($nom,$id);
    }

    public function poster(){
        parent::poster();
    }
}