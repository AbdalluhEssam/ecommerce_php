<?php
namespace App\Http\Controllers;
use App\Models\Client;

class ClientController extends Controller {

    
    public function index() {
        $clients = Client::get();
        print_r($clients);

    }

    public function register() {
        echo 'Register';
    }

    public function login() {
        echo 'Login';
    }

}

?>