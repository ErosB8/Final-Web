<?php
    include_once("header.php");
?>
    <main class="mainc">
        <section>
            <img class="por100" src="img/bannercontactus.jpg" alt="Contact us banner" width="1920" height="800">
        </section>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <h1 id="h1c" class="centrado">Contacto</h1>
                </div>
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        <form action="envio.php" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend>Completá con tus datos:</legend>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <label for="nombre">Nombre:</label> <br>
                                            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre" title="Ingrese su nombre aquí" maxlength="60" required>
                                        </div>
                                        <div class="col">
                                            <label for="apellido">Apellido:</label> <br>
                                            <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido" title="Ingrese su apellido aquí" maxlength="30" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="mail">Mail:</label> <br>
                                            <input type="email" name="mail" id="mail" placeholder="Ingrese su mail" title="Ingrese su mail aquí" maxlength="60" required>
                                        </div>
                                        <div class="col">
                                            <label for="problema">Motivo de contacto:</label> <br>
                                                <select id="problema" name="problema">
                                                    <option value="Problema técnico con mi iPhone">Problema técnico con mi iPhone</option>
                                                    <option value="Problema técnico con mi AppleWatch">Problema técnico con mi AppleWatch</option>
                                                    <option value="Consulta sobre garantía">Consulta sobre garantía</option>
                                                    <option value="Consulta general">Consulta general</option>
                                                    <option value="Otro">Otro</option>
                                                </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label for="carga">Cargar archivo:</label>
                                        <input id="carga" type="file" name="carga" required>
                                    </div>
                                    <div class="row">
                                        <div class="col centrado">
                                            <button class="bap mb20px mt25px" type="submit">Enviar</button>
                                            <button id="res" class="bap mb20px mt25px" type="reset">Reestablecer</button>
                                        </div>
                                    </div>
                                </div>
                            <fieldset>
                        </form>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </section>
    </main>
    <aside id="assc">
        <div class="container">
            <div class="row">
                <article class="col">
                    <h1>Verifica el estado de tu caso o reparación</h1>
                    <p>Proporciónanos tu ID de caso o de reparación para que podamos encontrarlo.</p>
                    <a href="https://getsupport.apple.com/caselookup" target="_blank">Introducir ID ></a>
                </article>
                <article class="col">
                    <h1>Llámanos o acércate a la tienda más cercana</h1>
                    <p>Servicio al cliente (24hs): 0800-631-5648</p>
                    <a href="https://locate.apple.com/" target="_blank">Buscar una tienda cerca de ti ></a>
                </article>
            </div>
        </div>
    </aside>
<?php
    include_once("footer.php")
?>