<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{
    // Controller Project index
    public function index()
    {
        $judul = 'Project';
        $projects = DB::table("tb_m_project as a")
        ->join("tb_m_client", function ($join) {
                $join->on("a.client_id", "=", "tb_m_client.client_id");
            })
            ->select("a.project_id", "a.project_name", "tb_m_client.client_name", "a.project_start", "a.project_end", "a.Project_status")
            ->get();

            return view('project.index', compact('projects', 'judul'));
        }
        
        // function searhcing and filtering
        public function search(Request $request)
        {
            if ($request->ajax()) {
                $output = "";
                $project = DB::table('tb_m_project')->where('title', 'LIKE', '%' . $request->search . "%")->get();
                if ($project) {
                    foreach ($project as $key => $p) {
                        $output .= '<tr>' .
                        '<td>' . $p->id . '</td>' .
                        '<td>' . $p->project_name . '</td>' .
                        '<td>' . $p->client_id . '</td>' .
                        '<td>' . $p->Project_status . '</td>' .
                        '</tr>';
                    }
                    return Response($output);
                }
            }
        }
        

    // function view edit
    public function add()
    {
        $projects = DB::table("tb_m_project")->get();
        $judul = 'Project';
        $subjudul = 'Tambah Project';
        return view('project.createedit', compact('judul', 'subjudul', 'projects'));
    }

    // function store to database from add
    public function store(Request $request)
    {
        $projectstore = projectModel::create($request->all());
    }
    // function view edit
    public function edit()
    {
        $judul = 'Project';
        $subjudul = 'Edit Project';
        $projects = DB::table('tb_m_project')->get();
        return view('project.createedit', compact('projects', 'judul', 'subjudul'));
    }

    // function update data
    public function update()
    {
        return redirect()->route('project.index')
        ->with('success','Product updated successfully.');
    }

    // delete data by Id
    public function destroy($id)
    {
        $project = projectModel::find($id);
        $project->delete();
        return redirect()->back();
    }


    public function deleteAll (Request $request)
    {
        $ids = $request->ids;
        projectModel::whereIn('id',explode(",",$ids))->delete();
    }
}
