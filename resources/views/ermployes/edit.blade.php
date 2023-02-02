<x-master>
    <x-slot:title>
        Ermploy Edit
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ermploy Edit</h1>
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






        <form action="{{route('ermployes.update',$Ermploy->id)}}" method="post" enctype="multipart/form-data">

            @csrf
            @method('put')

            <x-forms.input type="text" name="first_name" label="First Name" class="bg-light" value="{{old('first_name',$Ermploy->first_name)}}" required placeholder="Enter First name" />
            <x-forms.input type="text" name="lust_name" label="Lust Name" class="bg-light" value="{{old('lust_name',$Ermploy->lust_name)}}" required placeholder="Enter Lust Name" />


            <x-forms.select name="company_id" label="Select Company" :values="$companies" :selectedval="$Ermploy->company_id" />
            <x-forms.input name="email" label="Email" class="bg-light" value="{{old('email',$Ermploy->email)}}" required placeholder="Type Email" />
            <x-forms.input name="phone" label="Pone" class="bg-light" value="{{old('phone',$Ermploy->phone)}}" required placeholder="Type Pone" />


            <button type="submit" class="btn btn-primary">Update</button>
            <button type="reset" class="btn btn-dark mx-2">Cancle</button>
        </form>






</x-master>