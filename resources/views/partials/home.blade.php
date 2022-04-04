<section>
    @include('layouts.flash2')
    @foreach ($membres as $membre)
        <div class="card" style="width: 18rem;">
            @if (Str::lower($membre->genre) == 'femme')
            <a href="/member/download/{{$membre->id}}"><img src="{{asset('storage/' . $membre->src)}}" class="card-img-top border border-primary border-5" alt="..."></a>
            @elseif (Str::lower($membre->genre) == 'homme')
            <a href="/member/download/{{$membre->id}}"><img src="{{asset('storage/' . $membre->src)}}" class="card-img-top border border-danger border-5" alt="..."></a>
            @else
            <a href="/member/download/{{$membre->id}}"><img src="{{asset('storage/' . $membre->src)}}" class="card-img-top" alt="..."></a>
            @endif
            <div class="card-body">
                <ul>
                    <li>{{$membre->genre}}</li>
                    <li>{{$membre->name}}</li>
                    <li>{{$membre->age}}</li>
                </ul>
                <div class="d-flex justify-content-between">
                    <form action="/members/{{$membre->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                    <a href="/members/{{$membre->id}}/edit" class="btn btn-outline-warning">Edit</a>
                </div>
            </div>
        </div>
    @endforeach
</section>
