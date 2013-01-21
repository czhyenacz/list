<?php


use \NiftyGrid\Grid;

class UsersGrid extends Grid{

    protected $users;

    public function __construct($users)
    {
        parent::__construct();
        $this->users = $users;
    }

    protected function configure($presenter)
    {
        //Vytvoříme si zdroj dat pro Grid
        //Při výběru dat vždy vybereme id
        $source = new \NiftyGrid\NDataSource($this->users->select('id, password'));
        //Předáme zdroj
        $this->setDataSource($source);
    }

}

