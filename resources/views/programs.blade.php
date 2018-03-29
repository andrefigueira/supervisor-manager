@extends('layout')

@section('title-actions')
    @include('partials/title-actions', [
        'link' => url('programs/create'),
        'title' => 'New Program',
    ])
@endsection

@section('content')
    @include('partials/page-title', [
        'title' => 'Programs',
    ])

    <table class="table table-border-top-0">
        <tr>
            <th>Name</th>
            <th></th>
        </tr>

        @forelse($programs as $program)
            <tr>
                <td>{{ $program->name }}</td>
                <td>
                    @include('partials/form/delete', [
                        'action' => url('programs/' . $program->id . ''),
                        'confirm' => 'Are you sure you want to delete this program?',
                    ])
                    <a href="{{ url('programs/' . $program->id . '/edit') }}" class="btn btn-sm btn-warning float-right mr-1">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2"><p class="alert alert-info">No programs yet...</p></td>
            </tr>
        @endforelse
    </table>

    {{ $programs->links() }}
@endsection