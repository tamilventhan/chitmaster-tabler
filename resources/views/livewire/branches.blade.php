<div>
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
                <div class="card-body">
                    <div id="table-default" class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th wire:click="sortBy('name')"><button class="table-sort" data-sort="sort-name">Name of branch</button></th>
                                    <th wire:click="sortBy('company_id')"><button class="table-sort" data-sort="sort-company_id">Name of company</button></th>
                                    <th wire:click="sortBy('active')"><button class="table-sort" data-sort="sort-active">Status</button></th>
                                    <th wire:click="sortBy('created_by')"><button class="table-sort" data-sort="sort-created_by">Created By</button></th>
                                    <th wire:click="sortBy('created_at')"><button class="table-sort" data-sort="sort-created_at">Created At</button></th>
                                    <th wire:click="sortBy('updated_by')"><button class="table-sort" data-sort="sort-updated_by">Updated By</button></th>
                                    <th wire:click="sortBy('updated_at')"><button class="table-sort" data-sort="sort-updated_at">Updated At</button></th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @forelse ($branches as $branch)                                    
                                <tr>
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
                                    </td>
                                    <td class="sort-created_at">
                                        {{ $branch->created_at->format('d-m-Y h:i A') ?? '' }} <br> {{ $branch->created_at->diffForHumans() }}
                                    </td>
                                    <td class="sort-updated_by">
                                        {{ $branch->updatedby->name ?? '' }}
                                    </td>
                                    <td class="sort-updated_at">
                                        {{ $branch->updated_at->format('d-m-Y h:i A') ?? '' }} <br> {{ $branch->updated_at->diffForHumans() ?? '' }}
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No Branches Found</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="7">
                                        <div class="d-flex mt-4 justify-content-center">
                                            {{ $branches->links('tablar::pagination') }}
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
