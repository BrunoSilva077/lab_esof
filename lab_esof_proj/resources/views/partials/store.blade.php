<form method="POST" enctype="multipart/form-data" action="{{ route('partials.store') }}">
    @csrf
    <div class="profileinputline">
        <h3>Choose Image</h3>
        <input type="file" class="form-control" name="images[]">
        <input type="file" class="form-control" name="images[]">
        <input type="file" class="form-control" name="images[]">
        <input type="file" class="form-control" name="images[]">
    </div>
</form>