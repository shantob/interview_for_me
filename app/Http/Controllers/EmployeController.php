<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployRequest;
use App\Models\Company;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index()
    {
        $Ermploys = Employe::all();
        $companies = Company::pluck('name', 'id')->toArray();
        $AllCom = Company::all();
        // return view('Ermploys.index', [
        //     'Ermploys' => $Ermploys
        // ]);

        return view('ermployes.index', compact('Ermploys', 'companies', 'AllCom'));
    }

    public function create()
    {
        $companies = Company::pluck('name', 'id')->toArray();

        return view('ermployes.create', compact('companies'));
    }
    public function show(Employe $Ermploy, $id)
    {
        $Ermploy = Employe::find($id);
        //dd($Ermploy);
        $AllCom = Company::all();
        return view('ermployes.show', compact('Ermploy', 'AllCom'));
    }

    public function store(EmployRequest $request)

    {

        $data = [
            'first_name' => $request->first_name,
            'lust_name' => $request->lust_name,
            'company_id' => $request->company_id,
            'email' => $request->email,
            'phone' => $request->phone,

        ];
        // dd($data);
        Employe::create($data);
        return redirect()
            ->route('ermployes.index')
            ->withMessage('Created Successfully!');
    }





    public function edit(Employe $Ermploy, $id)
    {
         $Ermploy = Employe::find($id);
        $companies = Company::pluck('name', 'id')->toArray();
        return view('ermployes.edit', compact('Ermploy', 'companies'));
    }
    public function update(EmployRequest $request, Employe $Ermploy)

    {

        // $Ermploy = Ermploy::find($id);


        $requestData = [
            'first_name' => $request->first_name,
            'lust_name' => $request->lust_name,
            'company_id' => $request->company_id,
            'phone' => $request->phone,
            'email' => $request->email,

        ];

        $Ermploy->update($requestData);
        return redirect()
            ->route('ermployes.index')
            ->withMessage('Upadated Successfully!');
    }

    public function destroy($id)
    {
        $Ermploy = Employe::find($id);
        $Ermploy->delete();
        return redirect()
            ->route('ermployes.index')
            ->withMessage('Deleted Successfully!');
    }

}
