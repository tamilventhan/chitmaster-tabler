<div>
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        List of Agents
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
                                    <th wire:click="sortBy('first_name')"><button class="table-sort" data-sort="sort-first_name">Name of agent</button></th>
                                    <th wire:click="sortBy('Gender')"><button class="table-sort" data-sort="sort-Gender">Gender/Age</button></th>
                                    <th wire:click="sortBy('primary_mobile')"><button class="table-sort" data-sort="sort-primary_mobile">Mobile</button></th>
                                    <th wire:click="sortBy('email')"><button class="table-sort" data-sort="sort-email">Email</button></th>
                                    <th wire:click="sortBy('branch_id')"><button class="table-sort" data-sort="sort-branch_id">Branch</button></th>
                                    <th wire:click="sortBy('status')"><button class="table-sort" data-sort="sort-status">Status</button></th>
                                    <th wire:click="sortBy('status')"><button class="table-sort" data-sort="sort-status">Enrolled By & Date</button></th>
                                </tr>
                            </thead>
                            <tbody class="table-tbody">
                                @forelse ($agents as $agent)                                    
                                <tr>
                                    <td class="sort-first_name">{{ $agent->title ?? '' }}  {{ $agent->first_name ?? '' }} {{ $agent->last_name ?? '' }}</td>
                                    @php
                                        if (!empty($agent->date_of_birth)) {
                                            $dob = new DateTime($agent->date_of_birth);
                                            $currentDate = new DateTime();
                                            $age = $currentDate->diff($dob)->y;
                                        } else {
                                            $age = null;
                                        }
                                    @endphp
                                    <td class="sort-gender">{{ $age ?? '' }}/{{$agent->gender === 'Female' ? 'F' : ($agent->gender === 'Male' ? 'M' : '')}}</td>
                                    <td class="sort-primary_mobile">
                                        {{$agent->primary_mobile}}
                                    </td>
                                    <td class="sort-email">
                                        {{ $agent->email ?? ''}} <br>
                                    </td>
                                    <td class="sort-created_at">
                                        {{ $agent->branch->name ?? ''}}
                                    </td>
                                    <td class="sort-active">
                                        @if($agent->status=='Active')
                                            <span class="badge bg-green-lt">Active</span>
                                        @else
                                            <span class="badge bg-red-lt">Inactive</span>
                                        @endif
                                    </td>
                                    <td class="sort-created_at">
                                        {{ $agent->created_at->format('d-m-Y h:i A') }} </br>
                                        {{ $agent->createdBy->name }}
                                        {{-- <span class="cursor-pointer" data-bs-toggle="popover" data-bs-placement="right" data-bs-content="{{ $agent->created_at->diffForHumans() }}">@include('icons.help')</span> --}}
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No agentes Found</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="7">
                                        <div class="d-flex mt-4 justify-content-center">
                                            {{ $agents->links('tablar::pagination') }}
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