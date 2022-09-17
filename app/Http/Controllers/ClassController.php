<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Deskripsi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function index()
    {

        return view('kelas.kelas', [
            'title' => 'Skill',
            'kelas' => Deskripsi::latest()->get()
        ]);
    }

    public function show(Deskripsi $deskripsi)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-5jCcAxABHGGBRIuUziemvqwq';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => '10000',
            ),
            'item_details' => array(
                [ 
                'id' => 'a01',
                'price' => '9000',
                'quantity' => '1',
                'name' => 'Apple',
                ]
            ),
            'customer_details' => array(
                'first_name' => 'bnbudi',
                'last_name' => 'pranktama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('kelas.detil', [
            'title' => 'Detil Kelas',
            'judul' => $deskripsi->title,
            'isi' => $deskripsi->description,
            'token' => $snapToken
        ]);
    }
}
