<?php require_once ("../view/templates/header.php"); ?>

<header class="hero">
        <nav class="nav container">

        <section class="hero__container container">
            <h1 class="hero__title">Aprende a disfrutar la lectura con nosotros.</h1>
            <p class="hero__paragraph">Leer es divertido y fácil.Favorece la concentración y la empatía, prevenir la degeneración cognitiva. Ademàs aquí tenemos los
                mejores precios. Hazte socio.
            </p>
        </section>
    </header>

    
        <section class="container about">
            <h2 class="subtitle">¿Por que deberias comprar tus libros aquí?</h2>

            <div class="row row-cols-4">
                <div class="card mb-4">
                    <img class ="productImg" src="../assets/img/entrega rapida.avif" class="card-img-top productImg" alt="" tittle="">
                    <div class="card-body productDescription">
                        <p class="stock">Entrega rapida</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <img class ="productImg" src="../assets/img/seguro.avif" class="card-img-top productImg" alt="" tittle="">
                    <div class="card-body productDescription">
                        <p class="stock">Seguro en caso de incidencia</p>
                    </div>
                </div>
                <div class="card mb-4">
                    <img class ="productImg" src="../assets/img/catalogo actualizado.jpg" class="card-img-top productImg" alt="" tittle="">
                    <div class="card-body productDescription">
                        <p class="stock">Catalogo actualizado</p>
                    </div>
                </div>

            </div>
        </section>
        
      

        <section class="testimony">
            <div class="testimony__container container">
                <img src="../assets/img/leftarrow.svg" class="testimony__arrow" id="before">

                <section class="testimony__body testimony__body--show" data-id="1">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Jordan Alexander, <span class="testimony__course">estudiante
                                de CSS.</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, asperiores eaque totam nulla repudiandae quasi, deserunt culpa exercitationem
                            blanditiis laborum veniam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="../assets/img/face.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="2">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Alejandra Perez, <span class="testimony__course">estudiante de
                                CSS.</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, asperiores eaque laborum veniam laboriosam saepe reiciendis dolorem. Cum, ratione
                            voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="../assets/img/face2.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="3">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Karen Arteaga, <span class="testimony__course">estudiante de
                                CSS.</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, niam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="../assets/img/face3.jpg" class="testimony__img">
                    </figure>
                </section>

                <section class="testimony__body" data-id="4">
                    <div class="testimony__texts">
                        <h2 class="subtitle">Mi nombre es Kevin Ramirez, <span class="testimony__course">estudiante de
                                CSS.</span></h2>
                        <p class="testimony__review">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut est
                            esse, niam laboriosam saepe reiciendis dolorem. Cum, ratione voluptatum!</p>
                    </div>

                    <figure class="testimony__picture">
                        <img src="../assets/img/face4.jpg" class="testimony__img">
                    </figure>
                </section>


                <img src="../assets/img/rightarrow.svg" class="testimony__arrow" id="next">
            </div>
        </section>

        <section class="questions container">
            <h2 class="subtitle">Preguntas frecuentes</h2>
            <p class="questions__paragraph">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ea, porro
                doloribus neque perspiciatis sapiente fuga.</p>

            <section class="questions__container">
                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué plan debería comprar?
                            <span class="questions__arrow">
                                <img src="../assets/img/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show"></p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué aprenderé en este curso?
                            <span class="questions__arrow">
                                <img src="../assets/img/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos
                            facere, quidem eum id excepturi assumenda explicabo nam accusamus veritatis voluptates
                            eveniet adipisci, dicta nihil nemo modi possimus officiis quam atque? Lorem ipsum, dolor sit
                            amet consectetur adipisicing elit. Quos facere, quidem eum id excepturi assumenda explicabo
                            nam accusamus veritatis voluptates eveniet adipisci, dicta nihil nemo modi possimus officiis
                            quam atque?</p>
                    </div>
                </article>

                <article class="questions__padding">
                    <div class="questions__answer">
                        <h3 class="questions__title">¿Qué es CSS GRID?
                            <span class="questions__arrow">
                                <img src="../assets/img/arrow.svg" class="questions__img">
                            </span>
                        </h3>

                        <p class="questions__show">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos
                            facere, quidem eum id excepturi assumenda explicabo nam accusamus veritatis voluptates
                            eveniet adipisci, dicta nihil nemo modi possimus officiis quam atque? Lorem ipsum, dolor sit
                            amet consectetur adipisicing elit. Quos facere, quidem eum id excepturi assumenda explicabo
                            nam accusamus veritatis voluptates eveniet adipisci, dicta nihil nemo modi possimus officiis
                            quam atque?</p>
                    </div>
                </article>
            </section>

            <section class="questions__offer">
                <h2 class="subtitle">¿Estas listo para aprender CSS?</h2>
                <p class="questions__copy">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Amet ratione
                    architecto magnam, officiis ex porro vero est voluptates quaerat quibusdam illo veniam reprehenderit
                    eius atque tempora iure ab non autem.</p>
                <a href="#" class="cta">Aprende ahora</a>
            </section>
        </section>

<?php require_once ("../view/templates/footer.php"); ?>
