<section class="container mt-5">
    <form action="/members/{{$member->id}}" method="POST" enctype="multipart/form-data" class="mx-5">
        @csrf
        @method('PUT')
        <div class="input-group">
            <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"
                aria-label="Upload" name="src">
        </div>
        <select class="form-select mt-5" aria-label="Default select example" name="genre">
            <option selected>Choose a gender</option>
            @foreach ($genres as $genre)
                <option value="{{ $genre->gender }}" @if ($member->genre == $genre->gender) ? selected : null @endif>{{ $genre->gender }}</option>
            @endforeach
        </select>
        <div class="mb-3 mt-4">
            <label for="formGroupExampleInput" class="form-label">Name</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="name" value="{{old('name') == '' ? $member->name : old('name')}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Age</label>
            <input type="text" class="form-control" id="formGroupExampleInput2" name="age" value="{{old('age') == '' ? $member->age : old('age')}}">
        </div>
        <button type="submit" class="btn btn-outline-primary">Add Member</button>
    </form>
</section>
