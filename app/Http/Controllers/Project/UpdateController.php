<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectUpdate;
use Illuminate\Http\Request;

class UpdateController extends Controller {
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Project  $project
   * @return \Illuminate\Http\Response
   */
  public function store(
    Request $request,
    Project $project
  ) {
    $project->updates()->create([
      'task_id' => $request->task_id,
      'creator_id' => Auth::id(),
      'message' => $request->message,
    ]);

    return redirect()->back()->with([
      'success' => 'Comment added',
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ProjectUpdate  $projectUpdate
   * @return \Illuminate\Http\Response
   */
  public function update(
    Request $request,
    ProjectUpdate $projectUpdate
  ) {
    $projectUpdate->update([
      'message' => $request->message,
    ]);

    return redirect()->back()->with([
      'success' => 'Comment updated',
    ]);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ProjectUpdate  $projectUpdate
   * @return \Illuminate\Http\Response
   */
  public function destroy(ProjectUpdate $projectUpdate) {
    $projectUpdate->delete();

    return redirect()->back()->with([
      'success' => 'Update Deleted',
    ]);
  }
}
