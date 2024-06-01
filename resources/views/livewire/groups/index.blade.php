<div class="col-12">
    <!-- Page header -->
    {{-- <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Chit Groups
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
                    <h3 class="card-title">List of Chit Groups</h3>
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


                <div class="row row-deck row-cards p-3">
                    @forelse ($groups as $group)

                    <div class="col-md-6 col-lg-3">
                        <a href="javascript:void(0)" wire:click.prevent="viewGroup({{ $group->id }})">
                            <div class="card card-link card-link-pop" wire:key="{{ $group->id }}">
                                @if ($group->commencement->diffInDays(now()) <= 30)
                                    <div class="ribbon ribbon-top bg-red">
                                        New
                                    </div>
                                @endif

                                @php
                                    $formatter = new NumberFormatter('en_IN', NumberFormatter::SPELLOUT);
                                    $words = $formatter->format($group->scheme->chit_value);
                                @endphp
                                <div class="card-body">

                                    <h2 class="badge badge-outline text-teal mb-3">{{ $group->name??'' }}</h2>
                                    <span class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                        Chit Value
                                        <span class="text-secondary ms-auto">
                                            {{ number_format($group->scheme->chit_value, 0)??'' }}
                                            <strong>({{ ucfirst($words) }})</strong>
                                        </span>
                                    </span>

                                    <span class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                        Denomination
                                        <span class="text-secondary ms-auto">
                                            {{ number_format($group->scheme->chit_value, 0) }} X {{
                                            $group->scheme->chit_month.'M'??'' }}
                                        </span>
                                    </span>

                                    <span class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                        Commencement
                                        <span class="text-secondary ms-auto">
                                            {{ $group->commencement ? ' ' . $group->commencement->format('d-m-Y') : '' }}
                                        </span>
                                    </span>

                                    <span class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                                        Termination
                                        <span class="text-secondary ms-auto">
                                            {{ $group->termination ? ' ' . $group->termination->format('d-m-Y') : '' }}
                                        </span>
                                    </span>
                                </div>
                                @php
                                    $encodedGroupId = base64_encode($group->id);
                                @endphp
                                <div class="card-footer d-flex justify-content-between">
                                    <div></div>
                                    <a wire:navigate href="{{ route('enrollments',['group' => $encodedGroupId]) }}" class="btn btn-sm btn-primary btn-block">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                <div class="text-center">No Chit Groups Found</div>
                @endforelse
            </div>

            <div class="card-footer d-flex align-items-center">
                {{ $groups->links('tablar::pagination') }}
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="viewGroup" tabindex="-1" style="display: none;" data-bs-backdrop="static"
    aria-hidden="true">
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
                            <dd class="col-5">{{ optional($groupInfo)->auction_date ?
                                $groupInfo->auction_date->format('d-m-Y') : '' }}</dd>
                            <dt class="col-7">Auction Time</dt>
                            <dd class="col-5">{{ optional($groupInfo)->auction_time ?
                                $groupInfo->auction_time->format('h:i A') : '' }}</dd>
                            <dt class="col-7">Commencement Date</dt>
                            <dd class="col-5">{{ optional($groupInfo)->commencement ?
                                $groupInfo->commencement->format('d-m-Y') : '' }}</dd>
                            <dt class="col-7">Termination Date</dt>
                            <dd class="col-5">{{ optional($groupInfo)->termination ?
                                $groupInfo->termination->format('d-m-Y') : '' }}</dd>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-1" data-bs-dismiss="modal">Close</button>
            </div>
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