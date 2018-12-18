<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use App\Services\Cart\CartService;
use Illuminate\Http\Request;
use App\Services\Order\OrderService;
use App\Http\Controllers\Controller;
use App\Services\Order\OrderItemService;
use App\Services\Product\ProductService;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Status\StatusRepository;

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

    /**
     * @var ProductService
     */
    private $productService;

    /**
     * @var OrderItemService
     */
    private $orderItemService;
    /**
     * @var CartService
     */
    private $cartService;

    /**
     * OrderController constructor.
     * @param OrderService $orderService
     * @param OrderRepository $orderRepository
     * @param StatusRepository $statusRepository
     * @param OrderItemService $orderItemService
     * @param ProductService $productService
     * @param CartService $cartService
     */
    public function __construct(
        OrderService $orderService,
        OrderRepository $orderRepository,
        StatusRepository $statusRepository,
        OrderItemService $orderItemService,
        ProductService $productService,
        CartService $cartService
    ) {
        $this->middleware('admin');
        $this->orderService = $orderService;
        $this->orderRepository = $orderRepository;
        $this->statusRepository = $statusRepository;
        $this->productService = $productService;
        $this->orderItemService = $orderItemService;
        $this->cartService = $cartService;
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
        $products = $this->productService->repository->getPaginated(['categories', 'brand']);
        $statuses = $this->statusRepository->getPaginated();

        return view('admin.order.create',compact('statuses', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     * @throws \Exception
     */
    public function store(Request $request)
    {
        $this->cartService->store($request->all());

        return view('admin.order.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderForEdit = $this->orderService->orderRepository->getById2(['orderItems'],$id);
        $products = $this->productService->repository->getPaginated(['categories', 'brand']);

        return view('admin.order.edit',compact('orderForEdit', 'products'));
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
        $attributes = $request->all();
        $this->orderService->update($id, $attributes);

        return redirect()->route('order.edit', $id)->with('status', 'Заказ сохранен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return bool
     */
    public function destroy(Request $request)
    {
        $this->orderService->destroy($request->get('id'));
        return redirect()->route('order.index')->with('status', 'Заказ удален');
    }

    /**
     * Returns order info
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function orderInfo(Request $request)
    {
        $orderItems = $this->orderItemService->generate($request->get('products'));

        return response()->json([
            'order_items' => view('admin.order.partials.order_items', compact('orderItems'))->render()
        ]);
    }
}
