<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\User;

class TransactionController extends Controller
{
    public function tampil($id)
    {
        $user = User::find($id);
        $transaction = Transaction::where('user_id', $user->id)->get();
        // dd($transaction);
        return view('transaction', ['user' => $user, 'transaction' =>$transaction]);
    }

    public function dump(){
        $transaction=new Transaction;
        dump($transaction);
    }

    public function insert(){
        $transaction = new Transaction;
        $transaction->coffee='Americano';
        $transaction->transactiondate='2023-05-19';
        $transaction->user_id='1';
        $transaction->save();

        dump($transaction);
    }
}
