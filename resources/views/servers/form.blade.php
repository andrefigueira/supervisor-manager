@extends('layout')

@section('content')
    @include('partials/page-title', [
        'title' => $title ?? 'Create Server',
    ])

    <div class="row">
        <div class="col-md-6">
            <form action="{{ isset($server->id) ? url('servers/' . $server->id . '/save') : url('servers/store') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="post">

                @include('partials/form/input', [
                    'label' => 'Name',
                    'id' => 'name',
                    'name' => 'name',
                    'description' => 'This will be used to identify which server you are in',
                    'placeholder' => 'Enter a name for this server',
                    'value' => $server->name ?? ''
                ])

                @include('partials/form/input', [
                    'label' => 'Description',
                    'id' => 'description',
                    'name' => 'description',
                    'description' => 'The description of the server',
                    'placeholder' => 'Enter a description for this server',
                    'value' => $server->description ?? ''
                ])

                @include('partials/form/input', [
                    'label' => 'Host',
                    'id' => 'host',
                    'name' => 'host',
                    'description' => 'The host of the server',
                    'placeholder' => 'Enter a host for this server',
                    'value' => $server->host ?? ''
                ])

                <button type="submit" class="btn btn-success">Save changes</button>
            </form>
        </div><!-- End col -->
    </div><!-- End row -->

@endsection