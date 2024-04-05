<div class="col-12">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Chit Groups
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


                <div class="row row-deck row-cards p-3">
                    @forelse ($groups as $group)
                    <div class="col-sm-6 col-lg-3">
                        {{-- <a href="#" class="card card-link card-link-pop" data-bs-toggle="modal" data-bs-target="#groupInfo"> --}}
                        <a href="#" class="card card-link card-link-pop" wire:click.prevent="viewGroup({{ $group->id }})">
                            <div class="card card-sm">
                                <div class="ribbon ribbon-end ribbon-bookmark bg-red-lt">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-currency-rupee">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6" />
                                        <path d="M7 9l11 0" />
                                    </svg>
                                </div>
                                @php
                                $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                                $words = $formatter->format($group->scheme->chit_value);
                                @endphp
                                <div class="card-body">
                                    <div class="text-uppercase h3 text-secondary font-weight-medium"><strong>{{
                                            $group->name??'' }}</strong></div>
                                    <span class="text-center">
                                        <div class="h2 fw-bold my-3">{{ ucfirst($words) }}</div>
                                        <ul class="list-unstyled lh-lg">
                                            <li>{{ number_format($group->scheme->chit_value, 0) }} X {{
                                                $group->scheme->chit_month??'' }} M</li>
                                        </ul>
                                    </span>
                                    <div class="d-flex justify-content-between">
                                        <kbd class="d-flex align-items-center">
                                            <span>@include('icons.calendar-stats')</span>
                                            <span>{{ $group->commencement ? ' ' . $group->commencement->format('d-m-Y')
                                                : '' }}</span>
                                        </kbd>
                                        <kbd class="d-flex align-items-center">
                                            <span>@include('icons.calendar-off')</span>
                                            <span>{{ $group->termination ? ' ' . $group->termination->format('d-m-Y') :
                                                '' }}</span>
                                        </kbd>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @empty
                    <div class="text-center">No Chit Groups Found</div>
                    @endforelse
                </div>


                {{-- <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            <tr>
                                <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select all invoices"></th>
                                <th wire:click="sortBy('name')"><button class="table-sort" data-sort="sort-name">Name of
                                        group</button></th>
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
                            @forelse ($groups as $group)
                            <tr>
                                <td><input class="form-check-input m-0 align-middle" type="checkbox"
                                        aria-label="Select invoice"></td>
                                <td class="sort-name">{{ $group->name ?? '' }}</td>
                                <td class="sort-company_id">{{ $group->company->name ?? '' }}</td>
                                <td class="sort-active">
                                    @if($group->active)
                                    <span class="badge bg-green-lt">Active</span>
                                    @else
                                    <span class="badge bg-red-lt">Inactive</span>
                                    @endif
                                </td>
                                <td class="sort-created_by">
                                    {{ $group->createdby->name ?? ''}} <br>
                                    {{ $group->created_at->format('d-m-Y h:i A') ?? '' }} <br> {{
                                    $group->created_at->diffForHumans() }}
                                </td>

                                <td class="sort-updated_by">
                                    {{ $group->updatedby->name ?? '' }}
                                    {{ $group->updated_at->format('d-m-Y h:i A') ?? '' }} <br> {{
                                    $group->updated_at->diffForHumans() ?? '' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No Groups Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div> --}}
                <div class="card-footer d-flex align-items-center">
                    {{ $groups->links('tablar::pagination') }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="viewGroup" tabindex="-1" style="display: none;" data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Chit Group - {{ $groupInfo->name??'' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-7">Chit Amount:</dt>
                            <dd class="col-5">{{ $groupInfo->scheme->chit_value??'' }}</dd>
                            <dt class="col-7">No.of Month</dt>
                            <dd class="col-5">{{ $groupInfo->scheme->chit_month??'' }}M</dd>
                            <dt class="col-7">Auction Date</dt>
                            <dd class="col-5">{{ optional($groupInfo)->auction_date ? $groupInfo->auction_date->format('d-m-Y') : '' }}</dd>
                            <dt class="col-7">Auction Time</dt>
                            <dd class="col-5">{{ optional($groupInfo)->auction_time ? $groupInfo->auction_time->format('h:i A') : '' }}</dd>
                            <dt class="col-7">Commencement Date</dt>
                            <dd class="col-5">{{ optional($groupInfo)->commencement ? $groupInfo->commencement->format('d-m-Y') : '' }}</dd>
                            <dt class="col-7">Termination Date</dt>
                            <dd class="col-5">{{ optional($groupInfo)->termination ? $groupInfo->termination->format('d-m-Y') : '' }}</dd>
                            <dt class="col-7">Penalty ps (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->penalty_ps??'' }} %</dd>
                            <dt class="col-7">Penalty nps (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->penalty_nps??'' }} %</dd>
                            <dt class="col-7">penalty days limit (days)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->penalty_days_limit??'' }}</dd>
                            <dt class="col-7">Company commission (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->company_commission??'' }} %</dd>
                        </dl>
                        </div>
                        <div class="col-md-6">
                        <dl class="row">
                            <dt class="col-7">Agent commission (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->agent_commission??'' }} %</dd>
                            <dt class="col-7">Subscriber commission (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->subscriber_commission??'' }} %</dd>
                            <dt class="col-7">Employee commission (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->employee_commission??'' }} %</dd>
                            <dt class="col-7">Document charges (%)</dt>
                            <dd class="col-5">{{ $groupInfo->policy->document_charges??'' }} %</dd>
                            <dt class="col-7">Enrollment fees</dt>
                            <dd class="col-5"><strong>Rs.</strong>{{ $groupInfo->policy->enrollment_fees??'' }}</dd>
                            <dt class="col-7">No.of full due_month</dt>
                            <dd class="col-5">{{ $groupInfo->policy->no_of_full_due_month??'' }}</dd>
                            <dt class="col-7">TDS with pan</dt>
                            <dd class="col-5">{{ $groupInfo->policy->tds_with_pan??'' }}</dd>
                            <dt class="col-7">TDS without pan</dt>
                            <dd class="col-5">{{ $groupInfo->policy->tds_without_pan??'' }}</dd>
                            <dt class="col-7">GST</dt>
                            <dd class="col-5">{{ $groupInfo->policy->gst??'' }}</dd>
                        </dl>
                        </div>
                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-1" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn me-1" data-bs-dismiss="modal">Close</button>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@push('js')
<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('openModal', function () {
            var myModal = new bootstrap.Modal(document.getElementById('viewGroup'));
            myModal.show();
        });
    });
</script>
@endpush