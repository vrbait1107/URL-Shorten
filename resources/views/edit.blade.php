<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>URL Shortner</title>
</head>

<body>

    <section class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 mt-5">

                <form action="{{ route('dashboard.update', $data->id ) }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <label for="url" class="form-label">Short URL</label>
                        <input type="url" placeholder="Enter URL Here" name="default_short_url" class="form-control"
                            id="default_short_url" value="{{ $data->default_short_url }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">Destination URL</label>
                        <input type="destination_url" placeholder="Enter URL Here" name="destination_url" class="form-control"
                            id="destination_url" value="{{ $data->destination_url }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>


</html>
