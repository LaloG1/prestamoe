<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Contrato de Préstamo</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        .text-center {
            text-align: center;
        }

        .my-4 {
            margin: 1.5rem 0;
        }

        .p-4 {
            padding: 1.5rem;
        }

        .bg-white {
            background: #fff;
        }

        .rounded {
            border-radius: 8px;
        }

        .shadow-lg {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .container {
            width: 90%;
            margin: auto;
        }
    </style>
</head>

<body>
    <div class="container bg-white p-4 rounded shadow-lg">
        <h2 class="text-center">CONTRATO DE PRÉSTAMO PERSONAL</h2>

        <p><strong>Lugar y Fecha:</strong> Cd. Juárez, Chihuahua, {{ \Carbon\Carbon::parse($fecha)->format('d/m/Y') }}</p>
        <p><strong>PRESTADOR:</strong> {{ $user->name }}</p>
        <p><strong>CLIENTE:</strong> {{ $cliente->nombre }}</p>

        <hr class="my-4">

        <p><strong>1. MONTO DEL PRÉSTAMO</strong><br>
            El PRESTADOR otorga al CLIENTE la cantidad de <strong>${{ number_format($prestamo->monto_original) }} pesos mexicanos</strong>.</p>

        <p><strong>2. INTERÉS SEMANAL</strong><br>
            El préstamo generará un interés semanal del
            <strong>{{ $prestamo->interes }}%</strong>,
            que se pagará semana tras semana
            (<strong>${{ number_format($prestamo->monto * ($prestamo->interes / 100)) }}</strong>) pesos.
        </p>

        <p><strong>3. PLAZO Y PAGOS</strong><br>
            El CLIENTE se compromete a realizar <strong>pagos semanales</strong> de acuerdo con el plan acordado, comenzando <strong>los días Jueves y viernes de la semana siguiente desde que se otorgó el préstamo</strong>, hasta cubrir el monto total del préstamo.</p>

        <p><strong>4. COMPROMISO DEL CLIENTE</strong><br>
            El CLIENTE se compromete a pagar en <strong>tiempo y forma</strong> cada cuota semanal correspondiente, evitando retrasos o incumplimientos que puedan generar penalizaciones o acciones legales por parte del PRESTADOR.</p>

        <p><strong>5. INCUMPLIMIENTO</strong><br>
        En caso de incumplimiento de los pagos, el prestados podrá exigir el pago total en el día acordado..</p>

        <hr class="my-4">

        <div style="display: flex; justify-content: space-between; margin-top: 50px;">
            <div class="text-center">
                <p>__________________________</p>
                <p><strong>{{ $user->name }}</strong><br>Prestador</p>
            </div>
            <div class="text-center">
                <p>__________________________</p>
                <p><strong>{{ $cliente->nombre }}</strong><br>Cliente</p>
            </div>
        </div>
    </div>
</body>

</html>