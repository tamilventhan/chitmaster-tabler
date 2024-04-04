<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Companies
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Index</h3>
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
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>
                                <th wire:click="sortBy('name')"><button class="table-sort" data-sort="sort-name">Name</button></th>
                                <th wire:click="sortBy('active')"><button class="table-sort" data-sort="sort-active">Status</button></th>
                                <th wire:click="sortBy('created_by')"><button class="table-sort" data-sort="sort-created_by">Created By</button></th>
                                <th wire:click="sortBy('created_at')"><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                                <th wire:click="sortBy('updated_by')"><button class="table-sort" data-sort="sort-updated_by">Updated By</button></th>
                                <th wire:click="sortBy('updated_at')"><button class="table-sort" data-sort="sort-updated_at">Updated At</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($companies as $company)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                    aria-label="Select invoice"></td>
                                <td class="sort-name">{{ $company->name }}</td>
                                <td class="sort-active">
                                    @if($company->active)
                                        <span class="badge bg-green-lt">Active</span>
                                    @else
                                        <span class="badge bg-red-lt">Inactive</span>
                                    @endif
                                </td>
                                <td class="sort-created_by">
                                    {{ $company->createdby->name }} <br>
                                </td>
                                <td class="sort-created_at">
                                    {{ $company->created_at->format('d-m-Y h:i A') }} <br> {{ $company->created_at->diffForHumans() }}
                                </td>
                                <td class="sort-updated_by">
                                    {{ $company->updatedby->name }}
                                </td>
                                <td class="sort-updated_at">
                                    {{ $company->updated_at->format('d-m-Y h:i A') }} <br> {{ $company->updated_at->diffForHumans() }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No Companies Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $companies->links('tablar::pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>
