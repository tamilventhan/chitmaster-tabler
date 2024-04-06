<div>
    <!-- Page header -->
    {{-- <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Subscribers
                    </h2>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Subscribers</h3>
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
                                <th wire:click="sortBy('first_name')"><button class="table-sort {{ $sortField === 'first_name' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-first_name">Name of subscriber</button></th>
                                <th wire:click="sortBy('Gender')"><button class="table-sort {{ $sortField === 'Gender' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-Gender">Gender/Age</button></th>
                                <th wire:click="sortBy('primary_mobile')"><button class="table-sort {{ $sortField === 'primary_mobile' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-primary_mobile">Mobile</button></th>
                                <th wire:click="sortBy('email')"><button class="table-sort {{ $sortField === 'email' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-email">Email</button></th>
                                <th wire:click="sortBy('branch_id')"><button class="table-sort {{ $sortField === 'branch_id' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-branch_id">Branch</button></th>
                                <th wire:click="sortBy('status')"><button class="table-sort {{ $sortField === 'status' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-status">Status</button></th>
                                <th wire:click="sortBy('status')"><button class="table-sort {{ $sortField === 'status' ? ($sortAsc ? 'asc' : 'desc') : '' }}"
                                        data-sort="sort-status">Enrolled By & Date</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subscribers as $subscriber)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td class="sort-first_name">{{ $subscriber->title ?? '' }} {{ $subscriber->first_name ?? '' }}
                                    {{ $subscriber->last_name ?? '' }}</td>
                                @php
                                if (!empty($subscriber->date_of_birth)) {
                                $dob = new DateTime($subscriber->date_of_birth);
                                $currentDate = new DateTime();
                                $age = $currentDate->diff($dob)->y;
                                } else {
                                $age = null;
                                }
                                @endphp
                                <td class="sort-gender">{{ $age ?? '' }}/{{$subscriber->gender === 'Female' ? 'F' :
                                    ($subscriber->gender === 'Male' ? 'M' : '')}}</td>
                                <td class="sort-primary_mobile">
                                    {{$subscriber->primary_mobile}}
                                </td>
                                <td class="sort-email">
                                    {{ $subscriber->email ?? ''}} <br>
                                </td>
                                <td class="sort-created_at">
                                    {{ $subscriber->branch->name ?? ''}}
                                </td>
                                <td class="sort-active">
                                    @if($subscriber->status=='Active')
                                    <span class="badge bg-green-lt">Active</span>
                                    @else
                                    <span class="badge bg-red-lt">Inactive</span>
                                    @endif
                                </td>
                                <td class="sort-created_at">
                                    {{ $subscriber->created_at->format('d-m-Y h:i A') }} </br>
                                    {{ $subscriber->createdBy->name }}
                                    {{-- <span class="cursor-pointer" data-bs-toggle="popover" data-bs-placement="right"
                                        data-bs-content="{{ $subscriber->created_at->diffForHumans() }}">@include('icons.help')</span>
                                    --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No subscriberes Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    {{ $subscribers->links('tablar::pagination') }}
                </div>
            </div>
        </div>
    </div>
</div>