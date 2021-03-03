<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Transaction;
use App\Models\Currency;
use Carbon\Carbon;
use Validator;

class TransactionController extends Controller
{
    public $dataExchange = '{
        "success": true,
        "timestamp": 1614561366,
        "base": "EUR",
        "date": "2021-03-01",
        "rates": {
            "AED": 4.439617,
            "AFN": 93.651369,
            "ALL": 123.50093,
            "AMD": 638.145711,
            "ANG": 2.169001,
            "AOA": 768.673062,
            "ARS": 108.469119,
            "AUD": 1.559392,
            "AWG": 2.17566,
            "AZN": 2.062618,
            "BAM": 1.952051,
            "BBD": 2.439777,
            "BDT": 102.462156,
            "BGN": 1.95053,
            "BHD": 0.455962,
            "BIF": 2369.052439,
            "BMD": 1.2087,
            "BND": 1.606989,
            "BOB": 8.331572,
            "BRL": 6.774647,
            "BSD": 1.208361,
            "BTC": 2.6177166e-5,
            "BTN": 88.395187,
            "BWP": 13.278596,
            "BYN": 3.149004,
            "BYR": 23690.524395,
            "BZD": 2.435685,
            "CAD": 1.534868,
            "CDF": 2401.687772,
            "CHF": 1.097905,
            "CLF": 0.03171,
            "CLP": 874.984328,
            "CNY": 7.826578,
            "COP": 4408.129718,
            "CRC": 739.368746,
            "CUC": 1.2087,
            "CUP": 32.030556,
            "CVE": 110.051964,
            "CZK": 26.194344,
            "DJF": 214.810361,
            "DKK": 7.436044,
            "DOP": 69.87873,
            "DZD": 160.736174,
            "EGP": 18.95858,
            "ERN": 18.130146,
            "ETB": 48.759113,
            "EUR": 1,
            "FJD": 2.420846,
            "FKP": 0.864585,
            "GBP": 0.864565,
            "GEL": 4.018891,
            "GGP": 0.864585,
            "GHS": 6.94805,
            "GIP": 0.864585,
            "GMD": 61.945546,
            "GNF": 12263.560465,
            "GTQ": 9.307283,
            "GYD": 252.800634,
            "HKD": 9.375549,
            "HNL": 29.106656,
            "HRK": 7.589303,
            "HTG": 91.872156,
            "HUF": 362.363643,
            "IDR": 17278.127965,
            "ILS": 4.005004,
            "IMP": 0.864585,
            "INR": 89.367729,
            "IQD": 1762.987247,
            "IRR": 50892.322774,
            "ISK": 153.710454,
            "JEP": 0.864585,
            "JMD": 182.261183,
            "JOD": 0.856006,
            "JPY": 128.796727,
            "KES": 132.71324,
            "KGS": 102.437709,
            "KHR": 4924.244726,
            "KMF": 489.58382,
            "KPW": 1087.837344,
            "KRW": 1357.188821,
            "KWD": 0.36591,
            "KYD": 1.006951,
            "KZT": 504.772872,
            "LAK": 11290.843429,
            "LBP": 1827.262824,
            "LKR": 235.024245,
            "LRD": 209.618894,
            "LSL": 17.550218,
            "LTL": 3.568978,
            "LVL": 0.73113,
            "LYD": 5.367609,
            "MAD": 10.80718,
            "MDL": 21.115924,
            "MGA": 4498.481936,
            "MKD": 61.495957,
            "MMK": 1703.774969,
            "MNT": 3441.163855,
            "MOP": 9.653413,
            "MRO": 431.505772,
            "MUR": 48.167097,
            "MVR": 18.610576,
            "MWK": 944.096439,
            "MXN": 25.118848,
            "MYR": 4.901881,
            "MZN": 90.495621,
            "NAD": 17.563031,
            "NGN": 460.61134,
            "NIO": 42.171366,
            "NOK": 10.422864,
            "NPR": 141.432219,
            "NZD": 1.661683,
            "OMR": 0.465504,
            "PAB": 1.208361,
            "PEN": 4.408666,
            "PGK": 4.297011,
            "PHP": 58.797827,
            "PKR": 190.67779,
            "PLN": 4.518061,
            "PYG": 8002.109689,
            "QAR": 4.400907,
            "RON": 4.875541,
            "RSD": 117.322889,
            "RUB": 90.04756,
            "RWF": 1200.236608,
            "SAR": 4.533169,
            "SBD": 9.646844,
            "SCR": 25.543493,
            "SDG": 453.862086,
            "SEK": 10.178767,
            "SGD": 1.607933,
            "SHP": 0.864585,
            "SLL": 12323.907246,
            "SOS": 708.298779,
            "SRD": 17.10791,
            "STD": 24515.019893,
            "SVC": 10.573532,
            "SYP": 619.792126,
            "SZL": 18.11683,
            "THB": 36.792776,
            "TJS": 13.769146,
            "TMT": 4.242538,
            "TND": 3.27256,
            "TOP": 2.746112,
            "TRY": 8.948253,
            "TTD": 8.201823,
            "TWD": 33.671367,
            "TZS": 2802.657894,
            "UAH": 33.781307,
            "UGX": 4428.627159,
            "USD": 1.2087,
            "UYU": 52.037267,
            "UZS": 12718.499803,
            "VEF": 12.071899,
            "VND": 27820.048711,
            "VUV": 130.461845,
            "WST": 3.042096,
            "XAF": 654.678854,
            "XAG": 0.045036,
            "XAU": 0.000694,
            "XCD": 3.266573,
            "XDR": 0.835169,
            "XOF": 654.689666,
            "XPF": 119.180477,
            "YER": 302.652448,
            "ZAR": 18.177328,
            "ZMK": 10879.75851,
            "ZMW": 26.306377,
            "ZWL": 389.201873
        }
    }';

    public function getTransactions(Request $request) {

        $url_components = parse_url($request->fullUrl());
        parse_str($url_components['query'], $params); 

        if(date($params['from']) < date($params['to'])){
            $transaction = DB::table('transactions')->select();

            if(isset($params['from'])) {
                $dateTime = Carbon::createFromFormat('Y-m-d H', $params['from'].' 00')->toDateTimeString();
                $transaction->where('date','>=', $dateTime);
            }
            if(isset($params['to'])) {
                $dateTime = Carbon::createFromFormat('Y-m-d H', $params['to'].' 23')->toDateTimeString();
                $transaction = $transaction->where('date','<=', $dateTime);
            }
            if(isset($params['sourceAccountID'])) {

                if($this->validateAccountId($params['sourceAccountID'])) {
                    $transaction = $transaction->where('account_id_from', $params['sourceAccountID']);    
                } else {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }                
            }
        }

        $transaction = $transaction->get();

        return response()->json(['data' => $transaction ], 200);
    }

    public function setTransfer(Request $request) {
        $transfer = $request->all();
    	$validator = Validator::make($transfer, [
            'accountFrom' => 'required|integer',
            'accountTo' => 'required|integer',
            'amount' => 'required|integer|max:100000',
            'description' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $accounts = Account::addSelect(
            ['currency' => Currency::select('type')->whereColumn('currency_id', 'currencies.id')]
        )->whereIn('id', [ $transfer['accountFrom'], $transfer['accountTo'] ])->get();
        
        //Check Accounts exists
        if(count($accounts) != 2) {
            return response()->json(['error' => 'Bad request'], 401);
        }

        $accountFrom = $this->searchAccount($accounts, $transfer['accountFrom']);
        $accountTo = $this->searchAccount($accounts, $transfer['accountTo']);
        $exchangeFinal = $transfer['amount'];

        $data = array( 
            'account_id_from' => $transfer['accountFrom'], 
            'account_id_to' => $transfer['accountTo'],
            'amount' => $transfer['amount'],
            'tax' => 0,
            'date' => Carbon::now(),
            'description' => $transfer['description']
        );
        
        if(empty($this->validateAccountId($transfer['accountTo']))){
            $data['tax'] = $transfer['amount'] * 0.01;
        }

        if($this->needExchangeMoney($accounts)) {
            //To do request API 
            Storage::disk('local')->put('exchange.json', $this->dataExchange);
            $fileContent = Storage::get('exchange.json');
            $exchanges = json_decode($fileContent);
            $exchangeEUR = ($transfer['amount'] / $exchanges->rates->{$accountFrom[0]->getCurrency()});
            $exchangeFinal = ($exchangeEUR * $exchanges->rates->{$accountTo[0]->getCurrency()});
        }

        $responseTransaction = Transaction::create($data);

        if($responseTransaction) {
            $responseRest = Account::where('id', $accountFrom[0]->getId())
                                    ->update([ 
                                        'balance' => $accountFrom[0]->getBalance() - ($transfer['amount'] + $data['tax']) 
                                    ]);
            if($responseRest) {
                $responseSum = Account::where('id', $accountTo[0]->getId())
                            ->update([ 
                                'balance' => $accountTo[0]->getBalance() + $exchangeFinal 
                            ]);
                if(!$responseSum) {
                    return response()->json(['error' => 'Credit not working'], 401);
                }
            } else {
                return response()->json(['error' => 'Debit not working'], 401);
            }
        } else {
            return response()->json(['error' => 'Register transaction not working'], 401);
        }

        return response()->json(['data' => $data ], 201);
    }

    private function needExchangeMoney(object $accounts) {
        return ($accounts[0]['currency_id'] != $accounts[1]['currency_id']) ? true : false;
    }

    private function searchAccount($collection, $arg) {
        return $filtered = collect($collection)->filter(function ($item, $key) use ($arg) {           
            return $item->id == $arg;
        })->values()->all();
    }

    private function validateAccountId(string $id) {
        $return = false;
        $userAccounts = User::find(auth()->user()->id)->accounts;
        if($userAccounts && !empty($this->searchAccount($userAccounts, $id))) {
            $return = true;
        }

        return $return;
    }
}
