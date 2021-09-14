<form class="was-validated" action="@isset($item) {{ route("$route.update", $item->id) }} @else {{ route("$route.store") }} @endisset" method="POST" enctype="multipart/form-data">
    @isset($item) @method('PATCH') @endisset
    @csrf
