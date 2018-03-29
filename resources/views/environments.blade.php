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
                    <button v-on:click="showServers" type="button" class="btn btn-sm btn-primary float-right mr-1"><span data-feather="cloud"></span> Assign Servers</button>
                    <button v-on:click="showPrograms" class="btn btn-sm btn-primary float-right mr-1"><span data-feather="layers"></span> Assign Programs</button>
                    <button class="btn btn-sm btn-info float-right mr-1"><span data-feather="refresh-cw"></span> Run Sync</button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2"><p class="alert alert-info">No environments yet...</p></td>
            </tr>
        @endforelse
    </table>

    <modal name="show-servers" v-cloak>
        <form action="">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Host</th>
                    <th></th>
                </tr>
                <tr v-for="server in servers">
                    <td>@{{ server.name }}</td>
                    <td>@{{ server.description }}</td>
                    <td>@{{ server.host }}</td>
                    <td><input type="checkbox"></td>
                </tr>
            </table>
        </form>
    </modal>

    <modal name="show-programs" v-cloak>
        <form action="">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th></th>
                </tr>
                <tr v-for="program in programs">
                    <td>@{{ program.name }}</td>
                    <td>@{{ program.description }}</td>
                    <td><input type="checkbox"></td>
                </tr>
            </table>
        </form>
    </modal>

    {{ $environments->links() }}
@endsection