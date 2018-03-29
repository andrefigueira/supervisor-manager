@extends('layout')

@section('content')
    @include('partials/page-title', [
        'title' => $title ?? 'Create Environment',
    ])

    <div class="row">
        <div class="col-md-6">
            <form action="{{ isset($environment->id) ? url('environments/' . $environment->id . '/save') : url('environments/store') }}" method="post">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="post">

                @include('partials/form/input', [
                    'label' => 'Name',
                    'id' => 'name',
                    'name' => 'name',
                    'description' => 'This will be used to identify which environment you are in',
                    'placeholder' => 'Enter a name for this environment',
                    'value' => $environment->name ?? ''
                ])

                @include('partials/form/input', [
                    'label' => 'Description',
                    'id' => 'description',
                    'name' => 'description',
                    'description' => 'The description of the environment',
                    'placeholder' => 'Enter a description for this environment',
                    'value' => $environment->description ?? ''
                ])

                <button type="submit" class="btn btn-success">Save changes</button>
            </form>
        </div><!-- End col -->
    </div><!-- End row -->

@endsection