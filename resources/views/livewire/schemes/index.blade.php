<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Schemes
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                {{-- <div class="card-header">
                    <h3 class="card-title">Index</h3>
                </div> --}}
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
                                        <a href="#" class="btn-action bg-green-lt">
                                            @include('icons.eye')
                                        </a>
                                        <a href="#" class="btn-action bg-blue-lt">
                                            @include('icons.edit')
                                        </a>
                                        <a href="#" class="btn-action bg-red-lt">
                                            @include('icons.trash')
                                        </a>
                                        <div class="dropdown">
                                            <a href="#" class="align-text-top"
                                                data-bs-toggle="dropdown">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/dots-vertical -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 19m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M12 5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    Restore
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    Force Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="btn-list flex-nowrap">
                                        <a href="#" class="btn btn-icon">
                                            Show
                                        </a>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle align-text-top"
                                                data-bs-toggle="dropdown">
                                                Actions
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">
                                                    Edit
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    Delete
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    Restore
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    Force Delete
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No schemes Found</td>
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