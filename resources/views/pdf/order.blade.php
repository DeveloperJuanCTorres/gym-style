<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        .total {
            text-align: right;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <h1>Detalle de Pedido</h1>


    <h3>
        Pedido: {{ $order->order_number }}
    </h3>


    <p>
        Cliente:
        {{ $order->first_name }}
        {{ $order->last_name }}
    </p>


    <p>
        Email:
        {{ $order->email }}
    </p>


    <p>
        Teléfono:
        {{ $order->phone }}
    </p>


    <table>

        <thead>

            <tr>
                <th>Producto</th>
                <th>Color</th>
                <th>Talla</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Total</th>
            </tr>

        </thead>


        <tbody>

            @foreach($order->items as $item)

            <tr>

                <td>
                    {{ $item->product_name }}
                </td>

                <td>
                    {{ $item->color }}
                </td>

                <td>
                    {{ $item->size }}
                </td>

                <td>
                    {{ $item->quantity }}
                </td>

                <td>
                    S/ {{ number_format($item->price,2) }}
                </td>


                <td>
                    S/ {{ number_format($item->subtotal,2) }}
                </td>


            </tr>

            @endforeach


        </tbody>


    </table>


    <div class="total">

        Total:
        S/ {{ number_format($order->total,2) }}

    </div>


</body>

</html>