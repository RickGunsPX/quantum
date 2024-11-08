<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simular Pago</title>
    <link href="{{ asset('css/payment.css') }}" rel="stylesheet">
</head>
<body>
    <div class="register-container">
        <h2>Simular Pago</h2>

        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
          
            @csrf  
            <label for="card-number">Número de Tarjeta:</label>
            <input type="text" id="card-number" name="card_number" required pattern="\d{4}-\d{4}-\d{4}-\d{4}" title="El número de tarjeta debe tener 16 dígitos en el formato 1234-5678-9012-3456." oninput="formatCardNumber(this)">

            <label for="expiry-date">Fecha de Expiración (MM/AA):</label>
            <input type="text" id="expiry-date" name="expiry_date" required pattern="\d{2}/\d{2}" title="El formato debe ser MM/AA." oninput="formatExpiryDate(this)">

            <label for="cvv">CVV:</label>
            <input type="text" id="cvv" name="cvv" required pattern="\d{3}" title="El CVV debe tener 3 dígitos." maxlength="3" oninput="formatCVV(this)">

            <label for="amount">Monto a Pagar:</label>
            <input type="text" id="amount" name="amount" value="7000" required readonly>

    
            <div class="button-container">
                <button type="submit">Realizar Pago</button>
                <button type="button" onclick="window.location.href='{{ route('welcome') }}'">Cancelar</button>
            </div>
        </form>
    </div>

    <script>
        function formatCardNumber(input) {
            let value = input.value.replace(/\D/g, '');
            if (value.length > 16) value = value.slice(0, 16);
            input.value = value.replace(/(\d{4})(?=\d)/g, '$1-');
        }

        function formatExpiryDate(input) {
            const value = input.value.replace(/\D/g, '');
            if (value.length >= 2) {
                input.value = value.substring(0, 2) + '/' + value.substring(2, 4);
            } else {
                input.value = value;
            }
        }

        function formatCVV(input) {
            input.value = input.value.replace(/\D/g, '').slice(0, 3);
        }
    </script>
</body>
</html>
