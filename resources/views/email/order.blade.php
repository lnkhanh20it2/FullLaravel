<h2>Hi{{$c_name}}</h2>
<p>
    <b>You ordered success !!</b>
</p>
<h4>Information bill you order</h4>
<h4>ID:{{$order->id}}</h4>
<h4>Date order:{{$order->order_date}}</h4>

<table border="1" cellspacing="0" cellpadding="10" width="400">
    <thead>
        <tr>
            <th class="product-name">Product</th>
            <th class="product-price">Price</th>
            <th class="product-subtotal">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 1; ?>
        @foreach ($items as $key =>$item)
        <tr>
            <td class="product-name"><a href="#">{{$item['name']}}</a></td>
            <td class="product-price"><span class="amount">{{$item['price']}}.000VND</span></td>
            <td class="product-subtotal">{{$item['price']*$item['quantity']}}.000VND
            </td>
        </tr>
        <?php $n++ ?>
        @endforeach
    </tbody>
</table>