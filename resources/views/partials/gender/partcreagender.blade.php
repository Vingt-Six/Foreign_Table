<section class="container mt-5">
    <form action="/genders" method="POST" class="mx-5">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Create Gender</label>
            <input type="text" class="form-control" id="formGroupExampleInput" name="gender">
        </div>
        <button type="submit" class="btn btn-outline-primary w-100">Add Gender</button>
    </form>
</section>
