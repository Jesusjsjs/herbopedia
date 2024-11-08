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


                                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                                        <!-- Identificador del comerciante (tu correo de PayPal o ID) -->
                                        <input type="hidden" name="business" value="jesusjsmontejo@gmail.com">

                                        <!-- Tipo de acción (para enviar un pago) -->
                                        <input type="hidden" name="cmd" value="_xclick">

                                        <!-- Detalles del producto -->
                                        <input type="hidden" name="item_name" value="Producto de Ejemplo">
                                        <input type="hidden" name="amount" value="9.00"> <!-- Precio del producto -->

                                        <!-- Moneda -->
                                        <input type="hidden" name="currency_code" value="USD">

                                        <!-- Dirección de retorno después del pago (opcional) -->
                                        <input type="hidden" name="return" value="http://localhost/herbopedia/view/user.php">
                                        <!-- Dirección de cancelación (opcional) -->
                                        <input type="hidden" name="cancel_return" value="http://localhost/herbopedia/view/user.php">

                                        <!-- Botón de pago de PayPal -->
                                        <input type="submit" value="Pagar con PayPal">
                                    </form>
                                    
                                </div>
                        </div>
                    </div>