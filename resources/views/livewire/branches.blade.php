<div class="col-12">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Branches
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
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select all invoices"></th>
                                <th wire:click="sortBy('name')"><button class="table-sort" data-sort="sort-name">Name of
                                        branch</button></th>
                                <th wire:click="sortBy('company_id')"><button class="table-sort"
                                        data-sort="sort-company_id">Name of company</button></th>
                                <th wire:click="sortBy('active')"><button class="table-sort"
                                        data-sort="sort-active">Status</button></th>
                                <th wire:click="sortBy('created_by')"><button class="table-sort"
                                        data-sort="sort-created_by">Created By</button></th>
                                <th wire:click="sortBy('updated_by')"><button class="table-sort"
                                        data-sort="sort-updated_by">Updated By</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($branches as $branch)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td class="sort-name">{{ $branch->name ?? '' }}</td>
                                <td class="sort-company_id">{{ $branch->company->name ?? '' }}</td>
                                <td class="sort-active">
                                    @if($branch->active)
                                    <span class="badge bg-green-lt">Active</span>
                                    @else
                                    <span class="badge bg-red-lt">Inactive</span>
                                    @endif
                                </td>
                                <td class="sort-created_by">
                                    {{ $branch->createdby->name ?? ''}} <br>
                                    {{ $branch->created_at->format('d-m-Y h:i A') ?? '' }} <br> {{
                                    $branch->created_at->diffForHumans() }}
                                </td>

                                <td class="sort-updated_by">
                                    {{ $branch->updatedby->name ?? '' }}
                                    {{ $branch->updated_at->format('d-m-Y h:i A') ?? '' }} <br> {{
                                    $branch->updated_at->diffForHumans() ?? '' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No Branches Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $branches->links('tablar::pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>