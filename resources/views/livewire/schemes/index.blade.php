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
                    <h3 class="card-title">List of Schemes</h3>
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
                                        data-sort="sort-name">Name of scheme</button></th>
                                <th wire:click="sortBy('chit_value')"><button
                                        class="table-sort {{ $sortField === 'chit_value' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-chit_value">Chit amount</button></th>
                                <th wire:click="sortBy('chit_month')"><button
                                        class="table-sort {{ $sortField === 'chit_month' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-chit_month">Chit month</button></th>
                                <th wire:click="sortBy('created_by')"><button
                                        class="table-sort {{ $sortField === 'created_by' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-created_by">Created by</button></th>
                                <th wire:click="sortBy('updated_by')"><button
                                        class="table-sort {{ $sortField === 'updated_by' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-updated_by">Updated by</button></th>
                                <th wire:click="sortBy('deleted_by')"><button
                                        class="table-sort {{ $sortField === 'deleted_by' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-deleted_by">Deleted by</button></th>
                                <th class="w-1 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($schemes as $scheme)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"></td>
                                <td class="sort-name">{{ $scheme->name ?? '' }}</td>
                                <td class="sort-chit_value">{{ $scheme->chit_value??'' }}</td>
                                <td class="sort-chit_month">{{$scheme->chit_month}} Month</td>
                                <td class="sort-created_by"> {{ $scheme->createdBy->name ?? '-'}}</td>
                                <td class="sort-updated_by">{{ $scheme->updatedBy->name ?? '-'}} </td>
                                <td class="sort-deleted_by w-1"> {{ $scheme->deletedBy->name ?? '-' }}</td>
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
                    {{ $schemes->links('tablar::pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>