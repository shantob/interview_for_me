<x-master>
    <x-slot:title>
        Employe Create
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Employe</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                </div>

                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="plus"></span>
                    Add New
                </button>
            </div>
        </div>

        @if(session('message'))
        <p class="text-success">
            {{ session('message') }}
        </p>
        @endif


        <form action="{{route('ermployes.store')}}" method="post">
            @csrf
            <x-forms.input type="text" name="first_name" label="First Name" class="bg-light" value="{{old('first_name')}}" required placeholder="Enter First Name" />
            <x-forms.input type="text" name="lust_name" label="Lust Name" class="bg-light" value="{{old('lust_name')}}" required placeholder="Enter Lust Name" />


            <x-forms.select name="company_id" label="Select Company" :values="$companies" />
 
            <x-forms.input name="email" label="Email" class="bg-light" value="{{old('email')}}" required placeholder="Type Email" />
            <x-forms.input name="phone" label="Phone Number" class="bg-light" value="{{old('phone')}}" required placeholder="Phone" />

            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>

        </form>






</x-master>