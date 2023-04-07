@extends('layouts/app')

@section('content')

<!-- @if($lastname == 'Krasdavtsev')
    <h1>About me:{!!$name!!} {{$lastname}}!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias obcaecati dicta a aperiam, facilis molestias error esse consequatur reiciendis ut ipsum doloremque accusamus, cum, facere deleniti maiores sit officia blanditiis.</p>
@else
    <h1>else</h1>
@endif -->

<!-- @empty(!$lastname )
    <h1>About me:{!!$name!!} {{$lastname}}!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias obcaecati dicta a aperiam, facilis molestias error esse consequatur reiciendis ut ipsum doloremque accusamus, cum, facere deleniti maiores sit officia blanditiis.</p>
@endempty -->
<!-- @if($lastname == 'Krasdavtsev')
    <h1>About me:{!!$name!!} {{$lastname}}!</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias obcaecati dicta a aperiam, facilis molestias error esse consequatur reiciendis ut ipsum doloremque accusamus, cum, facere deleniti maiores sit officia blanditiis.</p>
@else
    <h1>else</h1>
@endif -->
<h1>About</h1>
<p>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Sapiente voluptates inventore maiores hic exercitationem atque excepturi cum totam doloremque veritatis placeat similique necessitatibus
    laboriosam itaque, modi id harum nesciunt accusantium!
</p>
@if(count($people))
<h3>People I like: {{count($people)}}</h3>
<ul>
    @foreach($people as $person)
    <li>{{$person}}</li>
    @endforeach
</ul>
@endif
@endsection