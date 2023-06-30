@include('header')

<h2 class="type_title">Liste des types</h2>

<div class="list_type_container">
    @foreach ( $types as $type )
        <a class="type_link" href="{{route('pokemon-list-type', ['id' =>  $type->id])}}">
            <li style="background-color:#{{ $type->color }};" class="list_type">
                <p>{{ $type->name }}</p>
            </li>
        </a>
    @endforeach
</div>

@include('footer')
