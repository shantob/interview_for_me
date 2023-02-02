<x-master>
    <x-slot:title>
        Company Details
    </x-slot>
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cmpanies</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('companies.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <h1>Title: {{ $company->name }}</h1>
    <h1>Title: {{ $company->email }}</h1>
    <h1>Title: {{ $company->wrbsite }}</h1>

    <img src="{{ asset('storage/companies/'.$company->logo) }}" />


</x-master>