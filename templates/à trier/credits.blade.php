@include('header')


<h2 class="type_title type">Crédits :</h2>

<div class="container">
    <div class="credits">
        <h3 class="credit_title">Ce site a été réalisé par </h3>
        <ul>
            <li class="credit_list_item">Jules Fert</li>
        </ul>

        <h3 class="credit_title">Avec les technologies </h3>
        <ul class="credit_list">
            <li class="credit_list_item">HTML</li>
            <li class="credit_list_item">CSS</li>
            <li class="credit_list_item">PHP</li>
            <li class="credit_list_item">Laravel</li>
        </ul>

        <h3 class="credit_title">Mes réseaux </h3>
        <ul class="flex_list">
            <a href="www.linkedin.com/in/julesfert">
                <li><img id="linkedin" src="/img/others-img/linkedin.png" alt="linkedin"></li>
            </a>
            <a href="">
                <li><img id="twitter" src="/img/others-img/twitter.png" alt="twitter"></li>
            </a>
            <a href="">
                <li><img id="github" src="/img/others-img/github.png" alt="github"></li>
            </a>
        </ul>
    </div>
    <div class="img">
        <img class="detective_pikachu" src="/img/others-img/Artwork_Détective_Pikachu.png" alt="detective-pikachu">
    </div>
</div>

@include('footer')
