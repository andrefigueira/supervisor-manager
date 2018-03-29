<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    /**
     * The paginated index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $programs = Program::paginate(5);

        return view('programs', [
            'programs' => $programs,
        ]);
    }

    /**
     * The create page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('programs/form');
    }

    /**
     * Creates a new program
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $program = Program::create($request->all());

        if ($program) {
            flash()->success('Created ' . $program->name);
        } else {
            flash()->error('Unable to create ' . $request->get('name'));
        }


        return redirect('programs');
    }

    /**
     * The edit page
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $program = Program::where('id', $id)->firstOrFail();

        return view('programs/form', [
            'title' => 'Edit Program: ' . $program->name,
            'program' => $program,
        ]);
    }

    /**
     * Save changes to an Program
     *
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save($id, Request $request)
    {
        $program = Program::where('id', $id)->firstOrFail();

        if ($program->update($request->all())) {
            flash()->success('Saved changes to ' . $program->name);
        }

        return redirect('programs/' . $id . '/edit');
    }

    /**
     * Will delete an Program
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $program = Program::where('id', $id)->firstOrFail();

        if ($program->delete()) {
            flash()->success('Deleted ' . $program->name);
        } else {
            flash()->error('Unable to delete ' . $program->name);
        }

        return redirect('programs');
    }
}
