<?php

namespace App\Http\Controllers;

use App\Models\Environment;
use Illuminate\Http\Request;

class EnvironmentsController extends Controller
{
    /**
     * The paginated index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $environments = Environment::paginate(5);

        return view('environments', [
            'environments' => $environments,
        ]);
    }

    /**
     * The create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('environments/form');
    }

    /**
     * Creates a new environment
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $environment = Environment::create($request->all());

        if ($environment) {
            flash()->success('Created ' . $environment->name);
        } else {
            flash()->error('Unable to create ' . $request->get('name'));
        }


        return redirect('environments');
    }

    /**
     * The edit page
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $environment = Environment::where('id', $id)->firstOrFail();

        return view('environments/form', [
            'title' => 'Edit environment: ' . $environment->name,
            'environment' => $environment,
        ]);
    }

    /**
     * Save changes to an environment
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save($id, Request $request)
    {
        $environment = Environment::where('id', $id)->firstOrFail();

        if ($environment->update($request->all())) {
            flash()->success('Saved changes to ' . $environment->name);
        }

        return redirect('environments/' . $id . '/edit');
    }

    /**
     * Will delete an environment
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $environment = Environment::where('id', $id)->firstOrFail();

        if ($environment->delete()) {
            flash()->success('Deleted ' . $environment->name);
        } else {
            flash()->error('Unable to delete ' . $environment->name);
        }

        return redirect('environments');
    }
}
