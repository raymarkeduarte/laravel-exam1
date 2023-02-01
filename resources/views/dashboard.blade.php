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

{{-- MODALS --}}

{{-- Add employee --}}
<div class="modal fade" id="addEmployee" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" id="name" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" id="address" placeholder=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" type="number" class="form-control" id="phone" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit employee --}}
<div class="modal fade" id="editEmployee" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('update') }}" method="post">
                @csrf
                <input id="editID" type="hidden" name="id">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Edit Employee <span></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" id="editName" type="text" class="form-control" id="editName" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" id="editEmail" type="email" class="form-control" id="editEmail" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" id="editAddress" class="form-control" id="editAddress" placeholder=""></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input name="phone" id="editPhone" type="number" class="form-control" id="editPhone" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete an employee --}}
<div class="modal fade" id="deleteEmployee" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('delete') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Delete Employee <span></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="deleteID" type="hidden" name="id">
                    <p>Are you sure you want to delete these Records?</p>
                    <p>This action cannot be undone</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Delete multiple employees --}}
<div class="modal fade" id="deleteEmployees" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('deleteMultiple') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="">Delete Employee <span></span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input id="deleteIDMultiple" type="hidden" name="ids[]">
                    <p>Are you sure you want to delete these Records?</p>
                    <p>This action cannot be undone</p>
                    <p id="selectedRows"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('partials.__footer')