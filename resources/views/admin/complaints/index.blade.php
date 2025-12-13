@extends('admin.layouts.app')
@section('content')
<div class="aiz-titlebar mt-2 mb-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <h1 class="h3">{{ translate('User Complaints') }}</h1>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
      <h5 class="mb-md-0 h6">{{ translate('Complaints List') }}</h5>
    </div>
    <div class="card-body">
        <table class="table aiz-table mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ translate('Date') }}</th>
                    <th>{{ translate('Name') }}</th>
                    <th>{{ translate('Email') }}</th>
                    <th>{{ translate('Subject') }}</th>
                    <th>{{ translate('Phone') }}</th>
                    <th>{{ translate('Address') }}</th>
                    <th>{{ translate('Message') }}</th>
                    <th>{{ translate('Status') }}</th>
                    <th class="text-right">{{ translate('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $key => $complaint)
                    @php
                        $fullMessage = $complaint->message ?? '';
                        $phone = null;
                        $address = null;

                        if (strpos($fullMessage, 'Phone:') !== false) {
                            $afterPhone = \Illuminate\Support\Str::after($fullMessage, 'Phone:');
                            $beforeAddress = strpos($afterPhone, 'Address:') !== false
                                ? \Illuminate\Support\Str::before($afterPhone, 'Address:')
                                : $afterPhone;
                            $phone = trim($beforeAddress);
                        }

                        if (strpos($fullMessage, 'Address:') !== false) {
                            $address = trim(\Illuminate\Support\Str::after($fullMessage, 'Address:'));
                        }
                    @endphp
                    <tr>
                        <td>{{ ($key+1) + ($complaints->currentPage() - 1)*$complaints->perPage() }}</td>
                        <td>{{ $complaint->created_at }}</td>
                        <td>{{ $complaint->name }}</td>
                        <td>{{ $complaint->email }}</td>
                        <td>{{ $complaint->subject }}</td>
                        <td>{{ $phone ?: '-' }}</td>
                        <td>{{ $address ? \Illuminate\Support\Str::limit($address, 60) : '-' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($fullMessage, 80) }}</td>
                        <td>{{ ucfirst($complaint->status) }}</td>
                        <td class="text-right">
                            <button type="button" class="btn btn-soft-primary btn-sm" data-toggle="modal" data-target="#complaint-modal-{{ $complaint->id }}">
                                {{ translate('View') }}
                            </button>
                        </td>
                    </tr>
                    <div class="modal fade" id="complaint-modal-{{ $complaint->id }}" tabindex="-1" role="dialog" aria-labelledby="complaintModalLabel-{{ $complaint->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="complaintModalLabel-{{ $complaint->id }}">{{ translate('Complaint Details') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ translate('Close') }}">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-md-6"><strong>{{ translate('Date') }}:</strong> {{ $complaint->created_at }}</div>
                                        <div class="col-md-6"><strong>{{ translate('Status') }}:</strong> {{ ucfirst($complaint->status) }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><strong>{{ translate('Name') }}:</strong> {{ $complaint->name }}</div>
                                        <div class="col-md-6"><strong>{{ translate('Email') }}:</strong> {{ $complaint->email }}</div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-6"><strong>{{ translate('Phone') }}:</strong> {{ $phone ?: '-' }}</div>
                                        <div class="col-md-6"><strong>{{ translate('Address') }}:</strong> {{ $address ?: '-' }}</div>
                                    </div>
                                    <div class="mb-2">
                                        <strong>{{ translate('Subject') }}:</strong> {{ $complaint->subject }}
                                    </div>
                                    <div class="mb-0">
                                        <strong>{{ translate('Message') }}:</strong>
                                        <pre class="mb-0" style="white-space:pre-wrap; background:#f8f9fa; border-radius:.25rem; padding:.75rem;">{{ $fullMessage }}</pre>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">{{ translate('Close') }}</button>

                                    <form action="{{ route('admin.complaints.update_status', $complaint->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="resolved">
                                        <button type="submit" class="btn btn-soft-success btn-sm" @if($complaint->status === 'resolved') disabled @endif>
                                            {{ translate('Mark Resolved') }}
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.complaints.update_status', $complaint->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="status" value="pending">
                                        <button type="submit" class="btn btn-soft-warning btn-sm" @if($complaint->status === 'pending') disabled @endif>
                                            {{ translate('Mark Pending') }}
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.complaints.destroy', $complaint->id) }}" method="POST" class="d-inline" onsubmit="return confirm('{{ translate('Are you sure you want to delete this complaint?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-soft-danger btn-sm">
                                            {{ translate('Delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $complaints->links() }}
        </div>
    </div>
</div>
@endsection
