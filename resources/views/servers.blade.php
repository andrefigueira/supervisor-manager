@extends('layout')

@section('title-actions')
    @include('partials/title-actions', [
        'link' => url('servers/create'),
        'title' => 'New Server',
    ])
@endsection

@section('content')
    @include('partials/page-title', [
        'title' => 'Servers',
    ])

    <table class="table table-border-top-0">
        <tr>
            <th>Name</th>
            <th></th>
        </tr>

        @forelse($servers as $server)
            <tr>
                <td>{{ $server->name }}</td>
                <td>
                    @include('partials/form/delete', [
                        'action' => url('servers/' . $server->id . ''),
                        'confirm' => 'Are you sure you want to delete this server?',
                    ])
                    <a href="{{ url('servers/' . $server->id . '/edit') }}" class="btn btn-sm btn-warning float-right mr-1">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2"><p class="alert alert-info">No servers yet...</p></td>
            </tr>
        @endforelse
    </table>

    {{ $servers->links() }}
@endsection