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

        <form 
            action="{{ route('companies.store') }}" 
            method="post" 
            enctype="multipart/form-data">

            @csrf

            <x-forms.input 
                type="text" 
                name="name" 
                placeholder="Enter name" 
                required
                label="Name"
                />
            <x-forms.input 
                type="email" 
                name="email" 
                placeholder="Enter Email" 
                required
                label="Email"
                />

            <x-forms.input type="file" name="logo" label='Logo Here' />

            <x-forms.input 
                type="text" 
                name="website" 
                placeholder="Enter your website" 
                required
                label="Enter Your Website"
                />

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

</x-master>