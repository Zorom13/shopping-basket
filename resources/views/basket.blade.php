@extends('layout')
@section('title', 'Cart')
@section('content')
    <table id="basket" class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Item</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            <?php $total = 0; ?>
            @if (session('basket'))
                @foreach (session('basket') as $id => $infos)
                    <?php $total += $infos['price'] * $infos['item_qty']; ?>
                    <tr>
                        <td data-th="Item">
                            <div class="row">
                                <div class="col-sm-3 hidden-xs"><img src="{{ $infos['item_img'] }}" width="100"
                                        height="100" class="img-responsive" /></div>
                                <div class="col-sm-9">
                                    <h4 class="nomargin">{{ $infos['name'] }}</h4>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">${{ $infos['price'] }}</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $infos['item_qty'] }}" class="form-control item_qty" />
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $infos['price'] * $infos['item_qty'] }}</td>
                        <td class="actions" data-th="">
                            <button class="btn btn-info btn-sm update-basket" data-id="{{ $id }}"><i
                                    class="fa fa-refresh"></i></button>
                            <button class="btn btn-danger btn-sm remove-from-basket" data-id="{{ $id }}"><i
                                    class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
        <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total {{ $total }}</strong></td>
            </tr>
            <tr>
                <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue
                        Shopping</a></td>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total ${{ $total }}</strong></td>
            </tr>
        </tfoot>
    </table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".update-basket").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: '{{ url('update-basket') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id"),
                    item_qty: ele.parents("tr").find(".item_qty").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });
        $(".remove-from-basket").click(function(e) {
            e.preventDefault();
            var ele = $(this);
            if (confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-basket') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
