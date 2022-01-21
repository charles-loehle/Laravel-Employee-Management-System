<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::latest()->get();

        return view("admin.leave.index", compact("leaves"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $leaves = Leave::latest()
            ->where("user_id", auth()->user()->id)
            ->get();

        return view("admin.leave.create", compact("leaves"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "from" => "required",
            "to" => "required",
            "description" => "required",
            "type" => "required",
        ]);

        // get all request data from form
        $data = $request->all();
        $data["user_id"] = auth()->user()->id;
        $data["message"] = "";
        $data["status"] = 0;

        // create a new leave object with all the data
        Leave::create($data);

        return redirect()
            ->back()
            ->with("message", "Leave created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);

        return view("admin.leave.edit", compact("leave"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "from" => "required",
            "to" => "required",
            "description" => "required",
            "type" => "required",
        ]);

        // get all request data from form
        $data = $request->all();
        // find a leave by id
        $leave = Leave::find($id);
        $data["user_id"] = auth()->user()->id;
        $data["message"] = "";
        $data["status"] = 0;

        // update single leave object by id
        $leave->update($data);

        return redirect()
            ->route("leaves.create")
            ->with("message", "Leave updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // find a leave by id and delete
        Leave::find($id)->delete();

        return redirect()
            ->route("leaves.create")
            ->with("message", "Leave request deleted");
    }

    public function acceptReject(Request $request, $id)
    {
        $status = $request->status;
        $message = $request->message;
        $leave = Leave::find($id);

        $leave->update(["status" => $status, "message" => $message]);

        return redirect()
            ->route("leaves.index")
            ->with("message", "Leave request processed");
    }
}
