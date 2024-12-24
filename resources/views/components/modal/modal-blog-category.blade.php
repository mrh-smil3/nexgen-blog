<div class="modal fade" id="{{ $modal_id . $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $modal_title }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route($route_id, ['id' => $id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="titleKategori_{{ $id }}" class="form-label">Title Kategori</label>
                        <input type="text" name="title" class="form-control" id="title_{{ $id }}"
                            placeholder="insert title" value="{{ $categories ? $category->title : '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="slugKategori_{{ $id }}" class="form-label">Slug Kategori</label>
                        <input type="text" name="slug" class="form-control bg-secondary"
                            id="slug_{{ $id }}" placeholder="insert title" readonly
                            value="{{ $categories ? $category->slug : '' }}" style="cursor:not-allowed">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">{{ $modal_save }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var title = document.getElementById("title_{{ $id }}");
        var slug = document.getElementById("slug_{{ $id }}");

        if (title) {

            title.addEventListener("change", function() {
                console.log("title changed", title.value);
                fetch("/dashboard/posts/category/checkSlug?title=" + encodeURIComponent(title.value))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        slug.value = data.slug;
                    })
                    .catch(function(error) {
                        console.error("Error:", error);
                    });
            });
        }
    });
</script>
