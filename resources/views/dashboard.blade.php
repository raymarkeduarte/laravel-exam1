@include('partials.__header', ['title' => 'Employees'])
<nav class="navbar bg-secondary">
    <div class="container">
        <h3 class="navbar-text text-light">
            Manage Employees
        </h3>
        <div class="justify-content-end">
            <button id="multiDelete" class="btn btn-danger me-2" type="button">
                <i class="fa-solid fa-circle-minus"></i> Delete
            </button>
            <button class="btn btn-success me-2" type="button" data-bs-toggle="modal" data-bs-target="#addEmployee">
                <i class="fa-solid fa-circle-plus"></i> Add New Employee
            </button>
            <form class="d-inline" action="{{ route('logout') }}" method="get">
                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
            </form>
        </div>
    </div>
</nav>
<br>
<div class="container">
    <table id="employees" class="display table-striped" style="width:100%">
        <thead>
            <tr>
                <th><input class="form-check-input" type="checkbox" value="" id="selectAllEmployees"></th>
                <th class="d-none">ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $item)
                <tr id="employee{{ $item->id }}">
                    <td></td>
                    <td class="d-none">{{ $item->id }}</td>
                    <td class="employeeName">{{ $item->name }}</td>
                    <td class="employeeEmail">{{ $item->email }}</td>
                    <td class="employeeAddress">{{ $item->address }}</td>
                    <td class="employeePhone">{{ $item->phone }}</td>
                    <td>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#editEmployee"
                            onclick="editEmployee('employee{{ $item->id }}')">
                            <i class="fa-sharp fa-solid fa-pen text-warning"></i>
                        </button>
                        <button class="btn" data-bs-toggle="modal" data-bs-target="#deleteEmployee"
                            onclick="deleteEmployee('employee{{ $item->id }}')">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@include('partials.__modals')
@include('partials.__footer')