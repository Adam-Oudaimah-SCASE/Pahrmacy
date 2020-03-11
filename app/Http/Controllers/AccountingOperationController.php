<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountingType;
use App\Models\AccountingOperation;
use App\Models\Balance;

class AccountingOperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all the operations
        $operations = AccountingOperation::all();
        // Return the appropriate view
        return view('accountingOperation.index')->withOperations($operations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       $types= AccountingType::all();
        // Return the appropriate view
        return view('accountingOperation.create')->withTypes($types);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create a new object of AccountingType
        $accounting_operation = new AccountingOperation;

        // Assign the request values to the new accounting operation
        $accounting_type = AccountingType::find($request->input('accounting_type_id'));
        $accounting_operation->date = $request->input('date');
        $accounting_operation->amount = $request->input('amount');
        $accounting_operation->type()->associate($accounting_type);

        $accounting_operation->save();

        // Add it to the balance table
        $balance = Balance::first();
        switch ($request->input('type')) {
            case 'سحب':
                $balance->balance -= $accounting_operation->amount;
                break;

            case 'إيداع':
                $balance->balance += $accounting_operation->amount;
                break;
        }
        $balance->save();

        // Return the appropriate view
        return redirect()->route('accountingOperation.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get the targeted accountingtype
        $accounting_operation = AccountingOperation::find($id);
        // Return the appropriate view
        return view('.edit')->withOperation($accounting_operation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Get the targeted accountingtype
        $accounting_operation = AccountingOperation::find($id);

        // Assign the request values to the new accounting operation
        $accounting_type = AccountingType::find($request->input('accounting_type_id'));
        $accounting_operation->date = $request->input('date');
        $accounting_operation->amount = $request->input('amount');
        $accounting_operation->type()->associate($accounting_type);

        $accounting_operation->save();

        // Add it to the balance table
        $balance = Balance::all();
        switch ($request->inupt('type')) {
            case 'سحب':
                $balance->balance -= $accounting_operation->amount;
                break;

            case 'إيداع':
                $balance->balance += $accounting_operation->amount;
                break;
        }
        $balance->save();

        // Return the appropriate view
        return redirect()->route('.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the targeted accountingtype
        $accounting_operation = AccountingOperation::find($id);

        // Delete the record
        $accounting_operation->delete();

        // Return the appropriate view
        return redirect()->route('.index');
    }
}
