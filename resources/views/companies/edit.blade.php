<x-master>
    <x-slot:title>
    Company Create
        </x-slot>

        @if(session('message'))
        <span class="text-success">{{ session('message') }}</span>
        @endif

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">companies</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('companies.index') }}">
                    <button type="button" class="btn btn-sm btn-outline-info">
                        <span data-feather="list"></span>
                        List
                    </button>
                </a>
            </div>
        </div>

        <x-forms.errors />
        
        <form action="{{ route('companies.update', $company->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')

            <x-forms.input 
                type="text" 
                name="name" 
                :value="old('name', $company->name)"
                placeholder="Enter name" 
                required 
            />
            <x-forms.input 
                type="email" 
                name="email" 
                :value="old('email', $company->email)"
                placeholder="Enter Email" 
                required 
            />
            <img src="{{ asset('storage/companies/'.$company->logo) }}" height="250" />

            <x-forms.input type="file" name="logo" label='Logo' />
            <x-forms.input 
                type="text" 
                name="website" 
                :value="old('website', $company->website)"
                placeholder="Enter Website" 
                required 
            />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</x-master>