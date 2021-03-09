<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\CreateNewUser;
use App\Exceptions\PermissionDeniedException;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Area;
use App\Models\Equipment;
use App\Models\Service;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Redirect;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    protected string $module = "users";

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request) : Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view("pages.{$this->module}.index")
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws PermissionDeniedException
     */
    public function list(Request $request) : JsonResponse{

        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        try {
            return DataTables::of(User::query()
                ->select([
                    'users.id',
                    'users.name',
                    'users.email'
                ]))
                ->addColumn('actions', function ($equipment) {
                    return '';
                })
                ->rawColumns(['actions'])
                ->make(true);
        } catch (Exception $e) {
            return response()->json([]);
        }
    }

    /**
     * Displays user creation form
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function create(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'manage', $this->module);

        return response(
            view('pages.' . $this->module . '.add')
            ->with('servicesList', Service::all()->pluck('name','id')->prepend(''))
            ->with('rolesList', Role::all()->pluck('name','name')->prepend(''))
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param User $user
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request , User $user): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        return response(
            view("pages.{$this->module}.edit")
                ->with(Str::singular($this->module), $user)
                ->with('servicesList', Service::all()->pluck('name','id')->prepend(''))
                ->with('rolesList', Role::all()->pluck('name','name')->prepend(''))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateEquipmentRequest $request
     * @param Equipment $equipment
     * @return Application|RedirectResponse|Response|Redirector
     * @throws FileDoesNotExist
     * @throws PermissionDeniedException
     */
    public function update(UpdateEquipmentRequest $request, User $user)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);


    }

    /**
     * Validates and creates user based on Fortify Actions
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request){
        $newUserAction = new CreateNewUser();
        $user = $newUserAction->create($request->all());
        $user->assignRole([$request->get('role_id')]);
        return redirect('users')->with('user', $user);
    }
}
