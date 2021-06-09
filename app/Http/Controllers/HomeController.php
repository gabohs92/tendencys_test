<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserShipments;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://queries.envia.com/country',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $countries = json_decode($response);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://queries.envia.com/state?country_code=MX',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $states = json_decode($response);

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://queries.envia.com/service?country_code=MX',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $services = json_decode($response);

        return view('home')->with(['countries' => $countries->data, 'states' => $states->data, 'services' => $services->data]);
    }

    public function createShip(Request $request)
    {
        $curl = curl_init();

        $body = [
            'origin' => [
                'name'  => $request->input('name_origin'),
                'company'   => $request->input('company_origin'),
                'email' => $request->input('email_origin'),
                'phone' => $request->input('telephone_origin'),
                'street'    => $request->input('street_origin'),
                'number'    => $request->input('number_origin'),
                'district'    => $request->input('district_origin'),
                'city'    => $request->input('city_origin'),
                'state'    => $request->input('state_origin'),
                'country'    => $request->input('country_origin'),
                'postalCode'    => $request->input('postal_code_origin'),
                'reference'    => $request->input('reference_origin'),
            ],
            'destination' => [
                'name'  => $request->input('name_destiny'),
                'company'   => $request->input('company_destiny'),
                'email' => $request->input('email_destiny'),
                'phone' => $request->input('telephone_destiny'),
                'street'    => $request->input('street_destiny'),
                'number'    => $request->input('number_destiny'),
                'district'    => $request->input('district_destiny'),
                'city'    => $request->input('city_destiny'),
                'state'    => $request->input('state_destiny'),
                'country'    => $request->input('country_destiny'),
                'postalCode'    => $request->input('postal_code_destiny'),
                'reference'    => $request->input('reference_destiny'),
            ],
            'packages' => [
                [
                    'content'   => $request->input('content'),
                    'amount'    => floatval($request->input('amount')),
                    'type'      => $request->input('type'),
                    'dimensions'      => [
                        'length'    => floatval($request->input('length')),
                        'width'    => floatval($request->input('width')),
                        'height'    => floatval($request->input('height'))
                    ],
                    'weight'    => floatval($request->input('weight')),
                    'insurance' => floatval($request->input('insurance')),
                    'declaredValue' => 0,
                    'weightUnit' => 'KG',
                    'lengthUnit' => 'CM'
                ]
            ],
            'shipment' => [
                "carrier" => "fedex",
                "service" => "express",
                "type" => 1
            ],
            "settings" => [
                "printFormat" => "PDF",
                "printSize" => "STOCK_4X6",
                "comments" => "comentarios de el envío"
            ]
        ];
        // echo json_encode($body);
        // exit();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api-test.envia.com/ship/generate/',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>json_encode($body),
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer 591ba972db90829d6bd7734f7089b3dfe12ef1e6b5893a888b1def4a229aad71'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if (\Session::has('status' )) {
            $request->session()->forget('status');
        }

        if (\Session::has('error' )) {
            $request->session()->forget('error');
        }

        if ( ! isset($response->meta) ) {
            $request->session()->put('error', 'Algo salió mal');
            return redirect('home');
        }

        if ( $response->meta == 'error' ) {
            $request->session()->put('error', $response->error->message);
            return redirect('home');
        }

        $user = \Auth::user();

        foreach ($response->data as $key => $shipment) {
            UserShipments::create([
                'user_id'   => $user->id,
                'tracking_number'   => $shipment->trackingNumber,
                'total_price'   => $shipment->totalPrice
            ]);
        }

        $request->session()->put('status', 'Envio creado con éxito');
        return redirect('home');
    }
}
