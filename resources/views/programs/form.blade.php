@extends('layout')

@section('content')
    @include('partials/page-title', [
        'title' => $title ?? 'Create Program',
    ])

    <div class="row">
        <div class="col-md-6">
            <form action="{{ isset($program->id) ? url('programs/' . $program->id . '/save') : url('programs/store') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="post">

                @include('partials/form/input', [
                    'label' => 'Name',
                    'id' => 'name',
                    'name' => 'name',
                    'description' => 'This will be used to identify which program you are in',
                    'placeholder' => 'Enter a name for this program',
                    'value' => $program->name ?? ''
                ])

                @include('partials/form/input', [
                    'label' => 'Description',
                    'id' => 'description',
                    'name' => 'description',
                    'description' => 'The description of the program',
                    'placeholder' => 'Enter a description for this program',
                    'value' => $program->description ?? ''
                ])

                @include('partials/form/input', [
                    'label' => 'Command',
                    'id' => 'command',
                    'name' => 'command',
                    'description' => 'The command of the program',
                    'placeholder' => 'Enter a command for this program',
                    'value' => $program->command ?? ''
                ])

                <button type="submit" class="btn btn-success">Save changes</button>
            </form>
        </div><!-- End col -->
    </div><!-- End row -->

@endsection