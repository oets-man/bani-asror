<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class About extends BaseController
{
    public function index()
    {
        //
    }
    public function contact()
    {
        echo 'Admin: Taufiq Bahruddin, Hasani Akrom, Imron Husnan, Abd Muqit Latif';
        echo '<br>';
        echo "Pengembang: Usman Husnan";
    }
}
