@include('header')

<h2 class="type_title">Comparateur de types</h2>
<section class="comparator_container">
    <div>
        <label for="firstType">Premier type : </label>

        <select class="select_type" name="type1" id="firstType">

            @foreach($types as $type)

                <option value="{{$type->name}}">{{$type->name}}</option>

            @endforeach

        </select>
    </div>
    <!-- ------------------------ -->

    <div>
        <label for="secondType">Deuxième type : </label>

        <select class="select_type" name="type2" id="secondType">

            @foreach($types as $type)

                <option value="{{$type->name}}">{{$type->name}}</option>

            @endforeach

        </select>
    </div>
</section>
@include('footer')
