@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">ORDER</div>
                                <form action="{{ route('order.store')}}"method="POST">
                                    @csrf
                                    <div id="food-fields-container">
                                        <div class="px-4 py-2 bg-white sm:p-6">
                                            <label for="menu_id" class="block font-medium text-sm text-gray-700">MENU</label>
                                            <select name="menu_id" id="menu_id" class="form-control">
                                                @foreach($menus as $menu)
                                                    <option value="{{ $menu->id }}">{{$menu->name . ' (' . $menu->price .') ' . $menu->canteens->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="px-4 py-2 bg-white sm:p-6">
                                            <label for="quantity">Quantity</label>
                                            <input type="number" class="form-control" name="quantity[]" required>
                                        </div>
                                    </div>

                                    <div style="text-align: center;">
                                        <button class="justify-content-center" type="submit">Submit</button>
                                    </div>
                                </form>
                            </div>
                            <!-- order-form.blade.php -->
                            <div style="margin: 50px 0px 50px 0px" class="d-flex justify-content-center padding-bottom">
                                <a href="{{url('/total')}}" >
                                    <button type="button" class="btn btn-warning">SHOPPING CART</button>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
