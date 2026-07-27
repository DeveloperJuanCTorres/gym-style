<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Nueva Solicitud de Producto</title>

</head>

<body style="margin:0;padding:0;background:#f5f7fb;font-family:Arial,Helvetica,sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f7fb;padding:40px 0;">

<tr>

<td align="center">

<table width="700" cellpadding="0" cellspacing="0"
       style="background:#ffffff;border-radius:14px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);">

    <!-- HEADER -->

    <tr>

        <td
            style="
                background:linear-gradient(135deg,#1f2937,#111827);
                padding:35px;
                text-align:center;
            ">

            <h1 style="margin:0;color:#fff;font-size:28px;">

                📦 Nueva Solicitud de Producto

            </h1>

            <p style="margin-top:12px;color:#d1d5db;font-size:15px;">

                Un cliente está interesado en un producto que no encontró en la tienda.

            </p>

        </td>

    </tr>



    <!-- CLIENTE -->

    <tr>

        <td style="padding:35px;">

            <h2 style="margin:0 0 25px;color:#111827;">

                👤 Información del Cliente

            </h2>

            <table width="100%" cellpadding="12" cellspacing="0"
                   style="border:1px solid #e5e7eb;border-radius:10px;">

                <tr>

                    <td width="35%"
                        style="background:#f9fafb;font-weight:bold;">

                        Nombres

                    </td>

                    <td>

                        {{ $request->first_name }}

                    </td>

                </tr>

                <tr>

                    <td
                        style="background:#f9fafb;font-weight:bold;">

                        Apellidos

                    </td>

                    <td>

                        {{ $request->last_name }}

                    </td>

                </tr>

                <tr>

                    <td
                        style="background:#f9fafb;font-weight:bold;">

                        Correo

                    </td>

                    <td>

                        <a href="mailto:{{ $request->email }}">

                            {{ $request->email }}

                        </a>

                    </td>

                </tr>

                <tr>

                    <td
                        style="background:#f9fafb;font-weight:bold;">

                        Celular

                    </td>

                    <td>

                        {{ $request->phone }}

                    </td>

                </tr>

            </table>

        </td>

    </tr>



    <!-- PRODUCTO -->

    <tr>

        <td style="padding:0 35px 35px;">

            <h2 style="margin-bottom:25px;color:#111827;">

                🛍 Producto Solicitado

            </h2>

            <table width="100%" cellpadding="12" cellspacing="0"
                   style="border:1px solid #e5e7eb;border-radius:10px;">

                <tr>

                    <td width="35%"
                        style="background:#f9fafb;font-weight:bold;">

                        Producto

                    </td>

                    <td>

                        {{ $request->product_name }}

                    </td>

                </tr>

                <tr>

                    <td
                        style="background:#f9fafb;font-weight:bold;">

                        Marca

                    </td>

                    <td>

                        {{ $request->brand ?: 'No especificada' }}

                    </td>

                </tr>

                <tr>

                    <td
                        style="background:#f9fafb;font-weight:bold;">

                        Cantidad

                    </td>

                    <td>

                        {{ $request->quantity }}

                    </td>

                </tr>

            </table>

        </td>

    </tr>



    <!-- DESCRIPCIÓN -->

    <tr>

        <td style="padding:0 35px 35px;">

            <h2 style="margin-bottom:20px;color:#111827;">

                📝 Descripción

            </h2>

            <div
                style="
                    background:#f9fafb;
                    border-left:5px solid #f59e0b;
                    padding:20px;
                    border-radius:10px;
                    color:#374151;
                    line-height:28px;
                ">

                {!! nl2br(e($request->description)) !!}

            </div>

        </td>

    </tr>



    <!-- IMAGEN -->

    @if($image)

    <tr>

        <td style="padding:0 35px 35px;">

            <div
                style="
                    background:#ecfdf5;
                    border:1px solid #10b981;
                    color:#065f46;
                    padding:18px;
                    border-radius:10px;
                    font-weight:bold;
                ">

                📎 El cliente adjuntó una imagen del producto.

            </div>

        </td>

    </tr>

    @endif



    <!-- FOOTER -->

    <tr>

        <td
            style="
                background:#111827;
                color:#9ca3af;
                text-align:center;
                padding:30px;
                font-size:13px;
            ">

            Este correo fue generado automáticamente desde el formulario
            <strong style="color:#fff;">"¿No encuentras el producto que buscas?"</strong>

            <br><br>

            © {{ date('Y') }} Gym Style Shark

        </td>

    </tr>

</table>

</td>

</tr>

</table>

</body>

</html>