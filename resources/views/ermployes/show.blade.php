<x-master>
    <x-slot:title>
        Ermploys Details
    </x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ermploys Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
            </div>
            <a href="{{ route('ermployes.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <h1>Name: {{ $Ermploy->name . $Ermploy->lust_name }}</h1>
    <h1>EmaIl: {{ $Ermploy->email}}</h1>
    <h1>Phone: {{ $Ermploy->phone}}</h1>
    <h1>Company name: @foreach($AllCom as $ca)
        @if($Ermploy->company_id==$ca->id)

        {{$ca->name}}

        @endif

        @endforeach
    </h1>
    <h1>Create At: {{ $Ermploy->created_at }}</h1>

    <P>
</x-master>