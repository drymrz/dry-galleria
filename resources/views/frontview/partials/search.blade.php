<div class="search-popup">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>
    <!-- content -->
    <div class="search-content">
        <div class="text-center">
            <h3 class="mb-4 mt-0 text-white">Temukan postingan yang anda cari</h3>
        </div>
        <!-- form -->
        <form action="/posts" class="d-flex search-form">
            @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
            @endif
            @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
            @endif
            <input class="form-control me-2" name="search" type="search" placeholder="Cari Postingan"
                aria-label="Search" value="{{ request('search') }}">
            <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
        </form>
    </div>
</div>