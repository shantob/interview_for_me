<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Image;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function show(Company $company)
    {
        // $company = company::find($id);
        return view('companies.show', compact('company'));
    }

    public function store(CompanyRequest $request)
    {
        $requestData = [
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $this->uploadlogo($request->file('logo'))
        ];

        company::create($requestData);

        return redirect()
            ->route('companies.index')
            ->withMessage('Successfully Created');
    }

    public function edit(Company $company)
    {
        // $company = company::find($id);
        return view('companies.edit', compact('company'));
    }

    public function update(CompanyRequest $request, Company $company)
    {
        // $company = company::find($id);

        $requestData = [
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
        ];

        if ($request->hasFile('logo')) {
            $requestData['logo'] = $this->uploadlogo($request->file('logo'));
        }

        $company->update($requestData);

        return redirect()
            ->route('companies.index')
            ->withMessage('Successfully Updated');
    }

    public function destroy($id)
    {
        $company = Company::find($id);
        $company->delete();

        return redirect()
            ->route('companies.index')
            ->withMessage('Successfully deleted');
    }

    public function uploadlogo($logo)
    {
        $originalName = $logo->getClientOriginalName();
        $fileName = date('Y-m-d') . time() . $originalName;

        // $logo->move(storage_path('/app/public/companies'), $fileName); 

        Image::make($logo)
            ->save(storage_path() . '/app/public/companies/' . $fileName);

        return $fileName;
    }
}
