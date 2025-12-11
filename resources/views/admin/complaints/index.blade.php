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
                    <th>{{ translate('Message') }}</th>
                    <th>{{ translate('Status') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($complaints as $key => $complaint)
                    <tr>
                        <td>{{ ($key+1) + ($complaints->currentPage() - 1)*$complaints->perPage() }}</td>
                        <td>{{ $complaint->created_at }}</td>
                        <td>{{ $complaint->name }}</td>
                        <td>{{ $complaint->email }}</td>
                        <td>{{ $complaint->subject }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($complaint->message, 80) }}</td>
                        <td>{{ ucfirst($complaint->status) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="aiz-pagination">
            {{ $complaints->links() }}
        </div>
    </div>
</div>
@endsection
