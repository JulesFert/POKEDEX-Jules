@include ('header')
<section class="pokemon__list">
<h2 class="type_title type">Pokémons avec le type <?= $type->name;?></h2>

    <?php foreach ($type->pokemons as $pokemon) : ?>

        <article class="pokemon">
            <a class="pokemon__link" href="{{ route('pokemon-details', [$pokemon->number]) }}">
                <img class="pokemonImg" src="/img/<?=$pokemon->number;?>.png" alt="image-<?= $pokemon->name; ?>">
                <p class="pokemon__name">#<?= $pokemon->number;?> <?= $pokemon->name;?></p>
            </a>
        </article>

    <?php endforeach; ?>

</section>

<div class="return">
        <a href="{{ route('pokemon-types') }}">Revenir aux types</a>
</div>

@include ('footer')

