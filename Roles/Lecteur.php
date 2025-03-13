<?php

namespace Roles;

class Lecteur extends SuperAdmin{
    protected string $_nom;
    protected int $_id;

    public function __construct($nom,$id){
        parent::__construct($nom,$id);
    }
}