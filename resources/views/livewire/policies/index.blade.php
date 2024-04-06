<div>
    <!-- Page header -->
    {{-- <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Schemes
                    </h2>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h3 class="card-title">List of Policies</h3>
                    <div class="row g-2">
                        <div class="col-7">
                            <select name="actions" class="form-select form-select-sm form-select-primary w-100">
                                <option disabled selected="selected" value="">Auction</option>
                                <option value="edit">Edit</option>
                                <option value="delete">Delete</option>
                                <option value="restore">Restore</option>
                                <option value="forceDelete">Force Delete</option>
                            </select>
                        </div>
                        <div class="col-5">
                            <button type="button" class="btn btn-sm btn-primary w-90">
                                @include('icons.plus')
                                Add
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="d-flex">
                        <div class="text-muted">
                            Show
                            <div class="mx-2 d-inline-block">
                                <input type="text" wire:model.live="entries" class="form-control form-control-sm"
                                    value="12" size="3" aria-label="Invoices count">
                            </div>
                            entries
                        </div>
                        <div class="ms-auto text-muted">
                            Search:
                            <div class="ms-2 d-inline-block">
                                <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-vcenter table-mobile-md card-table">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"></th>
                                <th wire:click="sortBy('name')"><button
                                        class="table-sort {{ $sortField === 'name' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-name">Name of policy</button></th>
                                <th wire:click="sortBy('enrollment_fees')"><button
                                        class="table-sort {{ $sortField === 'enrollment_fees' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-enrollment_fees">Enrollment fees</button></th>
                                <th wire:click="sortBy('penalty_ps')"><button
                                        class="table-sort {{ $sortField === 'penalty_ps' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-penalty_ps">Penalty PS</button></th>
                                <th wire:click="sortBy('penalty_nps')"><button
                                        class="table-sort {{ $sortField === 'penalty_nps' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-penalty_nps">Penalty NPS</button></th>
                                <th wire:click="sortBy('company_commission')"><button
                                        class="table-sort {{ $sortField === 'company_commission' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-company_commission">Company commission</button></th>
                                <th wire:click="sortBy('agent_commission')"><button
                                        class="table-sort {{ $sortField === 'agent_commission' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-agent_commission">Agent commission</button></th>
                                <th wire:click="sortBy('employee_commission')"><button
                                        class="table-sort {{ $sortField === 'employee_commission' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-employee_commission">Employee commission</button></th>
                                <th class="w-1 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($policies as $policy)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"></td>
                                <td class="sort-name">{{ $policy->name ?? '' }}</td>
                                <td class="sort-enrollment_fees">{{ '₹ ' . ($policy->enrollment_fees ?? "_") }}</td>
                                <td class="sort-penalty_ps">{{ (number_format($policy->penalty_ps, 0) ?? "_") .' %' }}</td>
                                <td class="sort-penalty_nps"> {{ (number_format($policy->penalty_nps,0) ?? '-' ).' %'}}</td>
                                <td class="sort-company_commission">{{ (number_format($policy->company_commission,0) ?? '-') .' %'}} </td>
                                <td class="sort-agent_commission w-1"> {{ (number_format($policy->agent_commission,0) ?? '-') .' %' }}</td>
                                <td class="sort-employee_commission w-1"> {{ (number_format($policy->employee_commission,0) ?? '-') .' %' }}</td>
                                <td class="text-right">
                                    <div class="card-actions btn-actions space-x-1">
                                        <a href="#" class="btn-action bg-green-lt" data-bs-trigger="hover"
                                            data-bs-toggle="popover" data-bs-placement="top" data-bs-content="View">
                                            @include('icons.eye')
                                        </a>
                                        <a href="#" class="btn-action bg-blue-lt" data-bs-trigger="hover"
                                            data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Edit">
                                            @include('icons.edit')
                                        </a>
                                        <a href="#" class="btn-action bg-red-lt" data-bs-trigger="hover"
                                            data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Delete">
                                            @include('icons.trash')
                                        </a>
                                        <div class="dropdown" data-bs-trigger="hover" data-bs-toggle="popover"
                                            data-bs-placement="top" data-bs-content="Special menu">
                                            <a href="#" class="align-text-top" data-bs-toggle="dropdown">
                                                @include('icons.menu-deep')
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                                <a class="dropdown-item" href="#">
                                                    Restore
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    Force Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No schemes Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $policies->links('tablar::pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>