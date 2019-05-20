<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\Order\OrderService;
use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Status\StatusRepository;
use App\Repositories\Product\ProductRepository;

class OrderController extends Controller
{

    private $orderService;

    private $orderRepository;

    private $statusRepository;

    private $productRepository;

    public function __construct(
        OrderService $orderService,
        OrderRepository $orderRepository,
        StatusRepository $statusRepository,
        ProductRepository $productRepository
    ) {
		$this->middleware(['auth', 'admin']);
        $this->orderService = $orderService;
        $this->orderRepository = $orderRepository;
        $this->statusRepository = $statusRepository;
        $this->productRepository = $productRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = $this->orderRepository->getPaginated();
        $products = $this->productRepository
            ->getAll()
            ->pluck('name', 'id');

        return view('admin.order.list', [
            'orders' => $orders,
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $statuses = $this->statusRepository
            ->getAll()
            ->pluck('name', 'id');
        $products = $this->productRepository
            ->getAll()
            ->pluck('name', 'id');

        return view('admin.order.create',
            [
                'statuses' => $statuses,
                'products' => $products
            ]
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->orderService->addByAdmin($request->all());
        return redirect('/admin/order');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = $this->orderRepository->getById($id);
        $orderItems = $this->orderRepository->getOrderItems($id);

        $statuses = $this->statusRepository
            ->getAll()
            ->pluck('name', 'id');
        $products = $this->productRepository
            ->getAll()
            ->whereNotIn('id', $orderItems->pluck('product_id'))
            ->pluck('name', 'id');

        return view('admin.order.edit',
            compact("order", "orderItems", "statuses", "products")
        );
    }


    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->orderService->update($id, $request->all());
        return redirect('/admin/order');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->orderService->destroy($id);
        return redirect('/admin/order');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function orderItemsList(Request $request)
    {
        $orderId = $request["order_id"] ?? null;

        $preparedProductsList = $this->prepareProductList($request);
        $order = $this->orderService->make($orderId, $preparedProductsList);

        $dataToResponse = [
            'order_items' => view('admin.order.edit.form_order', ['orderItems' => $order->orderItems])->render(),
            'order' => view('admin.order.order_information', ['order' => $order])->render()
        ];

        return response()->json($dataToResponse);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function prepareProductList(Request $request): array
    {
        $preparedProductsList = [];

        foreach ($request->get('products') as $product) {
            $productId = $product["product_id"];
            $quantity = $product["quantity"];
            $preparedProductsList[$productId] = $quantity;
        }
        return $preparedProductsList;
    }
}
