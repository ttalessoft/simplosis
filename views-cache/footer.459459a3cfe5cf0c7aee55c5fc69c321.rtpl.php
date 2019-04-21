<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>SimploSis</h2>
                    <p>SimploSis é uma plataforma desenvolvida pela NEXT Tecnologia Ltda, que visa ser um novo
                        seguimento de força de vendas para o seu negócio, com o SimploSis você tem sistema de gestão de
                        contas a pagar, contas a receber, estoque, emissão de NF-e e NFc-e, controle de leads, clientes
                        e compromissos isso tudo em uma única plataforma. </p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Navegação </h2>
                    <ul>
                        <li><a href="#">Minha Conta</a></li>
                        <li><a href="#">Meus Pedidos</a></li>
                        <li><a href="#">Lista de Desejos</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Categorias</h2>
                    <ul>
                        <?php require $this->checkTemplate("categories-menu");?>

                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Newsletter</h2>
                    <p>Assine e receba descontos e promoções em tempo real!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Informe seu e-mail">
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2017 NEXT Tecnologia. <a href="http://nexttec.com.br" target="_blank">nexttec.com.br</a>
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->

<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/res/site/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="/res/site/js/owl.carousel.min.js"></script>
<script src="/res/site/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="/res/site/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="/res/site/js/main.js"></script>

<!-- Slider -->
<script type="text/javascript" src="/res/site/js/bxslider.min.js"></script>
<script type="text/javascript" src="/res/site/js/script.slider.js"></script>
</body>

</html>