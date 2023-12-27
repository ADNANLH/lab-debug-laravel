<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculeController extends Controller
{
    //
    public function somme()
    {
        $a = 5;
        $b = 10;
        // dd(phpinfo());

        $result = $this->add($a, $b);

        return "The sum of $a and $b is: $result";
    }

    private function add($a, $b)
    {
        $sum = $a + $b;

        return $sum;
    }
}
