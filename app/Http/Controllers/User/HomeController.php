<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\EndUserInterface;
use App\Models\activity;
use App\Models\course;
use App\Models\slider;
use App\Models\teacher;


class HomeController extends Controller
{

    public $enduserinterface;

    public function __construct(EndUserInterface $enduserinterface)
    {
        $this->enduserinterface = $enduserinterface ;
    }

    public function index()
    {
        return $this->enduserinterface->index();
    }

    public function courses()
    {
        return $this->enduserinterface->courses();
    }

    public function teachers()
    {
        return $this->enduserinterface->teachers();
    }

}
