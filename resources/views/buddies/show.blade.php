<h1>{{ $users->firstname }}</h1>
<h2>Interests</h2>
@foreach( $users->interests as $interest)
    <div>{{ $interest->interest }}</div>
@endforeach
