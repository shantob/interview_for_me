<x-master>
    <x-slot:title>
        Ermploy List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Ermploys</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="#">

                        <button type="button" class="btn btn-sm btn-outline-secondary">Export PDF</button>
                    </a>

                    <a href="#">

                        <button type="button" class="btn btn-sm btn-outline-secondary">Export Excel</button>
                    </a>

                </div>

                <a href="{{route('ermployes.create')}}"> <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button> </a>

            </div>
        </div>

        @if(session('message'))
        <p class="text-success">
            {{ session('message') }}
        </p>
        @endif




        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>Company Id</th>
                    <th>Company Name </th>
                    <th>Email Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>


                @foreach($Ermploys as $Ermploy)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $Ermploy->first_name . $Ermploy->lust_name }}</td>
                    <td>{{ $Ermploy->company_id }}</td>
                    <td>
                        @foreach($AllCom as $Allco)
                        @if($Ermploy->company_id==$Allco->id)

                        {{$Allco->name}}

                        @endif

                        @endforeach
                    </td>
                    <td>{{ $Ermploy->email }}</td>
                    <td>{{ $Ermploy->phone }}</td>
                    <td>
                        <a class="btn btn-sm btn-outline-info" href="{{ route('ermployes.show', $Ermploy->id) }}">Show</a>

                        <a class="btn btn-sm btn-outline-info" href="{{ route('ermployes.edit', $Ermploy->id) }}">Edit</a>
                        <form action="{{ route('ermployes.destroy', $Ermploy->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger">Delete </button>
                        </form>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-master>