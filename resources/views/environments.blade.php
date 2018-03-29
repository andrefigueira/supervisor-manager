@extends('layout')

@section('title-actions')
    @include('partials/title-actions', [
        'link' => url('environments/create'),
        'title' => 'New Environment',
    ])
@endsection

@section('content')
    @include('partials/page-title', [
        'title' => 'Environments',
    ])

    <table class="table table-border-top-0">
        <tr>
            <th>Name</th>
            <th></th>
        </tr>

        @forelse($environments as $environment)
            <tr>
                <td>{{ $environment->name }}</td>
                <td>
                    @include('partials/form/delete', [
                        'action' => url('environments/' . $environment->id . ''),
                        'confirm' => 'Are you sure you want to delete this environment?',
                    ])
                    <a href="{{ url('environments/' . $environment->id . '/edit') }}" class="btn btn-sm btn-warning float-right mr-1">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2"><p class="alert alert-info">No environments yet...</p></td>
            </tr>
        @endforelse
    </table>

    {{ $environments->links() }}
@endsection