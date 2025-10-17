<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MqttController extends Controller {


    public function test(Request $request) {
        $key = $request->input('key', '');

        if ($key !== 'pollito') {
            abort(403, 'Unauthorized access.');
        }

        return view('mqtt.test');
    }
}
