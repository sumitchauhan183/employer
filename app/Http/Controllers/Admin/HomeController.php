<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    public function __construct(Request $request)
    {
        
       
        if(session()->get('user')):
            if(session()->get('user')['type']!='admin'):
                return redirect()->route('notauthorised');
            endif;
        else:    
            return redirect()->route('admin.login');
        endif;
    }

    
    /**
     * Show Admin Dashboard.
     * 
     * @return \Illuminate\Http\Response
     */
    

    public function dashboard(){
        return view('admin.home');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('admin.login');
    }
}