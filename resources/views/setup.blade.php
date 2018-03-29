@extends('layout')

@section('content')
    <ol>
        <li>Make sure you have at least supervisord 3.3.0 installed on the target server</li>
        <li>Setup SSH between us and your server, put your public key in the authorized_keys of the root user</li>
    </ol>

    <h2>Install this ssh key on the target servers</h2>

    <pre><code>{{ $publicKey }}</code></pre>

    <h3>Setup your servers...</h3>
@endsection