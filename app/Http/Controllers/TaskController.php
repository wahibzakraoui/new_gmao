<?php

namespace App\Http\Controllers;

use App\Exceptions\PermissionDeniedException;
use App\Http\Requests\CreateGamutRequest;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Gamut;
use App\Models\Task;
use http\Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Str;

class TaskController extends Controller
{
    private string $module = "tasks";

    /**
     * Update the specified resource in storage.
     *
     * @param CreateTaskRequest $request
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function store(CreateTaskRequest $request)
    {
        /* User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        /* User does have permission */
        $request->validated();
        if(Task::create(
            [
                'label' => $request->get('label'),
                'description' => $request->get('description'),
                'quality' => $request->get('quality'),
                'quantity' => $request->get('quantity'),
                'gamut_id' => $request->get('gamut_id'),
            ]
        ))
        {
            return redirect('gamuts/show/' . $request->get('gamut_id'))->with('success', 'Gamut created successfully!');
        }
        return redirect('gamuts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param Task $task
     * @return RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     * @throws \Exception
     */
    public function destroy(Request $request, Task $task)
    {
        $this->checkPerms($request,'delete', $this->module);

        if($task->delete()){
            return redirect('gamuts/show/' . $task->id)->with('deleted', true)->with('success', 'Task deleted successfully!');
        }
        return redirect('gamuts');
    }
}
