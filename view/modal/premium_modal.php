<div class="modal fade" id="premium_modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="premiumTitle">¡Hazte premium!</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <img src="../img/icon/premium.gif" style="max-width: 100%; aspect-ratio: 1/1;"><br>
                                    Conviertete en un usuario premium para acceder al catálogo de <strong>Recetas</strong> y la posibilidad de
                                    descargar los artículos en formato <strong>pdf</strong>.
                                    </div>

                                    <div id="paypal-button-container"></div>
                                    
                                </div>

                        </div>
                    </div>


                    <script src="https://www.paypal.com/sdk/js?client-id=AV1n87EqPAVI6cN27cw8F2pZ1Eujm4XhBAzsATomw7EBLcSGtzNTaqlnedrEhq4v9qQpXLUedGyEQzy8&currency=USD"></script>

                    <script>
                        // Renderizar el botón de PayPal
                        paypal.Buttons({
                            // Configura la transacción
                            createOrder: function(data, actions) {
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            value: '6.00' // Monto a pagar
                                        }
                                    }]
                                });
                            },
                            // Captura el pago cuando el usuario confirme
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    alert('Transacción completada por ' + details.payer.name.given_name);
                                    console.log(details);
                                });
                            },
                            onError: function(err) {
                                console.error('Error en el pago:', err);
                            }
                        }).render('#paypal-button-container'); // Renderiza el botón en el contenedor
                    </script>