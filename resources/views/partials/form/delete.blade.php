<form action="{{ $action }}" method="post">
    {{ csrf_field() }}

    <input type="hidden" name="_method" value="delete">

    <button
            v-on:click="confirmAndSubmit($event)"
            data-confirm="{{ $confirm }}"
            type="button"
            class="btn btn-sm btn-danger float-right">Delete</button>
</form>