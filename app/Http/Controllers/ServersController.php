<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;

class ServersController extends Controller
{
    /**
     * The paginated index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $servers = Server::paginate(5);

        return view('servers', [
            'servers' => $servers,
        ]);
    }

    /**
     * The create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('servers/form');
    }

    /**
     * Creates a new server
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $server = Server::create($request->all());

        if ($server) {
            flash()->success('Created ' . $server->name);
        } else {
            flash()->error('Unable to create ' . $request->get('name'));
        }


        return redirect('servers');
    }

    /**
     * The edit page
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $server = Server::where('id', $id)->firstOrFail();

        return view('servers/form', [
            'title' => 'Edit Server: ' . $server->name,
            'server' => $server,
        ]);
    }

    /**
     * Save changes to an Server
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save($id, Request $request)
    {
        $server = Server::where('id', $id)->firstOrFail();

        if ($server->update($request->all())) {
            flash()->success('Saved changes to ' . $server->name);
        }

        return redirect('servers/' . $id . '/edit');
    }

    /**
     * Will delete an Server
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $server = Server::where('id', $id)->firstOrFail();

        if ($server->delete()) {
            flash()->success('Deleted ' . $server->name);
        } else {
            flash()->error('Unable to delete ' . $server->name);
        }

        return redirect('servers');
    }
}
