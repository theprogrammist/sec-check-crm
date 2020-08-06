<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'number'=>'required',
            'title'=>'required',
            'contact_name'=>'required',
            'contact_phone'=>'required'
        ]);

        $order = new Order([
            'number' => $request->get('number'),
            'accepted_at' => $request->get('accepted_at'),
            'title' => $request->get('title'),
            'text' => $request->get('text'),
            'contact_name' => $request->get('contact_name'),
            'contact_phone' => $request->get('contact_phone'),
            'ati' => $request->get('ati')
        ]);
        $order->save();
        return redirect('/orders')->with('success', 'Заявка сохранена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        die($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('orders.edit', compact('order'));
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
        $request->validate([
            'number'=>'required',
            'title'=>'required',
            'contact_name'=>'required',
            'contact_phone'=>'required'
        ]);

        $order = Order::find($id);
        $order->number =  $request->get('number');
        $order->accepted_at = $request->get('accepted_at');
        $order->title = $request->get('title');
        $order->text = $request->get('text');
        $order->contact_name = $request->get('contact_name');
        $order->contact_phone = $request->get('contact_phone');
        $order->ati = $request->get('ati');
        $order->save();

        return redirect('/orders')->with('success', 'Заявка изменена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();

        return redirect('/orders')->with('success', 'Заявка удалена!');
    }
}
