<?php

namespace App\Http\Controllers;

use App\Actions\Kerp\Purchases\CreateNewPurchase;
use App\Exceptions\PermissionDeniedException;
use App\Http\Requests\ApprovePurchaseRequest;
use App\Http\Requests\CreatePurchaseRequest;
use App\Models\Area;
use App\Models\Buyable;
use App\Models\Purchase;
use App\Models\Quotation;
use App\Models\Supplier;
use App\Models\WorkOrder;
use App\Services\InvoicingService;
use App\Services\PurchaseService;
use App\Services\QuotationService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Spatie\ModelStates\Exceptions\CouldNotPerformTransition;
use Throwable;
use Yajra\DataTables\Facades\DataTables;

class PurchaseController extends Controller
{
    private string $module = "purchases";

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function index(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view("pages.{$this->module}.index")
        );
    }

    /**
     * Display a listing of pending purchases.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function pending(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'review', $this->module);

        return response(
            view("pages.{$this->module}.pending")
        );
    }

    /**
     * Display a listing of pending purchases.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function consulting(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'consult', $this->module);

        return response(
            view("pages.{$this->module}.consulting")
        );
    }

    /**
     * Display a listing of Ordered purchases.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function pending_delivery(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'consult', $this->module);

        return response(
            view("pages.{$this->module}.ordered")
        );
    }

    /**
     * Display a listing of Ordered purchases.
     *
     * @param Request $request
     * @return Response
     * @throws PermissionDeniedException
     */
    public function archived(Request $request): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'view', $this->module);

        return response(
            view("pages.{$this->module}.fulfilled")
        );
    }

    /**
     * Display a listing of confirmed purchases.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function list(): JsonResponse
    {
        // Casting state and fulfillment state types to string - important - due to bug in yajra datatables
        $q = Purchase::where('state', '=', 'confirmed')
            ->with('user')
            ->with('reviewer')
            ->with('quotations')
            ->with('service')
            ->withCasts(['state' => 'string', 'fulfillment' => 'string']);

        return DataTables::of($q)
            ->addColumn('consultations', function ($purchase) {
                return $purchase->quotations->count() ?? 0;
            })
            ->addColumn('actions', function ($purchase) {
                return View::make("pages.{$this->module}.datatables.actions")->with('purchase', $purchase)->render();
            })
            ->rawColumns(['actions', 'areaCodes'])
            ->toJson();
    }

    /**
     * Display a listing of pending purchases.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function list_pending(): JsonResponse
    {
        // Casting state and fulfillment state types to string - important - due to bug in yajra datatables
        $q = Purchase::where('state', '=', 'pending')
            ->with('user')
            ->with('service')
            ->withCasts(['state' => 'string', 'fulfillment' => 'string']);

        return DataTables::of($q)
            ->addColumn('actions', function ($purchase) {
                return View::make("pages.{$this->module}.datatables.actions")->with('purchase', $purchase)->render();
            })
            ->rawColumns(['actions', 'areaCodes'])
            ->toJson();
    }

    /**
     * Display a listing of pending purchases.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function list_consulting(): JsonResponse
    {
        // Casting state and fulfillment state types to string - important - due to bug in yajra datatables
        $q = Purchase::where('state', '=', 'consulting')
            ->with('user')
            ->with('reviewer')
            ->with('service')
            ->with('quotations')
            ->withCasts(['state' => 'string', 'fulfillment' => 'string']);

        return DataTables::of($q)
            ->addColumn('consultations', function ($purchase) {
                return $purchase->quotations->count() ?? 0;
            })
            ->addColumn('actions', function ($purchase) {
                return View::make("pages.{$this->module}.datatables.actions")->with('purchase', $purchase)->render();
            })
            ->rawColumns(['actions', 'areaCodes'])
            ->toJson();
    }

    /**
     * Display a listing of pending purchases.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function list_pending_delivery(): JsonResponse
    {
        // Casting state and fulfillment state types to string - important - due to bug in yajra datatables
        $q = Purchase::where('state', '=', 'ordered')
            ->with('user')
            ->with('reviewer')
            ->with('service')
            ->with('supplier')
            ->withCasts(['state' => 'string', 'fulfillment' => 'string']);

        return DataTables::of($q)
            ->addColumn('actions', function ($purchase) {
                return View::make("pages.{$this->module}.datatables.actions")->with('purchase', $purchase)->render();
            })
            ->rawColumns(['actions', 'areaCodes'])
            ->toJson();
    }

    /**
     * Display a listing of archived purchases.
     *
     * @return JsonResponse
     * @throws Exception
     */
    public function list_archived(): JsonResponse
    {
        // Casting state and fulfillment state types to string - important - due to bug in yajra datatables
        $q = Purchase::where('state', '=', 'fulfilled')
            ->with('user')
            ->with('reviewer')
            ->with('service')
            ->with('supplier')
            ->withCasts(['state' => 'string', 'fulfillment' => 'string']);

        return DataTables::of($q)
            ->addColumn('actions', function ($purchase) {
                return '';
            })
            ->rawColumns(['actions', 'areaCodes'])
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param WorkOrder $workOrder
     * @return Application|RedirectResponse|Response|Redirector
     * @throws PermissionDeniedException
     */
    public function create(Request $request, WorkOrder $workOrder)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);

        if($workOrder->purchase){
            return redirect('work_orders')->with('success', 'WO Already has a purchase!');
        }
        return response(
            view("pages.{$this->module}.add")
                ->with('workOrder', $workOrder)
                ->with('buyablesList', Buyable::getList())
                ->with('areasList', Area::all()->pluck('name', 'id'))
        );
    }

    /**
     * Show the form for creating a quotation.
     *
     * @param Request $request
     * @param Purchase $purchase
     * @return Response
     * @throws PermissionDeniedException
     */
    public function create_quotation(Request $request, Purchase $purchase): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'consult', $this->module);

        return response(
            view("pages.{$this->module}.quotation")
                ->with('suppliersList', Supplier::all()->pluck('name', 'id'))
                ->with('purchase', $purchase)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatePurchaseRequest $request
     * @return RedirectResponse
     * @throws PermissionDeniedException
     */
    public function store(CreatePurchaseRequest $request): RedirectResponse
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'create', $this->module);
        $purchase = CreateNewPurchase::create($request);
        if ($purchase) {
            return redirect('purchases/pending')->with('success', 'Purchase was created successfully.');
        }
        return redirect()->back();
    }

    /**
     * Store approval in storage.
     *
     * @param ApprovePurchaseRequest $request
     * @param Purchase $purchase
     * @return RedirectResponse
     * @throws CouldNotPerformTransition
     * @throws PermissionDeniedException
     * @noinspection PhpUndefinedFieldInspection
     */
    public function store_approval(ApprovePurchaseRequest $request, Purchase $purchase): RedirectResponse
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'review', $this->module);
        $request->validated();
        if ($request->filled('state') && $purchase->state->transitionTo($request->get('state'))) {
            $purchase->update([
                'reviewed_by' => Auth()->user()->id,
                'review_date' => now(),
                'review_reason' => $request->get('review_reason'),
            ]);
            if($purchase->work_order_id){
                $workOrder = WorkOrder::find($purchase->work_order_id);
                $workOrder->status_code->transitionTo('60-WMA');
            }
            return redirect('purchases');
        }
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Purchase $purchase
     * @return Application|RedirectResponse|Response|Redirector
     * @throws CouldNotPerformTransition
     * @throws PermissionDeniedException
     * @todo validation
     * @todo clean up this mess of a file
     * @todo add uuid
     * @todo implement good practices - whole file
     * @noinspection PhpMethodParametersCountMismatchInspection
     */
    public function store_quotation(Request $request, Purchase $purchase)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'consult', $this->module);
        $quotation = Quotation::create([
            'purchase_id' => $purchase->id,
            'supplier_id' => $request->get('supplier_id'),
            'quotation_reference' => $request->get('quotation_reference'),
            'expected_delivery_date' => $request->get('should_be_available_by'),
            'number_of_items' => count($request->get('quantities')),
            'transportation_fees_in_cents' => $request->get('transportation_fees_in_cents') * 100,
            'importation_fees_in_cents' => $request->get('importation_fees_in_cents') * 100,
            'discounted_amount_in_cents' => $request->get('discounted_amount_in_cents') * 100,
            'created_by' => Auth()->user()->id,
            'state' => 'quoted',
        ]);
        if ($quotation) {
            foreach ($request->get('items') as $key => $item) {
                $quotation->buyables()->attach($item, ['quantity_ordered' => $request->get('quantities')[$key], 'unit_price_in_cents' => $request->get('prices')[$key] * 100]);
            }
            $quotationService = new QuotationService($quotation);
            $quotationService->syncPricing();
            $purchase->state->getValue() !== 'consulting' && $purchase->state->transitionTo('consulting');
            return redirect('purchases/consulting')->with('success', 'Quotation was added to your purchase');
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param Purchase $purchase
     * @return Response|RedirectResponse
     */
    public function show(Purchase $purchase)
    {
        if($purchase->state->getValue() === "pending"){
            return redirect('purchases/pending');
        }

        $state = $purchase->state->getValue();

        if( $state === "confirmed" || $state === "consulting" ){
            $invoicingService = new InvoicingService($purchase);
            $invoice = $invoicingService->getPurchaseRequestPDF();

        }
        if($purchase->state->getValue() === "ordered"){
            $invoicingService = new InvoicingService($purchase);
            $invoice = $invoicingService->getPurchaseOrderPDF();
        }
    }

    /**
     * @param Request $request
     * @param Quotation $quotation
     * @return RedirectResponse
     * @throws PermissionDeniedException
     */
    public function select_quotation(Request $request, Quotation $quotation): RedirectResponse
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'consult', $this->module);

        $PurchaseService = new PurchaseService($quotation);
        if ($PurchaseService->setSelected()) {
            if($quotation->purchase->work_order_id){
                $workOrder = WorkOrder::find($quotation->purchase->work_order_id);
                $workOrder->status_code->transitionTo('62-WMA');
            }
            return redirect()->back()->with('message', 'Quotation selected successfully.');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Purchase $purchase
     * @return Response
     * @throws PermissionDeniedException
     */
    public function edit(Request $request, Purchase $purchase): Response
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'edit', $this->module);

        return response(
            view("pages.{$this->module}.edit-forms.edit")
                ->with('purchase', $purchase)
                ->with('states', $purchase->state->transitionableStates())
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Purchase $purchase
     * @return Response|RedirectResponse
     * @throws PermissionDeniedException
     */
    public function approve(Request $request, Purchase $purchase)
    {
        /* check if User does not have permission */
        $this->checkPerms($request, 'review', $this->module);
        if ($purchase->state->getValue() === "confirmed") {
            return redirect()->back()->with('success', 'Purchase was already approved.');
        }
        return response(
            view("pages.{$this->module}.edit-forms.approve")
                ->with('purchase', $purchase)
                ->with('states', $purchase->state->transitionableStates())
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreatePurchaseRequest $request
     * @param Purchase $purchase
     * @return Response
     */
    public function update(CreatePurchaseRequest $request, Purchase $purchase): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Purchase $purchase
     * @return RedirectResponse|Response|Redirector
     * @throws Exception
     * @throws Throwable
     */
    public function destroy(Purchase $purchase)
    {
        /** Since purchase operations are run by many people; we added retries to avoid deadlocks
         * Also, the use of Transactions is to ensure the referential integrity of the purchase data
         * These choices did not come easy, do not remove in the future.
         */
        try {
            DB::transaction(function () use ($purchase){
                $purchase->buyables()->detach();
                $purchase->delete();
            }, 5);
        }catch (Throwable $exception){
            return redirect()->back();
        }
        return redirect()->back()->with('success', 'Purchase was deleted.');
    }

    /**
     * Remove the specified quotation from storage.
     *
     * @param Quotation $quotation
     * @return RedirectResponse|Response|Redirector
     * @throws Exception
     */
    public function destroy_quotation(Quotation $quotation)
    {
        /** Since purchase operations are run by many people; we added retries to avoid deadlocks
         * Also, the use of Transactions is to ensure the referential integrity of the purchase data
         * These choices did not come easy, do not remove in the future.
         */
        try {

            DB::transaction(function () use ($quotation){
                $quotation->buyables()->detach();
                $quotation->delete();
            }, 5);

        }catch (Throwable $e) {
            return redirect()->back();
        }
        return redirect()->back()->with('success', 'Purchase was deleted.');
    }
}
