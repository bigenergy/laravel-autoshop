<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Status;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Status\StatusRepository;
use App\Services\Order\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * @var OrderService
     */
    private $orderService;
    /**
     * @var OrderRepository
     */
    private $orderRepository;
    /**
     * @var StatusRepository
     */
    private $statusRepository;

    public function __construct(OrderService $orderService, OrderRepository $orderRepository, StatusRepository $statusRepository)
    {
        $this->middleware('admin');
        $this->orderService = $orderService;
        $this->orderRepository = $orderRepository;
        $this->statusRepository = $statusRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderShowList = $this->orderService->orderRepository->getPaginated(['status']);

        return view('admin.order.list', ['orderShowList' => $orderShowList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $orderForEdit = $this->orderService->orderRepository->getById($id);
        $status = Status::all();
        $orderItem = OrderItem::all();

        return view('admin.order.edit', [
            'orderForEdit' => $orderForEdit,
            'status' => $status,
            'orderItem' => $orderItem
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
