<?php

namespace Roles;

class Admin extends SuperAdmin{
    public function __construct($nom,$id){
        parent::__construct($nom,$id);
    }

    public function poster(){
        parent::poster();
    }

    public function nommerAuteur($nom){
        parent::nommerAuteur($nom,$id);
    }

    public function demettreAuteur($nom){
        parent::demettreAuteur($nom,$id);
    }
}