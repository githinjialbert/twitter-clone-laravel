@foreach ($users as $user )
    <h2><i>{{ $user ['name'] }}</h2>
        <h3><i> {{ $user ['age'] }}</h3>

            @if ($user ['age'] < 30)
            <p><i><b>user cannot drive</p>
            @endif
            <hr>
@endforeach
