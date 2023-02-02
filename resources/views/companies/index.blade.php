<x-master>
    <x-slot:title>
        Company List
        </x-slot>

        <x-forms.message />

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Companies</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="#">
                        <button type="button" class="btn btn-sm btn-outline-secondary">PDF</button>
                    </a>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Excel</button>
                    <a href="#">
                        <button type="button" class="btn btn-sm btn-outline-danger">Trash</button>
                    </a>
                </div>
                <a href="{{ route('companies.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Website</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->email }}</td>
                    <td><img src="{{ asset('storage/companies/'.$company->logo) }}" height="40"></td>
                    <td>{{ $company->website }}</td>
                    <td>
                        <a class="btn btn-sm btn-info" href="{{ route('companies.show', $company->id) }}">Show</a>
                        <a class="btn btn-sm btn-warning" href="{{ route('companies.edit', $company->id) }}">Edit</a>
                        <form action="{{ route('companies.destroy', $company->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
</x-master>